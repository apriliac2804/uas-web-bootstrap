<?php
session_start();
session_destroy();
header("Location: login-bootstrap.php");
exit();