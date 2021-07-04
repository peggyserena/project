<?php

session_start();

unset($_SESSION['staff']);

header('Location: staff_login.php');