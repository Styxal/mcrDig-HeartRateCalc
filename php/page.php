<?php
use heartRateCalculator;

$cal = new heartRateCalculator();

if (isset($_POST['submit'])){
    $result = $cal->getRates($_POST['restHRate'], $_POST['age']);
    foreach ($result as $row) {

    }
}
