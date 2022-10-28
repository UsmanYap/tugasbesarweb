<?php
session_start();
$uid = $name = '';
$username = 'Guest';
$authentucated = $admin = false;
if (isset($_SESSION['id'])){
    $uid = $_SESSION['username'];
    $username = $_SESSION['admin'];
    $admin = $_SESSION['name'];
    $authenticated = true;
}