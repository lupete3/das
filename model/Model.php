<?php 
	
	class Model {

		private $server = 'localhost';
	    private $user = 'root';
	    private $pass = '';
	    private $db = 'das';
	    private $conn;

	    public function __construct(){
	    	try{
	    		$this->conn = new PDO('mysql:dbname='.$this->db.';host='.$this->server, $this->user, $this->pass);
	    	}catch(Exception $e){
	    		echo 'Echec de connexion '.$e->getMessage();
	    	}
	    }


	    /*
	    Les méthodes pour la gestion de la partie utilisateurs 
	    Insertion, Modification, Affichage, Suoppression
	    */

	    //Méthode pour Affichages des tous les utilisateurs 
	    public function getAllUsers(){

	    	$data = null;

	      	$query = "SELECT * FROM users ORDER BY nom ASC";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute();

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    }

	    //Methode pour tester si l'utilisateur n'existe pas encore dans le système
	    public function userExists($designation){

	    	$query = "SELECT * FROM users WHERE nom = ? ";

	      	$sql = $this->conn->prepare($query);

	      	$req = $sql->execute(array($designation));

	      	$res = $sql->fetch(PDO::FETCH_ASSOC);

	      	return $res;

	    }

	    //Méthode pour ajouter un utilisteur dans la base de données
	    public function insertUser($nom,$type,$login,$password){

	    	$query = "INSERT INTO users (nom,type,login,password) VALUES (?,?,?,?)";

	        $sql = $this->conn->prepare($query);

	        if ($sql->execute(array($nom,$type,$login,$password))) {          
	        	return 1;

	        }else {

	        	return 2;
	        }
	    	
		}

		//Méthode pour séléctionner un seul utilisateur 
	    public function getUserSingle($id){

	    	$data = null;

	      	$query = "SELECT * FROM users WHERE id = ?";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute(array($id));

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    }

	    //Méthode pour modifier un utilisateur dans la base de données
	    public function editUser($nomM,$typeM,$loginM,$passwordM,$idM){

	    	$query = "UPDATE users SET nom = ?,type = ?, login = ?, password = ? WHERE id = ?";

	        $sql = $this->conn->prepare($query);

	        if ($sql->execute(array($nomM,$typeM,$loginM,$passwordM,$idM))) {          

	        	return 1;

	        }else {

	        	return 2;
	        }
	    	
		}

	    //Méthode pour supprimer un utilisteur dans ala base de données
	    public function deleteUser($id){

	    	$query = "DELETE FROM users WHERE id = ?";

	        $sql = $this->conn->prepare($query);

	        if ($sql->execute(array($id))) {          

	        	return 1;

	        }else {

	        	return 2;
	        }
	    	
		}


	    /*
	    Les méthodes pour la gestion de la partie bénéficiaires 
	    Insertion, Modification, Affichage, Suoppression
	    */

	    //Méthode pour Affichages des tous les bénéfiaires  
	    public function getAllBeneficiaires(){

	    	$data = null;

	      	$query = "SELECT * FROM beneficiaire ORDER BY nom ASC";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute();

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    }

	    //Methode pour tester si le bénéficiaire n'existe pas encore dans le système
	    public function beneficiaireExists($nom,$postnom){

	    	$query = "SELECT * FROM beneficiaire WHERE nom = ? AND postnom = ?";

	      	$sql = $this->conn->prepare($query);

	      	$req = $sql->execute(array($nom,$postnom));

	      	$res = $sql->fetch(PDO::FETCH_ASSOC);

	      	return $res;

	    }

	    //Méthode pour ajouter un bénéficiaire dans la base de données
	    public function insertBeneficiaire($nom,$postnom,$sexe,$dateNaiss,$residence,$telephone,$nbEnfants,$login,$password){

	    	$query = "INSERT INTO beneficiaire (nom,postnom,sexe,dateNaissance,residence,telephone,nb_enfants,login,password) VALUES (?,?,?,?,?,?,?,?,?)";

	        $sql = $this->conn->prepare($query);

	        if ($sql->execute(array($nom,$postnom,$sexe,$dateNaiss,$residence,$telephone,$nbEnfants,$login,$password))) {          
	        	return 1;

	        }else {

	        	return 2;
	        }
	    	
		}

		//Méthode pour séléctionner un seul bénéficiaire 
	    public function getBeneficiaireSingle($id){

	    	$data = null;

	      	$query = "SELECT * FROM beneficiaire WHERE id = ?";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute(array($id));

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    }

	    //Méthode pour modifier un bénéficaire dans la base de données
	    public function editBeneficiaire($nomM,$postnomM,$sexeM,$dateNaissanceM,$residenceM,$telephoneM,$nbEnfantsM,$loginM,$passwordM,$idM){

	    	$query = "UPDATE beneficiaire SET nom = ?,postnom = ?, sexe = ?, dateNaissance = ?, residence = ?, telephone = ?, nb_enfants = ?, login = ?, password = ? WHERE id = ?";

	        $sql = $this->conn->prepare($query);

	        if ($sql->execute(array($nomM,$postnomM,$sexeM,$dateNaissanceM,$residenceM,$telephoneM,$nbEnfantsM,$loginM,$passwordM,$idM))) {          

	        	return 1;

	        }else {

	        	return 2;
	        }
	    	
		}

	    //Méthode pour supprimer un bénéficaires dans ala base de données
	    public function deleteBeneficiaire($id){

	    	$query = "DELETE FROM beneficiaire WHERE id = ?";

	        $sql = $this->conn->prepare($query);

	        if ($sql->execute(array($id))) {          

	        	return 1;

	        }else {

	        	return 2;
	        }
	    	
		}


	    /*
	    Les méthodes pour la gestion de la partie demandes 
	    Insertion, Modification, Affichage, Suoppression
	    */

	    //Méthode pour Affichages des toutes les demandes   
	    public function getAllDemandes(){

	    	$data = null;

	      	$query = "SELECT a.id,date_demande,motif,categorie,etat_demande,reponse,fichier,id_beneficiaire,nom, postnom FROM demande as a, beneficiaire as b WHERE id_beneficiaire = b.id ORDER BY id DESC";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute();

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    }

	    //Méthode pour Affichages des toutes les demandes côté admin 
	    public function getAllDemandesAdmin(){

	    	$data = null;

	      	$query = "SELECT a.id,date_demande,motif,categorie,etat_demande,reponse,fichier,id_beneficiaire,nom, postnom FROM demande as a, beneficiaire as b WHERE id_beneficiaire = b.id AND etat_demande > 0 ORDER BY id DESC";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute();

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    }


	    //Méthode pour Affichages des toutes les demandes côté bénéficiaire 
	    public function getAllDemandesBen($idDem){

	    	$data = null;

	      	$query = "SELECT a.id,date_demande,motif,categorie,etat_demande,reponse,fichier,id_beneficiaire,nom, postnom FROM demande as a, beneficiaire as b WHERE id_beneficiaire = b.id AND id_beneficiaire = ? ORDER BY id DESC";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute(array($idDem));

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    }

	    //Methode pour tester si la demande n'existe pas encore dans le système
	    public function demandeExists($motif,$categorie,$id_beneficiaire,$dat){

	    	$query = "SELECT * FROM demande WHERE motif = ? AND categorie = ? AND id_beneficiaire = ? AND date_demande = ?";

	      	$sql = $this->conn->prepare($query);

	      	$req = $sql->execute(array($motif,$categorie,$id_beneficiaire,$dat));

	      	$res = $sql->fetch(PDO::FETCH_ASSOC);

	      	return $res;

	    }

	    //Méthode pour ajouter une demande dans la base de données
	    public function insertDemande($motif,$categorie,$fichier,$id_beneficiaire,$etat){

	    	$query = "INSERT INTO demande (motif,categorie,fichier,id_beneficiaire,etat_demande) VALUES (?,?,?,?,?)";

	        $sql = $this->conn->prepare($query);

	        if ($sql->execute(array($motif,$categorie,$fichier,$id_beneficiaire,$etat))) {          
	        	return 1;

	        }else {

	        	return 2;
	        }
	    	
		}

		//Méthode pour séléctionner une seule demande 
	    public function getDemandeSingle($id){

	    	$data = null;

	      	$query = "SELECT * FROM demande WHERE id = ?";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute(array($id));

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    }

	    //Méthode pour modifier une démande dans la base de données
	    public function editDemande($motifM,$categorieM,$fichierM,$idM){

	    	$query = "UPDATE demande SET motif = ?, categorie = ?, fichier = ? WHERE id = ?";

	        $sql = $this->conn->prepare($query);

	        if ($sql->execute(array($motifM,$categorieM,$fichierM,$idM))) {          

	        	return 1;

	        }else {

	        	return 2;
	        }
	    	
		}

	    //Méthode pour modifier une démande dans la base de données
	    public function validDemande($reponse,$etat,$idM){

	    	$query = "UPDATE demande SET reponse = ?, etat_demande = ? WHERE id = ?";

	        $sql = $this->conn->prepare($query);

	        if ($sql->execute(array($reponse,$etat,$idM))) {          

	        	return 1;

	        }else {

	        	return 2;
	        }
	    	
		}

	    //Méthode pour supprimer une demande dans ala base de données
	    public function deleteDemande($id){

	    	$query = "DELETE FROM demande WHERE id = ?";

	        $sql = $this->conn->prepare($query);

	        if ($sql->execute(array($id))) {          

	        	return 1;

	        }else {

	        	return 2;
	        }
	    	
		}

	}


