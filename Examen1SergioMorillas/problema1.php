<?php

// Apartado 1, valor del inventario
$inventario = [
    'producto_1' => ['nombre' => 'Camiseta', 'precio' => 20, 'cantidad' => 50, 'categoria' => 'ropa'],
    'producto_2' => ['nombre' => 'Pantalones', 'precio' => 40, 'cantidad' => 30, 'categoria' => 'ropa'],
    'producto_3' => ['nombre' => 'Zapatos', 'precio' => 60, 'cantidad' => 20, 'categoria' => 'calzado'],
    'producto_4' => ['nombre' => 'Gorra', 'precio' => 15, 'cantidad' => 100, 'categoria' => 'accesorios'],
    'producto_5' => ['nombre' => 'Bolso', 'precio' => 50, 'cantidad' => 10, 'categoria' => 'accesorios']
    ];
    
function calcularElValor($array){
    $sum = 0;
    foreach ($array as $key => $value) {
        $cantidad = $value["cantidad"] * $value["precio"];
        $sum+=$cantidad;
    }
    return $sum;
}
function productosCategoria($array){
    $categorias= [];
    foreach ($array as $key => $value) {
        if (isset($categorias[$value["categoria"]])) {
            $categorias[$value["categoria"]] +=1;
        } else{
            $categorias[$value["categoria"]] =1;
        }

    }
    return $categorias;
}
function mostrarCategoriasTexto($array) {
    foreach ($array as $key => $value) {
        if ($value == 0) {
            echo "Para la categoria $key no existen productos aun\n";
        } 
        elseif ($value == 1) {
            echo "Para la categoria $key existe $value producto\n";
        } else {
            echo "Para la categoria $key existen $value productos\n";
        }
    }
}
function mostrarCategorias($array) {
    foreach ($array as $key => $value) {
        echo "$key\t\t\t$value\n";
    }
}
echo "========================APARTADO 1========================\n";
echo calcularElValor($inventario)."\n";
echo "========================APARTADO 2.1========================\n";
mostrarCategoriasTexto(productosCategoria($inventario));
echo "========================APARTADO 2.2========================\n";
mostrarCategorias(productosCategoria($inventario));