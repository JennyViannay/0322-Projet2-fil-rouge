<?php

namespace App\Service;

use App\Model\ModelManager;
use App\Model\ProductManager;

class CartService
{

    private $modelManager;
    private $productManager;

    public function __construct(ModelManager $modelManager, ProductManager $productManager)
    {
        $this->modelManager = $modelManager;
        $this->productManager = $productManager;
    }

    public function add($id)
    {
        $product = $this->productManager->selectOneById($id);
        if (!empty($_SESSION['cart'][$id])) {
            $newCount = intval($product['quantity']) - intval($_SESSION['cart'][$product['id']] + 1);
            if ($newCount >= 0) {
                $_SESSION['cart'][$id]++;
            } else {
                $_SESSION['flash_message'] = ["Article " . $product['model'] . " is only available in " . $product['quantity'] . " examples !"];
                header('Location:/cart');
            }
        } else {
            $_SESSION['cart'][$id] = 1;
        }
        // $_SESSION['count'] = $this->countArticle();
        // header('Location:/home/showArticle/' . $id);
    }
}
