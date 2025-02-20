<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Nomination extends Model
{
    use HasFactory;
    protected $fillable = [
        'surname',
        'first_name',
        'other_names',
        'phone',
        'email',
        'dob',
        'gender',
        'nationality',
        'state',
        'position',
        'amount',
        'grade',
        'member_id',
        'chapter',
        'year_inducted',
        'organization',
        'designation',
        'current_position',
        'contact_address',
        'program_of_contestant_if_elected',
        'profile_of_contestant',
        'status',
        'transaction_id',
    ];
    //
}
