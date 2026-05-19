<?php
//potencia de un numero -----------------------
function potencia($num, $pot){
    //base
    if ($pot == 1){
        return $num;
    }else if($pot == 0){
        return 1;
    }
    return $num * potencia($num, $pot -1);
}

echo "Potencia 5 a la 4: " . potencia(5, 4) . "<br>";
echo "Potencia 3 a la 3: " . potencia(3, 3) . "<br><br>";

//mult dos enteros con suma
function multSuma($dat1, $dat2){
    //base
    if($dat2 == 1){
        return $dat1;
    }
    return $dat1 + multSuma($dat1, $dat2 - 1);
}

echo "Mult 3 x 5: " . multSuma(3, 5) . "<br>";
echo "Mult 5 x 8: " . multSuma(5, 8) . "<br><br>";

//contar caracteres en cadena

function cuentaCadena($cadena){
    $resto=substr($cadena, 1);
    //base
    if(strlen($cadena)== 1){
        return 1;
    }
    return 1 + cuentaCadena($resto);
}

echo "Numero de caracteres de 'HOLA': ". cuentaCadena("HOLA") . "<br>";
echo "Numero de caracteres de 'INCREIBLE': " . cuentaCadena("INCREIBLE") . "<br><br>";

//palindromo
function palinCadena($cadena){
    $first=$cadena[0];
    $last=$cadena[strlen($cadena)-1];
    $rest=substr($cadena, 1, -1);
    //base
    if(strlen($cadena) <= 1){
        return true;
    }
    if($first == $last){
        return palinCadena($rest);
    } else {
        return false;
    }
}

echo "Radar palindromo? " . palinCadena("radar") . "<br><br>";

//algoritmo euclides MCD
function euclidesDivisor($num1, $num2){
    //manejo division entre 0
    if ($num2 == 0){
        return $num1;
    }
    $res = $num1 % $num2;
    //base
    if ($res == 0){
        return $num2;
    }
    return euclidesDivisor($num2, $res);
}

echo "MCD de 48 y 18 con euclides: " . euclidesDivisor(48, 18) . "<br><br>";

//decimal a binario
function deciBinario($num){
    $entero = intdiv($num, 2); //entero de la division
    $res = $num % 2;
    //base
    if ($num == 0){
        return 0;
    } else if ($num == 1){
        return 1;
    }

    if ($res > 0){
        return deciBinario($entero) . 1;
    } else {
        return deciBinario($entero) . 0;
    }
}

echo "Binario de 13: " . deciBinario(13) . "<br><br>";

//suma de arreglo
function sumaArreglo($arreglo){
    $primero = $arreglo[0];
    $resto = array_slice($arreglo, 1);
    //base
    if (count($arreglo) == 1) return $primero;

    return $primero + sumaArreglo($resto);
}

$arreglo1 = [5, 5, 5, 5, 4];
echo "Suma de arreglo 5,5,5,5,4: ". sumaArreglo($arreglo1) . "<br><br>";

//busca elemento en arreglo
function buscaArreglo($arreglo, $busca){
    //base
    if(count($arreglo) == 0) return "No se encuentra";

    $primero = $arreglo[0];
    $resto = array_slice($arreglo, 1);
    
    if($primero == $busca) return "Si se encuentra";

    return buscaArreglo($resto, $busca);
}

echo "Busca 4 en anterior arreglo: " . buscaArreglo($arreglo1, 4) . "<br>";
echo "Busca 6 en anterior arreglo: " . buscaArreglo($arreglo1, 6) . "<br><br>";

//cuenta vocales en cadena
function vocalCadena($cadena){
    //base
    if (strlen($cadena) == 0) return 0;

    $primero = $cadena[0];
    $resto = substr($cadena, 1);
    if(stripos("aeiou", $primero) !== false) return 1 + vocalCadena($resto); //si no es identico a false si encuentra una vocal, para que posicion 0 no cuente como false
    return 0 + vocalCadena($resto);
}

echo "Vocales en 'ESTUPENDO': " . vocalCadena("ESTUPENDO"). "<br><br>";

//suma de pares desde 0 a n
function sumaPares($num){
    //base
    if ($num <= 1) return 0;

    if (($num % 2)== 0) return $num + sumaPares($num - 1);
    return sumaPares($num - 1);
}

echo "Suma de pares hasta 10: " . sumaPares(10) . "<br>";
echo "Suma de pares hasta 30: " . sumaPares(30);