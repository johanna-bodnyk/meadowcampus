<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Untitled</title>
        <style>
         @keyframes therm-image {
            from {clip-path: polygon(0% 0%, 0% 0%, 0% 100%, 0% 100%);}
            to {clip-path: polygon(0% 0%, 25% 0%, 25% 100%, 0% 100%);}
        }

        @-webkit-keyframes therm-image {
            from {-webkit-clip-path: polygon(0% 0%, 0% 0%, 0% 100%, 0% 100%);}
            to {-webkit-clip-path: polygon(0% 0%, 25% 0%, 25% 100%, 0% 100%);}
        }

        #therm-img>img#color-img {
            margin-top: -139px;
            clip-path: polygon(0% 0%, 0% 0%, 0% 100%, 0% 100%);
            -webkit-clip-path: polygon(0% 0%, 0% 0%, 0% 100%, 0% 100%);
            animation: therm-image .5s ease-in;
            -webkit-animation: therm-image .5s ease-in;
            animation-fill-mode: forwards;
            -webkit-animation-fill-mode: forwards;  
            -webkit-animation-delay: 1s;
            animation-delay: 1s;
        }

        </style>        
    </head>
    <body>


            <div id="therm-img">
                <img src="/images/rendering-1-outline-800px.png">
                <img id="color-img" src="/images/rendering-1-cropped-800px.png">
            </div>

        <script src="js/main.js"></script>
    </body>
</html>