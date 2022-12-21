<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
#[Route('/message')]
class ContactController extends AbstractController
{
private $formFactory;
    public function __constructor(FormFactoryInterface $formFactory){
         $this->formFactory =$formFactory;
    }
    #[Route('/new', name: 'message_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contact);
            $entityManager->flush();
            return $this->redirectToRoute('message_new');

        }

        return $this->render('contact/new.html.twig', [
            'Contact' => $contact,
            'form' => $form->createView(),
        ]);
    }
}
?>
