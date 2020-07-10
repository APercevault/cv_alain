<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Formation;
use App\Entity\Exp;

class MainController extends AbstractController
{
    /**
     * @Route("/main", name="main")
     */
    public function index(Request $request)
    {
        // Récupere la formation actuelle dans la BDD
        $formation = $this->getDoctrine()
            ->getRepository(Formation::class)
            ->find(1);
        $formationActuelle = $formation->getContent();
        if (!$formationActuelle) {
            throw $this->createNotFoundException(
                'No formations found for id ' . 1
            );
        }

        // Récupere toutes les expériences de la bdd
        $experiences = $this->getDoctrine()
            ->getRepository(Exp::class)
            ->findAll();

        // Récupere toutes les formations de la bdd
        $formations = $this->getDoctrine()
            ->getRepository(Formation::class)
            ->findAll();


         $name = $request->get('name');
         $email = $request->get('email');
         $message = $request->get('message');


        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'formation' => $formationActuelle,
            'formations' => $formations,
            'experience' => $experiences
        ]);
    }
}
