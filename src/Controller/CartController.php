<?php

namespace App\Controller;

use App\Model\ModelManager;
use App\Service\CartService;

class CartController extends AbstractController 
{
    public function index()
    {
        $results = [];
        $modelManager = new ModelManager();
        $cartService = new CartService();

        $cart = $_SESSION['cart'] ?? []; 
        foreach ($cart as $id => $quantity) {
            $product = $modelManager->selectOneById(intval($id));
            $results[] = [
                'product' => $product,
                'quantity' => $quantity,
            ];
        }
        $cartService->countProductInCart();
        $cartService->totalPriceCart();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cartService->remove(intval($_POST['delete_id']));
        }
        return $this->twig->render('Cart/index.html.twig', [
            'cart' => $results,
        ]);
    }
}