<?php
session_start();
session_destroy();
echo "<script>alert('successfully logout')</script";
header("location:index.php");
?>