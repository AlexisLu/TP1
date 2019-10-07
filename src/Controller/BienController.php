<?php

namespace App\Controller;

use App\Entity\Bien;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Form\CategorieFormType;
use App\Entity\Categorie;
use App\Entity\Type;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;


class BienController extends AbstractController
{
    /**
     * @Route("/bien", name="bien")
     */
    public function index()
    {
       return $this->render('bien/index.html.twig', [
            'controller_name' => 'BienController',
        ]);
    
    }
    /**
     * @Route("/ajout_bien", name="ajoutbien")
     */
    public function ajouterCategorie(Request $query)
    {
        $bien = new Bien();
        
        $form = $this->createForm(\App\Form\AjoutBienType::class,$bien);
        
        $form->handleRequest($query);
        
        if ($query->isMethod('POST'))
        {
        if ($form->isValid()) {
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($bien);
            $entityManager->flush();
            $query->getSession()->getFlashBag()->add('notice', 'Categorie enregistré');
            
            return $this->redirectToRoute('bien');
            
          }
  
    } 
return $this->render('bien/ajout_bien.html.twig', array('form' => $form->createView(),));
    }
}
