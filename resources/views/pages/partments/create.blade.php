@extends('layouts.admin')
@section('title', 'اضافة وحدة ')
@section('content')
<div class="container-fluid">
          <div class="row">

          <form class="mega-vertical" action="{{route('partments.store')}}" method="post"
                  enctype="multipart/form-data">
                @csrf
              <div class="col-sm-12 col-xxl-12 box-col-12 p-20">
                <div class="card height-equal">
                  <div class="card-header">
                      <h5>إضافة وحدة جديدة </h5>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="media-body">
                          <div class="mb-3 row">
                            <label class="col-sm-12 col-form-label">  الاسم <span  class=" text-danger">*</span></label>
                            <div class="col-sm-9">
                              <input class="form-control" name="name" value="{{old('name')}}" required>
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
                            <label class="col-sm-12 col-form-label">  السعر <span  class=" text-danger">*</span></label>
                            <div class="col-sm-9">
                              <input class="form-control" name="price" value="{{old('price')}}" required>
                              @error('price')
                                          <div style='color:red'>{{$message}}</div>
                               @enderror
                            </div>
                          </div>
                        </div>
                      </div>


                  </div>

                </div>
                <div class="col-md-12">
                  <div class="card-footer text-center">
                          <button class="btn btn-primary m-r-15" type="submit">حفظ</button>
                          <a href="{{route('partments.index')}}"> <button type="button" class="btn btn-light">إلغاء</button></a>
                        </div>
                </div>
              </div>
           </div>

            </form>
          </div>
        </div>

@endsection

