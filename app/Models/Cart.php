<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart
{
    public static function add(Productos $producto)
    {

        \Cart::session(userID())->add(array(
            'id' => $producto->id,
            'name' => $producto->nombre,
            'price' => $producto->precio,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $producto
        ));

    }
    public static function getCart(){

        $cart = \Cart::session(userID())->getContent();
        return $cart->sort();  
    }

    public static function getTotal(){
        return \Cart::session(userId())->getTotal();
    }

    public static function decrement($id) {
        $cartItem = \Cart::session(userId())->get($id);
    
        if ($cartItem && $cartItem->quantity <= 1) {
            // Eliminar el ítem si la cantidad es 1 o menos
            \Cart::session(userId())->remove($id);
        } else {
            // Decrementar la cantidad
            \Cart::session(userId())->update($id, [
                'quantity' => -1
            ]);
        }
    }
    //conteo articulos
    public static function totalArticulos(){
        return \Cart::session(userId())->getTotalQuantity();
    }
    
}
