<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SearchbienController extends AbstractController
{
    /**
     * @Route("/searchbien", name="searchbien")
     */
          
   /** public function listerBienParCateg1(Request $request, $id) {
       
        $em = $this->getDoctrine()->getManager();
        $valeur = $em->getRepository(Article::class)->rechercherParCateg($id);    
        return $this->render('searchbien/index.html.twig',array('result'=>$valeur));
     }*/
}
