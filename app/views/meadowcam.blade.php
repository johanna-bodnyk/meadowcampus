@extends('_master')

@section('title')
    Live Meadowcam &amp; Video Archive
@stop

@section('head')
    <script src="{{ URL::asset('packages/jquery/jquery-1.11.1.min.js') }}"></script>
    <link rel="stylesheet" href="{{ URL::asset('packages/blueimp/css/blueimp-gallery.min.css') }}">
@stop

@section('bodyclass')
    meadowcam
@stop

@section('content')
    <div class="row">
        <h2>Live from the Meadow</h2>
        
        <table>
            <tr>
                <td id="back-buttons">
                    <a href="javascript:adjust(-260)" id="back-260" class="btn btn-xs btn-success" role="button">&laquo; 5d</a>
                    <a href="javascript:adjust(-52)" id="back-52" class="btn btn-xs btn-success" role="button">&laquo; 1d</a>
                    <a href="javascript:adjust(-4)" id="back-4" class="btn btn-xs btn-success" role="button">&laquo; 1hr</a>
                    <a href="javascript:adjust(-1)" id="back-1" class="btn btn-xs btn-success" role="button">&laquo; 15m</a>
                </td>
                <td align=center><span id="dateLabel"></span> <a href="" target="_blank" id="fullSizeLink">(view larger)</a></td>
                <td align=right id="next-buttons">
                    <a href="javascript:adjust(1)" id="next-1" class="btn btn-xs btn-success" role="button">15m &raquo;</a>
                    <a href="javascript:adjust(4)" id="next-4" class="btn btn-xs btn-success" role="button">1hr &raquo;</a>
                    <a href="javascript:adjust(52)" id="next-52" class="btn btn-xs btn-success" role="button">1d &raquo;</a>
                    <a href="javascript:adjust(260)" id="next-260" class="btn btn-xs btn-success" role="button">5d &raquo;</a>
                </td>
            </tr>
            <tr><td colspan=3><img id='main-image' width='100%' src='http://tunnel.boran.name/{{$latest}}'></td></tr>
        </table>
    </div>
@stop

@section('foot')
    <script type="text/javascript">
        // h/t Evan Mallory
        var files = {{$files}};
        var cur_image = files.length - 1;

        updateDateLabel("{{$latest}}");

        function updateImageSrc() {
            var filename = files[cur_image];
            var image = document.getElementById('main-image');
            image.src = '';
            var new_src = 'http://tunnel.boran.name/' + filename;
            window.setTimeout(function() {
                image.src = new_src;
            }, 1);

            updateDateLabel(filename);
            // TODO: Update url so people can copy permalinks            

            var fullSizeLink = document.getElementById("fullSizeLink");
            fullSizeLink.href = new_src;
        }

        function updateDateLabel(filename) {
            var date = new Date(filename.substr(10, 10) + " EST");
            date.setHours(filename.substr(21,2));
            date.setMinutes(filename.substr(24,2));
            var options = {
                weekday: "short", year: "numeric", month: "short",
                day: "numeric", hour: "2-digit", minute: "2-digit"
            };
            var formattedDate = date.toLocaleDateString("en-US", options);

            var dateLabel = document.getElementById("dateLabel");
            dateLabel.innerText = formattedDate;
        }

        function adjust(delta) {
            var new_image = cur_image + delta;
            if (new_image < 0) {
                new_image = 0;
            }
            if (new_image >= files.length) {
                new_image = files.length - 1;
            }

            // TODO: Disable buttons if they won't do anything

            cur_image = new_image;
            updateImageSrc();
        }

    </script>
@stop