<?php

    // load config
    $config = require "../../configs/chatbot.php";
    $returned = exec('python '.$config['chatbot_train_path']);
    
    echo $returned;