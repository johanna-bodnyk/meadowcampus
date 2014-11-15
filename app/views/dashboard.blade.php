@extends('_master')

@section('title')
    Dashboard
@stop

@section('head')
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
                        width: 600,
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
                width: 600,
                height: 300,
                title: 'Number of Pledges by Group',
                series: [
                    {color: '#8C4646'}
                    , {color: '#588C7E'}
                    , {color: '#F2AE72'}
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
                width: 600,
                height: 300,
                title: 'Pledges by Donor Group vs. Target', 
                legend: { position: 'none'},
                enableInteractivity: true,
                bar: { groupWidth: '100%' }, 
                tooltip: { isHtml: true },
                series: [
                    {color: 'white', visibleInLegend: false}
                    , {color: '#588C7E', visibleInLegend: false}
                    , {color: '#F2AE72', visibleInLegend: false}
                    , {color: '#8C4646'}
                    , {color: '#F2AE72'}
                    , {color: '#588C7E'}
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
                width: 600,
                height: 300,
                title: 'Pledges by Size vs. Target', 
                legend: { position: 'none'},
                enableInteractivity: true,
                bar: { groupWidth: '100%' }, 
                tooltip: { isHtml: true },
                series: [
                    {color: 'white'}
                    , {color: '#588C7E'}
                    , {color: '#F2AE72'}
                    , {color: '#8C4646'}
                    , {color: '#F2AE72'}
                    , {color: '#588C7E'}
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

    <div class="row">
        <div class="col-md-6">
            <div id="area_chart_div" style="width: 90%; height: 300px;"></div>
            <div id="bar_chart_div" style="width: 90%; height: 300px;"></div>
        </div>
        <div class="col-md-6">
            <div id="bar_chart2_div" style="width: 90%; height: 300px;"></div>
            <div id="bar_chart3_div" style="width: 90%; height: 300px;"></div>
        </div>
    </div>
@stop
