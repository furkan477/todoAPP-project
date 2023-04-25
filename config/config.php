<?php

const BASEDIR = 'C:\xampp\htdocs\php-patikası\todoapp';
const URL = 'http://localhost/todoapp/';
const DEV_MODE = true;

try {
    $db = new PDO('mysql:host=localhost;dbname=todoapp;','root','');
}catch (PDOException $e){
    echo $e->getMessage();
}
