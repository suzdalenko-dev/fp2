<?php


    echo "<table border='1' align='center'>\n";
    echo "<b> Tabla del 4 </b>\n";

    for ($i = 0; $i < 11; $i++) {
        echo "<tr>\n";
        echo "<td align='center'><b>4</b></td>\n";
        echo "<td align='center'><b>*</b></td>\n";
        echo "<td align='center'><b>$i</b></td>\n";
        echo "<td> = </td>\n";
        echo "<td align='center'><b>", 4 * $i, "</b></td>\n";
        echo "</tr>\n";
    }
    echo "</table>\n";


?>
