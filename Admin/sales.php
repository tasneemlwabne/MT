<?php
require "Db.php";
$sales = [];
$salesSql = "SELECT price,qty,date FROM orders";
$salesQuery = mysqli_query($con,$salesSql);
$index = 0;
while($row=mysqli_fetch_assoc($salesQuery)) {
  $sales[$index] = $row;
  $index++;
}
// print_r($sales);

$quarters = [
    "Quarter_1" => 0,
    "Quarter_2" => 0,
    "Quarter_3" => 0,
    "Quarter_4" => 0,
];

foreach ($sales as $sale) {
    $date = new DateTime($sale["date"]);
    $month = $date->format('m');
    $quarter = "";

    if ($month >= 1 && $month <= 3) {
        $quarter = "Quarter_1";
    } elseif ($month >= 4 && $month <= 6) {
        $quarter = "Quarter_2";
    } elseif ($month >= 7 && $month <= 9) {
        $quarter = "Quarter_3";
    } elseif ($month >= 10 && $month <= 12) {
        $quarter = "Quarter_4";
    }

    $quarters[$quarter] += $sale["qty"] * $sale["price"];
}

/////////////////////////////
$supply = [];
$supplysSql= "SELECT price,qty,date FROM supply";
$supplyQuery = mysqli_query($con,$supplysSql);
$index = 0;
while($row=mysqli_fetch_assoc($supplyQuery)) {
  $supply[$index] = $row;
  $index++;
}
// print_r($sales);

$quarters2 = [
    "Quarter_1" => 0,
    "Quarter_2" => 0,
    "Quarter_3" => 0,
    "Quarter_4" => 0,
];
foreach ($supply as $sale) {
    $date = new DateTime($sale["date"]);
    $month = $date->format('m');
    $quarter2 = "";

    if ($month >= 1 && $month <= 3) {
        $quarter2 = "Quarter_1";
    } elseif ($month >= 4 && $month <= 6) {
        $quarter2 = "Quarter_2";
    } elseif ($month >= 7 && $month <= 9) {
        $quarter2 = "Quarter_3";
    } elseif ($month >= 10 && $month <= 12) {
        $quarter2 = "Quarter_4";
    }

    $quarters2[$quarter2] += $sale["qty"] * $sale["price"];
}
// print_r($quarters2);

?>