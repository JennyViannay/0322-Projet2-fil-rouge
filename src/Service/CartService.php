<?php

namespace App\Service;

use App\Model\ModelManager;
use App\Model\ProductManager;

class CartService
{
    public function add(int $id)
    {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        if (!empty($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]++;
        } else {
            $_SESSION['cart'][$id] = 1;
        }
    }

    public function remove(int $id)
    {
        $cart = $_SESSION['cart'];
        if (!empty($cart[$id])) {
            $cart[$id]--;
            if ($cart[$id] === 0) {
                unset($cart[$id]);
            }
        }
        $_SESSION['cart'] = $cart;
        header('Location: /cart');
    }

    public function countProductInCart()
    {
        $total = 0;
        $cart = $_SESSION['cart'] ?? [];
        foreach ($cart as $id => $quantity) {
            $total +=  $quantity;
        }
        $_SESSION['cart']['nb_articles'] = $total;
        return $total;
    }

    public function totalPriceCart()
    {
        $modelManager = new ModelManager();  
        $total = 0;
        $cart = $_SESSION['cart'] ?? [];
        foreach ($cart as $id => $quantity) {
            $product = $modelManager->selectOneById(intval($id));
            // var_dump($product); die;
            $total += ($product['price'] * $quantity);
        }
        $_SESSION['cart']['total_cart'] = $total;
        return $total;
    }
}
