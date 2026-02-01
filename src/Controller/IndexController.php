<?php

namespace App\Controller;

use App\DTO\OrderDTO;
use App\Form\WaterOrderType;
use App\Telegram\TelegramMessageBuilder;
use App\Telegram\TelegramSender;
use Symfony\Bridge\Twig\Attribute\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/', name: 'index', methods: ['GET', 'POST'])]
#[Template('index.html.twig')]
class IndexController extends AbstractController
{
    public function __invoke(
        Request $request,
        TelegramMessageBuilder $messageBuilder,
        TelegramSender $telegramSender
    ): array|Response {

        $form = $this->createForm(WaterOrderType::class, new OrderDTO(), options: ['action' => $this->generateUrl('index')])
        ;
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            if ($form->get('website')->getData()) {
                // honeypot
                return $this->redirectToRoute('index');
            }
            /** @var OrderDTO $order */
            $order = $form->getData();

            $message = $messageBuilder->prepareTelegramMessage($order);


            return
                $telegramSender->send($message)
                     ? $this->redirectToRoute('success')
                     : $this->redirectToRoute('index');
        }
        return $this->render('index.html.twig', [
            'form' => $form,
        ]);
    }

}
