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
        
        /**
         *
         * @var Array Of Message
         */
        private $messages;

	public function __construct($pseudo,$nom,$prenom,$mail,$dateInscription,$password,$messages){
            parent::__construct(null);
            $this->pseudo = $pseudo;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->mail = $mail;
            $this->dateInscription = $dateInscription;
            $this->password = $password;
            $this->messages = $messages;
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
            $corps .= "<br>";
            foreach ($this->messages as $value) {
                $corps .= $value->getData_message();
                $corps .= "<br>";
            }
            echo $corps;
	}
        
        /**
         * 
         * @param Citoyen $citoyen
         */
        public function setCitoyen($citoyen){
            $this->id = $citoyen->getID();
            $this->dateInscription = $citoyen->getDateInscription();
            $this->mail = $citoyen->getMail();
            $this->nom = $citoyen->getNom();
            $this->prenom = $citoyen->getPrenom();
            $this->pseudo = $citoyen->getPseudo();
        }
        
        public function getMessages() {
            return $this->messages;
        }

        public function setMessages(Array $messages) {
            $this->messages = $messages;
        }

                
        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;            
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