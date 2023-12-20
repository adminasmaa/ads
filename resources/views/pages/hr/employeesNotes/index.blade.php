@extends('layouts.admin')
@section('title', 'الملاحظات')
@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-12">
                        <button class="me-3 btn btn-primary" title="إضافة ملاحظة" data-bs-toggle="modal"
                            data-bs-target="#notesModal" type="button" width="15" height='15'
                            style="border: none;">إضافة ملاحظة</button>
                        <!-- @if(auth()->user()->type_role !='branch' )
                                @role('employees.store')
                                <a href="{{route('employees.create',array('branch' => request()->get('branch')))}}" class="btn btn-square btn-primary"
                                   style="margin:10px;">
                                    إضافة
                                    موظف</a>
                                @endrole
                            @endif -->
                        <!-- @role('EmployeeNotes.index') -->
                        <!-- @endrole -->

                    </div>
                </div>
                <div class="modal fade modal-bookmark" id="notesModal" role="dialog" aria-labelledby="notesModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="notesModalLabel">ملاحظة
                                    جديدة </h5>
                                <button class="btn-close" type="button" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="form-bookmark needs-validation" action="{{route('EmployeeNotes.store')}}"
                                    method="post" id="bookmark-form" novalidate="" enctype="multipart/form-data">
                                    @csrf
                                    
                                    <div class="row">
                                        <input type="hidden" name="emp_id" value="{{request()->get('emp_id')}}">
                                        <input type="hidden" name="branch_id" value="{{request()->get('branch')}}">
                                        @if(!request()->has('emp_id'))
                                        
                                        <div class=" mb-3 col-sm-9">
                                            <select class="form-select digits" id="exampleFormControlSelect9"
                                                name="emp_id" value="{{old('emp_id')}}">
                                                <option value=''>اختر الموظف</option>
                                                @foreach(App\Models\hr\Employee::all() as $emp)
                                                          <option value='{{$emp->id}}' >{{$emp->user_name}}</option>
                                                         
                                                 @endforeach
                                                 <input type="hidden" name="branch_id" value="{{$emp->branch_id}}">
                                            </select>
                                            @error('emp_id')
                                            <div style='color:red'>{{$message}}</div>
                                            @enderror
                                        </div>
                                        @endif
                                        <div class="mb-3 mt-0 col-sm-9">
                                            <label for="task-title">
                                                ادخل الملاحظة <span class=" text-danger">*</span></label>
                                                <textarea name="text" id="" class="form-control" rows="5"></textarea>
                                            @error('text')
                                            <div style='color:red'>{{$message}}</div>
                                            @enderror
                                        </div>
                                       
                                        <div class="mb-3 mt-0 col-md-12">
                                            <label class="col-sm-12 ">رفع صورة </label>
                                            <div class="col-sm-9">
                                                <input type="file" name='note_img' class="form-control">
                                            </div>
                                        </div>
                                       
                                        <div class="col-sm-6">
                                            <input type="radio" name='note_type' value="1" id="note_type" >
                                            <span> ملاحظة ايجابية </span>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="radio" name='note_type' value="0" id="note_type" >
                                            <span> ملاحظة سلبية </span>
                                        </div>
                                    </div>

                                    <input id="index_var" type="hidden" value="6">
                                    <button class="btn btn-secondary" id="Bookmark" type="submit">حفظ </button>
                                    <button class="btn btn-primary" type="button" data-bs-dismiss="modal">إلغاء
                                    </button>
                                </form>
                            </div>


                        </div>
                    </div>
                </div>
            </div>


            <div class="card-body">
                <div class="dt-ext table-responsive">

                    <table class="table display data-table-responsive" id="export-button">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>الفرع</th>
                                <th>عدد الملاحظات</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($EmployeeNotes as $note)
                            <tr>
                                <td>{{$loop->index + 1}}</td>
                                <!-- <td>{{optional(optional($note->employee)->branch)->name}}</td> -->
                                <td>{{optional($note->branch)->name}}</td>
                                <!-- <td><button
                                                style="display: inline-block;border: none;background: none;color: #7366ff;"
                                                type="submit" data-toggle="tooltip" data-placement="top"
                                                onclick="location.href='{{route('EmployeeNotes.show',[null,$note->branch_id])}}'">{{$note->getCount()}}
                                            </button></td> -->
                                <!-- <td> <a href="{{route('EmployeeNotes.show',['emp_id' => null,'branch' => $note->branch_id])}}">{{$note->getCount()}}</a> -->
                                <td> <a href="{{route('EmployeeNotes.show',array('branch' => $note->branch_id))}}">{{$note->getCount()}}</a>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@section('scripts')

<script type="text/javascript">

$(window).on('load', function(){
                @if ($errors->has('method') && $errors->first('method')=='POST')
                    $('#notesModal').modal('show');
               @endif
        });

$('#notesModal').on('change', function(e) {
    console.log($('input[name="note_img"]').val());
    $('input[name="note_img"]').val();
});



$(window).on('load', function() {
    let var_id = '{{$errors->first('id')}}';
    @if($errors-> has('method') && $errors-> first('method') == 'PUT' && $errors-> has('id'))
    $('#editModal' + var_id).modal('show');
    @endif
});
</script>
@endsection
@endsection
