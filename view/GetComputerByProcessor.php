<?php
include_once "../db/Connection.php";

$processor = $_GET['processor'];

$str = "SELECT * 
FROM computer AS c 
    LEFT JOIN processor AS p ON c.FID_Processor = p.ID_Processor 
WHERE p.name = ?";
$stmt = $db->prepare($str);
$stmt->execute(array($processor));

echo "Computers with Processors: <b>" . $processor . "</b><br>";
echo "<hr>";
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "Processor: <i>" . $row['name'] . "</i><br>";
    echo "Monitor: <i>" . $row['monitor'] . "</i><br>";
    echo "NetName: <i>" . $row['netname'] . "</i><br>";
    echo "Vendor: <i>" . $row['vendor'] . "</i><br>";
    echo "Motherboard: <i>" . $row['motherboard'] . "</i><br>";
    echo "<hr>";
}

