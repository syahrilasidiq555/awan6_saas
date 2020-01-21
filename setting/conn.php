<?php 
require "vendor/autoload.php";
use Medoo\Medoo;
$db = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'awan6_saas',
    'server' => 'localhost',
    'username' => 'root',
    'password' => '',       
    ]);
 ?>