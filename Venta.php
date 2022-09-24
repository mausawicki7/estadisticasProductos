<?php
class Venta{
    //Atributos
    private $nroVenta = 0;
    private $precioUnitario;
    private $producto;
    private $cantidadVendidos;
    private $mes;
    
    //Constructor
    public function __construct($unPrecio, $unProducto, $cant, $unMes){
         $this->nroVenta =+ 1;
         $this->precioUnitario = $unPrecio;
         $this->producto = $unProducto;
         $this->cantidadVendidos = $cant;
         $this->mes = $unMes;
    }
    
    //Modificadores
    public function setPrecio($unPrecio){
        $this->precioUnitario = $unPrecio;
    }
    
    public function setProducto($unProd){
        $this->producto = $unProd;
    }
    
    //Observadores
    public function getPrecio(){
        return $this->precioUnitario;
    }
    
    public function getProducto(){
        return $this->producto;
    }
    
    public function getCantVendidos(){
        return $this->cantidadVendidos;
    }
    
    public function getMes(){
        return $this->mes;
    }
    
    public function toString(){
        return "VENTA NRO.: ".$this->nroVenta.
        "\nMes: ".$this->mes.
        "\nNombre producto: ".$this->producto.
        "\nPrecio: ".$this->precioUnitario.
        "\nCantidad: ".$this->cantidadVendidos;
    }
}
