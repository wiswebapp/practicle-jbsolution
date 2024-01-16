<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'fname',
        'lname',
        'phone',
        'email'
    ];

    public function employees() {
        return $this->hasOne('Employee:class');
    }
}
