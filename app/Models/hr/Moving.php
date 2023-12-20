<?php

namespace App\Models\hr;

use App\Models\hr\Employee;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\BranchScope;

class Moving extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $table ='hr_movings';
    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(new BranchScope);
    }

    public function employee(){
        return $this->belongsTo(Employee::class);
    }
}
