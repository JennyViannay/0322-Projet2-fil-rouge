<?php

namespace App\Controller;

use App\Model\ModelManager;

class HomeController extends AbstractController
{
    /**
     * Display home page
     */
    public function index(): string
    {
        var_dump($_SESSION);
        $modelManager = new ModelManager();
        return $this->twig->render('Home/index.html.twig', [
            'models' => $modelManager->selectAll(),
        ]);
    }
}
