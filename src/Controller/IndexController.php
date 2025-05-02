<?php

namespace App\Controller;

use App\Repository\PSProductDTORepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/index', name: 'app_index')]
    public function index(PSProductDTORepository $productRepository): Response
    {
        $products = $productRepository->findAll();
        $product = $productRepository->find(1);

        if ($product) {
            $product->setReference('new_reference');
            $product = $productRepository->updateReference($product->getId(), $product->getReference());
        }

        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
            'products' => $products,
            'product' => $product,
        ]);
    }
}
