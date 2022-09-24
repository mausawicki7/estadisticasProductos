<?php
//include('Venta.php');

function preCargarArrayProdMasVendido(){
        $prodMasVendido = [];
        $prodMasVendido[0] = array("prod" => "Heladera Gama", "precioProd"=>5300, "cantProd"=>20);
        $prodMasVendido[1] = array("prod" => "Televisor Samsung", "precioProd"=>70500, "cantProd"=>9);
        $prodMasVendido[2] = array("prod" => "Celular iPhone", "precioProd"=>234220, "cantProd"=>3);
        $prodMasVendido[3] = array("prod" => "Lavarropas Drean", "precioProd"=>81400, "cantProd"=>10);
        $prodMasVendido[4] = array("prod" => "Estufa Electrica Liliana", "precioProd"=>8900, "cantProd"=>20);
        $prodMasVendido[5] = array("prod" => "Equipo de Audio Sony", "precioProd"=>96000, "cantProd"=>8);
        $prodMasVendido[6] = array("prod" => "Batidora Eléctrica Gama", "precioProd"=>6600, "cantProd"=>22);
        $prodMasVendido[7] = array("prod" => "Microondas LG", "precioProd"=>65120, "cantProd"=>12);
        $prodMasVendido[8] = array("prod" => "Lavavajillas BGH", "precioProd"=>73000, "cantProd"=>9);
        $prodMasVendido[9] = array("prod" => "SmartWatch Samsung", "precioProd"=>29000, "cantProd"=>17);
        $prodMasVendido[10] = array("prod" => "Aire Acondicionado Hyundai", "precioProd"=>120000, "cantProd"=>11);
        $prodMasVendido[11] = array("prod" => "Parlante JBL Flip 6", "precioProd"=>32000, "cantProd"=>90);
        return $prodMasVendido;
}

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

function ingresarVenta($ventas){
    print("Ingrese nombre del mes:");
    $nombreMes = readline();
    $indiceMes = convertirMesAIndice($nombreMes);
    
    print("Ingrese nombre del producto:");
    $producto = readline();
    
    print("Ingrese el precio del producto:");
    $precio = readline();
    
    print("Ingrese la cantidad de productos:");
    $cantProductos = readline();
    
    //Creo una nueva instancia de la clase Venta con sus respectivos atributos (Esto era en el caso de utilizar la clase Venta)
    // $nuevaVenta = new Venta($precio, $producto, $cantProductos, $indiceMes); 
    
    //Sumo el monto de la venta en el mes correspondiente en el arreglo ventas[]
    $ventas[$indiceMes] += $precio;
    
    return $ventas;
}

function verVentas($ventas, $unIndiceMes){
    
}

//Auxiliares
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

//Función que recibe el arreglo de ventas y retorna el mes que mayor monto de ventas tuvo
function mesConMayorMontoDeVentas($ventas){
    $longitud = count($ventas);
   
    for($i=0; $i<$longitud; $i++){
        $anterior = $ventas[$i]; 
        $siguiente = $ventas[$i+1]; //consultar el error undefined offset
        if($anterior < $siguiente){
            $mayorMonto = $siguiente;
            $indiceMesMayorVentas = $i;
        }
   
    }
    return $indiceMesMayorVentas; 
}

//Función que recibe el arreglo de ventas y un monto, devuelve el primer mes del arreglo ventas que supero el monto
//ingresado por parámetro
function primerMesQueSuperaMontoVentas($ventas, $montoASuperar){
    $longitud = count($ventas);
    $bandera = true;
    $i = 0;
    
    while($bandera){
        if($ventas[$i]>$montoASuperar){
            $indiceDelMesQueSuperaElMonto = $i;
            $bandera = false;
        }
        $i++;
    }

    return $indiceDelMesQueSuperaElMonto;
}

function verProductosMasVendidos($prodMasVendidos, $ventas){ //REVISAR METODO
        $longitudVentas = count($ventas);
        $longitudMasVendidos = count($prodMasVendidos);
        $prodMasVendidosOrdenados = [];
        arsort($ventas);
        
        for($i=0; $i<$longitudVentas; $i++){
            for($j=0; $j<$longitudMasVendidos; $j++){
                
               if($i == $j){
               array_push($prodMasVendidosOrdenados); // ESTO NO ESTA OK
           }
            }
           //$nombreProd = $prodMasVendidos[$i]["prod"];

        }
        //aca la idea es matchear el indice del arreglo $ventas 
        //con el indice del arreglo $prodMasVendido

}

//MAIN
$arrayProdMasVendidoCargado = preCargarArrayProdMasVendido();
$arrayVentasCargado = preCargarArrayVentas($arrayProdMasVendidoCargado);

/////////Solo para debugging/////////
print_r($arrayVentasCargado);
print_r($arrayProdMasVendidoCargado);
////////////////////////////////////

menuOpciones($arrayVentasCargado, $arrayProdMasVendidoCargado);


function menuOpciones($arrayVentasCargado, $arrayProdMasVendidoCargado){
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
        print_r("Ingresa una opcion:");
        $opcion = readline();
    
        switch ($opcion) {
        case '1'://READY!
            print_r("Seleccionaste (1) INGRESAR UNA VENTA");
            $ventaIngresada = ingresarVenta($arrayVentasCargado);
            print_r($ventaIngresada);
            break;
            
        case '2'://READY!
            print_r("Seleccionaste (2) MES CON MAYOR MONTO DE VENTAS");
            $indiceMesConMasVentas = mesConMayorMontoDeVentas($arrayVentasCargado);
            $mesConMasVentas = convertirIndiceAMes($indiceMesConMasVentas);
            print_r("El mes con mayor monto de ventas es: ".$mesConMasVentas);
            break;
        
        case '3': //READY!
            print_r("Seleccionaste (3) PRIMER MES QUE SUPERA UN MONTO DE VENTAS");
            print_r("Ingresa el monto:");
            $opcionMenu3 = readline();
            $indiceDelMesQueSuperaElMonto = primerMesQueSuperaMontoVentas($arrayVentasCargado, $opcionMenu3);
            $mesConvertido = convertirIndiceAMes($indiceDelMesQueSuperaElMonto);
            print_r("El primer mes que supera el monto de ".$opcionMenu3." en ventas, es: ".$mesConvertido);
            break;
        
        case '4': //HACEEEEEEERRRRRR!!!! 
            print_r("Seleccionaste (4) VER INFORMACION DE UN MES");
            print_r("Ingresa el nombre del mes que deseas ver la información:");
            $opcionMenu4 = readline();
            //Primero convierto el mes a su correspondiente indice
            $indiceMes = convertirMesAIndice($opcionMenu4);
            
            //Luego le paso el indice del mes a ver ventas
            verVentas($arrayVentasCargado, $indiceMes);
            break;
        
        case '5':
            print_r("Seleccionaste (5) PRODUCTOS MAS VENDIDOS ORDENADOS DE MAYOR A MENOR");
            verProductosMasVendidos($arrayProdMasVendidoCargado, $arrayVentasCargado); //REVISAR
            break;
            
        case '6':
            print_r("Saliste del menú");
            $salir = true;
            break;
        
        default:
            print_r("Solo se admiten opciones del 1 al 6");
    }
    
    } catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }
}
}

?>
