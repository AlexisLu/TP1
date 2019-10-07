<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Entity\Visiteur;

class VisiteurController extends AbstractController
{
    /**
     * @Route("/visiteur", name="visiteur")
     */
    public function index(Request $query)
    {
        $visiteur = new Visiteur();
        
        $form = $this->createForm(\App\Form\VisiteurType::class,$visiteur);
        
        $form->handleRequest($query);
        
        if ($query->isMethod('POST'))
        {
        if ($form->isValid()) {
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($visiteur);
            $entityManager->flush();
            $query->getSession()->getFlashBag()->add('notice', 'Nouveau visiteur enregistré');
            
            return $this->redirectToRoute('visiteur');
            
          }
  
    } 
        return $this->render('visiteur/index.html.twig', array('form' => $form->createView(),));
    }
}
