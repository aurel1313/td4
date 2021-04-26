<?php
    class ModelVoiture extends Model{
       public $marque;
        public $couleur;
        public $immatriculation;
        
        
        public function __construct($marque,$couleur,$immatriculation){
            $this->marque=$marque;
            $this->couleur=$couleur;
            $this->immatriculation=$immatriculation;
        }
        public function getMarque(){
            return $this->marque;
        }
        public function setMarque($marque2){
            $this->marque =$marque2;
        }
        
        public function afficher(){
            echo $this->marque;
            echo $this->couleur;
            echo $this->immatriculation;
        }
        public function getAllVoiture(){
            $voitures ="SELECT * from voiture2";
            $req2 =Model::$pdo->prepare($voitures);
            $req2->execute();
            $req2->setFetchMode(PDO::FETCH_CLASS, 'ModelVoiture');
            $all =$req2->fetchAll(PDO::FETCH_OBJ);
            foreach($all as $voitures=>$key){
                $immat['immatriculation']= $key->immatriculation."<br>";
            }
            
          print_r($all);
          
        }
        public function getVoitureByImmat($immatriculation,$marque,$couleur) {
            echo $marque;
            echo $immatriculation;
            echo $couleur;
            $sql = "SELECT * from voiture2";
            // Préparation de la requête
            $req_prep = Model::$pdo->prepare($sql);
            
            // On donne les valeurs et on exécute la requête
            $req_prep->execute();
            // On récupère les résultats comme précédemment
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelVoiture');
            $tab_voit = $req_prep->fetch();
            print_r($tab_voit);
            // Attention, si il n'y a pas de résultats, on renvoie false
            /*if (empty($tab_voit))
            return false;
            return $tab_voit[0];*/
           }
          public function save($immatriculation,$marque,$couleur){
              echo $marque;
                $sql="INSERT INTO voiture2(immatriculation,marque,couleur)VALUES('$immatriculation','$marque','$couleur')";
                $req = Model::$pdo->prepare($sql);
                
                $values = array(
                    "marque" =>$marque,
                    
                    );
                $req->execute();
                $req->setFetchMode(PDO::FETCH_CLASS, 'ModelVoiture');
                print_r($values);
              
              
          }
        
    }
    //Voiture::getVoitureByImmat("12345",Model::$pdo);//


?>