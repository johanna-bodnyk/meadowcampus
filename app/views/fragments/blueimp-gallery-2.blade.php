    <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
        <div class="slides"></div>
        <h3 class="title"></h3>
        <a class="prev">‹</a>
        <a class="next">›</a>
        <a class="close">×</a>
        <a class="play-pause"></a>
        <ol class="indicator"></ol>
    </div>

    <script src="{{ URL::asset('packages/blueimp/js/blueimp-gallery.min.js') }}"></script>

    <script>
        document.getElementById('links').onclick = function (event) {
            event = event || window.event;
            var target = event.target || event.srcElement,
                link = target.parentNode.parentNode,
                options = {index: link, event: event},
                links = this.getElementsByTagName('a');
            console.log(link);
            blueimp.Gallery(links, options);
        };

        document.getElementById('links2').onclick = function (event) {
            event = event || window.event;
            var target = event.target || event.srcElement,
                link = target.parentNode.parentNode,
                options = {index: link, event: event},
                links = this.getElementsByTagName('a');
            console.log(link);
            blueimp.Gallery(links, options);
        };
    </script>