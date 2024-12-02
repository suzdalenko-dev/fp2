<?php
    if (isset($_POST['enviar'])) {
        $descripcion = $_POST['descripcion'];
        $categoria = $_POST['categoria'];
        $transporte = $_POST['transporte'];
        echo $descripcion . "<br>";
        echo $categoria . "<br>";
        echo $transporte . "<br>";

    }
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

    <div>
        <label for="descripcion">Descripcion:</label>
        <input type="text" name="descripcion"/>

    </div>
    <div>
        <label for="categoria">Categoria:</label>
        <select name="categoria">

            <option value="">Seleccione categoría</option>

            <?php
                $categorias = array("INFANTIL", "JUVENIL", "VETERANO", "ALEVIN", "Senior");
                foreach ($categorias as $cat) {
                    echo "<option value='$cat' >$cat</option>";
                }
            ?>
        </select>
        <br>
        Medio de transporte:

        <select name="transporte">

            <option value="">Seleccione transporte</option>

            <?php
                $transportes = array("avion" => 150, "bus" => 50, "tranvia" => 1.5, "barco" => 200, "tren" => 46);
                foreach ($transportes as $medio => $coste) {
                    echo "<option value='$coste' >$medio</option>";
                }
            ?>
        </select>

        <div class="button">
            <input type="submit" value="Enviar" name="enviar"/>
        </div>
</form>