        @keyframes thermometer {
            from {width: 0%;}
            to {width: {{$percent}}%;}
        }

        @-webkit-keyframes thermometer {
            from {width: 0%;}
            to {width: {{$percent}}%;}
        }

        #current-value {
            padding-left: {{$percent}}%;
        }



        @-webkit-keyframes thermometer-image {
            from {-webkit-clip-path: polygon(0% 0%, 0% 0%, 0% 100%, 0% 100%);}
            to {-webkit-clip-path: polygon(0% 0%, {{$percent}}% 0%, {{$percent}}% 100%, 0% 100%);}
        }

{{--    2015-07-11: Chrome now supports unprefixed keyframes directive,
        but still needs prefix for clip-path, so the following breaks the animation --}}

        {{--@keyframes thermometer-image {--}}
            {{--from {clip-path: polygon(0% 0%, 0% 0%, 0% 100%, 0% 100%);}--}}
            {{--to {clip-path: polygon(0% 0%, {{$percent}}% 0%, {{$percent}}% 100%, 0% 100%);}--}}
        {{--}--}}