<?php
    function redirect($page){
        header('location: ' . URLROOT . '/pages/' . $page);
    }