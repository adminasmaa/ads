
@extends('layouts.admin')
@section('title', '  تعديل صورة')
@section('content')
<div class="container-fluid">
          <div class="row">
          <form class="mega-vertical" action="{{route('galleries.update',[$gallery->id,'unit_id='.$unit_id])}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')
              <div class="col-sm-12 col-xxl-12 box-col-12 p-20">
                <div class="card height-equal">
                  <div class="card-header">
                      <h5>تعديل صورة  </h5>
                  </div>
                  <div class="card-body">
                    <div class="row">       

                
                     

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
                                @if($gallery->img)
                                <a href="{{asset('storage/'.$gallery->img)}}" class="col-sm-3"><img style="width:70px;height:70px;"
                                                           src="{{asset('storage/'.$gallery->img)}}"/>
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
                            <a href="{{route('galleries.index',$unit_id)}}"> <button type="button" class="btn btn-light">إلغاء</button></a> 
                          </div>
                </div> 
              </div>
           </div>

            </form>
          </div>
        </div>
@endsection
