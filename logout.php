<?php
    // toa 1 sesion dua vao sesion de cho phep vao file
    // xoa sesion se la chuc nang dang suat
    session_start();
    // xoa sesion
    session_unset();
    header('location:login.php');
    ?>