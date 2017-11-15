<?php 
session_start();
if(isset($_SESSION['is_user_logged_in'])){
	include('header-admin.php');
} else{
	include('header-host.php');
}
?>