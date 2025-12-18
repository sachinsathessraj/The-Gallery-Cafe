<?php
session_start();
session_destroy();
header("Location: login.php?message=Successfully logged out");
exit();
