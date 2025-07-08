<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class SousThemeController extends AbstractController
{
    #[Route('/sous/theme', name: 'app_sous_theme')]
    public function index(): Response
    {
        return $this->render('sous_theme/index.html.twig', [
            'controller_name' => 'SousThemeController',
        ]);
    }
}
