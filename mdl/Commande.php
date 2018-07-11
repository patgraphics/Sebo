<?php

require_once('Requete.php');

class Commande {

    private $numCde;
    private $idClient;
    private $dateCde;
    private $montant;
    private $etatCde;

    public function __construct($idClient,$date) {
        $this->idClient = $idClient;
        $this->dateCde = $date;
    }
    
    public function getDateCde() {
        return $this->dateCde;
    }
    function getIdClient() {
        return $this->idClient;
    }

    function getMontant() {
        return $this->montant;
    }
    

    function getEtatCde() {
        return $this->etatCde;
    }

    function getNumCde() {
        return $this->numCde;
    }
    
    function setMontant($montant) {
        $this->montant = $montant;
    }

    function setEtatCde($etatCde) {
        $this->etatCde = $etatCde;
    }

    
    public static function commande($idClient,$dateCde,$etatCde){
        Requete::addCommande($idClient, $dateCde, $etatCde);
        echo "<h4>Veuillez maintenant remplir votre panier</h4>";
        require ('view/order.view.php');
    }

}
