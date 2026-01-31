<?php

namespace App\Controller;

use App\Form\WaterOrderType;
use Symfony\Bridge\Twig\Attribute\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/success', name: 'success', methods: ['GET'])]
#[Template('success.html.twig')]
class SuccessController extends AbstractController
{
    public function __invoke(Request $request): array|Response
    {
        return [];
    }
}
