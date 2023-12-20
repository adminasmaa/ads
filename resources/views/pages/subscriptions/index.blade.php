
@extends('layouts.admin')
@section('title', '  الفنادق')
@section('content')

<div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header">
                  @role('subscriptions.store')
                     <a href="{{route('subscriptions.create')}}" class="btn btn-square btn-primary"> إضافة فندق</a>
                   @endrole
                </div>

                <div class="card-body">
                  <div class="dt-ext table-responsive">
                    <table class="table display data-table-responsive" id="export-button">
                      <thead>
                        <tr>
                        <th>#</th>
                          <th>الاسم</th>
                          <th> الصورة </th>
                          <th>  المنطقة </th>
                           <th>  رقم المراسلة </th>
                            <th> رقم الاتصال </th>
                            <th>عرض الخدمات</th>
                            <th>عرض الشقق</th>
                            <th>عرض جاليري الصور</th>
                          <th class="not-export-col">عمليات</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($Subscriptions as $sub)
                        <tr>
                           <td>{{$loop->index + 1}}</td>
                            <td>{{$sub->name}}</td>
                            <td>
                              @if($sub->img)
                              <a href="{{asset('storage/'.$sub->img)}}" class="col-sm-3"><img style="width:70px;height:70px;"
                                                         src="{{asset('storage/'.$sub->img)}}"/>
                               </a>
                               @endif
                            </td>
                            <td>{{$sub->area}}</td>
                            <td>{{$sub->msg_phone}}</td>
                            <td>{{$sub->call_phone}}</td>
                            <td>
                            <a href="{{route('services.index','unit_id='.$sub->id)}}" > خدمات </a>
                          </td>

                            <td>
                            <a href="{{route('partments.index','unit_id='.$sub->id)}}" > الشقق </a>
                          </td>
                          <td>
                          <a href="{{route('galleries.index','unit_id='.$sub->id)}}" >
                            جاليري
                          </a>
                        </td>

                            <td>


                            @role('subscriptions.update')
                              <a href="{{route('subscriptions.edit',$sub->id)}}" data-id="{{$sub->id}}"  id="edit_id" class="me-2"  width="15" height='15'>
                                <i data-feather="edit"  width="15" height='15'></i>
                              </a>
                            @endrole
                            @role('subscriptions.destroy')
                            <form action="{{ route('subscriptions.destroy', $sub->id) }}"
                                method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button style="display: inline-block;border: none;background: none;color: #7366ff;"
                                type="submit" data-toggle="tooltip" data-placement="top" title="{{ __('delete') }}"
                                    onclick="return confirm('هل انت متاكد من حذف هذا العنصر');"
                                    class="me-2"><i data-feather="trash-2"  width="15" height='15'></i>
                                </button>
                            </form>
                            @endrole
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
        </div>

@endsection
