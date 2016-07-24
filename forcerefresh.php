<?php

session_start();

unset($_SESSION['lastfetch']);
header('Location: ./');
?>
