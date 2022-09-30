<?php

//Función para precargar el array $prodMasVendido
function preCargarArrayProdMasVendido(){
        $prodMasVendido = [];
        $prodMasVendido[0] = array("prod" => "Heladera Gama", "precioProd"=>50300, "cantProd"=>10);
        $prodMasVendido[1] = array("prod" => "Televisor Samsung", "precioProd"=>70500, "cantProd"=>9);
        $prodMasVendido[2] = array("prod" => "Celular iPhone", "precioProd"=>234220, "cantProd"=>13);
        $prodMasVendido[3] = array("prod" => "Lavarropas Drean", "precioProd"=>81400, "cantProd"=>10);
        $prodMasVendido[4] = array("prod" => "Estufa Electrica Liliana", "precioProd"=>8900, "cantProd"=>20);
        $prodMasVendido[5] = array("prod" => "Equipo de Audio Sony", "precioProd"=>96000, "cantProd"=>8);
        $prodMasVendido[6] = array("prod" => "Batidora Eléctrica Gama", "precioProd"=>6600, "cantProd"=>22);
        $prodMasVendido[7] = array("prod" => "Microondas LG", "precioProd"=>65120, "cantProd"=>12);
        $prodMasVendido[8] = array("prod" => "Lavavajillas BGH", "precioProd"=>73000, "cantProd"=>9);
        $prodMasVendido[9] = array("prod" => "SmartWatch Samsung", "precioProd"=>29000, "cantProd"=>17);
        $prodMasVendido[10] = array("prod" => "Aire Acondicionado Hyundai", "precioProd"=>58500, "cantProd"=>10);
        $prodMasVendido[11] = array("prod" => "Parlante JBL Flip 6", "precioProd"=>32000, "cantProd"=>1);
        return $prodMasVendido;
}

//Función para precargar el array $ventas
function preCargarArrayVentas($prodMasVendido){
    $ventas = [];
    $longitud = count($prodMasVendido);
   
    for($i=0; $i<$longitud; $i++){
        $precioProd = $prodMasVendido[$i]["precioProd"];
        $cantProd = $prodMasVendido[$i]["cantProd"];
        $montoTotalVenta = $precioProd * $cantProd;
        $ventas[$i] = $montoTotalVenta;
    }
    return $ventas;   
}

//Función que ingresa una venta al array $ventas (que es solo modificar el monto)
function ingresarVenta($ventas, $indiceMes, $precio, $cantProductos){
    //Incremento el monto de la venta del mes correspondiente en el arreglo $ventas
    $ventas[$indiceMes] += ($precio*$cantProductos);
    return $ventas;
}
   

//Función que chequea si la venta ingresada tiene mayor monto de venta que el producto ya existente en el $indiceMes ingresado
//Si es así, actualiza el array prodMasVendido y lo devuelve, caso contrario devuelve el mismo array ingresado sin modificaciones.
function actualizarProdMasVendido($ventas, $indiceMes, $producto, $precio, $cantProductos, $prodMasVendido){
        
        $montoActualVenta = $precio*$cantProductos;
        
        $montoProdMasVendido = $prodMasVendido[$indiceMes]["precioProd"] * $prodMasVendido[$indiceMes]["cantProd"];
        
        //Si el monto actual de la venta recién realizada es mayor al monto total del producto mas vendido, actualizo el prod mas vendido
        if($montoActualVenta > $montoProdMasVendido){
            $prodMasVendido[$indiceMes]["prod"] = $producto;
            $prodMasVendido[$indiceMes]["precioProd"] = $precio;
            $prodMasVendido[$indiceMes]["cantProd"] = $cantProductos;
            echo("Se actualizó el prodMasVendido!!!\n");
        }
        
    return $prodMasVendido;
}


//Función que recibe el arreglo de ventas y retorna el mes que mayor monto de ventas tuvo
function mesConMayorMontoDeVentas($ventas){
    $longitud = count($ventas);
    $mayorMonto = 0;
   
    for($i=0; $i<$longitud; $i++){
        if($ventas[$i] > $mayorMonto){
            $mayorMonto = $ventas[$i];
            $indiceMesMayorVentas = $i;
        }
   
    }
    return $indiceMesMayorVentas; 
}

