<?php

    function categoria()
    {
        $categorias = array("INFANTIL", "JUVENIL", "VETERANO", "ALEVIN", "Senior", "MINI-BENJAMIN", "Rookei");
        foreach ($categorias as $cat) {
            echo "<option value='$cat' >$cat</option>";
        }

    }

    if (isset($_POST['enviar'])) {
        $descripcion = $_POST['descripcion'];
        $categoria = $_POST['categoria'];
        $transporte = $_POST['transporte'];
        echo "descripcion: " . $descripcion . "<br>";
        echo "categoría: " . $categoria . "<br>";
        echo "coste: " . $transporte . "<br>";

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
            <?php
                categoria();
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