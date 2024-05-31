<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'stock_code',
        'user_id',
        'book_id',
        'stock_id',
        'borrowed_at',
        'returned_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }
}
