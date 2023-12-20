<?php

namespace App\Models\Ads;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ads extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function type()
    {
        return $this->belongsTo(AdsType::class, 'type_id');
    }

}
