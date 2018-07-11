<?php

require_once('Requete.php');

class LigneCde {

    private $refArticle;
    private $numCde;
    private $qteArtCde;
  

    public function __construct($refArticle, $qteArtCde) {
        $this->refArticle = $refArticle;
        $this->qteArtCde = $qteArtCde;
    }
    
    public function getNumCde() {
        return $this->numCde;
    }
    
    public function setNumCde($numCde) {
        $this->numCde = $numCde;
    }

    
    public static function ligne($refArticle, $numCde, $qteArtCde) {       
        Requete::addLigne($refArticle, $numCde, $qteArtCde);
        echo "<h4>Ligne de commande enregistrée</h4>";
        require ('view/order.view.php');
    }
    
  
}
