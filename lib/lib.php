<?php
include 'config/config.php';

/**
 * Generamos los asientos ocupados y libres
 */
$asientos = array();
for ($i = 0; $i < 400; $i++) {
    $asientos[$i] = $i;
}
for ($i = 0; $i < ABONADOS; $i++) {
    $asientos[ocuparAsiento()] = 'X';
}

function ocuparAsiento()
{
    return rand(0, 400);
}

/**
 * Funcion que genera la tabla de los asientos
 * @param $min
 * @param $max
 * @param $array
 * @param $equipo
 * @param $zona
 * @return void
 */
function getAsientos($min, $max, $array, $equipo, $zona)
{
    ?>
    <table border="1px">
        <?php
        for ($i = $min; $i <= $max; $i++) {
            if ($i % 10 === 0) {
                echo '<tr>';
            }
            if ($array[$i] === 'X') {
                echo '<td bgcolor="red">' . $array[$i] . '</td>';
            } else {
                echo '<td><input type="checkbox" name="entradas[]" value="' . $i . '">' . aTarifas[$equipo][$zona] . '€</td>';
            }
            if ($i % 10 === 9) {
                echo '</tr>';
            }
        }
        ?>
    </table>
    <?php
    echo '<input id="comprar" type="submit" value="Comprar" name="comprar">';
}

/**
 * Funcion que realiza la compra de las entradas seleccionadas
 * @param
 * $equipo
 * @param $zona
 * @param $array
 * @return void
 */
function realizarCompra($equipo, $zona, $array)
{
    $totalidad = 0;
    $entradas = $_POST['entradas'];
    foreach ($entradas as $entrada) {
        $totalidad += aTarifas[$equipo][$zona];
        $array[$entrada] = 'X';
    }
    echo '<p id="messageTotal">Has comprado un total de ' . count($entradas) . ' entradas. El precio total es de: ' . $totalidad . ' €.</p>';
}
