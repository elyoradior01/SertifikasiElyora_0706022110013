<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MembersModel extends Model
{
    use HasFactory;


    protected $table = 'members';


    protected $fillable = [
        'nama',
        'notelp',
        'email'
    ];

}
