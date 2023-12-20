
@extends('layouts.admin')
@section('title', 'إحصائيات الموظفين')
@section('content')

<div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header">





                @role('statistics.security')

                  <a href="{{route('statistics.security',array('branch' => request()->get('branch')))}}" class="btn btn-square btn-primary"> ايصال امانه     
                  </a>

                  @endrole
                  @role('statistics.egypt_license')

                  <a href="{{route('statistics.egypt_license',array('branch' => request()->get('branch')))}}" class="btn btn-square btn-primary">  ليسن مصرى 
                  </a>
                  @endrole
                  @role('statistics.kuwait_license')

                  <a href="{{route('statistics.kuwait_license',array('branch' => request()->get('branch')))}}" class="btn btn-square btn-primary"> ليسن كويتى
                  </a>
                  @endrole
                  @role('statistics.uniform')
                  <a href="{{route('statistics.uniform',array('branch' => request()->get('branch')))}}" class="btn btn-square btn-primary">  يونيفورم
                  </a>
                  @endrole
                  @role('statistics.living')
                  <a href="{{route('statistics.living',array('branch' => request()->get('branch')))}}" class="btn btn-square btn-primary">  السكن
                  </a>
                  @endrole
                  @role('statistics.bank')
                  <a href="{{route('statistics.bank',array('branch' => request()->get('branch')))}}" class="btn btn-square btn-primary">  حساب بنكى
                  </a>
                  @endrole
                  
                </div>
            </div>
            </div>

          </div>
        </div>





@endsection

