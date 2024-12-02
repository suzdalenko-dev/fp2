<html>
<head>
    <title></title>
</head>
<body>
<?PHP
    $n1 = 0;
    $n2 = 1;
    $x = 2;
    echo "$n1 <br>";
    echo "$n2 <br>";
    while ($x < 10) {
        $n = $n1 + $n2;
        echo "$n <br>";
        $n1 = $n2;
        $n2 = $n;
        $x++;
    }
?>
</body>
</html>