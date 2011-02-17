<?php 
class Offre implements ICrudModel{
	private $numero;
	private $date;
	private $titre;
	private $Categorie;
	private $description;
	private $listeDevis;
	private $Statut;
	private $montant;
        private $Entreprise;
        private $db;

	public function __construct(){
		$this->db = &get_instance()->db;
		
		$this->numero = 0;
		$this->date = "";
		$this->titre = "";
		$this->description = "";
		$this->listeDevis = array();
		$this->montant = 0;
		$this->Statut = new Statut();
		$this->Categorie = new Categorie();
                $this->Entreprise = new Entreprise();
	}

	public function __destruct(){
		$this->listeDevis = null;
		$this->Categorie = null;
		$this->Statut = null;
	}
	
	/*** Accesseur ***/
	public function __get($attribut){
		return $this->$attribut;
	}
	
	/*** Mutateur ***/
	public function __set($attribut, $valeur){
		$this->$attribut = $valeur;
	}

	/*** Méthodes d'accès à la base de données ***/
	public function select($idObject){
            $requete = $this->db->get_where('offres', array('ID' => $idObject));
            if($requete->num_rows() == 1){
                $Offre = $requete->row();
                $this->numero = $Offre->ID;
                $this->date = date('d/m/y',$Offre->Date);
                $this->titre = $Offre->Titre;
                $this->description = $Offre->Description;
                $this->Categorie->select($Offre->IDCategorie);
                $this->Entreprise->select($Offre->IDEntreprise);
                $this->Statut->select($Offre->IDStatut);
            }
            return $this;
	}

	public function insert($model){
            $data = array('Titre' => $model->titre,
                          'Date' => time(),
                          'IDEntreprise' => $model->Entreprise->ID,
                          'IDCategorie' => $model->Categorie->ID,
                          'IDStatut' => $model->Statut->ID,
                          'Description' => $model->description);
            $this->db->insert('offres', $data);
	}

	public function update($model){
            $data = array('Titre' => $model->titre,
                          'Date' => time(),
                          'IDCategorie' => $model->Categorie->ID,
                          'IDStatut' => $model->Statut->ID,
                          'Description' => $model->description);
            $this->db->where('ID', $model->numero);
            $this->db->update('Offres', $data);
	}
	
	/*** Renvoie le nombre d'Offres dans la base de données ***/
	public function compteOffres(){
		return $this->db->count_all('offres');
	}
	
	/*** Renvoie un tableau d'offres en fonction d'une limite basse et d'un nombre d'Offres ***/
	public function selectOffresByPages($limitInf, $limitNombre){
		$listeOffres = array();
                $this->db->order_by('Date', 'Desc');
		$requete = $this->db->get('offres', $limitNombre, $limitInf);
		foreach($requete->result() as $reqOffre){
		    $Offre = new Offre();
		    $Offre->numero = $reqOffre->ID;
		    $Offre->date = date('d/m/y', $reqOffre->Date);
                    $Offre->titre = $reqOffre->Titre;
                    $Offre->description = $reqOffre->Description;
                    $Offre->Categorie->select($reqOffre->IDCategorie);
                    $Offre->Statut->ID = $reqOffre->IDStatut;
                    $Offre->montant = $reqOffre->Montant;
                    array_push($listeOffres, $Offre);
		}
		return $listeOffres;
	}


	/*** Renvoie un tableau d'offres en fonction d'une limite basse et d'un nombre d'Offres ***/
	public function selectOffresRecherche($raisonSoc, $IDCategorie){
                $db = get_instance()->db;
		$listeOffres = array();
		$db->select('*');
		$db->from('offres')->join('entreprises', 'entreprises.ID = offres.IDEntreprise');
		$db->where('offres.ID != ', 0);
		if(!empty($raisonSoc))
			$db->where('entreprises.raisonSoc LIKE ', "'%".$raisonSoc."%'", FALSE	);
// 		if(!is_null(IDCategorie))
// 			$where .= ' AND offres.IDCategorie ='.$IDCategorie;

		$requete = $db->get();
		foreach($requete->result() as $reqOffre){
		    $Offre = new Offre();
		    $Offre->numero = $reqOffre->ID;
                    $Offre->date = date('d/m/y',$reqOffre->Date);
                    $Offre->titre = $reqOffre->Titre;
                    $Offre->description = $reqOffre->Description;
                    $Offre->Categorie->ID = $reqOffre->IDCategorie;
                    $Offre->Categorie->select();
                    $Offre->Statut->ID = $reqOffre->IDStatut;
                    $Offre->montant = $reqOffre->Montant;
                    array_push($listeOffres, $Offre);
		}
		return $listeOffres;
	}
	
	/*** Renvoie une liste de devis en fonction de l'ID de l'offre ***/
	public function selectDevis(){
            $this->db->order_by('Etat', 'Desc');
            $this->db->order_by('Date', 'Desc');
            $requete = $this->db->get_where('devis', array('IDOffre' => $this->numero));
            foreach($requete->result() as $reqDevis){
                    $Devis = new Devis();
                    $Devis->numero = $reqDevis->ID;
                    $Devis->date = date('d/m/y',$reqDevis->Date);
                    $Devis->montant = $reqDevis->Montant;
                    $Devis->duree = $reqDevis->Duree;
                    $Devis->Offre = $this;
                    $Devis->description = $reqDevis->Description;
                    $Devis->etat = $reqDevis->Etat;
                    $Devis->Prestataire->select($reqDevis->IDPrestataire);
                    array_push($this->listeDevis, $Devis);
            }
            return $this->listeDevis;
	}

	/*** Renvoie le nombre de devis pour l'offre ***/	
	public function compteDevis(){
		return count($this->listeDevis);
	}
	
	/*** Renvoie le montant moyen pour la somme des devis de l'offre ***/
	public function montantMoyen(){
            $montantTotal = NULL;
            foreach ($this->listeDevis as $d) {
                $montantTotal += $d->montant;
            }
            if($montantTotal)
                return $montantTotal/count($this->listeDevis);
            return 0;
	}

        public function getType(){
            return __CLASS__;
        }

    public function selectAll() {

    }
}
