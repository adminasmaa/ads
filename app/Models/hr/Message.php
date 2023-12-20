<?php

namespace App\Models\hr;

use App\Models\hr\Employee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'hr_messages';


    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'hr_employee_messages', 'messages_id', 'employees_id')->withPivot('seen');
        //return $this->belongsToMany(Employee::class, 'hr_employee_messages', 'employees_id', 'messages_id');


    }

}
