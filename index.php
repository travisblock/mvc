<?php

if(!isset($_SESSION['msg'])){
  session_start();
}

require_once 'app/init.php';

$app = new App;
