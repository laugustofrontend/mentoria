<?php
/**
 * Created by PhpStorm.
 * User: laugusto
 * Date: 5/20/17
 * Time: 11:13 PM
 */

namespace Test;

class Folders {

    public function msg() {
        echo 'Page test';
    }

    public function FindFolder() {
        $folders = '/home/laugusto/Documents';
        $folder = scandir($folders);
        echo $folders;
    }
}