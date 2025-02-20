<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Position;
use App\Models\Nomination;
use Yabacon\Paystack;
use session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\MemberRegistered;

class NominationController extends Controller
{
    public function searchPractice(Request $request)
    {
        $practiceId = $request->input('practice_id');

    // Call the external API
    $response = Http::timeout(30)->get("https://portal.niprng.org.ng/api/member/practice/id/{$practiceId}");


    if ($response->successful()) {
        $data = $response->json();

        // Check if 'member' array is empty
        if (empty($data['member'])) {
            // Return a 'not found' view with an error message
            return view('practice_search.not_found', ['error' => 'Record not found']);
        } else {
            // Pass the data to a view
            $member = (object) $data['member'][0];
            $positions = Position::all();
            //  dd($member);
            return view('practice_search.result', compact('member','practiceId','positions'));
        }
    } else {
        // Handle other HTTP errors
        return view('practice_search.not_found', ['error' => 'Error contacting the API']);
    }
    }

    public function processSearch(Request $request){
        $existingMember = Nomination::where('email', $request->input('email'))
        ->orWhere('member_id', $request->input('member_id'))
        ->first();

    if ($existingMember) {
        return redirect()
            ->route('show.reg.form')
            ->with('message', 'Email already taken or Member ID.');
    }
       try{
        $validatedData = $request->validate([
            'surname' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'other_names' => 'nullable|string|max:255',
            'phone' => 'required|string',
            'email' => 'required|email|max:255',
            'dob' => 'required|date',
            'gender' => 'required|in:male,female',
            'nationality' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'grade' => 'required|string|max:255',
            'member_id' => 'required|string|max:255',
            'chapter' => 'required|string|max:255',
            'year_inducted' => 'required|date',
            'organization' => 'nullable|string|max:255',
            'designation' => 'nullable|string|max:255',
        ]);
        session(['member_data' => $validatedData]);
    
        // Initialize Paystack payment
        $paystack = new Paystack(env('PAYSTACK_SECRET_KEY'));
        $transaction = $paystack->transaction->initialize([
            'amount' => $validatedData['amount'] * 100, // Paystack uses kobo, so multiply by 100
            'email' => $validatedData['email'],
            'callback_url' => route('member.payment.callback2'),
        ]);

        // Redirect to Paystack payment page
        return redirect($transaction->data->authorization_url);
    } catch (\Illuminate\Validation\ValidationException $e) {
        // Redirect to a specific route on validation error
        return redirect()
            ->route('show.reg.form')
            ->withErrors($e->validator)
            ->withInput();
    } catch (\Exception $e) {
        // Handle payment initialization errors
        return redirect()
            ->route('show.reg.form')
            ->withErrors(['error' => 'Failed to initialize payment: ' . $e->getMessage()])
            ->withInput();
    }

    }


    public function paymentCallback2(Request $request)
    {
        $paystack = new Paystack(env('PAYSTACK_SECRET_KEY'));
        $transaction_id = $request->query('trxref');

        try {
            // Verify the transaction status with Paystack
            $transaction = $paystack->transaction->verify(['reference' => $transaction_id]);
            if ($transaction->data->status == 'success') {
                // Retrieve user data from the session

                $userData = session('member_data');
                $success = Nomination::create([
                    'surname' => $userData['surname'],
                    'first_name' => $userData['first_name'],
                    'other_names' => $userData['other_names'],
                    'phone' => $userData['phone'],
                    'email' => $userData['email'],
                    'dob' => $userData['dob'],
                    'gender' => $userData['gender'],
                    'nationality' => $userData['nationality'],
                    'state' => $userData['state'],
                    'position' => $userData['position'],
                    'amount' => $userData['amount'],
                    'grade' => $userData['grade'],
                    'member_id' => $userData['member_id'],
                    'chapter' => $userData['chapter'],
                    'year_inducted' => $userData['year_inducted'],
                    'organization' => $userData['organization'],
                    'transaction_id' => $transaction->data->reference,
                    'designation' => $userData['designation'],
                    'status' => 'pending',

                ]);

                // Commit transaction
                if($success){
                    $customLink = url('/update-profile/' . $success->id.$transaction->data->reference);
                    Mail::to($userData['email'])->send(new MemberRegistered($success, $customLink));
                }

                // Clear session data
                session()->forget('member_data');

                // Redirect to success page
                return redirect()->route('payment.success')->with('success', 'Payment successful and member information saved.');
            } else {
                // Payment failed, redirect to failure page
                return redirect()->route('payment.failure')->withErrors(['error' => 'Payment failed. Please try again.']);
            }
        } catch (\Exception $e) {
            // Rollback transaction in case of error
            dd($e->getMessage());
            return redirect()->route('payment.failure')->withErrors(['error' => 'Error verifying payment: ' . $e->getMessage()]);
        }
    }



    public function showUploadForm($id)
    {
        $member = Nomination::whereRaw("CONCAT(id, transaction_id) = ?", [$id])->first();

    // If no record is found, return an error response
    if (!$member) {
        return redirect()->route('index.home');
    }
    
        if ($member->status === 'completed') {
            return redirect()->route('update.success')->with('message', 'You have already updated your information.');
        }
    
        return view('update.update', compact('member'));
    }
    
    public function upload(Request $request, $id)
    {
    // Validate the input fields
    $request->validate([
        'current_position'=> 'required|string',
        'contact_address' => 'required|string|max:500',
        'program_of_contestant_if_elected' => 'required|string|max:1000',
        'profile_of_contestant' => 'required|string|max:2000',
    ]);

    // Find the member record
    $member = Nomination::findOrFail($id);

    // Check if already completed
    if ($member->status === 'completed') {
        return redirect()->route('update.success')->with('message', 'You have already updated your information.');
    }

    // Update member record
    $member->update([
        'current_position' => $request->current_position,
        'contact_address' => $request->contact_address,
        'program_of_contestant_if_elected' => $request->program_of_contestant_if_elected,
        'profile_of_contestant' => $request->profile_of_contestant,
        'status' => 'completed',
    ]);

    return redirect()->route('update.success')->with('message', 'Update successfully.');


    }

    public function success()
    {
        return view('members.success');
    }

    // Failure page
    public function failure()
    {
        return view('members.failure');
    }
    
}
