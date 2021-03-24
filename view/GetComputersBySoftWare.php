<?php

include_once "../db/Connection.php";

$software = $_GET['software'];

$str = "SELECT *
FROM software AS sf
         LEFT JOIN computer_software AS csf ON sf.ID_Software = csf.FID_Software
         LEFT JOIN computer AS c ON c.ID_Computer = csf.FID_Computer
WHERE sf.name = ?";
$stmt = $db->prepare($str);
$stmt->execute(array($software));

echo "Computers with software: <b>" . $software . "</b><br>";
echo "<hr>";
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "Processor: <i>" . $row['name'] . "</i><br>";
    echo "Monitor: <i>" . $row['monitor'] . "</i><br>";
    echo "NetName: <i>" . $row['netname'] . "</i><br>";
    echo "Vendor: <i>" . $row['vendor'] . "</i><br>";
    echo "Motherboard: <i>" . $row['motherboard'] . "</i><br>";
    echo "<hr>";
}