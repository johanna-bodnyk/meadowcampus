<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Thermometer Test</title>
        <link rel="stylesheet" href="css/style.css">
            <style>
                #content {
                    width: 890px;
                    margin: 300px auto 0px;
                    padding: 30px;
                    border: solid 1px gray;
                }

                #therm {
                    height: 15px;
                    width: 100%;
                    border: solid 3px #0c7344;
                }

                @keyframes thermometer {
                    from {width: 0%;}
                    to {width: 23%;}
                }

                @-webkit-keyframes thermometer {
                    from {width: 0%;}
                    to {width: 23%;}
                }

                #therm-fill {
                    height: 15px;
                    background-color: #0c7344;
                    width: 0%;
                    -webkit-animation: thermometer ease-in 1.5s;
                    animation: thermometer ease-in 1.5s;
                    -webkit-animation-fill-mode:forwards;  
                    animation-fill-mode:forwards;
                }

                #therm-values {
                    padding-top: 5px;
                    font-family: "Trebuchet MS", sans-serif;
                    font-size: 16px;
                }

                #start-value {
                    float: left;
                }

                #end-value {
                    float: right;
                }

                @keyframes current {
                    from {opacity: 0;}
                    to {opacity: 1;}
                }

                @-webkit-keyframes current {
                    from {opacity: 0;}
                    to {opacity: 1;}
                }

                #current-value {
                    color: #0c7344;
                    font-size: 22px;
                    font-weight: bold;
                    padding-left: 23%;
                    margin-left: -71px;
                    opacity: 0;
                    -webkit-animation: current ease-in .5s;
                    animation: current ease-in .5s;
                    -webkit-animation-fill-mode:forwards;  
                    animation-fill-mode:forwards;
                    -webkit-animation-delay: 1.5s;
                    animation-delay: 1.5s;
                }


            </style>
    </head>

        <div id="content">

            <div id="therm">
                <div id="therm-fill"></div>
                <div id="therm-values">
                    <span id="start-value">$0</span>
                    <span id="end-value">$750,000</span>
                    <span id="current-value">$176,156</span>
                </div>
            </div>

        <div>

    <body>



        <script src="js/main.js"></script>
    </body>
</html>