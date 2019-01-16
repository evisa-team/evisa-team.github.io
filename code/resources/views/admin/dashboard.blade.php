@extends('layouts.app')

@section('css')
    <style>
        .padding_005 {
            margin: 0;
            margin-top: 15px;
        }
        .info-box-icon {
            margin-right: 10px;
        }
        .info-box-content {
            display: inline;
        }
    </style>
@append

@section('content')
<section class="content-header">
    <h1 class="pull-left">Dashboard</h1>
</section>
<div class="clearfix"></div>
<div class="content">
    <div class="inner">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary bg-gray-light">
                    <div class="panel-heading">
                        <div class="panel-title-box">
                           <i class="fa fa-bar-chart"></i> Applications Statistics
                        </div>
                    </div>
                    <div class="row padding_005">
                        <div class="col-lg-4"><a>
                            <div class="info-box bg-yellow">
                                <span class="info-box-icon"><i class="fa fa-file-o"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">New </span>
                                    <span class="info-box-number">{{ $newApplications }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div></a>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-lg-4"><a>
                            <div class="info-box bg-green">
                                <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Approved</span>
                                    <span class="info-box-number">{{ $approvedApplications }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div></a>
                            <!-- /.info-box -->
                        </div>

                        <div class="col-lg-4"><a>
                            <div class="info-box bg-red">
                                <span class="info-box-icon"><i class="fa fa-times"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Rejected</span>
                                    <span class="info-box-number">{{ $rejectedApplications }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div></a>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-lg-4"><a>
                            <div class="info-box bg-aqua">
                                <span class="info-box-icon"><i class="fa fa-check-square"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Completed</span>
                                    <span class="info-box-number">{{ $completedApplications }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div></a>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-lg-4"><a>
                            <div class="info-box bg-blue">
                                <span class="info-box-icon"><i class="fa fa-check"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Delivered</span>
                                    <span class="info-box-number">{{ $deliveredApplications }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div></a>
                            <!-- /.info-box -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="clearfix"></div>
    <div class="box box-primary">
        <h3 class="col-md-12">Registered applications statistics</h3>
        <div class="col-md-12 barchart" data-url="{{ route('admin.dashboard.chart1') }}" data-title="" data-vAxis-title="Applications" data-hAxis-title="Month"></div>
        <div class="clearfix"></div>
    </div>
</div>
@endsection

@section('scripts')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {packages:['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            $( ".barchart" ).each(function() {
                var jsonData = $.ajax({
                    url: $(this).attr('data-url'),
                    dataType: "json",
                    async: false
                }).responseText;
                jsonDataEncoded = JSON.parse(jsonData);
                jsonDataEncoded[0][2] = { role: "style" };
                var data = google.visualization.arrayToDataTable(jsonDataEncoded);

                var view = new google.visualization.DataView(data);
                view.setColumns([0, 1,
                    {
                        calc: "stringify",
                        sourceColumn: 1,
                        type: "string",
                        role: "annotation"
                    },
                2]);

                var options = {
                    title: $(this).attr('data-title'),
                    height: 400,
                    legend: { position: "none" },
                    vAxis: {title: $(this).attr('data-vAxis-title'),  titleTextStyle: {color: 'blue'},viewWindow: {min:0}},
                    hAxis: {title: $(this).attr('data-hAxis-title'),  titleTextStyle: {color: 'blue'}}
                };
                var chart = new google.visualization.ColumnChart(this);
                chart.draw(view, options);
            });

            $( ".linechart" ).each(function() {
                var jsonData = $.ajax({
                    url: $(this).attr('data-url'),
                    dataType: "json",
                    async: false
                    }).responseText;

                var options = {
                    title: $(this).attr('data-title'),
                    curveType: 'function',
                    legend: { position: 'bottom' }
                };

                // Create our data table out of JSON data loaded from server.
                var data = new google.visualization.arrayToDataTable(JSON.parse(jsonData));

                // Instantiate and draw our chart, passing in some options.
                var chart = new google.visualization.LineChart(document.getElementById($(this).attr('id')));
                chart.draw(data, options);
            });
        }
    </script>
@endsection