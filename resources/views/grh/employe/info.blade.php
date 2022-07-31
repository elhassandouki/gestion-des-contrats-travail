<form class="form-horizontal">
	<div class="form-group">
		<div class="col-md-1">
		  <label for="colFormLabelSmid" class="control-label">ID</label>
		  <input type="text" class="form-control" value="{{ $Employee->id }}" readonly id="colFormLabelSmid" placeholder="ID">
		</div>
		<div class="col-md-1">
		  <label for="colFormLabelSm1" class="control-label">CIN</label>
		  <input type="text" class="form-control" value="{{ $Employee->cin }}" readonly id="colFormLabelSm1" name="cin" placeholder="Entrer CIN">
		</div>
		<div class="col-md-2">
		  <label for="colFormLabelSm2" class="control-label">Prénom</label>
		  <input type="text" class="form-control" value="{{ $Employee->prenom }}" id="colFormLabelSm2" placeholder="Prénom">
		</div>
	  <div class="col-md-2">
		  <label for="colFormLabelSm3" class="control-label">Nom</label>
		  <input type="text" class="form-control" value="{{ $Employee->nom }}" id="colFormLabelSm3" placeholder="Nom">
		</div>
		<div class="col-md-2">
		  <label for="colFormLabelSm4" class="control-label">DDN</label>
		  <input type="text" class="form-control date" value="{{ $Employee->ddn }}" id="colFormLabelSm4" placeholder="">
		</div>
		<div class="col-md-2">
		  <label for="Lieu" class=" control-label">Lieu</label>
		  <input type="text" class="form-control" value="{{ $Employee->lieu }}" id="Lieu" placeholder=" ">
		</div>
		<div class="col-md-2">
		  <label for="Date_Validite_CIN" class="control-label">Date Validite CIN:</label>
		  <input type="text" class="form-control date" value="{{ $Employee->date_validite_cin }}" id="Date_Validite_CIN" >
		</div>
	</div>

	<div class="form-group">

		<div class="col-md-4">
		  <label for="Adresse" class="control-label">Adresse</label>
		  <input type="text" class="form-control" id="Adresse" value="{{ $Employee->adresse }}"  placeholder="">
	 </div>
	 <div class="col-md-2">
		<label for="sexe" class=" control-label">Sexe</label>
		 <select type="select" name="sexe" class="form-control" >
		  <option value="Masculin"> Masculin </option>
		  <option value="Féminin">  Féminin  </option>
		 </select>
	 </div>
	 <div class="col-md-2">
		<label for="Situation_Familiale" class=" control-label">Situation Familiale</label>
		<select type="select" class="form-control" >
		  <option value="Célibataire"> Célibataire </option>
		  <option value="Marié">  Marié  </option>
		  <option value="Veuf">  Veuf  </option>
		  <option value="Divorcé">  Divorcé  </option>
		</select>
	</div>
	<div class="col-md-2">
		<label for="Ville" class=" control-label">Ville</label>
		<input  type="text" class="form-control" value="{{ $Employee->ville }}" id="Ville" placeholder=" ">
	</div>
	<div class="col-md-2">
		<label for="Nombre_Enfants" class=" control-label">Nombre Enfants</label>
		<input  type="number" class="form-control" min="0" value="{{ $Employee->nombre_enfants }}" id="Nombre_Enfants" placeholder=" ">
	</div>
	</div>

	<div class="form-group">

		<div class="col-md-2">
		  <label for="nationalite" class="control-label">Nationalité</label>
		  <input type="text" class="form-control" id="nationalite" value="{{ $Employee->nationalite }}" placeholder="">
	 </div>
	 <div class="col-md-2">
		  <label for="date_entree" class="control-label">Date d'entrée</label>
		  <input type="text" class="form-control date" value="{{ $Employee->date_entree }}" id="date_entree" >
	 </div>
	 <div class="col-md-2">
		  <label for="Numero_CNSS" class="control-label">Numéro CNSS</label>
		  <input type="text" class="form-control" id="Numero_CNSS" value="{{ $Employee->numero_cnss }}" placeholder="">
	 </div>
	 <div class="col-md-2">
		  <label for="RIB" class="control-label">RIB</label>
		  <input type="text" class="form-control" id="RIB" value="{{ $Employee->rib }}" placeholder="">
	 </div>
	 <div class="col-md-2">
		  <label for="Telephone" class="control-label">Télephone</label>
		  <input type="text" class="form-control" id="Telephone" value="{{ $Employee->telephone }}" max="10" placeholder="">
	 </div>
	 <div class="col-md-2">
		  <label for="personee_acontact" class="control-label">Contacter en cas d'urgence</label>
		  <input type="text" class="form-control" id="personee_acontact" value="{{ $Employee->personee_acontact }}" placeholder="PERSONNE A CONTACTER EN CAS D'URGENCE">
	 </div>

	</div>
	<div class="form-group">

		<div class="col-md-2">
		  <label for="equipe" class="control-label">L'Équipe</label>
		  <input type="text" class="form-control" id="equipe" value="{{ $Employee->equipe }}" placeholder="">
	 </div>
	 <div class="col-md-2">
		  <label for="transporteur" class="control-label">Transporteur</label>
		  <input type="text" class="form-control" id="transporteur" value="{{ $Employee->transporteur }}" >
	 </div>
	 <div class="col-md-2">
		  <label for="region" class="control-label">Région</label>
		  <input type="text" class="form-control" id="region" value="{{ $Employee->region }}" placeholder="">
	 </div>
	 <div class="col-md-2">
		  <label for="ville_2" class="control-label">Ville</label>
		  <input type="text" class="form-control" id="ville_2" value="{{ $Employee->ville_2 }}" placeholder="">
	 </div>
	 <div class="col-md-2">
		  <label for="pays" class="control-label">Pays</label>
		  <input type="text" class="form-control" id="pays" value="{{ $Employee->pays }}"  placeholder="PERSONNE A CONTACTER EN CAS D'URGENCE">
	 </div>
	 <div class="col-md-2">
		  <label for="adresse_actuelle" class="control-label">Adresse actuelle</label>
		  <input type="text" class="form-control" value="{{ $Employee->adresse_actuelle }}" id="adresse_actuelle" placeholder="">
	 </div>
	 
	</div>
<div class="form-group">

		<div class="col-md-2">
		  <label for="fonction" class="control-label">Fonction</label>
		  <select type="select" class="form-control" >
			  <option value="OUVRIER SAISONNIER"> OUVRIER SAISONNIER </option>
		  </select>
	 </div>
	 <div class="col-md-2">
		  <label for="categorie_professionnelle" class="control-label"> Catégorie professionnelle</label>
		  <select type="select" class="form-control" >
			  <option value="SAISONNIER">  SAISONNIER </option>
		  </select>
	 </div>
	 <div class="col-md-2">
		  <label for="departement" class="control-label"> Département</label>
		  <select type="select" name="departement" class="form-control" >
			  <option value="Département">  Département </option>
		  </select>
	 </div>
	 
	</div>
	<hr>
    <button class="btn btn-sm btn-danger pull-right" >
            Enregistrer
    </button>
</form>



	  	



	  	

	  	