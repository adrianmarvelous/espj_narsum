<?php
require("../../koneksi.php");

$login->logout();
create_alert("Success","Anda sudah logout dari sistem","../../login_system/filter.php");
?>