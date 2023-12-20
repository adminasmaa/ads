
@extends('layouts.admin')
@section('title', '   تعديل خدمة')
@section('content')
<div class="container-fluid">
          <div class="row">
          <form class="mega-vertical" action="{{route('services.update',[$service->id,'unit_id='.$unit_id])}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')
              <div class="col-sm-12 col-xxl-12 box-col-12 p-20">
                <div class="card height-equal">
                  <div class="card-header">
                      <h5>تعديل خدمه  </h5>
                  </div>
                  <div class="card-body">
                    <div class="row">       

                      <div class="col-sm-6">
                        <div class="media-body">
                          <div class="mb-3 row">
                            <label class="col-sm-12 col-form-label">  الاسم <span  class=" text-danger">*</span></label>
                            <div class="col-sm-9">
                              <input class="form-control" name="name" value="{{$service->name}}">
                              @error('name')
                                          <div style='color:red'>{{$message}}</div>
                               @enderror
                            </div>
                          </div>
                        </div>
                      </div>
                     

                      <div class="col-sm-6">
                        <div class="media-body">
                            <div class="mb-3 row">
                                <label class="col-sm-12 col-form-label">رفع صورة </label>
                                <div class="col-sm-9">
                                    <input type="file" name='img' class="form-control"
                                           placeholder="">
                                    @error('img')
                                    <div style='color:red'>{{$message}}</div>
                                    @enderror
                                </div>
                                @if($service->img)
                                <a href="{{asset('storage/'.$service->img)}}" class="col-sm-3"><img style="width:70px;height:70px;"
                                                           src="{{asset('storage/'.$service->img)}}"/>
                                 </a>
                                 @endif
                            </div>
                        </div>
                    </div>
                   


                  </div>
                </div>
                <div class="col-md-12">
                  <div class="card-footer text-center">
                            <button class="btn btn-primary m-r-15" type="submit">تعديل</button>
                            <a href="{{route('services.index',$unit_id)}}"> <button type="button" class="btn btn-light">إلغاء</button></a> 
                          </div>
                </div> 
              </div>
           </div>

            </form>
          </div>
        </div>
@endsection
