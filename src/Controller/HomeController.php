<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Form\AffichagebienType;
use App\Entity\Type;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class HomeController extends AbstractController
{
    /** /**
     * @Route("/home", name="home")
     
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    */
    
    /**
     * @Route("/affichage/{value}", name="affichagebien")
     */
    public function affichagebien(Request $query, $value){
        $affichage = new Type();
        $bien = $this->getDoctrine()->getManager()->getRepository(Type::class)->findOneBySomeField($value);
        
        $form = $this->createForm(AffichagebienType::class,$affichage);
        
        $form->handleRequest($query);
        
        if ($query->isMethod('POST'))
        {
         if ($form->isValid()) {
            return $this->redirectToRoute('affichage',array('value'=>$value));
        }
       
    }return $this->render('home/index.html.twig', array('form' =>$form->createView(), 'bien'=>$bien));
}

         }
