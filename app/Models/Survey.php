<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_name',
        'user_age',
        'user_sex'
    ];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
