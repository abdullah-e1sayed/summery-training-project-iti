<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class BorrowedBook extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','book_id','returned_at',
    ];
    /**
     * Get the user that owns the BorrowedBook
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    public static function rules(){
        return [
            'book_id' => [
                'required',
                'int',
                Rule::exists('books', 'id')->where('status', 'on the shelf'),
            ],
        ];
    }
}
