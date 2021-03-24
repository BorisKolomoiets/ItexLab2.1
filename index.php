<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
<?php
include_once "db/Connection.php";
$getSoftWareNames = "SELECT `name` FROM `software`";
?>
<div class="block">
    <h2>Get Computers by processor type</h2>
    <form action="/view/GetComputerByProcessor.php" method="get">
        <p>
            <input type="text" name="processor"/>
        </p>
        <button type="submit">Get Computers</button>
    </form>
</div>

<div class="block">
    <h2>Get Computers by software</h2>
    <form action="/view/GetComputersBySoftWare.php" method="get">
        <p>
            <select name='software'>
                <option disabled>select software</option>
                <?php
                foreach ($db->query($getSoftWareNames) as $row) {
                    echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                }
                ?>
            </select>
        </p>
        <button type="submit">Get Computers</button>
    </form>
</div>

<div class="block">
    <h2>Get Computers with bad garantee up to date</h2>
    <form action="/view/GetComputerWithBadGarantee.php" method="get">
        <p>
            <input type="date" name="date">
        </p>
        <button type="submit">Get Computers</button>
    </form>
</div>
</body>
</html>