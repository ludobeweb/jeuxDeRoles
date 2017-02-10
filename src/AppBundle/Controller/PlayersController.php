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
 * Description of PlayersController
 *
 * @author ludo
 */
class PlayersController extends Controller {
    /**
     * Methode qui va ajouter les joueurs en base de données
     * A la fin du traitement on est rediriger sur le controlleur de vue
     * afin de retourner la vue de creation de personnages
     * 
     * Si le joueur existe en base de donnée, on le met en session
     * sinon on l'enregistre, et on le met en session.
     * @Route("/players/add",name="addPlayers")
     * @Method({"POST"})
     * @param \Request $r
     */
    public function addPlayers(Request $r) {
        $entityManager = $this->getDoctrine()->getManager();
        //boucle sur valeurs de 1 à 4
        for ($i = 1; $i <= 4; $i++) {
            //stockage de la valeur dans la variabe email
            $email = $r->get('j' . strval($i));
            if ($email != null) {
                $joueurs = $this->getDoctrine()->getRepository(Joueur::class)->findByEmail($email);
                if ($joueurs != null) {
                    $joueur = $joueurs[0];
//                    return new Response($joueurs[0]->getEmail());
                } else {
                    //si nouveau joueur
                    $joueur = new Joueur();
                    $joueur->setEmail($email);
                    $entityManager->persist($joueur);
                }
                //mise en session du joueur
                $r->getSession()->set('j' . strval($i), $joueur);
            }
        }
        $entityManager->flush();
        $r->getSession()->set('actuel', 1);
        return $this->redirectToRoute('createPerso');
    }
    /**
     * Doit etre appelée par la validation de la création du personnage précédent
     * @param Request $r
     * @return type
     */
    public function switchPlayer(Request $r) {
        $next = $r->getSession()->get('actuel') + 1;
        if ($r->getSession()->has('j' . strval($next))) {
            $r->getSession()->set('actuel', $next);
            return $this->redirectToRoute('createPerso');
        }else{
            return $this->redirectToRoute('game');
        }
    }
}