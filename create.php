<?php

require_once "./functions.php";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $data = [
        "width" => $_POST["width"] . " ft",
        "breadth" => $_POST["breadth"] . " ft",
        "area" => result($_POST["width"] , $_POST["breadth"]) . " sqft",
    ];


    if($_FILES["photo"]["error"] === 0){
        $photo = uploadfile("photo", PHOTO_DIR);
        $httpresult = $_SERVER["HTTPS"] ? "https" : "http";
        $httpresult .= "://" . $_SERVER["HTTP_HOST"] . "/";
        $data["photo"] = $httpresult . $photo;
    }

    saveJsonFile(json_encode($data));

    echo response($data, 201);
}