@extends('layouts.admin')
@section('title', 'الملاحظات')
@section('content')
@section('css')
<style>
.mystyle {
    background-color: red !important;
    color: white;
}
</style>
@endsection
@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="col-sm-12" id="myDIV">
                  @if(request()->has('emp_id'))    
                    <a href="{{$url}}"  onclick="myFunction()"
                        class="btn btn-square btn-outline-light btn-sm txt-dark active">الكل
                        ({{$EmployeeNote->count()}})</a>
                       
                    @else
                    <a href="{{url('/EmployeeNotes')}}"  onclick="myFunction()"
                                            class="btn btn-square btn-outline-light btn-sm txt-dark active">الكل
                        ({{$EmployeeNote->count()}})</a>
                     @endif   
                  <!--      <a onclick="addUrlParameter('type','1' )" role="tab" data-bs-toggle="tab"
                                class="btn btn-square btn-outline-light btn-sm txt-dark  tab-info active check-active" aria-selected="false">الكل
                                ({{$EmployeeNote->count()}})</a>
 <a onclick="addUrlParameter('type','1' )" role="tab" data-bs-toggle="tab"

                                class="btn btn-square btn-outline-light btn-sm txt-dark tab-info check-active" aria-selected="true">ايجابية 
                                ({{$EmployeeNote->where('note_type',1)->where('deleted_at',null)->count()}})</a>
                        <a onclick="addUrlParameter('type','0' )" role="tab" data-bs-toggle="tab"
                                class="btn btn-square btn-outline-light btn-sm txt-dark tab-info check-active" aria-selected="true">سلبية 
                                ({{$EmployeeNote->where('note_type',0)->where('deleted_at',null)->count()}})</a>
                        <a onclick="addUrlParameter('deleted_at','1' )" role="tab" data-bs-toggle="tab"
                                class="btn btn-square btn-outline-light btn-sm txt-dark tab-info check-active" aria-selected="true">محذوفة 
                                ({{$del_Notes->count()}})</a>        -->

                    <a href="?emp_id=3&branch=1&type=1" id="test" onclick="myFunction()"
                        class="btn btn-square btn-outline-light btn-sm txt-dark ">ايجابية
                        ({{$EmployeeNote->where('note_type',1)->where('deleted_at',null)->count()}})</a> 
                     <a href="?emp_id=3&branch=1&type=0" id="test" onclick="myFunction()"
                        class="btn btn-square btn-outline-light btn-sm txt-dark">سلبية
                        ({{$EmployeeNote->where('note_type',0)->where('deleted_at',null)->count()}})</a>
                    <a href="?emp_id=3&branch=1&onlytrash" id="test" onclick="myFunction()"
                        class="btn btn-square btn-outline-light btn-sm txt-dark">محذوفة
                        ({{$del_Notes->count()}})</a>

                  

                </div>
            </div>
            <div class="card-body">
               
                        <div class="dt-ext table-responsive">
                            <table class="table display data-table-responsive" id="export-button">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>اسم اليوزر</th>
                                        <th>اسم الموظف</th>
                                        <th>الملاحظة</th>
                                        @if(request()->has('withtrash') )
                                        <th>نوع الملاحظة</th>
                                        <th>حالة الملاحظة</th>
                                        @endif
                                        <th> الصورة</th>
                                        <th class="not-export-col">عمليات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($EmployeeNotes as $note)
                                    <tr>
                                        <td>{{$loop->index + 1}}</td>
                                        <td>{{($note->admin)->user_name}}</td>
                                        <td>{{($note->employee)->user_name}}</td>
                                        <td>{{$note->text}}</td>
                                        @if(request()->has('withtrash') )
                                        <td>{{$note->note_type?'ايجابية':'سلبية'}}</td>
                                        <td>{{$note->deleted_at?'غير مفعلة':'مفعلة'}}</td>
                                        @endif
                                        <td>
                                            <a target="_blank" href="{{asset('storage/'.$note->note_img)}}"><img
                                                    class="b-r-10" width="50px" height="50px"
                                                    src="{{asset('storage/'.$note->note_img)}}" alt=""></a>
                                        </td>
                                        <td>
                                            <a href="{{('/#editModal'.$note->id)}}" data-id="{{$note->id}}" id="edit_id"
                                                class="me-2" data-target="#editModal{{$note->id}}"
                                                data-bs-toggle="modal">
                                                <i data-feather="edit" width="15" height='15'></i>
                                            </a>
                                            @if(!request()->has('onlytrash'))
                                            <form action="{{ route('EmployeeNotes.destroy',$note->id) }}" method="POST"
                                                class="d-inline">
                                                @method('DELETE')
                                                @csrf
                                                <button
                                                    style="display: inline-block;border: none;background: none;color: #7366ff;"
                                                    type="submit" data-toggle="tooltip" data-placement="top"
                                                    title="{{ __('delete') }}"
                                                    onclick="return confirm('هل انت متاكد من حذف  هذا العنصر ؟');"
                                                    class="me-2"><i data-feather="trash-2" width="15" height='15'></i>
                                                </button>
                                            </form>
                                            @else
                                            <form action="{{ route('EmployeeNotes.restore',$note->id) }}" method="POST"
                                                class="d-inline">

                                                @csrf
                                                <button
                                                    style="display: inline-block;border: none;background: none;color: #7366ff;"
                                                    type="submit" data-toggle="tooltip" data-placement="top"
                                                    title="{{ __('استرجاع') }}" class="me-2"><i class="fa fa-refresh"
                                                        aria-hidden="true"></i>
                                                </button>
                                            </form>
                                            @endif
                                        </td>
                                        <div class="modal fade modal-bookmark" id="editModal{{$note->id}}" tabindex="-1"
                                            role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel">
                                                            تعديل الملاحظة
                                                        </h5>

                                                        <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="form-bookmark needs-validation"
                                                            action="{{route('EmployeeNotes.update',$note->id)}}"
                                                            method="post" id="bookmark-form" novalidate=""
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="row">
                                                                <div class="mb-3 mt-0 col-md-12">
                                                                    <label for="task-title">
                                                                        تعديل الملاحظة
                                                                    </label>
                                                                    <textarea name="text" id="" class="form-control"
                                                                        rows="5">{{old('text',$note->text)}}</textarea>
                                                                    @error('name')
                                                                    <div style='color:red'>{{$message}}</div>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-md-12 media-body mb-10">
                                                                    <label class="col-sm-12 ">تعديل صورة </label>
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <input type="file" name='note_img'
                                                                                class="form-control"
                                                                                value="{{asset('storage/'.$note->note_img)}}"
                                                                                placeholder="">
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <a target="_blank"
                                                                                href="{{asset('storage/'.$note->note_img)}}"><img
                                                                                    class="b-r-10" width="50px"
                                                                                    height="50px"
                                                                                    src="{{asset('storage/'.$note->note_img)}}"
                                                                                    alt=""></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- <div class="mb-3 mt-0 col-md-12"> -->
                                                                <input type="hidden" value="{{$note->id}}"
                                                                    name="note_id" />
                                                                <div class="row ">
                                                                    <div class="col-sm-6">
                                                                        <input type="radio" name='note_type'
                                                                            id="note_types" value="1"
                                                                            {{$note->note_type==1?'checked':''}}>
                                                                        <span> ملاحظة ايجابية </span>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <input type="radio" name='note_type'
                                                                            id="note_types" value="0"
                                                                            {{$note->note_type==0?'checked':''}}>
                                                                        <span> ملاحظة سلبية </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input id="index_var" type="hidden" value="6">
                                                            <button class="btn btn-secondary" id="Bookmark"
                                                                type="submit">تعديل
                                                            </button>
                                                            <button class="btn btn-primary" type="button"
                                                                data-bs-dismiss="modal">
                                                                إلغاء
                                                            </button>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        @endsection
        @section('scripts')
        <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->

        <script type="text/javascript">
        $('#notesModal').on('change', function(e) {
            console.log($('input[name="note_img"]').val());
            $('input[name="note_img"]').val();
        });


        $(window).on('load', function() {
            @if($errors -> has('method') && $errors -> first('method') == 'POST')
            $('#notesModal').modal('show');
            @endif
        });
        $(window).on('load', function() {
            let var_id = '{{$errors->first('
            id ')}}';
            @if($errors -> has('method') && $errors -> first('method') == 'PUT' && $errors -> has('id'))
            $('#editModal' + var_id).modal('show');
            @endif
        });
        </script>
        <script type="text/javascript">
            function addUrlParameter(name, value) {
            var searchParams = new URLSearchParams(window.location.search)
            searchParams.set(name, value)
            window.location.search = searchParams.toString()
        }
        var header = document.getElementById("test");
        var btns = header.getElementsByClassName("btn");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {
                var current = document.getElementsByClassName("active");
                current[0].className = current[0].className.replace(" active", "");
                this.className += " active";
            });
        }

        // $('.card-header a').on('click', function(){
        //   $('.card-header .active').removeClass('active');
        //   $(this).addClass('active');
        // });
        function myFunction() {
            //   document.body.style.backgroundColor = "lightblue";
            var element = document.getElementById("test");
            element.classList.add("mystyle");
        }
        </script>

        @endsection