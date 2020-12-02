<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flag extends Model
{
    use HasFactory;
    protected $table='student_flags';

    public function student()
    {
        return $this->belongsTo('App\Models\Student');
    }
}
