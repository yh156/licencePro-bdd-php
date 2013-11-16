<?php
class Citoyen_Manager
{
        /**
         *
         * @var Citoyen
         */
	private $citoyen;
        
        /**
         *
         * @var PDO
         */
	private $pdo;

	public function __construct($citoyen){
		$this->citoyen = $citoyen;
		try {
                    $this->pdo = myPDO::getInstance();
                    $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		} catch (PDOExeption $e) {
                    echo $e->getMessage();
                    die();
		}
	}

	/**
	 * Add someone in the database
	 **/
	public function add(){
            try {
                $sql = $this->pdo->prepare('INSERT INTO citoyen(pseudo,nom,prenom,mail,password) VALUES(:pseudo,:nom,:prenom,:mail,:password)');
                $sql->bindValue(':pseudo', $this->citoyen->getPseudo(), PDO::PARAM_STR);
                $sql->bindValue(':nom', $this->citoyen->getNom(), PDO::PARAM_STR);
                $sql->bindValue(':prenom', $this->citoyen->getPrenom(), PDO::PARAM_STR);
                $sql->bindValue(':mail', $this->citoyen->getMail(), PDO::PARAM_STR);	
                $sql->bindValue(':password', sha1($this->citoyen->getPassword()), PDO::PARAM_STR);	
                $sql->execute();			
            } catch (Exception $e) {
                echo $e->getMessage();
            }		
	}

	/**
	 * Get all the people in the database
	 * @return: array of Citoyen
	 **/
	public function get(){
            try {
                    $sql = $this->pdo->prepare("SELECT * FROM citoyen");
                    $sql->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Citoyen");

                    $sql->execute();
            } catch (Exception $e) {
                    echo $e->getMessage();
                    die();
            }
            $result = array();
            $i = 0;	
            foreach ($sql as $row){
                $result[$i] = array($row,new Avatar("barimage.bmp"));
                $i++;
            }
            return $result;
	}

	/**
	 * Find a citoyen by pseudo
	 * @param $pseudo : string
	 *
	 **/
	public function find($pseudo){
            try {
                    $sql = $this->pdo->prepare("SELECT * FROM citoyen WHERE pseudo = :pseudo");
                    $sql->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
                    $sql->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Citoyen");

                    $sql->execute();
                    $citoyen = $sql->fetchAll();
            } catch (Exception $e) {
                    echo $e->getMessage();
                    die();
            }
            return $citoyen[0];
	}

	/**
	 * Delete a citoyen by id
	 * @param $id : Integer
	 *
	 **/
	public function delete($id){
            try {
                    $sql = $this->pdo->prepare("DELETE FROM citoyen WHERE id = :id");
                    $sql->bindValue(':id', $id, PDO::PARAM_INT);
                    $sql->execute();
            } catch (Exception $e) {
                    echo $e->getMessage();
                    die();
            }
	}

	/**
	 * Delete a citoyen by id
	 * @param $id : Integer
	 *
	 **/
	public function update($id,$citoyen){
            try {
                $sql = $this->pdo->prepare('UPDATE citoyen SET pseudo =:pseudo, nom =:nom, prenom = :prenom,mail =:mail,password = :password');
                $sql->bindValue(':pseudo', $this->citoyen->getPseudo(), PDO::PARAM_STR);
                $sql->bindValue(':nom', $this->citoyen->getNom(), PDO::PARAM_STR);
                $sql->bindValue(':prenom', $this->citoyen->getPrenom(), PDO::PARAM_STR);
                $sql->bindValue(':mail', $this->citoyen->getMail(), PDO::PARAM_STR);
                $sql->bindValue(':password', sha1($this->citoyen->getPassword()), PDO::PARAM_STR);
                $sql->execute();			
            } catch (Exception $e) {
                echo $e->getMessage();
            }
	}
        
        /**
         * 
         * @return Citoyen if login/password are ok, false otherwise
         */
        public function connect(){
            try {
                $sql = $this->pdo->prepare('SELECT * FROM citoyen WHERE pseudo = :pseudo AND password = :password');
                $sql->bindValue(':pseudo', $this->citoyen->getPseudo(), PDO::PARAM_STR);
                $sql->bindValue(':password', sha1($this->citoyen->getPassword()), PDO::PARAM_STR);
                $sql->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Citoyen");
                $sql->execute();
                $citoyen = $sql->fetchAll();
                if(count($citoyen) == 1){
                    return $citoyen[0];
                }
                else{
                    return false;
                }
            } 
            catch (PDOException $exc) {
                var_dump($exc);
                die();
            }
            return false;
        }
        
}
        
        
?>