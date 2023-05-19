<?php

define('PROJECT_LOG_PATH', dirname(__DIR__) . DIRECTORY_SEPARATOR .'logs');

function debug_log($message, $type = 'debug') {
    //エラーログ書き出し
    $filename = PROJECT_LOG_PATH."/".$type.date("Ymd").".log";
    if (!\file_exists($filename)) {
        \touch($filename);
        \chmod($filename, 0666);
        \chown($filename, 'vagrant');
        \chgrp($filename, 'vagrant');
    }
    $fp = \fopen($filename, "a");
    \fwrite($fp, date("Y-m-d H:i:s")."\n".$message."\n\n\n");
    \fclose($fp);
}