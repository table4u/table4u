<?php

function nameValidation($name){
    if (preg_match('/^[\s]*$/', $name) or !preg_match('/^[a-zA-Z\s]+$/', $name)) {
        return "Incorrect name format";
    }
    else{
        return "";
    }
}

function mobileValidation($mobile){
    if (preg_match('/^\+[0-9\s-]{11,12}$/', $mobile) or preg_match('/^[0-9\s]{10,11}$/', $mobile)) {
        return "";
    }
    return "Incorrect mobile number format";
}

function checkPasswordStrength($pw)
    {
        $uppercase = preg_match('@[A-Z]@', $pw);
        $lowercase = preg_match('@[a-z]@', $pw);
        $number    = preg_match('@[0-9]@', $pw);
        $specialChars = preg_match('@[^\w]@', $pw);

        if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($pw) < 8) {
            return 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
        } else {
            return '';
        }
    }

function nicValidation($nic){
    if (strlen($nic) == 10 and preg_match('/^[0-9]{9}[vVxX]$/', $nic)) {
        return "";
    } elseif (strlen($nic) == 12 and preg_match('/^[0-9]{12}$/', $nic)) {
        return "";
    } else {
        return "Invalid NIC format";
    }
}

