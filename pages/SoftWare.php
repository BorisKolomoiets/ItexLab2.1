<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Software</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<?php
include_once "../db/Connection.php";
$getSoftWareNames = "SELECT `name` FROM `software`";
?>
<div class="block">
    <h2>Get Computers by software</h2>
    <form>
        <p>
            <select id="software" name='software'>
                <option disabled>select software</option>
                <?php
                foreach ($db->query($getSoftWareNames) as $row) {
                    echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                }
                ?>
            </select>
        </p>
        <input type="button" onclick="getContent()" value="Get Computers"/>
    </form>
</div>

<table style="border: 1px solid;">
    <tr>
        <caption>Computers<br>
            <th>Processor name</th>
            <th>monitor</th>
            <th>netname</th>
            <th>vendor</th>
            <th>motherboard</th>
        </caption>
    </tr>
    <tbody id="computer"></tbody>
</table>


<script>
    const ajax = new XMLHttpRequest();

    function getContent() {
        let software = document.getElementById("software").value;
        ajax.onreadystatechange = update;
        ajax.open("GET", "../view/GetComputersBySoftWare.php?software=" + software);
        ajax.send(null);
    }

    function update() {
        if (ajax.readyState === 4 && ajax.status === 200) {
            var text = document.getElementById('computer');
            text.innerHTML = ajax.responseText;
        }
    }
</script>
</body>
</html>