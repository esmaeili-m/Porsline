@section('title','نمودار ها')
<section class="content">
    <div class="container-fluid">
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            سوالاتی که دارای نمودار هستند ( برای دیدن نتایج روی سوال کیلیک کنید)
                        </h2>
                    </div>
                    <div class="body">

                    @foreach($FormDay as $i)
                                @if(isset($i['type']) && $i['type'] == 'multiple-choice' )
                                <button wire:click=quiz("{{$i['key']}}") type="button" class="btn btn-outline-info ml-2 btn-border-radius">{{ strip_tags($i['title']) }}</button>
                                @endif
                     @endforeach
                        
                    </div>
                </div>
                @if($this->status !== 0)
                <div class="card">
                    <div class="header">
                        <h2>
                            نمودار خود را انتخاب کنید
                        </h2>
                    </div>
                    <div class="body">
                        <button wire:click=chart("1") type="button" class="btn btn-outline-warning ml-2 btn-border-radius">نمودار دایره ای</button>
                        <button wire:click=chart("2") type="button" class="btn btn-outline-success ml-2 btn-border-radius">نمودار خطی</button>
                        <button wire:click=chart("3") type="button" class="btn btn-outline-danger ml-2 btn-border-radius">نمودار مستطیلی</button>
                    </div>
                </div>
                @endif
                @if($this->chart !== 0)
                          @if($this->chart == 1)
                            <div class="card">
                                <div class="header">
                                    <h2>
                                            1
                                    </h2>
                                </div>
                                <div class="body">

                                    <div id="chart">

                                    </div>

                                </div>
                            </div>

                    @elseif($this->chart == 2)
                    <div class="card">
                        <div class="header">
                            <h2>
                                نمودار های گزارش کار
                            </h2>
                        </div>
                        <div class="body">
                                <div id="chart2">

                                 </div>

                        </div>
                    </div>

                    @else
                        <div class="card">
                    <div class="header">
                        <h2>
                            نمودار های گزارش کار
                        </h2>
                    </div>
                    <div class="body">

                        <div id="chart3">

                        </div>

                    </div>
                </div>
                              @endif
                 @endif
            </div>
        </div>


        <div class="card">
            <div class="header">
                <h2>
                    نمودار های گزارش کار
                </h2>
            </div>
            <div class="body">
                <div id="chart2">

                </div>

            </div>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    var options = {
        chart: {
            type: 'line',
            height:'200px',
        },
        series: [{
            name: 'sales',
            data: [30,40,35,50,49,60,70,91,125]
        }],
        xaxis: {
            categories: @json($category)
        }
    }

    var chart = new ApexCharts(document.querySelector("#chart2"), options);

    chart.render();
</script>
