<?php

require_once "./functions.php";

if (!file_exists(PHOTO_DIR)) {
    if (mkdir(PHOTO_DIR)) {
        logger("file is created");
    }
}

if (!file_exists(RECORD_DIR)) {
    if (mkdir(RECORD_DIR)) {
        logger("file is created");
    }
}