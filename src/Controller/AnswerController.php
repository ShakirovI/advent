<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Answers;
use App\Entity\Questions;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class AnswerController extends AbstractController
{
    public function answer(ManagerRegistry $doctrine, int $id = 0): Response
    {
        $entityManager = $doctrine->getManager();
        $answer = $entityManager->getRepository(Answers::class)->find($id);
        $question = $entityManager->getRepository(Questions::class)->find($id);

        return $this->render('answer/result.html.twig', [
            'questionText' => $question,
            'answerText' => $answer,
        ]);
    }
}
