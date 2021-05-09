<?php
header("Content-Type: text/xml");
header("Cache-Control: no-cahe, must-revalidate");

include_once "../db/Connection.php";

$processor = $_GET['processor'];

$str = "SELECT `name`, `monitor`, `netname`, `vendor`, `motherboard` 
FROM computer AS c 
    LEFT JOIN processor AS p ON c.FID_Processor = p.ID_Processor 
WHERE p.name = ?";
$stmt = $db->prepare($str);
$stmt->execute(array($processor));

echo "<?xml version='1.0' encoding='utf-8'?>";
echo "<computers>";
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    print "<computer>
<name>$row[name]</name>
<monitor>$row[monitor]</monitor>
<netname>$row[netname]</netname>
<vendor>$row[vendor]</vendor>
<motherboard>$row[motherboard]</motherboard>
</computer>";
}
echo "</computers>";

