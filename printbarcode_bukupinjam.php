<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Barcode</title>
</head>
<body onload="print()">
    <img src='https://barcode.tec-it.com/barcode.ashx?data=<?= $_GET['id']; ?>&code=Code128&translate-esc=on'/>
</body>
</html>