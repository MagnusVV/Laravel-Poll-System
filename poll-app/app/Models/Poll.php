<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    use HasFactory;

    protected $fillable = ['poll_title', 'poll_description', 'user_id', 'date_closing', 'no_of_allowed_votes'];

    protected function polls()
    {
        return $this->hasMany(VoteOption::class);
    }
}
