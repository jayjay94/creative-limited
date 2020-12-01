<?php

session_start();

session_destroy();

echo " <script> window.open('visible/index.php','_self') </script>";


?>