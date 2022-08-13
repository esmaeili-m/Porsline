 @section('title','پاسخ نامه')
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            پاسخ های کاربر
                        </h2>

                    </div>
                    <div class="body table-responsive">
                        <table class="table table-striped">
                            <thead>
                            @foreach($collection as $i)
                                @if(isset($i['title']))

                                    <th>{!! $i['title'] !!}</th>

                                @endif

                            @endforeach
                            <tr>
                                @foreach($collection as $b )
                                    @if(isset($i['title']))
                                    @endif
                                @endforeach
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                @foreach($answer as $d)
                                    <td>{{$d }}</td>
                                @endforeach
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>