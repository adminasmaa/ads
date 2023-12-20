@extends('layouts.admin')
@section('title', ' اضافه سلفه ومكافأة')

@section('content')
<div class="container-fluid" style="background: #f4f4f4;">
    <div class="row">
        <form class="mega-vertical" action="{{route('awardDiscounts.store')}}" method="post"
            enctype="multipart/form-data">
            @csrf
            <div class="col-sm-12 p-20">
                <div class="card height-equal">
                    <div class="card-header">
                        <h5> سلفه او مكافأة جديدة</h5>
                    </div>
                    <div class="card-body">

                        <div class="row">
                         
                            <div class="d-flex mb-3">
                                <input type="radio" value="discount" name="type"
                                    {{ old('type') == 'discount' ? 'checked' : ''}} />
                                سلفه
                            </div>
                            <div class="d-flex mb-3">
                                <input type="radio" value="award" name="type" {{old('type')=="award"?"checked":""}} />
                                مكافأة
                            </div>
                            @error('type')
                                <div style='color:red'>{{$message}}</div>
                            @enderror
                            <div class="col-sm-12">
                                <div class="media-body">
                                    <div class="mb-3 row">
                                        <label class="col-sm-12 col-form-label">الموظف<span
                                                    class=" text-danger">*</span></label>

                                        <div class="col-sm-9">
                                           
                                            <select class="form-select digits choosetype" id="exampleFormControlSelect9"
                                                name="employee_id">
                                                <option value=''>اختر الموظف</option>
                                                @foreach($employees as $employee)
                                                <option value='{{$employee->id}}'
                                                    {{old('employee_id',request()->has('employee')?request()->get('employee'):'')==$employee->id?'selected':''}}>
                                                    {{$employee->user_name}}</option>
                                                @endforeach


                                            </select>
                                            @error('employee_id')
                                            <div style='color:red'>{{$message}}</div>
                                            @enderror
                                        </div>
                                        <div style="padding-right:0px" class="col-sm-3"><a
                                                href="{{route('employees.create')}}"><i
                                                    class="fa fa-plus-square"></i></a></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="media-body">
                                    <div class="mb-3 row">
                                        <label class="col-sm-12 col-form-label"> المبلغ <span
                                                    class=" text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="number" name='value' value="{{old('value')}}"
                                                class="form-control value" placeholder="">
                                            @error('value')
                                            <div style='color:red'>{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 discount type" style="display:none">
                                <div class="col-sm-12">

                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">مبلغ الخصم<span
                                                    class=" text-danger discount">*</span></label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="number" name="discount_value"
                                                    value="{{old('discount_value')}}">
                                                @error('discount_value')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">

                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">عدد الشهور<span
                                                    class=" text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="number" name="num_month"  step="1" readonly='readonly'
                                                    value="0">
                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">

                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">تاريخ الاستحقاق<span
                                                    class=" text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="date" min="{{date('Y-m-d')}}" name="due_date"
                                                    value="{{old('due_date')}}">
                                                @error('due_date')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">

                                <div class="media-body">
                                    <div class="mb-3 row">
                                        <label class="col-sm-12 col-form-label">تاريخ الصرف<span
                                                class=" text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="date" min="{{date('Y-m-d')}}" name="exchange_date"
                                                value="{{old('exchange_date')}}">
                                            @error('exchange_date')
                                            <div style='color:red'>{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 mt-0 col-md-9">
                                    <label for="task-title">السبب </label>
                                    <textarea class="form-control" id="desc" name="reason" autocomplete="off"></textarea>
                                    @error('reason')
                                    <div style='color:red'>{{$message}}
                                    </div>
                                    @enderror
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
                        <a href="{{route('awardDiscounts.index')}}"> <button type="button"
                                class="btn btn-light">إلغاء</button></a>

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>

<script>
$(document).ready(function() {
    var radioval = $("input[type=radio][name='type']:checked").val();
    if (radioval == 'discount' || radioval == 'award') {
        $('.' + radioval).show();
    }
    $('input[type=radio][name=type]').change(function() {
        $('.type').hide();
        $('.' + $(this).val()).show();
    });
    $('input[name=discount_value]').keyup(function() {
        if($(this).val()>$('input[name=value]').val()){
            alert('يجب ادخال مبلغ الخصم بقيمه اقل من المبلغ');
            $(this).val(0);
            $('input[name=num_month]').val(0);
        }else{
            $('input[name=num_month]').val(parseInt($('input[name=value]').val()/$(this).val()));
        }
            
    });
    $('input[name=value]').keyup(function() {
        $('input[name=num_month]').val(parseInt($(this).val()/$('input[name=discount_value]').val()));
       $("input[name=discount_value]").prop('max',$(this).val());
        
    });
    $('input[name=num_month]').val(parseInt($('input[name=value]').val()/$('input[name=discount_value]').val()));


    $('input[name=exchange_date]').change(function () {
        var sta = moment($(this).val(), "YYYY-MM-DD");
           $('input[name=due_date]').prop('min',sta.add(1, 'days').format('YYYY-MM-DD'));
           console.log(new Date($('input[name=exchange_date]').val()).setHours(0,0,0,0));
           if ($('input[name=due_date]').val()!=''&&new Date($('input[name=due_date]').val()).setHours(0,0,0,0)<= new Date($('input[name=exchange_date]').val()).setHours(0,0,0,0)) { 
            alert("يجب ان يكون تاريخ الاستحقاق بعد تاريخ الخصم");
           }
    });
    $('input[name=due_date]').change(function () {
        if ($('input[name=exchange_date]').val()!=''&&new Date($('input[name=due_date]').val()).setHours(0,0,0,0)<= new Date($('input[name=exchange_date]').val()).setHours(0,0,0,0)) { 
            alert("يجب ان يكون تاريخ الاستحقاق بعد تاريخ الخصم");
           }
    });
    
   
});



</script>
@endsection