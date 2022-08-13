<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            تمام گزارش های اخرین پرسشنامه</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable"
                                               id="DataTables_Table_0" role="grid"
                                               aria-describedby="DataTables_Table_0_info">
                                            <thead>
                                            <tr role="row">
                                                @if($collection !== null)
                                                    @foreach($collection as $i)

                                                        @if(isset($i['title']) && $i['ask'] == 'null') )

                                                        <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0"
                                                            rowspan="1" colspan="1" aria-sort="ascending"
                                                            aria-label="نام: activate to sort column descending"
                                                        >{!! $i['title'] !!}
                                                        </th>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="نام: activate to sort column descending"
                                                >شروع پرسشنامه
                                                </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="نام: activate to sort column descending"
                                                >پایان پرسش نامه
                                                </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="نام: activate to sort column descending"
                                                >ای پی
                                                </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="نام: activate to sort column descending"
                                                >نوع مرورگر و دستگاه
                                                </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="نام: activate to sort column descending"
                                                >شهرو کشور
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach( $answer as $i)
                                                <tr role="row" class="odd">

                                                    @foreach( $i['answer'] as $b)

                                                        @if (!is_array($b))
                                                            <td> {{ $b }} </td>
                                                        @endif
                                                        @if(is_array($b))
                                                            <td> {{ $b['countryName']}}
                                                                {{$b['cityName']}}
                                                            </td>
                                                        @endif
                                                    @endforeach
                                                </tr>
                                            @endforeach

                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                                {{$answer->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="chart">

        </div>

        <!-- #END# Basic Examples -->
        <!-- #START# Table With State Save -->
        <!-- #END# Table With State Save -->
        <!-- #START# Add Rows -->

        <!-- #END# Add Rows -->
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

