<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Session;
use App\Models\Apartment\ApartType;

class BranchScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        // dd(strpos($model->getRouteKeyName(), 'Checks'));
      //  dd($model->getTable());
        if($model->getTable()=='hr_movings' || $model->getTable()=='hr_award_discounts'  ||  $model->getTable()=='hr_att_emp' ){
            $builder->when(auth()->user()->branch_id!=1,function($q){
                $q->whereRelation('employee', 'branch_id', auth()->user()->branch_id);
            })->when(request()->has('branch'),function($q){
                $q->whereRelation('employee', 'branch_id', request()->get('branch'));
            });

        }
        elseif($model->getTable()=='aparts'){
       
            $builder->when(optional(auth()->user())->branch_id!=1 && optional(auth()->user())->branch_id!=null ,function($q){
                $q->whereRelation('types', 'branch_id', auth()->user()->branch_id);
            })->when(request()->has('branch'),function($q){
                $q->whereRelation('types', 'branch_id', request()->get('branch'));
            });

        }
        elseif($model->getTable()=='hr_branches'){
            $builder->when(auth()->user()->branch_id != 1, function ($q) {
                $q->where('id', auth()->user()->branch_id);
            })->when(Session::has('branch'), function ($q) {
                $q->where('id', Session::get('branch'));
            });

        }
        else{
           // dd('fff');
            $builder->when(auth()->user()->branch_id != 1, function ($q) {
              
                $q->where('branch_id', auth()->user()->branch_id);
            })->when(Session::has('branch'), function ($q) {
                //dd(Session::get('branch'));
                $q->where('branch_id', Session::get('branch'));
            });
           




        }





    }
}



