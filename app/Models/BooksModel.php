<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BooksModel extends Model
{
    use HasFactory;


    protected $table = 'books';


    protected $fillable = ['title', 'author', 'pub_date'];


    public function pinjam()
{
    return $this->hasMany(PinjamModel::class, 'book_id');
}



}
