<?php

require_once('Requete.php');

class Connection {

    private $motdepasse;
    private $pseudo;
    private $error;
    private $result;
    private $idClient;

    public function __construct($motpass, $pseudo) {  
       
        $this->pseudo = $pseudo;       
        $this->motdepasse = $motpass;
               
    }

    public function getPseudo() {
        $res = NULL;
        if (isset($this->pseudo)) {
            $res = $this->pseudo;
        }
        return $res;
    }

    public function conn() {
        $res = FALSE;
        print_r($res);

        $result = Requete::selectFromWhere("Client", "idClient, password", "pseudo", $this->pseudo);
    
        if ($result) {                    
            
                  
                if (password_verify($this->motdepasse, $result[0]['password'])) {

                    $this->result = "Connection réussie";
                    $this->idClient = $result[0]['idClient'];
                    $res = TRUE;
                } else {
                    $this->error = "isNotPassword";                   
       
                }
            } else {
                 $this->error = "isNotPseudo";
                 print_r($this->error);

            }
        return $res;
        
    }

    public function getResult() {
        return $this->result;
    }

    public function getError() {
        return $this->error;
    }

    public function getIdClient() {
        return $this->idClient;
    }

}
