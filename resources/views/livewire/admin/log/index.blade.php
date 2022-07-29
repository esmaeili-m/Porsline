@section('title','گزارشات سیستم')
<section class="content">
    <div class="container-fluid">
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="card">
                    <div class="header">
                        <div class="row">

                            <div class="col-4">
                                <a class="search-box">
                                    <form  action="" onclick="event.preventDefault();">
                                        <label style="margin-right: 20px">جستجو :</label>
                                        <input  wire:model.debounce.1000="search" type="text" class="search-box" placeholder="">
                                    </form>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table id="tableExport"
                                   class="display table table-hover table-checkable order-column m-t-20 width-per-100">
                                <thead>
                                <tr>
                                    <th>نام ادمین</th>
                                    <th>لینک</th>
                                    <th>وضعیت</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($reports as $report)
                                    <tr>
                                        <td>{{$report -> name}}</td>
                                        <td>{{$report -> url}}</td>
                                        <td>
                                           @if($report ->action == 'ایجاد')
                                                <button type="button" class="btn btn-success btn-block waves-effect" data-placement-from="bottom" data-placement-align="center" data-animate-enter="" data-animate-exit="" data-color-name="alert-success">
                                                    ایجاد کاربر جدید
                                                </button>
                                            @elseif($report ->action == 'حذف')
                                                <button type="button" class="btn btn-danger btn-block waves-effect" data-placement-from="bottom" data-placement-align="center" data-animate-enter="" data-animate-exit="" data-color-name="alert-danger">
                                                    حذف کاربر
                                                </button>
                                            @elseif($report ->action == 'ویرایش')
                                                <button type="button" class="btn btn-warning btn-block waves-effect" data-placement-from="bottom" data-placement-align="center" data-animate-enter="" data-animate-exit="" data-color-name="alert-warning">
                                                    ویرایش کاربر
                                                </button>
                                            @elseif($report ->action == 'بازیابی')
                                                <button type="button" class="btn btn-info btn-block waves-effect" data-placement-from="bottom" data-placement-align="center" data-animate-enter="" data-animate-exit="" data-color-name="alert-warning">
                                                    بازیابی کاربر
                                                </button>
                                            @elseif($report ->action == 'ایجادادمین')
                                                <button type="button" class="btn btn-secondary btn-block waves-effect" data-placement-from="bottom" data-placement-align="center" data-animate-enter="" data-animate-exit="" data-color-name="alert-warning">
                                                    ایجادادمین
                                                </button>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach

                            </table>
                            {{ $reports->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>
</section>