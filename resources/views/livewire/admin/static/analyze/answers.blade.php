<section class="content">
    <div class="container-fluid">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="header">
            <h2>  </h2>
{{--                <strong>پاسخ های فرم {{$name}}</h2>--}}
        </div>
        <div class="body table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>آیدی</th>
                    @foreach($collection as $i)

                     <th>

                         {{$i['title']}}

                     </th>
                        @endforeach
                   
                       <th>ناریخ و زمان شروع</th>
                       <th>لینک فرم</th>
                       <th>تاریخ و زمان پایان</th>
                       <th>ip</th>
                       <th>نوع دستگاه و مرورگر</th>
                       <th>لوکیشن</th>
                </tr>
                </thead>
                <tbody>
                @foreach($answer as $i)
                    <tr>
                        <th scope="row">1</th>
                        @foreach($i['answer'] as $b)
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
</section>
