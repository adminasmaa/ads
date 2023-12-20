<?php

namespace App\Models\hr;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $table ='hr_professions';

    protected $appends = ['count'];

    public function getCountAttribute(){
        return Employee::where('profession_id',$this->id)->count();
    }
}
