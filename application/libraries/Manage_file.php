<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: developer
 * Date: 20/2/2560
 * Time: 13:38 น.
 */
class Manage_file
{
    function check_dir($filename){
//        $dirname = '2560_05';
//        $filename = "./uploads/paper-file/" . $dirname . "/";

        if (!file_exists($filename) && !is_dir($filename)) {
            mkdir($filename, DIR_READ_MODE);
            chmod($filename, DIR_READ_MODE);
        }
    }
}