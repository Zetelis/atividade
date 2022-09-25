<?php
session_start();

if(!isset($_SESSION['codUsuario'])){
  header('location:login.php');
  exit;
}
