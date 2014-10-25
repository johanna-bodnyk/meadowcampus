<?php

    class Image extends Eloquent {

        public function post() {
            return $this->belongsTo('Post');
        }

        public function getFullPath() {
            return '/images/posts/'.$this->filename;
        }
        
    }

?>