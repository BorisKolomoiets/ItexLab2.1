<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Processor</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="block">
    <h2>Get Computers by processor type</h2>
    <form>
        <p>
            <input id="processor" type="text" name="processor"/>
        </p>
        <input type="button" onclick = "getContent()" value="Get Computers" />
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
        let processor = document.getElementById("processor").value;
        ajax.onreadystatechange = update;
        ajax.open("GET", "../view/GetComputerByProcessor.php?processor=" + processor);
        ajax.send();
    }

    function update() {
        if (ajax.status === 200 && ajax.readyState === 4) {
            let text = document.getElementById('computer');
            let res = "";
            let computers = ajax.responseXML.firstChild.children;
            for (let i = 0; i < computers.length; i++) {
                res += "<tr>";
                res += "<td style='border: 1px solid'>" + computers[i].children[0].textContent + "</td>";
                res += "<td style='border: 1px solid'>" + computers[i].children[1].textContent + "</td>";
                res += "<td style='border: 1px solid'>" + computers[i].children[2].textContent + "</td>";
                res += "<td style='border: 1px solid'>" + computers[i].children[3].textContent + "</td>";
                res += "<td style='border: 1px solid'>" + computers[i].children[4].textContent + "</td>";
                res += "<tr>";
            }
            text.innerHTML = res;
        }
    }
</script>
</body>
</html>