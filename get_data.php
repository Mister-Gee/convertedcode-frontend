<?php
$code = $_GET['code'];
$cf = $_GET['from'];
$ct = $_GET['to'];
echo file_get_contents("https://bet-converter.herokuapp.com/conversion/?code=" . $code . "&from=" . $cf . "&to=" . $ct);