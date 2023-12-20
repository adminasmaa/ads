@extends('layouts.admin')
@section('title', 'ملف الموظف')
@section('content')


<div class="row">
    <div class="col-6">
        <h3>
            ملف الموظف</h3>
    </div>

</div>
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-3 box-col-6 pe-0">
            <div class="file-sidebar">
                <div class="card">
                    <div class="card-body">
                        <ul>

                            <li>
                                <a class="btn btn-light" href="?type=all"><i data-feather="folder"></i>الكل</a>
                            </li>
                            @foreach($types as $type)
                            <li>
                                <a class="btn btn-light" href="?type={{$type->name}}"><i
                                        data-feather="clock"></i>{{$type->type}}</a>
                            </li>
                            @endforeach

                            <li>
                                <a class="btn btn-light" href="?onlytrash"><i data-feather="trash-2"
                                        title="حذف"></i>المحذوفات </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-md-12 box-col-12">
            <div class="file-content">
                <div class="card">
                    <div class="modal fade modal-bookmark" id="fileModel" tabindex="-1" role="dialog"
                        aria-labelledby="fileModelLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="fileModelLabel"> ملف
                                        جديد </h5>
                                    <button class="btn-close" type="button" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="form-bookmark needs-validation" action="{{route('filemanager.store')}}"
                                        method="post" enctype="multipart/form-data" id="bookmark-form" novalidate="">
                                        @csrf
                                        <div class="row">
                                            <input class="form-control" name="employee_id" id="employee_id"
                                                value="{{ request()->route('id') }}" type="hidden" autocomplete="off">
                                            <input class="form-control" name="type" id="type"
                                                value="{{request()->has('type')?request()->get('type'):'' }}"
                                                type="hidden" autocomplete="off">

                                            <div class="mb-3 mt-0 col-md-12">
                                                <label for="task-title">الصورة
                                                </label>
                                                <input class="form-control" name="path" id="name" type="file"
                                                    autocomplete="off">
                                                @error('path')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <input id="index_var" type="hidden" value="6">
                                        <button class="btn btn-secondary" id="Bookmark" type="submit">حفظ
                                        </button>
                                        <button class="btn btn-primary" type="button" data-bs-dismiss="modal">إلغاء
                                        </button>
                                    </form>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="card-header">
                        <div class="media">

                            @if(request()->has('type')&&request()->get('type')!='all')
                            <h5 class="mt-3">
                                {{Illuminate\Support\Facades\DB::table('hr_file_type')->where('name',request()->get('type'))->first()->type}}
                            </h5>
                            @endif
                            <div class="media-body text-end">
                                @if(request()->has('type')&&request()->get('type')!='all')
                                <button data-bs-toggle="modal" data-bs-target="#fileModel" class="btn btn-primary"
                                    onclick="getFile()"> <i data-feather="plus-square"></i>اضافه جديدة</button>
                                @endif
                                <div style="height: 0px;width: 0px; overflow:hidden;">
                                    <input id="upfile" type="file" onchange="sub(this)">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body file-manager">
                        <h6 class="mt-4">الملفات</h6>
                        <ul class="files">
                            @foreach($filemanagers as $file)
                            <li class="file-box">
                                <div class="file-top"><a href="{{asset('storage/'.$file->path)}}" target="_blank" class="col-sm-3"><img
                                            style="width:70px;height:70px;" src="{{url('storage/'.$file->path)}}" />
                                    </a></div>
                                <div class="file-bottom">
                                    <h6>{{$file->name}}</h6>
                                    <p>{{$file->created_at}}</p>
                                    <p>
                                    <form action="{{ route('filemanager.destroy', $file->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        <button
                                            style="display: inline-block;border: none;background: none;color: #7366ff;"
                                            type="submit" data-toggle="tooltip" data-placement="top" title="حذف"
                                            onclick="return confirm('هل انت متاكد من هذا العنصر ؟');"
                                            class="me-2"><i data-feather="trash-2" width="15" height='15'></i>
                                        </button>
                                    </form>
                                    </p>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script type="text/javascript">

</script>

@endsection