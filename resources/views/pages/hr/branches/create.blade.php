@extends('layouts.admin')
@section('title', 'اضافة فرع')
@section('content')

<div class="container-fluid">
    <div class="row">
        <form class="mega-vertical" action="{{route('branches.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-sm-12 box-col-12 p-20">
                <div class="card height-equal">
                    <div class="card-header">
                        <h5>إضافة فرع جديد </h5>
                    </div>
                    <div class="card-body">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label for="projectinput1"> الاسم بالعربى </label>
                                        <input type="text" id="pac-input" class="form-control" placeholder="  "
                                            name="name[ar]">

                                        @error("name.ar")
                                        <span class="text-danger"> {{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label for="projectinput1"> الاسم بالانجليزيه </label>
                                        <input type="text" id="pac-input" class="form-control" placeholder="  "
                                            name="name[en]">

                                        @error("name.en")
                                        <span class="text-danger"> {{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label for="projectinput1"> الهاتف </label>
                                        <input type="text" id="pac-input" class="form-control" placeholder="  "
                                            name="phone">

                                        @error("phone")
                                        <span class="text-danger"> {{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label for="projectinput1"> البريد الالكترونى </label>
                                        <input type="email" id="pac-input" class="form-control" placeholder="  "
                                            name="email">

                                        @error("email")
                                        <span class="text-danger"> {{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label for="projectinput1"> لينك الفيس بوك </label>
                                        <input type="text" id="pac-input" class="form-control" placeholder="  "
                                            name="link[facebook]">


                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label for="projectinput1"> لينك انستجرام </label>
                                        <input type="text" id="pac-input" class="form-control" placeholder="  "
                                            name="link[instagram]">

                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label for="projectinput1"> العنوان </label>
                                        <input type="text" id="pac-input" class="form-control" placeholder="  "
                                            name="address">

                                        @error("address")
                                        <span class="text-danger"> {{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label for="projectinput1"> اللوكيشين </label>
                                        <input type="text" id="pac-input" class="form-control" placeholder="  "
                                            name="location">

                                        @error("location")
                                        <span class="text-danger"> {{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label for="projectinput1"> شعار </label>
                                        <input type="file" id="pac-input" class="form-control" placeholder="  "
                                            name="logo">

                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="projectinput1"> نبذه </label>
                                        <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" name="desc" ></textarea>
                                    </div>
                                </div>


                            </div>



                            
                               

                            


                        </div>
                    </div>

                    <div class="card-footer text-center">
                        <button class="btn btn-primary m-r-15" type="submit">حفظ</button>
                        <a href="{{route('branches.index')}}"> <button type="button" class="btn btn-light">إلغاء</button></a>

                    </div>

                </div>
            </div>

        </form>
    </div>
</div>

@endsection
@section('scripts')


@endsection