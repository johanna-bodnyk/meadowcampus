<?php

class MeadowcamController extends \BaseController {

    public function index()
    {
        return View::make('meadowcam')
            ->with('files', json_encode($this->getFileList()));
    }

    public function latest()
    {
        $files = $this->getFileList();
        $latest = $files[sizeof($files)-1];

        return View::make('meadowcam-latest')
            ->with('latest', $latest);
    }

    public function getLatestImage()
    {
        $files = $this->getFileList();
        return $files[sizeof($files)-1];
    }

    private function getFileList()
    {
        $ch = curl_init();
        $timeout = 5;
        curl_setopt($ch, CURLOPT_URL, "http://tunnel.boran.name");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $page = curl_exec($ch);
        curl_close($ch);

        // h/t Evan Mallory
        $lines = explode("\n", $page);
        $regex = "/meadowcam_[0-9a-z_-]+.jpeg/";
        $sample = "meadowcam_2016-11-12_08-00-01.jpeg";

        $files = [];
        foreach ($lines as $index => $line) {
            if (preg_match($regex, $line, $matches) && strlen($matches[0]) == strlen($sample)) {
                $files[] = $matches[0];
            }
        }

        return $files;
    }

}