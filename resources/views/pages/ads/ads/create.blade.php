@extends('layouts.admin')
@section('title', ' اضافة حملة اعلانية ')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <form class="mega-vertical" action="{{ route('ads.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-sm-12 col-xxl-12 box-col-12 p-20">
                    <div class="card height-equal">
                        <div class="card-header">
                            <h5>إضافة حملة اعلانية جديدة </h5>
                        </div>
                        <div class="card-body">

                            <div class="row">

                                <div class="col-sm-6">

                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">
                                                الاسم <span class=" text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="name"
                                                    value="{{ old('name') }}">
                                                @error('name')
                                                    <div style='color:red'>{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-sm-6">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> تاريخ بداية الحملة <span
                                                    class=" text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="date" class=" form-control" id="start_date" value=""
                                                    name="start_date" title="">
                                                @error('start_date')
                                                    <div style='color:red'>{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> تاريخ نهاية الحملة <span
                                                    class=" text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="date" class=" form-control" id="end_date"
                                                    value="    "name="end_date" title="" onchange="get_diff()">
                                                @error('end_date')
                                                    <div style='color:red'>{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">

                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> قيمة الاعلان لليوم<span
                                                    class=" text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="add_value" id="add_value"
                                                    value="{{ old('add_value') }}" onkeyup="get_total()">
                                                @error('add_value')
                                                    <div style='color:red'>{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">

                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> عدد الأيام<span
                                                    class=" text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" id="count_days" name="count_days"
                                                    value="{{ old('count_days') }}">
                                                @error('count_days')
                                                    <div style='color:red'>{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">

                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> اجمالي القيمة<span
                                                    class=" text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" id="count_total"
                                                    name="count_total" value="{{ old('count_total') }}">
                                                @error('count_total')
                                                    <div style='color:red'>{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">

                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">  اسم الفرع <span
                                                    class=" text-danger">*</span></label>
                                            <div class="row">
                                                <div class="col-sm-9">
                                                    <select class="form-select digits" id="exampleFormControlSelect9"
                                                        name="type_id">
                                                        <option value=''>اختر  اسم الفرع</option>
                                                        <option value='all'>الكل</option>
                                                        <?php foreach ($subs as $one) { ?>
                                                        <option value='<?= $one->id ?>'><?= $one->name ?></option>
                                                        <?php  } ?>



                                                    </select>
                                                    @error('type_id')
                                                        <div style='color:red'>{{ $message }}</div>
                                                    @enderror

                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">ملاحظة</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" name="note">{{ old('note') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-sm-6">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">رفع صورة <span
                                                    class=" text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="file" name="img1" title=""
                                                    accept="image/*" value="{{ old('img1') }}">
                                                @error('img1')
                                                    <div style='color:red'>{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>


                        </div>

                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-footer text-center">
                                <button class="btn btn-primary m-r-15" type="submit">حفظ</button>
                                <a href="{{ route('ads.index') }}">
                                    <button type="button" class="btn btn-light">إلغاء</button>
                                </a>

                            </div>

                        </div>
                    </div>
                </div>


            </form>
        </div>
    </div>

@endsection
@section('scripts')

    <script>
        function get_diff()

        {
            var start = $('#start_date').val();
            var end = $('#end_date').val();

            var start = new Date(start);
            var end = new Date(end);

            var diffDate = (end - start) / (1000 * 60 * 60 * 24);
            var days = Math.round(diffDate) + 1;

            $("#count_days").val(days);


        }

        function get_total()

        {
            var amount = $('#add_value').val();
            var days = $('#count_days').val();

            var total = amount * days;

            $("#count_total").val(total);


        }
    </script>
@endsection
