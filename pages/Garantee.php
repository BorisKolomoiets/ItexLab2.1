<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Garantee</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="block">
    <h2>Get Computers with bad garantee up to date</h2>
    <form>
        <p>
            <input id="date" type="date" name="date">
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
        let date = document.getElementById("date").value;
        console.log(date);
        ajax.onreadystatechange = update;
        ajax.open("GET", "../view/GetComputerWithBadGarantee.php?date=" + date);
        ajax.send();
    }

    function update() {
        if (ajax.status === 200 && ajax.readyState === 4) {
            var text = document.getElementById('computer');
            var res = ajax.responseText;
            console.log(res);
            var resHtml = "";
            res = JSON.parse(res);

            res.forEach(computer => {
                resHtml +=
                    "<tr>" +
                    "<td>" + computer[0] + "</td>" +
                    "<td>" + computer[1] + "</td>" +
                    "<td>" + computer[2] + "</td>" +
                    "<td>" + computer[3] + "</td>" +
                    "<td>" + computer[4] + "</td>" +
                    "</tr>"
            });

            text.innerHTML = resHtml;
        }
    }
</script>
</body>
</html>