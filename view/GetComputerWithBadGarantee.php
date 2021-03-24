<?php
include_once "../db/Connection.php";

$date = $_GET['date'];

$str = "SELECT *
FROM computer AS c
WHERE c.guarantee <= :date";
$stmt = $db->prepare($str);
$stmt->bindParam(':date', $date);
$stmt->execute();

echo "Computers with bad garantee: <b>" . $date . "</b><br>";
echo "<hr>";
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "Processor: <i>" . $row['name'] . "</i><br>";
    echo "Monitor: <i>" . $row['monitor'] . "</i><br>";
    echo "NetName: <i>" . $row['netname'] . "</i><br>";
    echo "Vendor: <i>" . $row['vendor'] . "</i><br>";
    echo "Motherboard: <i>" . $row['motherboard'] . "</i><br>";
    echo "<hr>";
}