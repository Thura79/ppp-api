<?php

require_once "./globals.php";


function response($data, $status = 200): string
{
    header("Content-type:Application/json");
    http_response_code($status);
    if (is_array($data)) {
        return json_encode($data);
    }
    return json_encode(["message" => $data]);
}


function result(float $width, float $breadth): float
{
    return $width * $breadth;
}


function logger(string $message): void
{
    echo "\e[39m" . "[LOG] " . "\e[32m" .  $message . "\n";
}

//   .ext
function extension(string $fileName): string
{
    return pathinfo($fileName)["extension"];
}


// fsjdklajfklasdfasfdafs.ext
function randomFileName($ext): string
{
    return md5(uniqid()) . '.' . $ext;
}


//   dir/asjkfasjdkdsafjksdfa.png
function uploadfile(string $key, string $dir): string
{
    $ext = extension($_FILES[$key]["name"]);
    $newfile = $dir . "/" . randomFileName($ext);
    move_uploaded_file($_FILES[$key]["tmp_name"], $newfile);
    return $newfile;
}


function saveJsonFile(string $text): void
{
    $newName = RECORD_DIR."/". randomFileName("json");
    $stream = fopen($newName, "w");
    fwrite($stream, $text);
    fclose($stream);
}


function scanFile($dir):array{
    $files = scandir($dir);
    $result = [];
    foreach($files as $file){
        if($file !== "." && $file !== ".."){
            $result[] = $file;
        }
    }

    return $result;
}


function url(string $path = null) : string {
    $url = $_SERVER["HTTPS"] ? "https" : "http";
    $url .= "://";
    $url .= $_SERVER["HTTP_HOST"];
    if(isset($path)){
        $url .= "/";
        $url .= $path;
    }
    return $url;
}
