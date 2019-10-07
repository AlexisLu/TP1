<?php

namespace App\Controller;

use App\Entity\Bien;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\UpdateFormType;


class UpdatebienController extends AbstractController
{
    /**
     * @Route("/updatebien/{id}", name="updatebien")
     */
    public function updateBien(Request $request, $id){
        $bien = new Bien() ;
        $bien = $this->getDoctrine()->getManager()->getRepository(Bien::class)->getUnBien($id);
        //$id = $session->get('login');
        $request->getSession()->getFlashBag()->add('notice', '');
        $form = $this->createForm(\App\Form\UpdateFormType::class, $bien);
        if($request->isMethod('POST'))
        {
            $form->handleRequest($request);
            if($form->isValid())
            {
        $em = $this->getDoctrine()->getManager();
        $em->flush();
        $request->getSession()->getFlashBag()->add('success', 'Article modifié avec succès.');

        return $this->redirectToRoute('updatebien',array('id'=>$id));
            }
        }
        return $this->render('updatebien/index.html.twig', array('form' =>$form->createView(), 'bien'=>$bien));
}
}
