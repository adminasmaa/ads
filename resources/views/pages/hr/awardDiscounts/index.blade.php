@extends('layouts.admin')
@section('title', 'سلف و مكافأت')
@section('css')
<style>
.dropdowns {
    position: relative;
    display: inline-block;
}

.myDropdown2{

    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    padding: 12px 16px;
    z-index: 1;
    display: flex;
}
.myDropdown2 form{
display: flex;
}
</style>
@endsection
@section('content')



<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12" id="class-content">
            <div class="email-right-aside bookmark-tabcontent">
                <div class="card email-body radius-left">
                    <div class="ps-0">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="banks" role="tabpanel"
                                aria-labelledby="banks-tab">
                                <div class="card mb-0">
                                    <div class="card-header">
                                        @role('awardDiscounts.store')
                                        <a href="{{route('awardDiscounts.create',array('employee'=>request()->get('employee')))}}" class="btn btn-square btn-primary">
                                            إضافة سلفه او مكافأة</a>
                                        @endrole


                                    </div>
                                    <div class="card-header">
                                        <a onclick="addUrlParameter('type','award')"
                                            class="btn btn-square btn-outline-light btn-sm txt-dark">
                                            المكافأت({{App\Models\hr\AwardDiscount::getEmployee()->where('type','award')->count()}})
                                        </a>
                                        <a onclick="addUrlParameter('type','discount')"
                                            class="btn btn-square btn-outline-light btn-sm txt-dark">
                                            السلف({{App\Models\hr\AwardDiscount::getEmployee()->where('type','discount')->count()}})
                                        </a>
                                    </div>

                                    <div class="card-body">
                                        <div class="dt-ext table-responsive">

                                            <table class=" table display  data-table-responsive" id="">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>اسم الموظف</th>
                                                        @if(!request()->has('type'))
                                                        <th>النوع</th>
                                                        @endif
                                                        <th>المبلغ</th>
                                                        <th>تاريخ الصرف</th>
                                                        @if(!request()->has('type') || request()->get('type')=='discount')
                                                        <th>تاريخ الاستحقاق</th>
                                                        @endif
                                                        <th>الحاله</th>
                                                        <th class="not-export-col">الاعدادات</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach($awardDiscounts as $awardDiscount)
                                                    <tr>
                                                        <td>{{$loop->index + 1}}

                                                        </td>
                                                        <td>{{$awardDiscount->employee->user_name}}</td>
                                                        @if(!request()->has('type'))
                                                        <td>{{$awardDiscount->type=='award'?'مكافأة':'سلفه'}}</td>
                                                        @endif
                                                        <td>{{$awardDiscount->value}}</td>
                                                        <td>{{$awardDiscount->exchange_date}}</td>
                                                        @if(!request()->has('type') || request()->get('type')=='discount')
                                                        <td>{{$awardDiscount->type=='discount'?$awardDiscount->due_date:'-'}}
                                                        </td>
                                                        @endif
                                                        <td>
                                                       
                                                            @if($awardDiscount->status=='waiting')
                                                                <div class="dropdowns">
                                                                    <button class="btn btn-primary dropdown"
                                                                        style="display:block" type="button">الحاله</button>
                                                                    <div class="myDropdown2" style="display:none">
                                                                        <form
                                                                            action="{{route('awardDiscounts.changeStatus',$awardDiscount->id)}}"
                                                                            method="POST">
                                                                            @csrf

                                                                            <button class="btn btn-primary m-1 dropdown-item"
                                                                                type="submit" name="action"
                                                                                value="accepted">قبول</button>

                                                                            <button class="btn btn-danger m-1 dropdown-item"
                                                                                type="submit" name="action"
                                                                                value="rejected">رفض</button>
                                                                        </form>
                                                                    </div>

                                                                </div>
                                                            @elseif($awardDiscount->status=='accepted')
                                                            تم القبول
                                                            @else
                                                            تم الرفض
                                                            @endif
                                                        </td>


                                                        <td class="not-export-col">
                                                            @role('awardDiscounts.show')
                                                            <a href="{{route('awardDiscounts.show',$awardDiscount->id,array('branch' => request()->get('branch')))}}"
                                                                data-id="{{$awardDiscount->id}}" id="edit_id"
                                                                class="me-2" width="15" height='15'>
                                                                <i data-feather="eye" width="15" height='15'></i>
                                                            </a>
                                                            @endrole
                                                            @role('awardDiscounts.update')
                                                            <a href="{{route('awardDiscounts.edit',$awardDiscount->id)}}"
                                                                data-id="{{$awardDiscount->id}}" id="edit_id"
                                                                class="me-2">
                                                                <i data-feather="edit" width="15" height='15'></i>
                                                            </a>
                                                            @endrole


                                                            @role('awardDiscounts.destroy')
                                                            <form
                                                                action="{{ route('awardDiscounts.destroy', $awardDiscount->id) }}"
                                                                method="POST" class="d-inline">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button
                                                                    style="display: inline-block;border: none;background: none;color: #e90f0f;"
                                                                    type="submit" data-toggle="tooltip"
                                                                    data-placement="top" title="{{ __('delete') }}"
                                                                    onclick="return confirm('هل انت متاكد من حذف هذا العنصر');"
                                                                    class="me-2"><i data-feather="trash-2" width="15"
                                                                        height='15'></i>
                                                                </button>
                                                            </form>
                                                            @endrole
                                                        </td>
                                                    </tr>
                                                    @endforeach


                                                </tbody>
                                                <tfoot>

                                                </tfoot>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@section('scripts')
<script>
function addUrlParameter(name, value) {
    var searchParams = new URLSearchParams(window.location.search)
    searchParams.set(name, value)
    window.location.search = searchParams.toString()
}
$(document).ready(function() {
    $('.dropdown').on('click', function() {
        $('.myDropdown2').not($(this).siblings('.myDropdown2')).hide();
        $(this).siblings('.myDropdown2').toggle('show');
    })




});
</script>
@endsection