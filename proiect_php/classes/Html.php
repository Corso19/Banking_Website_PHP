<?php

class Html {
    public function render($file, $values){
        require_once './html/'.$file.'.php';
    }
}