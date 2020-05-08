<?php
require_once 'enchtml.func.php';
ob_start();
include("605.php");
$htmlstr = ob_get_contents();
ob_end_clean();
outhtml($htmlstr);
?>