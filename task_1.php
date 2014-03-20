<?php
// show all errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

// function to find all txt files
function read_dir($new_dir)
{
    $dir_h = opendir($new_dir);
    while (false !== ($file_name = readdir($dir_h))) {
        if (($file_name != '.') && ($file_name != '..')) {
            $file_path = $new_dir . '/' . $file_name;
            if (is_file($file_path)) {
                $file_type = substr($file_name, -4);
                if ('.txt' === $file_type) {
                    echo $file_path . PHP_EOL;
                }
            } else {
                if (is_dir($file_path)) {
                    // make recursion
                    read_dir($file_path);
                }
            }
        }
    }
    closedir($dir_h);
}

// call read_dir
read_dir('.');
