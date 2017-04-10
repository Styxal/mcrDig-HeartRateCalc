<?php
require_once('heartRateCalculator.php');

$output = "<!DOCTYPE html>" . PHP_EOL
    . "<html lang=en> " . PHP_EOL
    . "<body>" . PHP_EOL;

$age = $_POST['age'];
$RHR = $_POST['restHRate'];

$output .= "<h1>Age: " . $age . "</h1>" . PHP_EOL
    . "<h1>Resting heart rate: " . $RHR . "</h1>" . PHP_EOL;

$cal = new heartRateCalculator();

$result = $cal->getRates($RHR, $age);
$output .= "<table style='width:25%'>".PHP_EOL;
$output .= "<tr><td> <b>Intensity</b> </td> <td> <b>Ideal Rate</b> </td></tr>" . PHP_EOL;
foreach ($result as $row){
    $output.= "<tr>".PHP_EOL;
    $output.= "<td>" . $row['intensity'] . "%</td>".PHP_EOL."<td>" . $row['idealRate'] . " BPM</td>" . PHP_EOL;
    $output .= "</tr>".PHP_EOL;
}

$output.="</table>".PHP_EOL;

$output.="</body>".PHP_EOL."</html>";

echo $output;