<?php
require("ReportGenerator/meghivas.php");
require("readQuestion.php");
$x = atalakitReportTombe('xml/Proba.xml');
meghivas($x, 100, 20, 30);
?>