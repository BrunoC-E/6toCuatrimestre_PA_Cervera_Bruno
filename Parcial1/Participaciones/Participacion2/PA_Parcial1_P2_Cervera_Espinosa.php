<?php

//cuenta numero especifico en un arreglo --------------------------------------------
function cuentoArreglo($arreglo, $num){
    //base
    if(count($arreglo) == 0){
        return;
    }

    $primero = $arreglo[0]; //primer numero
    $resto = array_slice($arreglo, 1); //resto de arreglo sin primero
    if ($primero == $num){
        return 1 + cuentoArreglo($resto, $num);
    } else {
        return cuentoArreglo($resto, $num);
    }
}

$array = [5,5,5,6,7,5,6,3,4];

echo "Cantidad de numero '5' en el arreglo: " . cuentoArreglo($array, 5) . "<br>";

//numero menor en un arreglo ---------------------------------------------

function menorArreglo($arreglo){
    //base
    if(count($arreglo) <= 1){
        return $arreglo[0];
    }
    $primero = $arreglo[0];
    $resto = menorArreglo(array_slice($arreglo, 1));
    if($primero < $resto){
        return $primero;
    } else {
        return $resto;
    }

}

echo "Menor en arreglo: " . menorArreglo($array) . "<br>";

//repetir una cadena de texto ----------------------------------

function repetirCadena($cadena, $num){
    //base
    if(strlen($cadena) == 0 || $num == 0){
        return "";
    }

    echo $cadena . " ";
    return repetirCadena($cadena, ($num-1));

}

repetirCadena("HOLA", 5);
echo "<br>";

//contar numeros positivos (0 cuenta como positivo) --------------------------------------
function numerosPositivos($arreglo){
    //base
    if(count($arreglo) == 0){
        return;
    }

    $primero = $arreglo[0]; //primer numero
    $resto = array_slice($arreglo, 1); //resto de arreglo sin primero
    if ($primero <= 0){
        return numerosPositivos($resto);
    } else {
        return 1 + numerosPositivos($resto);
    }

}

$array2 = [-1, -2, -3, 5, 3, 2, 4, -1, 2];
echo "Numeros positivos en el arreglo: ". numerosPositivos($array2) . "<br>";

//suma de los cuadrados de numeros hasta un limite -----------------------------

function sumaCuadrados($num){
    if ($num < 1){
        return;
    }

    return ($num * $num) + sumaCuadrados($num - 1);
}

echo "Suma de cuadrados hasta un numero: " . sumaCuadrados(3);