//Función que recibe el arreglo de ventas y un monto, devuelve el primer mes del arreglo ventas que supero el monto
//ingresado por parámetro
function primerMesQueSuperaMontoVentas($ventas, $montoASuperar){
    $longitud = count($ventas);
    $encontrado = false;
    $i = 0;
    $indiceDelMesQueSuperaElMonto = -1;

    while(!$encontrado && $i<$longitud){
        if($ventas[$i]>$montoASuperar){
            $indiceDelMesQueSuperaElMonto = $i;
            $encontrado = true;
        }
        $i++;
    }

    return $indiceDelMesQueSuperaElMonto;
}

//Función auxiliar para el metodo de ordenamiento usort, para arreglar el array prodMasVendidos
function compara_monto($a, $b){
    return $a['montoVenta'] < $b['montoVenta'];
 }

//Función que devuelve el array $prodMasVendidos ordenado de mayor a menor por el campo montoVenta
function verProductosMasVendidos($prodMasVendidos){
    $longitudMasVendidos = count($prodMasVendidos);
    for($i=0; $i<$longitudMasVendidos; $i++){
        $montoVenta = $prodMasVendidos[$i]["precioProd"] * $prodMasVendidos[$i]["cantProd"];
        //Agrego nuevo campo montoVenta a cada elemento del array para poder ordenarlos por ese atributo
        $prodMasVendidos[$i]["montoVenta"] = $montoVenta; 
    }
    uasort($prodMasVendidos, 'compara_monto');
    
    return $prodMasVendidos;
}

//Funciones Auxiliares
//Función que al ingresar un nombre (string) de un mes, retorna el indice del mes
function convertirMesAIndice($unNombreMes){
    $nombreEnMayus = strtoupper($unNombreMes);
    
    switch ($nombreEnMayus) {
        case 'ENERO':
            $indiceMes = 0;
            break;
        case 'FEBRERO':
            $indiceMes = 1;
            break;
        case 'MARZO':
            $indiceMes = 2;
            break;
        case 'ABRIL':
            $indiceMes = 3;
            break;
        case 'MAYO':
            $indiceMes = 4;
            break;
        case 'JUNIO':
            $indiceMes = 5;
            break;
        case 'JULIO':
            $indiceMes = 6;
            break;
        case 'AGOSTO':
            $indiceMes = 7;
            break;
        case 'SEPTIEMBRE':
            $indiceMes = 8;
            break;
        case 'OCTUBRE':
            $indiceMes = 9;
            break;
        case 'NOVIEMBRE':
            $indiceMes = 10;
            break;
        case 'DICIEMBRE':
            $indiceMes = 11;
            break;
        
        default:
            print("Debe ingresar correctamente el nombre del mes..");
            break;
    }
    return $indiceMes;
}

//Función que al ingresar un indice de mes, retorna el respectivo nombre 
function convertirIndiceAMes($unIndiceMes){
    
    switch ($unIndiceMes) {
        case '0':
            $nombreMes = 'ENERO';
            break;
        case '1':
            $nombreMes = 'FEBRERO';
            break;
        case '2':
            $nombreMes = 'MARZO';
            break;
        case '3':
            $nombreMes = 'ABRIL';
            break;
        case '4':
            $nombreMes = 'MAYO';
            break;
        case '5':
            $nombreMes = 'JUNIO';
            break;
        case '6':
            $nombreMes = 'JULIO';
            break;
        case '7':
            $nombreMes = 'AGOSTO';
            break;
        case '8':
            $nombreMes = 'SEPTIEMBRE';
            break;
        case '9':
            $nombreMes = 'OCTUBRE';
            break;
        case '10':
            $nombreMes = 'NOVIEMBRE';
            break;
        case '11':
            $nombreMes = 'DICIEMBRE';
            break;
        
        default:
            print("Debe ingresar correctamente el indice del mes..");
            break;
    }
    return $nombreMes;
}

function verInfoMes($indiceMes, $arrayProdMasVendido, $arrayVentas){
            $nombreMes = convertirIndiceAMes($indiceMes);
            echo("<".$nombreMes.">\n");
            echo("El producto con mayor monto de venta: ".$arrayProdMasVendido[$indiceMes]["prod"]."\n");
            echo("Cantidad de productos vendidos: ".$arrayProdMasVendido[$indiceMes]["cantProd"]."\n");
            echo("Precio unitario: $".$arrayProdMasVendido[$indiceMes]["precioProd"]."\n");
            echo("Monto de venta del producto: $".$arrayVentas[$indiceMes]."\n");
}

