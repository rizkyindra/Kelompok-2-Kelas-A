<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'cover_url',
        'author',
        'publisher',
        'year',
        'semester',
//        'subject_id',
//        'subject_name',
    ];

    public $casts = [
        'semester' => 'array',
        'subject_id' => 'array',
        'subject_name' => 'array',
    ];

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }
}
