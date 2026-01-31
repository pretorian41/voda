<?php

namespace App\Controller;

use App\DTO\OrderDTO;
use App\Form\WaterOrderType;
use Symfony\Bridge\Twig\Attribute\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/', name: 'index', methods: ['GET', 'POST'])]
#[Template('index.html.twig')]
class IndexController extends AbstractController
{
    public function __invoke(Request $request): array|Response
    {

        $form = $this->createForm(WaterOrderType::class, new OrderDTO(), options: ['action' => $this->generateUrl('index')])
        ;
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            return $this->redirectToRoute('success');
        }
        return $this->render('index.html.twig', [
            'form' => $form,
        ]);
    }

}
