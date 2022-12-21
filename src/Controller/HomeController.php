<?php

namespace App\Controller;
use App\Entity\Instrument;
use App\Form\InstrumentType;
use App\Repository\InstrumentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(InstrumentRepository $InstrumentRepository): Response
    {
        return $this->render('home/index.html copy.twig', [
            'inst' => $InstrumentRepository->findAll(),
        ]);
    }
}
