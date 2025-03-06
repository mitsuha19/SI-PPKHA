<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $fillable = ['question_id', 'option_text', 'next_section_id'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function nextSection()
    {
        return $this->belongsTo(Question::class, 'next_section_id');
    }
}
