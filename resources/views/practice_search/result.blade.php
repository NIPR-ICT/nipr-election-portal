@include('includes.header')

<body class="bg-gray-100 font-sans">

<div class="container mx-auto px-4 py-8">

  <div class="bg-white p-8 shadow-md rounded-lg max-w-4xl mx-auto">
    <div class="flex justify-center mt-3">
    <a href="/"><img src="/images/logo.jpg" alt="Logo" class="w-20 mb-2"></a>
    </div>
    <h2 class="text-3xl font-bold text-center mb-8">Member Information Details</h2>
    <h3 style="color: red; ">Please confirm your information, fill out the missing fields, and correct any null or incorrect entries.</h3>
    <br>
    <!-- Member Details Form -->
    <form action="{{route('process.form')}}" method="POST">
       @csrf
      <!-- {{--@method('PUT') --}} -->
      <div class="space-y-6">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label for="surname" class="block text-gray-700">Surname</label>
            <input type="text" name="surname" id="surname" class="w-full border border-gray-300 p-2 rounded-md"
                   value="{{ old('surname', $member->last_name ?? '') }}">
          </div>
          <div>
            <label for="first-name" class="block text-gray-700">First Name</label>
            <input type="text" name="first_name" id="first-name" class="w-full border border-gray-300 p-2 rounded-md"
                   value="{{ old('first_name', $member->first_name ?? '') }}">
          </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label for="other-names" class="block text-gray-700">Other Names</label>
            <input type="text" name="other_names" id="other-names" class="w-full border border-gray-300 p-2 rounded-md"
                   value="{{ old('other_name', $member->other_name ?? '') }}">
          </div>
          <div>
            <label for="phone" class="block text-gray-700">Phone Number</label>
            <input type="text" name="phone" id="phone" class="w-full border border-gray-300 p-2 rounded-md"
                   value="{{ old('phone_number', $member->phone_number ?? '') }}">
          </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div>
        <label for="email" class="block text-gray-700">Email <span style="color:red; "><em>Confirm or update your email.</em></span></label>
        <input type="email" name="email" id="email" class="w-full border border-gray-300 p-2 rounded-md"
               value="{{ old('email', $member->email ?? '') }}">
    </div>
    
    <div>
        <label for="dob" class="block text-gray-700">Date of Birth</label>
        <input type="date" name="dob" id="dob" 
               class="w-full border border-gray-300 p-2 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm bg-white text-gray-700"
               value="{{ old('date_of_birth', $member->date_of_birth ?? '') }}">
    </div>

    <div>
        <label for="gender" class="block text-gray-700">Gender</label>
        <select id="gender" name="gender" class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
            <option value="" disabled {{ is_null($member->gender) ? 'selected' : '' }}>Select your gender</option>
            <option value="male" {{ $member->gender === 'male' ? 'selected' : '' }}>Male</option>
            <option value="female" {{ $member->gender === 'female' ? 'selected' : '' }}>Female</option>
        </select>
    </div>
</div>


        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label for="nationality" class="block text-gray-700">Nationality</label>
              <input type="text" name="nationality" id="nationality" class="w-full border border-gray-300 p-2 rounded-md">
            </div>
            <div>
              <label for="state" class="block text-gray-700">State of Residence</label>
              <input type="text" name="state" id="state" class="w-full border border-gray-300 p-2 rounded-md">
            </div>

          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Select Position -->
    <div>
        <label for="position_select" class="block text-gray-700">Select Position</label>
        <select id="position_select" name="position" class="w-full border border-gray-300 p-2 rounded-md">
            <option value="" data-amount="">Select a position</option>
            @foreach($positions as $position)
                <option value="{{ $position->name }}" data-amount="{{ $position->amount }}">{{ $position->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Payable Amount -->
    <div>
        <label for="amount" class="block text-gray-700">Payable Amount</label>
        <input type="text" name="amount" id="amount" class="w-full border border-gray-300 p-2 rounded-md" readonly>
    </div>
</div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label for="grade" class="block text-gray-700">Current Grade</label>
              <select id="grade" name="grade" class="w-full border border-gray-300 p-2 rounded-md text-gray-900 bg-white focus:outline-none focus:ring-2 focus:ring-green-500">
                  <option value="">Select Grade</option>
                  <option value="Fellow (fnipr)">Fellow (fnipr)</option>
                  <option value="Fellow (Hon.)">Fellow (Hon.)</option>
                  <option value="Member (mnipr)">Member (mnipr)</option>
                </select>
                {{-- @error('grade')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror --}}
            </div>
            <div>
              <label for="member_id" class="block text-gray-700">Member ID</label>
              <input type="text" name="member_id" id="member_id" value="{{$practiceId}}" readonly class="w-full border border-gray-300 p-2 rounded-md">

          </div>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-5">
            <div>
              <label for="chapter" class="block text-gray-700">Chapter</label>
              <input type="text" id="chapter" name="chapter" placeholder="Enter your chapter" class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
              {{-- @error('chapter')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror --}}
          </div>
            <div>
              <label for="year-inducted" class="block text-gray-700">Date of Admission</label>
              <input type="date" name="year_inducted" id="year-inducted" placeholder="Enter year inducted" class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>
            {{-- @error('year_inducted')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror --}}
          </div>


        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label for="organisation" class="block text-gray-700">Organisation</label>
            <input type="text" name="organization" id="organisation" value="{{$member->organisation}}" class="w-full border border-gray-300 p-2 rounded-md">
          </div>
          <div>
            <label for="designation" class="block text-gray-700">Designation(Position)</label>
            <input type="text" name="designation" id="designation" class="w-full border border-gray-300 p-2 rounded-md">
          </div>
        </div>

        <div class="flex justify-center mt-8">
          <button type="submit" class="bg-green-600 text-white hover:bg-green-700 px-6 py-2 rounded-md text-lg">
            Proceed to Payment
          </button>
        </div>

      </div>
    </form>
  </div>
</div>
<script>
    document.getElementById('position_select').addEventListener('change', function() {
        // Get the selected option
        let selectedOption = this.options[this.selectedIndex];
        
        // Get the amount from the data attribute
        let amount = selectedOption.getAttribute('data-amount');

        // Set the amount input value
        document.getElementById('amount').value = amount ? amount : '';
    });
</script>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    flatpickr("#dob", {
      dateFormat: "Y-m-d",
      altInput: true,
      altFormat: "F j, Y", 
      allowInput: true,
    });
  });
</script>
@include('includes.footer')