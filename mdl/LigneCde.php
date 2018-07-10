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

    public static function ligne($refArticle, $qteArtCde) {
        
        
    }
    
   

    

}
