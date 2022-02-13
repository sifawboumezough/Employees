<?php


class Employe {
      static public function getAll() {
        $stmt = DB::connect()->prepare('SELECT * FROM employes');
        $stmt->execute();
        return $stmt->fetchAll();
    } 

    static public function getEmploye($data) {
        // $id = $data['id'];
        // try {
        //   $query = 'SELECT * FROM employes WHERE id=:id';
		    // 	$stmt = DB::connect()->prepare($query);
        //   $stmt->execute(array(":id" => $id));
        //   $employe =$stmt->fetchAll(PDO::FETCH_OBJ);
        //   return $employe;
        //     } catch(PDOException $ex){
        //       echo 'error' .$ex->getMessage();
        //   }
        }          
        
    static public function add($empl) {
      $stmt = DB::connect()->prepare('INSERT INTO employes(firstname,lastname,matricule,depart,poste,date_emb,statut) 
      VALUES(:firstname, :lastname, :matricule , :depart, :poste, :date_emb, :statut)');

      $stmt->bindParam(':firstname', $empl['firstname']);
      $stmt->bindParam(':lastname', $empl['lastname']);
      $stmt->bindParam(':matricule', $empl['matricule']);
      $stmt->bindParam(':depart', $empl['depart']);
      $stmt->bindParam(':poste', $empl['poste']);
      $stmt->bindParam(':date_emb', $empl['date_emb']);
      $stmt->bindParam(':statut', $empl['statut']);

      if($stmt->execute()) {
        return 'exists';
        
      } else {
        return 'error';
      }

    }


    static public function delete($empl) {
      $id = $empl['id'];
      try {
        $query = 'DELETE  FROM employes WHERE id=:id';
        $stmt = DB::connect()->prepare($query);
        $stmt->execute(array(":id" => $id));
        if($stmt->execute()) {
          return 'ok';
        }
          } catch(PDOException $ex){
            echo 'error' .$ex->getMessage();
        }
    }

    
    static public function update($empl) {
      $stmt = DB::connect()->prepare('UPDATE  employes SET (firstname =:firstname ,lastname =:lastname ,matricule =:matricule ,depart =:depart ,poste =:poste,date_emb = :date_emb,statut =:statut
    WHERE id = :id');
      $stmt->bindParam(':id', $empl['id']);
      $stmt->bindParam(':firstname', $empl['firstname']);
      $stmt->bindParam(':lastname', $empl['lastname']);
      $stmt->bindParam(':matricule', $empl['matricule']);
      $stmt->bindParam(':depart', $empl['depart']);
      $stmt->bindParam(':poste', $empl['poste']);
      $stmt->bindParam(':date_emb', $empl['date_emb']);
      $stmt->bindParam(':statut', $empl['statut']);
      die(print_r($empl));
      if($stmt->execute()) {
        return 'ok';
        
      } else {
        return 'error';
      }

    }

    static public function searchEmploye($data){
      $srch = $data['search'];
      try {
        $query = 'SELECT * FROM employes WHERE firstname LIKE  ? OR lastname LIKE ?';
        $stmt = DB::connect()->prepare($query);
        $stmt->execute(array('%'.$srch.'%','%'.$srch.'%'));
        $employes = $stmt->fetchAll();
        return $employes;
      }catch(PDOException $ex){
          echo 'error' .$ex->getMessage();
      }
    }
    


    

}

?>