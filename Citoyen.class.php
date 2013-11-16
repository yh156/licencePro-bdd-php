<?php
class Citoyen extends CelluleHTML
{
	private $id;
	private $pseudo;
	private $nom;
	private $prenom;
	private $mail;
	private $dateInscription;
        private $password;

	public function __construct($pseudo,$nom,$prenom,$mail,$dateInscription,$password){
            parent::__construct(null);
            $this->pseudo = $pseudo;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->mail = $mail;
            $this->dateInscription = $dateInscription;
            $this->password = $password;
	}

	public function construireCorps(){
            $corps = "";
            $corps .= $this->pseudo;
            $corps .= " ";
            $corps .= $this->nom;
            $corps .= " ";
            $corps .= $this->prenom;
            $corps .= "<br>";
            $corps .= $this->mail;
            echo $corps;
	}
        
        public function getPassword() {
            return $this->password;
        }

        public function setPassword($password) {
            $this->password = $password;
        }

	public function getPseudo(){
		return $this->pseudo;
	}

	public function getNom(){
		return $this->nom;
	}

	public function getPrenom(){
		return $this->prenom;
	}

	public function getMail(){
		return $this->mail;
	}

	public function getDateInscription(){
		return $this->dateInscription;
	}

}

?>