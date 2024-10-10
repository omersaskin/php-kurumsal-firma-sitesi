<?php
ob_start();
session_start();
include '../netting/baglan.php';
include 'fonksiyon.php';

error_reporting(0);

//Belirli veriyi seçme işlemi
$ayarsor=$db->prepare("SELECT * FROM ayar where ayar_id=:id");
$ayarsor->execute(array(
  'id' => 0
  ));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);


$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail");
$kullanicisor->execute(array(
  'mail' => $_SESSION['kullanici_mail']
  ));
$say=$kullanicisor->rowCount();
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

if ($say==0) {

  Header("Location:login.php?durum=izinsiz");
  exit;

}



//1.Yöntem
/*
if (!isset($_SESSION['kullanici_mail'])) {


}
*/
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Sayfası</title>
    <!--
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/side_menu.css">
    <link rel="stylesheet" href="css/editor.css">
-->
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/side-menu.css">
    <link rel="stylesheet" href="css/form.css">
    <script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
  


<div class="topnav">
  <a class="active" href="#dashboard">
    <i class="fas fa-tachometer-alt"></i>
  </a>
  <a href="#users">
    <i class="fas fa-users"></i>
  </a>
  <a href="#settings">
    <i class="fas fa-cog"></i>
  </a>
  <a href="#reports">
    <i class="fas fa-chart-line"></i>
  </a>
  <a href="#logout">
    <i class="fas fa-sign-out-alt"></i>
  </a>
</div>
