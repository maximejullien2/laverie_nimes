<?php
ini_set('allow_url_fopen',1);
switch (@parse_url($_SERVER['REQUEST_URI'])['path']){
    case '/':
        require "index.php";
        break;
    case '/index.php':
        require "index.php";
        break;
    case '/mention_legale.php':
        require "mention_legale.php";
        break;
    case '/update.php':
        require "update.php";
        break;
}