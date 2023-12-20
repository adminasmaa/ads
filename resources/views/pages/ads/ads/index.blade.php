@extends('layouts.admin')
@section('title', 'الحملات الاعلانية')
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
                                            @role('ads.store')
                                            <a href="{{ route('ads.create', ['name' => request()->get('name')]) }}"
                                               class="btn btn-square btn-primary">
                                                إضافة حملة إعلانية</a>
                                            @endrole


                                        </div>

                                        <div class="card-header">
                                            <div class="col-sm-12">


                                            </div>
                                        </div>

                                        <div class="card-body">

                                            <div class="dt-ext table-responsive">
                                                <table class=" table display  data-table-responsive" id="">

                                                    <thead>
                                                    <tr>
                                                        <th>#</th>

                                                        <th>اسم الحملة</th>
                                                        <th style="    width: 100px;">صورة الحملة </th>

                                                        <th>الفرع</th>

                                                        <th>اللينك </th>

                                                        <th>احصائيات الاعلان </th>
                                                        <th>عمليات</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>



                                                    @foreach ($ads as $ad)
                                                        <tr>
                                                            <td>{{ $loop->index + 1 }}</td>
                                                            <td>
                                                                {{ $ad['name']  ?? '' }}


                                                            </td>



                                                            <td> <img src="<?= url('storage/' . $ad->img1) ?>"
                                                                      style="    width: 100px;" /></td>

                                                            <td>
                                                                    <?php
                                                                    if ($ad->sub_id == 'all') {
                                                                        echo 'كل الفروع';
                                                                    } else {
                                                                        $sub = App\Models\Subscriptions::where('id', $ad->sub_id)->first();
                                                                        echo $sub->name ?? '';
                                                                    }

                                                                    ?>
                                                            </td>

                                                            <td><a
                                                                    href="<?= url('/front/details/' . $ad->sub_id . '/' . $ad->id) ?>">الدخول
                                                                    إلي الرابط</a>



                                                            </td>

                                                            <td>
                                                                    <?php  if ($ad->sub_id=='all'){?>
                                                                <a href="<?= url('/ads/stat_all/' . $ad->id) ?>"
                                                                   target="_blank">
                                                                    مشاهدة
                                                                    احصائيات الحملة</a>
                                                                <?php } else { ?>
                                                                <a href="<?= url('/ads/stat/' . $ad->id) ?>"
                                                                   target="_blank">
                                                                    مشاهدة
                                                                    احصائيات الحملة</a>
                                                                <?php } ?>
                                                            </td>
                                                            <td>


                                                                @role('ads.update')
                                                                <a href="{{ route('ads.edit', $ad->id) }}"
                                                                   data-id="{{ $ad->id }}" id="edit_id"
                                                                   class="me-2" width="15" height='15'>
                                                                    <i data-feather="edit" width="15"
                                                                       height='15'></i>
                                                                </a>
                                                                @endrole
                                                                @role('ads.destroy')
                                                                <form action="{{ route('ads.destroy', $ad->id) }}"
                                                                      method="POST" class="d-inline">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button
                                                                        style="display: inline-block;border: none;background: none;color: #7366ff;"
                                                                        type="submit" data-toggle="tooltip"
                                                                        data-placement="top" title="{{ __('delete') }}"
                                                                        onclick="return confirm('هل انت متاكد من حذف هذا العنصر');"
                                                                        class="me-2"><i data-feather="trash-2"
                                                                                        width="15" height='15'></i>
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
    </script>

@endsection
