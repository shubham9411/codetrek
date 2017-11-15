<?php
session_start();
unset($_SESSION['is_user_logged_in']);
unset($_SESSION['user']);
header('Location: http://soiree.dev/');
