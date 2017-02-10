<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace AppBundle\Controller;
use AppBundle\Entity\Joueur;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
/**
 * Description of PlayerController
 *
 * @author ludovic-castro
 */
class PlayersController  extends Controller{
    /**
     * @Route("/players/add", name="addPlayers")
     * @Method({"POST"})
     * @param \Request $r
     */
    public function addPlayers(Request $r){
        $entityManager = $this->getDoctrine()->getManager();
        // boucle sur une valeurs de 1 à 4
        for($i=1; $i <= 4; $i++){
            // stockage de la valeur dans la variable email
            $email = $r->get('j'.strval($i));
            if($email != null){
                $joueur = new Joueur();
                $joueur->setEmail($email);
                $entityManager->persist($joueur);
                $r->getSession()->set('j'.strval($i), $joueur);
                
            }
        }
        $entityManager->flush();
        return new Response($r->get('j1'));
    }
}
