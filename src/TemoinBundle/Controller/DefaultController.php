<?php

namespace TemoinBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use HomeBundle\Entity\Analyses;
use HomeBundle\Entity\Temoins;
use HomeBundle\Entity\Cartes;
use HomeBundle\Entity\CarteValeur;
use TemoinBundle\Form\CartesType;
use TemoinBundle\Form\TemoinsType;
use Symfony\Component\Validator\Constraints\DateTime;

class DefaultController extends Controller
{




    public function indexAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getManager();
        $now = new \DateTime;
        
      
        if ($request->get('filtre')=="moyenne")
        {
            $val1 = $request->get('val1');
            $val2 = $request->get('val2');
            $num = $request->get('num');
            $id = $request->get('id');
            $nom = $request->get('nom');
            $carte = $em->getRepository("HomeBundle:Cartes")->findOneById($id);
            $id = $carte->getId();
            
            
            $cartesValeurs= $em->getRepository("HomeBundle:CarteValeur")->findOneBy(array('carte' => $carte , 'num' => $num , 'nom' => $nom));
            if(empty($cartesValeurs)){
                $cartesValeurs = new CarteValeur();
            }
            $moyenne = $cartesValeurs->Moyenne($val1,$val2);
            $array = Array($val1,$val2);
            $Cv = $cartesValeurs->stats_standard_deviation($array);
            $CvValeur = round(($Cv *100),1); 
                      
            if (empty($cartesValeurs->getNum())){
                $cartesValeurs->setNum($num);
                $cartesValeurs->setCarte($carte);
                $cartesValeurs->setDate($now);
                $cartesValeurs->setNom($nom);
                $cartesValeurs->setVisa($user->getVisa());
                $cartesValeurs->setSuppressionVisuel(1);
                $cartesValeurs->setCommentaire("");
                $cartesValeurs->setNombreCible(10);
                $cartesValeurs->setSuppression(0);
            }

            $cartesValeurs2= $em->getRepository("HomeBundle:CarteValeur")->findBy(array('carte' => $carte , 'nom' => $nom, 'suppression' => 0));
  
            

            $cartesValeurs->setD1($val1);
            $cartesValeurs->setD2($val2);
            $cartesValeurs->setMoyenne($moyenne);
            $cartesValeurs->setCv($CvValeur);            
                
            $em->persist($cartesValeurs);
            $em->flush();
                
            
            
                return $this->render('TemoinBundle:Default:index.html.twig',array('moy' => $moyenne, 'cv' =>$CvValeur));
        }   
        return $this->render('TemoinBundle:Default:index.html.twig');
    }

    public function grapheAction()
    {
        return $this->render('TemoinBundle:Default:graphe.html.twig');
    }


    public function parametreCarteAction()
    {

        $request = $this->getRequest();
        $em = $this->getDoctrine()->getManager();


        if ($request->isMethod('POST')){
            $id = $request->get('id');
            $nom = $request->get('nom');
            $carte = $em->getRepository("HomeBundle:Cartes")->findOneById($id);

            $cartesValeurs = $em->getRepository("HomeBundle:CarteValeur")->findBy(array('nom' => $nom , 'carte' => $carte, 'suppression' => 0));


            if ($request->get('filtre')=="parametreCarte"){

            }
            if ($request->get('btn')=="ecart"){
                
                    $carte->setEcart($request->get('ecart'));
                    $em->persist($carte);
                    $em->flush();
                
            }

            if ($request->get('btn')=="nombreCible"){

                $nombreCible = $request->get('nombrecible');
                foreach ($cartesValeurs as $value) {
                    $value->setNombreCible($nombreCible);
                    $em->persist($value);
                    $em->flush();
                }
               


            }
            $nb = $em->getRepository("HomeBundle:CarteValeur")->findOneBy(array('nom' => $nom , 'carte' => $carte, 'suppression' => 0));
            $nb = $nb->getNombreCible();
            
            if (count($cartesValeurs) > 2){
                $moyenne =0 ;
                $i = 0 ;
                foreach ($cartesValeurs as $value) {
                    if ($i < $nb ){
                        $moyenne += $value->getMoyenne();
                        $i+= 1;
                    }

                }
                if ($i != 0)
                    $moyenne=  round($moyenne/$i,3);
                else
                    $moyenne = 0;
            }
            return $this->render('TemoinBundle:Default:parametreCarte.html.twig',array('carte'=> $carte , 'nb' => $nb , 'cible' => $moyenne));
        }

        return $this->render('TemoinBundle:Default:parametreCarte.html.twig');
    }


    public function historiqueAction()
    {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getManager();
        $analyses = $em->getRepository("HomeBundle:Analyses")->findAll();



        return $this->render('TemoinBundle:Default:historique.html.twig',array('analyses' => $analyses));
    }



    public function voirCarteAction()
    {
        $now = new \DateTime;
        $user = $this->container->get('security.context')->getToken()->getUser();
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getManager();


       if ($request->get('tab')=="tableau"){
            $id = $request->get('id');
            $carte = $em->getRepository("HomeBundle:Cartes")->findOneById($id);
            $nom = $request->get('nom');
            $cartesValeurs= $em->getRepository("HomeBundle:CarteValeur")->findBy(array('nom' => $nom , 'carte' => $carte));
            
            

            
                
                   

            return $this->render('TemoinBundle:Default:voirCarte.html.twig',array('cartesValeurs' => $cartesValeurs , 'now' =>  $now , 'user'=> $user, 'carte' =>$carte ));
        }

        return $this->render('TemoinBundle:Default:voirCarte.html.twig');
    }




    public function carteAction()
    {
		$request = $this->getRequest();
		$em = $this->getDoctrine()->getManager();
        $analyses = $em->getRepository("HomeBundle:Analyses")->findAll();


		return $this->render('TemoinBundle:Default:carte.html.twig',array('analyses' => $analyses));

	}

    public function carteTableauAction()
    {
    
    $request = $this->getRequest();
    $em = $this->getDoctrine()->getManager();

   if($request->get('filtre')){
       $analyse = $request->get("filtre");
       $a = $em->getRepository("HomeBundle:Analyses")->findOneBy(array('libelle'=> $analyse));


   }
    if ($request->isMethod('POST')){
        if($request->get('nom')=="carte"){
            if ($analyse == "default"){
                $cartes = $em->getRepository("HomeBundle:Cartes")->findBy(array('cloturer' => 0));
                return $this->render('TemoinBundle:Default:carteTableau.html.twig',array('carte' => $cartes) );
            }
            $boo = 0;   
        }
        if($request->get('nom')=="historique"){ 
            if ($analyse == "default"){
                $cartes = $em->getRepository("HomeBundle:Cartes")->findBy(array('cloturer' => 1));
                return $this->render('TemoinBundle:Default:carteTableau.html.twig',array('carte' => $cartes) );
            }
            $boo = 1 ;  
        }
        $c = $em->getRepository("HomeBundle:Cartes")->findBy(array('analyse' => $a , 'cloturer' => $boo));
        return  $this->render('TemoinBundle:Default:carteTableau.html.twig',array('carte' => $c));
    }
    return $this->render('TemoinBundle:Default:carteTableau.html.twig');;

    }

        public function gestionTemoinAction()
    {

        $now = new \DateTime;

        
        $now1 = $now->modify('+1 year'); 
        
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getManager();
        
        $form = $this->createForm(new TemoinsType);

        if ($request->isMethod('POST')){
            $t = new Temoins();

            $form->handleRequest($request);
            $t = $form->getData();
            $t->setDatePeremption($now1);
            $t->setEtat(false);
            $em->persist($t);
            $em->flush();

        return $this->redirect("temoins-en-cours");
    }   

        /*if($request->getMethod()=='POST'){
            $id = $request->get('id');    
                if($request->get('btn')=='CreerTemoin'){
                    $A->setLibelle($request->get('nom'));
                    $em->persist($T);
                    $em->flush();
                }

        }
        //$analyses = $em->getRepository("HomeBundle:Analyses")->findAll();*/

        return $this->render('TemoinBundle:Default:gestionTemoin.html.twig',array('form' => $form->createView()))  ;
    }

    public function temoinEnCoursAction()
    {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getManager();
        $now = new \DateTime;
        $temoins = $this->getDoctrine()->getManager()->getRepository('HomeBundle:Temoins')->TemoinsEnCours($now);
        return $this->render('TemoinBundle:Default:temoinEnCours.html.twig',array('temoins' => $temoins));
    }	

    public function consultCarteAction(Cartes $carte)
    {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getManager();
        $cartesValeurs= $em->getRepository("HomeBundle:CarteValeur")->findBy(array("carte" => $carte));
        $now = new \DateTime;
        $user = $this->container->get('security.context')->getToken()->getUser();
        $noms = $this->getDoctrine()->getManager()->getRepository('HomeBundle:CarteValeur')->CarteEnCours($carte);
 
        if ($request->isMethod('POST')){
            
            $id = $request->get('id');    
            if($request->get('btn')=='CarteValeur'){
                
                $numValeur = $request->get('numValeur');
                $dateValeur = $request->get('dateValeur');
                $nom = $request->get('nom');
                $carteValeur= $em->getRepository("HomeBundle:CarteValeur")->findOneBy(array("carte" => $carte , 'nom' => $nom , 'num' =>$numValeur));
                $em->remove($carteValeur);
                $em->flush();   

            }
            if($request->get('btn')=='cloturer'){
                
                $nom = $request->get('nom');
                $carte= $em->getRepository("HomeBundle:Cartes")->findOneBy(array("id" => $carte->getId()));

                    $carte->setCloturer(1);
                    $em->persist($carte);
                    $em->flush();   

                
                



            }
            


            if($request->get('btn')=='modifOngletBt'){
                $ancien = $request->get('ancien');
                $cartesValeurs= $em->getRepository("HomeBundle:CarteValeur")->findBy(array("carte" => $carte , 'nom' => $ancien));
                $nom = $request->get('nom');
                foreach ($cartesValeurs as $value) {
                    $value->setNom($nom);
                    $em->persist($value);
                    $em->flush();
                }                
            }
            if($request->get('btn')=='ajoutOngletBt'){
               
                $nom = $request->get('nom');
                $boo = true;

                $nom = $this->getDoctrine()->getManager()->getRepository('HomeBundle:CarteValeur')->nomExiste($carte,$nom);

                if ($nom)
                    $boo=false;

                if($boo){
                    $carteValeur= new CarteValeur();
                    $carteValeur->setNom($nom);

                    $carteValeur->setDate($now);
                    $carteValeur->setNum(1);
                    $carteValeur->setD1(0);
                    $carteValeur->setD2(0);
                    $carteValeur->setMoyenne(0);
                    $carteValeur->setCv(0);
                    $carteValeur->setVisa("XX");
                    $carteValeur->setCommentaire("");
                    $carteValeur->setNombreCible(10);

                    $carteValeur->setSuppression(0);
                    $carteValeur->setSuppressionVisuel(1);

                    $carteValeur->setNom($request->get('nom'));
                    $carteValeur->setCarte($carte);

                    $em->persist($carteValeur);
                    $em->flush();
                }
            }
            if($request->get('btn')=='commentaire'){
                 
                $nom = $request->get('nom');
                $num = $request->get('num');
                $carteValeur= $em->getRepository("HomeBundle:CarteValeur")->findOneBy(array('carte' => $carte , 'num' => $num , 'nom' => $nom));
                $carteValeur->setCommentaire($request->get('comm'));
                $em->persist($carteValeur);
                $em->flush();
            }

            if($request->get('btn')=='date')
            {

                
                $date = $request->get('date');
                $date = \DateTime::createFromFormat('d-m-Y', $date);
                $nom = $request->get('nom');
                $num = $request->get('num');
                $carteValeur= $em->getRepository("HomeBundle:CarteValeur")->findOneBy(array('carte' => $carte , 'num' => $num , 'nom' => $nom));                 
                $carteValeur->setDate($date);
                $em->persist($carteValeur);
                $em->flush();
            }

            if($request->get('btn')=='visa')
            {

                
                $visa = $request->get('visa');
                $nom = $request->get('nom');
                $num = $request->get('num');
                $carteValeur= $em->getRepository("HomeBundle:CarteValeur")->findOneBy(array('carte' => $carte , 'num' => $num , 'nom' => $nom));                 
                $carteValeur->setVisa($visa);
                $em->persist($carteValeur);
                $em->flush();
            }
            if($request->get('btn')=='supprOnglet')
            {
                $nom = $request->get('nom');
                $cartesValeurs= $em->getRepository("HomeBundle:CarteValeur")->findBy(array('carte' => $carte, 'nom' => $nom));
                foreach ($cartesValeurs as  $carteValeur) {
                    $carteValeur->setSuppressionVisuel(0);
                    
                    $em->persist($carteValeur);
                    $em->flush();
                }                 

            }
            if($request->get('btn')=='supprCC')
            {
                $nom = $request->get('nom');
                $num = $request->get('num');
                $cartesValeurs= $em->getRepository("HomeBundle:CarteValeur")->findOneBy(array('carte' => $carte, 'nom' => $nom, 'num' => $num));
                if ($cartesValeurs->getSuppression())
                    $cartesValeurs->setSuppression(0);
                else
                    $cartesValeurs->setSuppression(1);

                
                $em->persist($cartesValeurs);
                $em->flush();
                                 

            }






    }


        return $this->render('TemoinBundle:Default:consultCarte.html.twig', array("carte" => $carte , 'now' => $now , 'user' =>$user, 'cartesValeurs'=> $cartesValeurs, 'noms'=> $noms));
    }   


    public function creerCarteAction()
    {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();
        $analyses = $em->getRepository("HomeBundle:Analyses")->findAll();

        $form = $this->createForm(new CartesType);

        if ($request->isMethod('POST')){
            
            $id = $request->get('id');    
            if($request->get('btn')=='CreerCategorie'){
                if(!(empty($request->get('nom'))))  
                {
                    $A = new Analyses();
                    $A->setLibelle($request->get('nom'));
                    $em->persist($A);
                    $em->flush(); 
                }
            }




            $form->handleRequest($request);
            $carte = new Cartes(); 
            
            $carte = $form->getData();
           
            $carte->setCloturer(false);
            $em->persist($carte);

            $now = new \DateTime;

            $onglet = $request->get('onglet');
            $carteValeur = new CarteValeur();
            if(!(empty($request->get('onglet'))))
            {
                $carteValeur->setNom($carte->getNomAnalyse());
            }
            else
            {
                $carteValeur->setNom("onglet");
            }

            $carteValeur->setDate($now);
            $carteValeur->setNum('1');
            $carteValeur->setD1("0");
            $carteValeur->setD2("0");
            $carteValeur->setMoyenne("0");
            $carteValeur->setCv("0");
            $carteValeur->setVisa($user->getVisa());
            $carteValeur->setCommentaire("");
            $carteValeur->setNombreCible(10);
            $boo=0;
            $carteValeur->setSuppression($boo);
            $carteValeur->setSuppressionVisuel(1);

            
            $carteValeur->setCarte($carte);
            $em->persist($carteValeur);


            
        $em->flush();
        return $this->redirect("carte-de-controle/".$carte->getId());
        }   



        return $this->render('TemoinBundle:Default:creerCarte.html.twig',array('form' => $form->createView()));
    }   







}
