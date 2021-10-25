<?php
$address = array();
if (isset($_POST['houseNo']) or isset($_POST['line1']) or isset($_POST['line2']) or isset($_POST['city'])) {
    if (isset($_POST['houseNo'])) {
    }
    $address = array(trim($_POST['houseNo']), trim($_POST['line1']), trim($_POST['line2']), trim($_POST['city']));
    $address = implode(', ', $address);
}