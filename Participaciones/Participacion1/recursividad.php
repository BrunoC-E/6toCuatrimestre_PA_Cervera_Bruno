<?php

function factorial($n){
    //Caso base
    if($n == 0 || $n == 1){
        return 1; //Retorna 1 si n es 1 o 0, evitando ciclo infinito
    }
    //Caso recursivo
    return $n * factorial($n - 1); //Llama a la función con n-1
    //Multiplica n por el resultado de factorial(n-1) hasta llegar al caso base
}

echo "El factorial de 5 es: " . factorial(5); //Imprime el resultado de factorial de 5, que es 120
//factorial(5) = 5 * factorial(4)
//factorial(4) = 4 * factorial(3)
//factorial(3) = 3 * factorial(2)
//factorial(2) = 2 * factorial(1)
//factorial(1) = 1 (caso base)

echo "<br>"; //Agrega un salto de línea para separar los resultados

function suma($n){
    //Caso base
    if($n == 0){
        return 0; //Retorna 0 si n es 0, evitando ciclo infinito
    }
    //Caso recursivo
    return $n + suma($n - 1); //Llama a la función con n-1
    //Suma n al resultado de suma(n-1) hasta llegar al caso base
}

echo "La suma de los los primeros 5 numeros naturales es: " . suma(5); //Imprime el resultado de la suma de los primeros 5 números, que es 15
//suma(5) = 5 + suma(4)
//suma(4) = 4 + suma(3)
//suma(3) = 3 + suma(2)
//suma(2) = 2 + suma(1)
//suma(1) = 1 + suma(0)
//suma(0) = 0 (caso base)

echo "<br>";

function contador($n){
    if($n < 0){
        return;
    }

    return contador($n - 1) . $n . "<br>"; //Llama a la función con n-1 y concatena el resultado con n
}

echo "Contador regresivo desde 20: <br>" . contador(20); //Imprime el resultado del contador regresivo desde 5


echo "<br>";

//------------------------------------------------------------------------------------------------------------
//ACTIVIDAD PARTICIPACION

function fibonacci($n){
    $anterior= 0;
    $actual= 1;
    $temp;

    echo $anterior . " ";

    while($actual <= $n){
    echo $actual . " ";
    $temp = $anterior + $actual;
    $anterior = $actual;
    $actual = $temp;
    }
}

fibonacci(100);

echo "<br>";

function invertirCadena($cadena){
    $resultado = "";
    $long = strlen($cadena);

    for ($i = $long - 1; $i >= 0; $i--){
        $resultado = $resultado . $cadena[$i];
    }
    return $resultado;
}

echo invertirCadena("HOLA");