<?php

ob_start();
session_start();

$connection = mysqli_connect('localhost', 'root', '', 'naukri_db');
