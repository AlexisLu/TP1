<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Visite;
use Symfony\Component\HttpFoundation\Request;

class VisiteController extends AbstractController
{
    /**
     * @Route("/visite", name="visite")
     */
    public function index(Request $query)
    {
        $visite = new Visite();
        
        $form = $this->createForm(\App\Form\VisiteType::class,$visite);
        
        $form->handleRequest($query);
        
        if ($query->isMethod('POST'))
        {
        if ($form->isValid()) {
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($visite);
            $entityManager->flush();
            $query->getSession()->getFlashBag()->add('notice', 'Nouvelle visite enregistré');
            
            return $this->redirectToRoute('visite');
            
          }
  
    } 
        return $this->render('visite/index.html.twig', array('form' => $form->createView(),));
    }
    
}
