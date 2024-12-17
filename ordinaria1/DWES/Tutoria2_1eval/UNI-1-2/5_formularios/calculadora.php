<!-- Tarea calculadora -->

<?php 

function suma($numero1, $numero2){
    return $numero1 + $numero2;
}

function resta($numero1, $numero2){
    return $numero1 - $numero2;
}

function multiplica($numero1, $numero2){
    return $numero1 * $numero2;
}

function divide($numero1, $numero2){
    return $numero1 / $numero2;
}

if (isset($_POST['sumar'])){
    $numero1=$_POST['numero1'];
    $numero2=$_POST['numero2']; 
    echo suma($numero1, $numero2);
}

if (isset($_POST['restar'])){
    $numero1=$_POST['numero1'];
    $numero2=$_POST['numero2']; 
    echo resta($numero1, $numero2);
}

if (isset($_POST['multiplicar'])){
    $numero1=$_POST['numero1'];
    $numero2=$_POST['numero2']; 
    echo multiplica($numero1, $numero2);
}

if (isset($_POST['dividir'])){
    $numero1=$_POST['numero1'];
    $numero2=$_POST['numero2']; 
    echo divide($numero1, $numero2);
}

?>

<html>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>"   method="post">
    Introduce el primer numero: <input type="text" name="numero1" ><br>
    Introduce el segundo numero: <input type="text" name="numero2" ><br>
	<input type="submit" name="sumar" value="Sumar">
	<input type="submit" name="restar" value="Restar">
    <input type="submit" name="multiplicar" value="Multiplicar">
    <input type="submit" name="dividir" value="Dividir">
</form>


</body>
</html>
