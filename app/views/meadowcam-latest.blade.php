<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>The Circle School Meadow Campus Dream Campaign | Meadowcam Latest</title>
        <script src="{{ URL::asset('packages/jquery/jquery-1.11.1.min.js') }}"></script>
        <link rel="stylesheet" href="{{ URL::asset('css/application.css') }}">
    </head>
    <body class="meadowcam-latest">
        <div id="dateLabel"></div>
        <img id="latest" src="http://tunnel.boran.name/{{$latest}}">
        <script>
            var current = "{{$latest}}";
            var aspectRatio = 2592/1944; // Full size dimensions

            window.onload = function() {
                var windowWidth = window.innerWidth;
                var windowHeight = window.innerHeight;
                if (windowWidth/windowHeight < aspectRatio) {
                    $("#latest").attr("width", windowWidth + "px");
                } else {
                    $("#latest").attr("height", windowHeight + "px");
                }
                updateDateLabel(current);
                window.setTimeout(getLatestImage, getTimeoutForFiveAfterTheQuarterHour());
            }

            function getLatestImage() {
                $.get("/meadowcam/get-latest-image", function(result) {
                    console.log("Retrieved latest image: " + result);
                    var newImageSource = "http://tunnel.boran.name/" + result;
                    if (result == current) {
                        newImageSource += "?cacheBust=" + Date.now();
                    } else {
                        current = result;
                        updateDateLabel(result);
                    }
                    $("#latest").attr("src", newImageSource);
                })
                .always(function() {
                    window.setTimeout(getLatestImage, getTimeoutForFiveAfterTheQuarterHour());
                });
            }
            
            function getTimeoutForFiveAfterTheQuarterHour() {
                var now = new Date();
                var min = now.getMinutes();
                return (20 - min%15) * 1000 * 60;
            }

            function updateDateLabel(filename) {
                var date = new Date(filename.substr(10, 10) + " EST");
                date.setHours(filename.substr(21,2));
                date.setMinutes(filename.substr(24,2));
                var options = {
                    year: "2-digit", month: "numeric",
                    day: "numeric", hour: "2-digit", minute: "2-digit"
                };
                var formattedDate = date.toLocaleDateString("en-US", options);

                var dateLabel = document.getElementById("dateLabel");
                dateLabel.innerText = formattedDate;
            }

        </script>
    </body>
</html>
