<?php

/* LOGOUT USER */
session_start();
session_destroy();

header("Location: ../index.php");
