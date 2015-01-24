@extends('_master')

@section('title')
    Dashboard
@stop

@section('head')
    <style>
        @include('fragments.thermometer-head', array('percent' => $percent))
    </style>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
        google.load("visualization", "1", {packages:["corechart"]});
        google.setOnLoadCallback(DrawAreaChart);
        google.setOnLoadCallback(DrawBarChart);
        google.setOnLoadCallback(DrawBarChart2);
        google.setOnLoadCallback(DrawBarChart3);
        function DrawAreaChart() {


            var data = new google.visualization.DataTable();
            data.addColumn('date', 'Date');
            data.addColumn('number', 'Alumni');
            data.addColumn('number', 'Alumni Families');
            data.addColumn('number', 'Current Students');
            data.addColumn('number', 'Current Families');
            data.addColumn('number', 'Friends');
            data.addColumn('number', 'Staff');
            {{$graph1_data}}

            var options = {
                        width: 500,
                        height: 300,
                        title: 'Donations by Group Over Time',
                        vAxis: {minValue: 0},
                        isStacked: true,
                        lineWidth: 2
                    };

            // Create and draw the visualization.
            var chart = new google.visualization.AreaChart(
                document.getElementById('area_chart_div'));
            chart.draw(data, options);

        }
        
        
        function DrawBarChart() {
            var data = google.visualization.arrayToDataTable([
            ['Group', 'Pledges', 'No Gift', 'Left to Ask'],
                {{$graph2_data}}
            ]);

            var options = {
                width: 500,
                height: 300,
                title: 'Number of Pledges by Group',
                series: [
                    {color: '#0c7344'}
                    , {color: '#999999'}
                    , {color: '#C7F4B1'}
                ], 
                isStacked: true
            };
            
            var chart = new google.visualization.BarChart(document.getElementById('bar_chart_div'));

            chart.draw(data, options);
        }
        
        function DrawBarChart2() {
            var data = google.visualization.arrayToDataTable([
                ['Group Size'
                    , 'Left Blank', {'type': 'string', 'role': 'tooltip', 'p': {'html': true}}, {role: 'style' }
                    , 'Left Green', { role: 'tooltip' }
                    , 'Left Yellow', { role: 'tooltip' }
                    , 'Pledged', { role: 'tooltip' }
                    , 'Left to Hit Target', { role: 'tooltip' }
                    , 'Over Target', { role: 'tooltip' }
                    , 'Right Blank', {'type': 'string', 'role': 'tooltip', 'p': {'html': true}}, {role: 'style' }],
                {{$graph3_data}}
            ]);
            
            var options = {
                width: 500,
                height: 300,
                title: 'Pledges by Donor Group vs. Target', 
                legend: { position: 'none'},
                enableInteractivity: true,
                bar: { groupWidth: '100%' }, 
                tooltip: { isHtml: true },
                series: [
                    {color: 'white', visibleInLegend: false}
                    , {color: '#999999', visibleInLegend: false}
                    , {color: '#C7F4B1', visibleInLegend: false}
                    , {color: '#0c7344'}
                    , {color: '#C7F4B1'}
                    , {color: '#999999'}
                    , {color: 'white', visibleInLegend: false}
                ], 
                isStacked: true
            };

            var chart = new google.visualization.BarChart(document.getElementById('bar_chart2_div'));

            chart.draw(data, options);
        }
      
      
        function DrawBarChart3() {
            var data = google.visualization.arrayToDataTable([
                ['Group Size'
                    , 'Left Blank', {'type': 'string', 'role': 'tooltip', 'p': {'html': true}}, {role: 'style' }
                    , 'Left Green', { role: 'tooltip' }
                    , 'Left Yellow', { role: 'tooltip' }
                    , 'Pledged', { role: 'tooltip' }
                    , 'Left to Hit Target', { role: 'tooltip' }
                    , 'Over Target', { role: 'tooltip' }
                    , 'Right Blank', {'type': 'string', 'role': 'tooltip', 'p': {'html': true}}, {role: 'style' }],
                {{$graph4_data}}
            ]);

            var options = {
                width: 500,
                height: 300,
                title: 'Pledges by Size vs. Target', 
                legend: { position: 'none'},
                enableInteractivity: true,
                bar: { groupWidth: '100%' }, 
                tooltip: { isHtml: true },
                series: [
                    {color: 'white'}
                    , {color: '#999999'}
                    , {color: '#C7F4B1'}
                    , {color: '#0c7344'}
                    , {color: '#C7F4B1'}
                    , {color: '#999999'}
                    , {color: 'white'}
                ], 
                isStacked: true
            };

            var chart = new google.visualization.BarChart(document.getElementById('bar_chart3_div'));

            chart.draw(data, options);

        }
      
    </script>
@stop

@section('content')
    <h2>Fundraising Campaign Dashboard</h2>
    <p class="lead">So far, <span class="callout-number">{{ $total['count'] }}</span> generous <a href="/donors">donors</a> have made pledges totaling <span class="callout-number">${{ $total['amount'] }}</span> (that's <span class="callout-number">${{ $total['monthly']}} </span> per month)!</p>
    <div class="row dashboard">
        <div class="col-lg-12">
            @include('fragments.thermometer', array('total' => $total['amount']))
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="google-chart" id="area_chart_div" style="width: 100%; height: 300px;"></div>
            <div class="google-chart" id="bar_chart_div" style="width: 100%; height: 300px;"></div>
        </div>
        <div class="col-lg-6">
            <div class="google-chart" id="bar_chart2_div" style="width: 100%; height: 300px;"></div>
            <div class="google-chart" id="bar_chart3_div" style="width: 100%; height: 300px;"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-condensed table-bordered dashboard-table">
                <tr>
                    <th>Group</th>
                    <th class="text-center">Number of Pledges</th>
                    <th class="text-center">Pledge Total</th>
                </tr>
                @foreach($groups as $groupname => $group)
                    <tr>
                        <td>{{$groupname}}</td>
                        <td class="text-center">{{$group['count']}}</td>
                        <td class="text-center">${{$group['amount']}}</td>
                    </tr>
                @endforeach
                <tr class="total-row">
                    <td>Total</td>
                    <td class="text-center">{{$total['count']}}</td>
                    <td  class="text-center">${{$total['amount']}}</td>
                </tr>
            </table>
        </div>
    </div>

@stop
