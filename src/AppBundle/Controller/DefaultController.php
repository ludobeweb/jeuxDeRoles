<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;



class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request){
    
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig');
            
    }
    
    /**
     * @Route("/personnage/create", name="createPerso")
     */
    public function creationPersonnage(Request $request){
        
        
        $form = $this->createForm(PersonnageType::class);
        
        // replace this example code with whatever you need
        return $this->render('default/creationPersonnage.html.twig', array(
            "joueur" => $request->getSession()->get("j" . strval($request->
            getSession()->get('actuel')))
            "formulaire" => $form->createView()
        ));
        
    }
}