<?php
session_start();
$delete = @$_GET['line'];
$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'].'/';
$file = $DOCUMENT_ROOT.'data/'.'guestbook.txt';
$data = file($file);
$textFile = file($file);
$lines = count($textFile);
if($delete != "" && $delete >! $lines || $delete === '0') {
    $textFile[$delete] = "";
    $fileUpdate = fopen($file, "wb");
    for($a=0; $a<$lines; $a++) {
           fwrite($fileUpdate, $textFile[$a]);
    }
    fclose($fileUpdate);
    header("location: ../index.php");
   exit;
}

?>
