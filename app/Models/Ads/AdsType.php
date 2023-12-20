<?php

namespace App\Models\Ads;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdsType extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    public static function boot()
    {
        parent::boot();
        static::deleting(function ($Type) {
            optional($Type->ads())->delete();
        });
    }

    public function ads()
    {
        return $this->hasMany(Ads::class, 'type_id');
    }
}
