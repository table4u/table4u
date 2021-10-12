<?php
session_start();

function isLoggedIn()
{
    if (isset($_SESSION['user_id'])) {
        return true;
    } else {
        return false;
    }
}

function isValidUser($userrole)
{
    if ($_SESSION['user_role'] != $userrole) {
        header("Location: " . URLROOT . '/errors/noAccess');
    }
    return true;
}
