<?php

require_once "./functions.php";


$data = array_map(function($file) {
    $currentFile = json_decode(file_get_contents(RECORD_DIR . "/" . $file), true);
    $currentFile["file"] = $file;
 }, scanFile(RECORD_DIR));
