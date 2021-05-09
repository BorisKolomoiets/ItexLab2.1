<?php

include_once "../db/Connection.php";

$software = $_GET['software'];

$str = "SELECT `name`, `monitor`, `netname`, `vendor`, `motherboard`
FROM software AS sf
         LEFT JOIN computer_software AS csf ON sf.ID_Software = csf.FID_Software
         LEFT JOIN computer AS c ON c.ID_Computer = csf.FID_Computer
WHERE sf.name = ?";
$stmt = $db->prepare($str);
$stmt->execute(array($software));

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    print "<tr>
<td style='border: 1px solid'>$row[name]</td>
<td style='border: 1px solid'>$row[monitor]</td>
<td style='border: 1px solid'>$row[netname]</td>
<td style='border: 1px solid'>$row[vendor]</td>
<td style='border: 1px solid'>$row[motherboard]</td>
</tr>";
}