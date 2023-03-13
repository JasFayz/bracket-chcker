<?php

require_once __DIR__ . '/../vendor/autoload.php';

use JAkhmatfaezov\BracketChecker\Bracket;

$bracket = new Bracket('((((())()(()))))(()))))())))');

var_dump($bracket->checker());
