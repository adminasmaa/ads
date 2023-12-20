
@extends('layouts.admin')
@section('title', '  جاليري متعدد')
@section('content')

<div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header"> 
                               
                     <a href="{{route('galleries.create','unit_id='.$unit_id)}}" class="btn btn-square btn-primary"> إضافة صورة</a>
                
                </div>
                
                <div class="card-body">
                  <div class="dt-ext table-responsive">
                    <table class="table display data-table-responsive" id="export-button">
                      <thead>
                        <tr>
                        <th>#</th>
                          <th> الصورة </th> 
                         
                          <th class="not-export-col">عمليات</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($galleries as $sub)
                        <tr>
                           <td>{{$loop->index + 1}}</td>                          
                            <td>
                              @if($sub->img)
                              <a href="{{asset('storage/'.$sub->img)}}" class="col-sm-3"><img style="width:70px;height:70px;"
                                                         src="{{asset('storage/'.$sub->img)}}"/>
                               </a>
                               @endif
                            </td>
                           
                            <td>  


                              <a href="{{route('galleries.edit',[$sub->id,'unit_id='.$unit_id])}}" data-id="{{$sub->id}}"  id="edit_id" class="me-2"  width="15" height='15'>
                                <i data-feather="edit"  width="15" height='15'></i>
                              </a>
                   
                            <form action="{{ route('galleries.destroy', [$sub->id,'unit_id='.$sub->unit_id]) }}"
                                method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button style="display: inline-block;border: none;background: none;color: #7366ff;"
                                type="submit" data-toggle="tooltip" data-placement="top" title="{{ __('delete') }}"
                                    onclick="return confirm('هل انت متاكد من حذف هذا العنصر');"
                                    class="me-2"><i data-feather="trash-2"  width="15" height='15'></i>
                                </button>
                            </form>
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
