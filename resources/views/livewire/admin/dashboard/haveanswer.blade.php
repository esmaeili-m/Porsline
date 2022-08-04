<section class="content">
    <div class="container-fluid">

        <!-- Basic Examples -->
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
                                                @foreach($collection as $i)
                                                    @if(isset($i['title']))
                                                    <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1" aria-sort="ascending"
                                                        aria-label="نام: activate to sort column descending"
                                                    >{{$i['title']}}
                                                    </th>
                                                    @endif
                                                @endforeach
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach( $answer as $i)
                                                <tr role="row" class="odd">
                                                    @foreach( $i as $b)
                                                        <td>{{$b}}</td>
                                                    @endforeach
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
            </div>
        </div>
        <!-- #END# Basic Examples -->
        <!-- #START# Table With State Save -->
        <!-- #END# Table With State Save -->
        <!-- #START# Add Rows -->

        <!-- #END# Add Rows -->
    </div>
</section>
