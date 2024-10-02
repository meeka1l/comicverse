<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
      'title', 'author','author_id', 'description', 'price', 'stock', 'trending', 'classic','image',
    ];

    public function author()
{
    return $this->belongsTo(User::class, 'author_id');
}

}
