@extends('layouts.admin')
@section('title', 'معلومات الفروع')
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
                                    <p class="mb-0"> اسم الفرع بالعربى</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$branch->name}}</p>
                                </div>
                            </div>
                             <hr>
                         
                             <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0"> اسم الفرع بالانجليزيه</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$branch->name_en()}}</p>
                                </div>
                            </div>
                             <hr>
                             
                             @if($branch->phone)
                             <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">رقم الهاتف</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$branch->phone}}</p>
                                </div>
                            </div>
                            <hr>
                            @endif
                            @if($branch->email)
                             <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">البريد الالكترونى</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$branch->email}}</p>
                                </div>
                            </div>
                            <hr>
                            @endif
                            @if($branch->link && $branch->link['facebook'])
                             <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0"> لينك الفيس بوك</p>
                                </div>
                                <div class="col-sm-9">
                                    <a href="{{$branch->link['facebook']}}" class="text-muted mb-0">{{$branch->link['facebook']}}</a>
                                </div>
                            </div>
                            <hr>
                            @endif
                            @if($branch->link && $branch->link['instagram'])
                             <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0"> لينك انستجرام</p>
                                </div>
                                <div class="col-sm-9">
                                <a href="{{$branch->link['facebook']}}" class="text-muted mb-0">{{$branch->link['instagram']}}</a>
                                </div>
                            </div>
                            <hr>
                            @endif
                          
                            @if($branch->logo)
                             <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0"> الشعار</p>
                                </div>
                                <div class="col-sm-9">
                                <a target="_blank" href="{{asset('storage/'.$branch->logo)}}"><img
                                                class="b-r-10 m-3" width="50px" height="50px"
                                                src="{{asset('storage/'.$branch->logo)}}" alt=""></a>
                                </div>
                            </div>
                            <hr>
                            @endif
                            @if($branch->address)
                             <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0"> العنوان</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$branch->address}}</p>
                                </div>
                            </div>
                            <hr>
                            @endif
                            @if($branch->desc)
                             <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0"> نبذه </p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$branch->desc}}</p>
                                </div>
                            </div>
                            <hr>
                            @endif
                            @if($branch->location)
                             <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0"> اللوكيشين </p>
                                </div>
                                <div class="col-sm-9">
                               
                                {!! $branch->location !!}

                                
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
