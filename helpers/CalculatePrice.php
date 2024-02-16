<?php

class CalculatePrice {
    
    public static function TVA($product) {
        $product_price = $product->product_price;
        $product_tva = $product->product_tva;
        // Calculer la TVA
        $tva = $product_price * ($product_tva / 100);
        // Calculer le prix TTC
        $prix_ttc = $product_price + $tva;
        $prix_ttc = number_format($prix_ttc, 2, '.', ' ');
        
        return $prix_ttc;
    }
}