function menuOpciones($arrayVentas, $arrayProdMasVendido){
    $salir = false;

    while(!$salir){
        //print no es una función, es una construccion del lenguaje, se le puede pasar un único argumento y siempre devuelve el valor 1
        //echo no es una función, es una construccion del lenguaje, acepta mas de un de argumento y siempre devuelvo el valor nulo
        //print_r es una función, nos da info detallada sobre el parámetro que puede ser facilmente comprensible por humanos 

        echo("\n1. Ingresar una venta\n");
        echo("2. Mes con mayor monto de ventas\n");
        echo("3. Primer mes que supera un monto de ventas\n");
        echo("4. Informacion de un mes\n");
        echo("5. Productos mas vendidos ordenados\n");
        echo("6. Salir\n");

    
        try {
        echo("Ingresa una opcion:\n");
        $opcion = readline();
    
        switch ($opcion) {
        case '1':
            echo("Seleccionaste (1) INGRESAR UNA VENTA\n");
                print("Ingrese nombre del mes:");
                $nombreMes = readline();
                $indiceMes = convertirMesAIndice($nombreMes);
    
                print("Ingrese nombre del producto:");
                $producto = readline();
    
                print("Ingrese el precio del producto:");
                $precio = readline();
    
                print("Ingrese la cantidad de productos:");
                $cantProductos = readline();
                
                //Imprimo para ver el array antes de actualizar el monto
                print_r($arrayVentas); 
                
                //Llamo a la función ingresarVenta que me devuelve el array $ventas con el monto del mes correspondiente actualizado
                $arrayVentas = ingresarVenta($arrayVentas, $indiceMes, $precio, $cantProductos);
                print_r($arrayVentas);
                
                //Imprimo para ver el array antes de actualizar el prodMasVendido
                print_r($arrayProdMasVendido);
                
                //Invoco a la función actualizarProdMasVendido pasandole el array $ventas actualizado y todos los parametros que necesita para actualizar el prodMasVendido en caso de que haya que actualizarlo
                $arrayProdMasVendido = actualizarProdMasVendido($arrayVentas, $indiceMes, $producto, $precio, $cantProductos, $arrayProdMasVendido);
                print_r($arrayProdMasVendido);
                break;
            
        case '2':
            echo("Seleccionaste (2) MES CON MAYOR MONTO DE VENTAS\n");
            $indiceMesConMasVentas = mesConMayorMontoDeVentas($arrayVentas);
            verInfoMes($indiceMesConMasVentas, $arrayProdMasVendido, $arrayVentas);
            break;
        
        case '3': 
            echo("Seleccionaste (3) PRIMER MES QUE SUPERA UN MONTO DE VENTAS\n");
            echo("Ingresa el monto:\n");
            $montoIngresado = readline();
            $indiceDelMesQueSuperaElMonto = primerMesQueSuperaMontoVentas($arrayVentas, $montoIngresado);
            if($indiceDelMesQueSuperaElMonto != -1){
                verInfoMes($indiceDelMesQueSuperaElMonto, $arrayProdMasVendido, $arrayVentas);
            }else{
                echo("Error.\n");
            }
            break;
        
        case '4': 
            echo("Seleccionaste (4) VER INFORMACION DE UN MES\n");
            echo("Ingresa el nombre del mes que deseas ver la información:\n");
            $nombreMes = readline();
            $indiceMes = convertirMesAIndice($nombreMes);
            verInfoMes($indiceMes, $arrayProdMasVendido, $arrayVentas);
            break;
        
        case '5':
            echo("Seleccionaste (5) PRODUCTOS MAS VENDIDOS ORDENADOS DE MAYOR A MENOR\n");
            $prodMasVendidosOrdenados = verProductosMasVendidos($arrayProdMasVendido, $arrayVentas);
            echo("Arreglo ordenado de mayor a menor: \n");
            print_r($prodMasVendidosOrdenados);
            break;
            
        case '6':
            echo("Saliste del menú\n");
            $salir = true;
            break;
        
        default:
            echo("Solo se admiten opciones del 1 al 6\n");
    }
    
    } catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }
}
}

$arrayProdMasVendido = preCargarArrayProdMasVendido();
$arrayVentas = preCargarArrayVentas($arrayProdMasVendido);
menuOpciones($arrayVentas, $arrayProdMasVendido);


?>
