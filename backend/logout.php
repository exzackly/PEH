<?php
   session_start();
   session_unset();
   
   echo 'You have cleaned session';
   header('Location: ../index.php');
   exit;