<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Galleries extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded=[];

  

    // public function company(){

    //     return $this->belongsTo(Company::class);
    // }



}
