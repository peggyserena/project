<?php

session_start();

unset($_SESSION['user']);

header('Location: staff_login.php');