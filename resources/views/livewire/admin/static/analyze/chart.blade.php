<div>
    @section('title','نمودار ها')
    <section class="content">
        <div class="container-fluid">
            <div class="card">

                <div class="col-lg-12">
                    <div class="row">

                        <div class="col-lg-12" style="height: 32rem;">
                            <livewire:livewire-column-chart style="height: 32rem;"
                                                            :column-chart-model="$columnChartModel"
                            />

                        </div>


                        <div class="col-lg-12" style="height: 32rem;">
                            <livewire:livewire-tree-map-chart
                                    key="{{ $treeChartModel->reactiveKey() }}"
                                    :tree-map-chart-model="$treeChartModel"
                            />
                        </div>


                        <div class="col-lg-12" style="height: 32rem;">
                            <livewire:livewire-pie-chart
                                    key="{{ $pieChartModel->reactiveKey() }}"
                                    :pie-chart-model="$pieChartModel"
                            />
                        </div>


                            <div class="col-lg-12" style="height: 32rem;">
                            <livewire:livewire-line-chart
                                    key="{{ $lineChartModel->reactiveKey() }}"
                                    :line-chart-model="$lineChartModel"
                            />
                        </div>
                              
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
