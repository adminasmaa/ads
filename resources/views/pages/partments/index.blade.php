
@extends('layouts.admin')
@section('title', '  الشقق')
@section('content')

<div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header">
                  @role('subscriptions.store')
                     <a href="{{route('partments.create')}}" class="btn btn-square btn-primary"> إضافة شقه</a>
                   @endrole
                </div>

                <div class="card-body">
                  <div class="dt-ext table-responsive">
                    <table class="table display data-table-responsive" id="export-button">
                      <thead>
                        <tr>
                        <th>#</th>
                          <th>الاسم</th>
                          <th>السعر</th>

                          <th class="not-export-col">عمليات</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($partments as $sub)
                        <tr>
                           <td>{{$loop->index + 1}}</td>
                            <td>{{$sub->name}}</td>
                            <td>{{$sub->price}}</td>



                            <td>


                            @role('subscriptions.update')
                              <a href="{{route('partments.edit',$sub->id)}}" data-id="{{$sub->id}}"  id="edit_id" class="me-2"  width="15" height='15'>
                                <i data-feather="edit"  width="15" height='15'></i>
                              </a>
                            @endrole
                            @role('subscriptions.destroy')
                            <form action="{{ route('partments.destroy', $sub->id) }}"
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
