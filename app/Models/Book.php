<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','description','status'
    ];

    public function scopeFilter(Builder $builder,$filters){
        $builder->when($filters['name']??false,function($builder,$value){
            $builder->where('books.name','LIKE',"%{$value}%");
        });
       
    }

    public static function rules(){
        return [
            'name' => ['required', 'string', 'max:255'],
        ];
    }
}
