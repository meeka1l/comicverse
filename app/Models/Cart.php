<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    // Define the table if it does not follow the Laravel naming convention
    protected $table = 'carts'; // Optional if your table is named 'carts'

    // Specify the fillable attributes
    protected $fillable = [
        'user_id',
        'book_id',
        'quantity',
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship with the Book model
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
