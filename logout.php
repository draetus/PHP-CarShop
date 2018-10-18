<?php
include_once '_init.php';

session_destroy();
header('Location:index.php');