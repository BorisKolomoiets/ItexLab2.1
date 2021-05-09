<?php
include_once "../db/Connection.php";

$date = $_GET['date'];

$str = "SELECT `name`, `monitor`, `netname`, `vendor`, `motherboard`
FROM computer AS c
LEFT JOIN processor AS p ON c.FID_Processor = p.ID_Processor
WHERE c.guarantee <= :date";
$stmt = $db->prepare($str);
$stmt->bindParam(':date', $date);
$stmt->execute();

$result = [];

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $arr[0] = $row["name"];
    $arr[1] = $row["monitor"];
    $arr[2] = $row["netname"];
    $arr[3] = $row["vendor"];
    $arr[4] = $row["motherboard"];
    array_push($result, $arr);
}

echo json_encode($result);