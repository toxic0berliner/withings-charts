<?php

session_start();

$_SESSION['oauth_token'] = $_GET['oauth_token'];
$_SESSION['oauth_verifier'] = $_GET['oauth_verifier'];
$_SESSION['userid'] = $_GET['userid'];
header('Location: ./');
?>
