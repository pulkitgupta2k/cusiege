<?php
session_start();
if(!isset($_SESSION['username']))
	header('location:index');
elseif($_SERVER['REQUEST_METHOD']=="POST")
{
	$i=$_SESSION['i'];
	unset($_SESSION['gans'][$i]);
	$_SESSION['clear']=1;
	header('location:play');
}
?>