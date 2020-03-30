<?php

    require_once ROOT.'/includes/activeRecords/Tweet.php';
    $message = '';

    $tweets = Tweet::getAll($conn);

