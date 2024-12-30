<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class PinjamModel extends Model
{
    use HasFactory;


    protected $table = 'pinjam';


    protected $fillable = [
        'member_id',
        'book_id',
        'borrow_date',
        'due_date',
        'returned_at',
    ];


    public function member()
    {
        return $this->belongsTo(MembersModel::class);
    }


    public function book()
    {
        return $this->belongsTo(BooksModel::class);
    }

}
