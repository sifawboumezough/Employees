<?php

 class EmployesController {

    public function getAllEmployes() {
         $employes = Employe::getAll();
         return $employes;

    }

    public function getOneEmploye(){
//          if(isset($_POST['id'])) {
//               $data = array(
//                    'id' => $_POST['id']
//               );

//                $employe = Employe::getEmploye($data);
//                 return $employe;
//     }
     }

     public function findEmployes(){
		if(isset($_POST['search'])){
			$data = array('search' => $_POST['search']);
		}
		$employes = Employe::searchEmploye($data);
		return $employes;
	} 


        

    public function addEmploye(){
          if(isset($_POST['submit'])) {
               $empl = array(
               
                    'firstname' => $_POST['firstname'],
                    'lastname' => $_POST['lastname'],
                    'matricule' => $_POST['matricule'],
                    'depart' => $_POST['depart'],
                    'poste' => $_POST['poste'],
                    'data_emb' => $_POST['date_emb'],
                    'statut' => $_POST['statut'],
               );

               $result = Employe::add($empl);
               if($result == 'exists') {
                    Session::set('success' , 'Employe Added');
                    // header('location:'.BASE_URL);
                    Redirect::to('home');
               }else {
                    echo $result;
               }
          }
    }

     public function deleteEmploye() {
          if(isset($_POST['id'])) {
               $empl['id'] = $_POST['id'];
               $result = Employe::delete($empl);

               if($result=='ok') {
                    Session::set('success' , 'Employe Deleted');
                    Redirect::to('home');
               } else {
                    echo $result;
               }
          }
     }

     public function updateEmploye() {
          if(isset($_POST['submit'])) {
               $data = array(
                    'id' => $_POST['id'], 
                    'firstname' => $_POST['firstname'],
                    'lastname' => $_POST['lastname'],
                    'mat' => $_POST['matricule'],
                    'depart' => $_POST['depart'],
                    'poste' => $_POST['poste'],
                    'data_emb' => $_POST['date_emb'],
                    'statut' => $_POST['statut'],
               );

               $result = Employe::update($employe);
               if($result === 'ok') {
                    header ('location :' .BASE_URL);
               }else {
                    echo $result;
               }

          }
     }


   

  




}


?>