<?php

namespace App\Controller;

use App\Model\ModelManager;
use App\Service\CartService;

class HomeController extends AbstractController
{
    /**
     * Display home page
     */
    public function index(): string
    {
        var_dump($_SESSION);
        $modelManager = new ModelManager();
        $cartService = new CartService();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // petite verif 
            $cartService->add($_POST['article_id']);
        }

        return $this->twig->render('Home/index.html.twig', [
            'models' => $modelManager->selectAll(),
        ]);
    }
}
