<?php
// Proteksi halaman dengan librari my_login
$this->my_login->check_login();
//menggabungkan semua bagian layout menjadi satu
require_once('head.php');
require_once('header.php');
require_once('menu.php');
require_once('content.php');
require_once('footer.php');