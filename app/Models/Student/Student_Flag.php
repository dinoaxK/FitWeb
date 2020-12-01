<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_Flag extends Model
{
    use HasFactory;

    public function student()
    {
        return $this->belongsTo('App\Models\Student');
    }
}
