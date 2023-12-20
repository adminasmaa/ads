<?php

namespace App\Models\hr;

use App\Models\hr\EmployeeStatus;
use App\Models\hr\JobTitle;
use App\Models\hr\Message;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Sanctum\HasApiTokens;

class Employee extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasRoles, CanResetPassword;

    protected $guarded = [];
    protected $appends = ['status_icon', 'status'];
    protected $table ='hr_employees';




    public function getStatusIconAttribute()
    {
        $status = EmployeeStatus::where('id', $this->emp_state_id)->first()->name == 'موقوف';
        if ($status) {
            return 'away';
        }
        return $this->activition == 1 ? 'online' : 'offline';
    }
    public function getClosestPersonAttribute($value)
    {
        return json_decode($value);
    }
    public function getLicenseAttribute($value)
    {
        return json_decode($value);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function nationality()
    {
        return $this->belongsTo(Nationality::class,'nation_id');
    }

    public function profession()
    {
        return $this->belongsTo(Profession::class);
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    public function qualification()
    {
        return $this->belongsTo(Qualification::class,'qual_id');
    }


    public function getStatusAttribute()
    {
        return EmployeeStatus::where('id', $this->emp_state_id)->first()->name;
    }

    public function messages()
    {
        return $this->belongsToMany(Message::class,'hr_employee_messages', 'messages_id', 'employees_id')->withPivot('seen');

    }

    public function messagesTo()
    {
        return $this->hasMany(Message::class, 'from');
    }

    public function jobTitle()
    {


        return $this->belongsTo(JobTitle::class, 'job_title_id');
    }

    protected function getAccountNameAttribute($value)
    {
        return json_decode($value);

    }

    protected function getAccountNumberAttribute($value)
    {
        return json_decode($value);

    }

    protected function getAccountDetailsAttribute($value)
    {
        return json_decode($value);

    }
    public function scopeBranchChoose($query){
       return $query->when(auth()->user()->branch_id != 1, function ($q) {
            $q->where('branch_id', auth()->user()->branch_id);
        })
            ->when(Session::get('branch'), function ($q) {
                $q->where('branch_id', Session::get('branch'));
        });

    }






}
