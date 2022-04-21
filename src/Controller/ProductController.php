<?php

namespace App\Controller;

use App\Model\ModelManager;
use App\Model\ProductManager;

class ProductController extends AbstractController
{
    /**
     * Display products by model page
     */
    public function index(string $slug): string
    {
        $modelManager = new ModelManager();
        $productManager = new ProductManager();

        $model = $modelManager->selectOneBySlug($slug);
        $products = $productManager->selectAllByModel($model['id']);

        // var_dump($products);
        return $this->twig->render('Product/index.html.twig', [
            'model' => $model,
            'products' => $products,
        ]);
    }
}