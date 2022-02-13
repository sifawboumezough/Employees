<?php

    if(isset($_POST['submit'])) {
        $empl = new EmployesController();
        $empl->addEmploye();
    }

        // print_r($employes);
 ?>

 <div class="container">
        <div class="row my-4">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header">Add Employe</div>
                    <div class="card-body bg-light">
                    <a href="<?php  echo BASE_URL;?>" class="btn btn-sm btn-secondary mr-2 mb-2">
                        <i class="fas fa-home"> </i>
                    </a>
                    <form method="post">
						<div class="form-group">
							<label for="firstname">FirstName</label>
							<input type="text" name="firstname" class="form-control" placeholder="Firs tName">
						</div>
						<div class="form-group">
							<label for="lastname">LastName</label>
							<input type="text" name="lastname" class="form-control" placeholder="Last Name">
						</div>
						<div class="form-group">
							<label for="mat">Matricule</label>
							<input type="text" name="matricule" class="form-control" placeholder="Matricule">
						</div>
						<div class="form-group">
							<label for="depart">Département</label>
							<input type="text" name="depart" class="form-control" placeholder="Département">
						</div>
						<div class="form-group">
							<label for="poste">Poste</label>
							<input type="text" name="poste" class="form-control" placeholder="Poste">
						</div>
						<div class="form-group">
							<label for="date_emb">Date Embauche</label>
							<input type="date" name="date_emb" class="form-control">
						</div>
						<div class="form-group">
							<select class="form-control" name="statut">
								<option value="1">Active</option>
								<option value="0">Inactive</option>
							</select>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary" name="submit">Validate</button>
						</div>
                            
                    </form>


                         
                    </div>
                </div>
            </div>
        </div>

 </div>









