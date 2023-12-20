@extends('layouts.admin')
@section('title', 'اضافة وحدة ')
@section('content')
<div class="container-fluid">
          <div class="row">

          <form class="mega-vertical" action="{{route('subscriptions.store')}}" method="post"
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
                              <input class="form-control" name="name" value="{{old('name')}}">
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
                            <label class="col-sm-12 col-form-label">  المنطقة </label>
                            <div class="col-sm-9">
                              <input class="form-control" name="area" value="{{old('area')}}">

                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="media-body">
                          <div class="mb-3 row">
                            <label class="col-sm-12 col-form-label"> رقم اتصال<span  class=" text-danger">*</span></label>
                            <div class="col-sm-9">
                            <input class="form-control"  name="call_phone" value="{{old('call_phone')}}">
                              @error('call_phone')
                                          <div style='color:red'>{{$message}}</div>
                               @enderror

                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="media-body">
                          <div class="mb-3 row">
                            <label class="col-sm-12 col-form-label"> رقم مراسلة<span  class=" text-danger">*</span></label>
                            <div class="col-sm-9">
                            <input class="form-control"  name="msg_phone" value="{{old('msg_phone')}}">
                              @error('msg_phone')
                                          <div style='color:red'>{{$message}}</div>
                               @enderror

                            </div>
                          </div>
                        </div>
                      </div>
                    <div class="col-sm-6">
                        <div class="media-body">
                          <div class="mb-3 row">
                            <label class="col-sm-12 col-form-label"> رقم الحجز<span  class=" text-danger">*</span></label>
                            <div class="col-sm-9">
                            <input class="form-control"  name="agz_num" value="{{old('agz_num')}}">
                              @error('agz_num')
                                          <div style='color:red'>{{$message}}</div>
                               @enderror

                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="media-body">
                          <div class="mb-3 row">
                            <label class="col-sm-12 col-form-label"> لينك انستجرام  </label>
                            <div class="col-sm-9">
                              <input class="form-control" name="link_insta" value="{{old('link_insta')}}">

                            </div>
                          </div>
                        </div>
                      </div>


                      <div class="col-sm-6">
                        <div class="media-body">
                          <div class="mb-3 row">
                            <label class="col-sm-12 col-form-label">  منيو  </label>
                            <div class="col-sm-9">
                              <input class="form-control" name="menu" value="{{old('menu')}}">

                            </div>
                          </div>
                        </div>
                      </div>



                      <div class="col-sm-6">
                        <div class="media-body">
                          <div class="mb-3 row">
                            <label class="col-sm-12 col-form-label">   تطبيق جلكسي  </label>
                            <div class="col-sm-9">
                              <input class="form-control" name="galaxy_application" value="{{old('galaxy_application')}}">

                            </div>
                          </div>
                        </div>
                      </div>



                      <div class="col-sm-6">
                        <div class="media-body">
                          <div class="mb-3 row">
                            <label class="col-sm-12 col-form-label">    تطبيق ايفون  </label>
                            <div class="col-sm-9">
                              <input class="form-control" name="iphone_application" value="{{old('iphone_application')}}">

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
                            </div>
                        </div>
                    </div>
                      <div class="col-sm-6">
                        <div class="media-body">
                          <div class="mb-3 row">
                            <label class="col-sm-12 col-form-label">  الوصف</label>
                            <div class="col-sm-9">
                              <textarea class="form-control" name="description" row="5" value="{{old('description')}}"> </textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="media-body">
                          <div class="mb-3 row">
                            <label class="col-sm-12 col-form-label">  وصف البعد</label>
                            <div class="col-sm-9">
                              <textarea class="form-control" name="details" row="5" value="{{old('details')}}"> </textarea>
                            </div>
                          </div>
                        </div>
                      </div>

<div class="col-sm-6">
                        <div class="media-body">
                          <div class="mb-3 row">
                            <label class="col-sm-12 col-form-label">  اللوكيشن</label>
                            <div class="col-sm-9">
                              <textarea class="form-control" name="location" row="5" value="{{old('location')}}"> </textarea>
                            </div>
                          </div>
                        </div>
                      </div>

                  </div>

                </div>
                <div class="col-md-12">
                  <div class="card-footer text-center">
                          <button class="btn btn-primary m-r-15" type="submit">حفظ</button>
                          <a href="{{route('subscriptions.index')}}"> <button type="button" class="btn btn-light">إلغاء</button></a>
                        </div>
                </div>
              </div>
           </div>

            </form>
          </div>
        </div>

@endsection

