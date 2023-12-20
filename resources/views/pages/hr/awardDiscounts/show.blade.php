@extends('layouts.admin')
@section('title', 'سلف او مكافأت')
@section('content')
<div class="container-fluid">
          <div class="row">

            <section>
              <div class="container py-5">


                <div class="row">
                  <div class="col-lg-12">
                    <div class="card mb-4">
                      <div class="card-body text-center">

                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">النوع</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$awardDiscount->type=='award'?'مكافأة':'سلفه'}}</p>
                                </div>
                            </div>
                             <hr>
                            
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">  اسم الموظف</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$awardDiscount->employee->user_name}}</p>
                                </div>
                            </div>
                            <hr>
                          
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">المبلغ</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$awardDiscount->value}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">تاريخ الصرف</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$awardDiscount->exchange_date}}</p>
                                </div>
                            </div>
                            <hr>

                           @if($awardDiscount->type=='discount')
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">مبلغ الخصم</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$awardDiscount->discount_value}}</p>
                                </div>
                            </div>
                            <hr>
                           @endif
                           @if($awardDiscount->type=='discount')
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">تاريخ الاستحقاق</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$awardDiscount->due_date}}</p>
                                </div>
                            </div>
                            <hr>
                           @endif
                           @if($awardDiscount->type=='discount')
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">عدد الشهور</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{intval($awardDiscount->num_month)}}</p>
                                </div>
                            </div>
                            <hr>
                           @endif
                            
                            @if($awardDiscount->reason)
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">السبب</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$awardDiscount->reason}}</p>
                                </div>
                            </div>
                            <hr>
                           @endif
                           


                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
</div>
@endsection
