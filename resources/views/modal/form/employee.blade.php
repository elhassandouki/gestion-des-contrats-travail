@php $role = Auth::user()->role; @endphp
<form class="form-horizontal" id="form-save" method="post" action="{{route($role.'-Employee-store')}}" >
	   @csrf
	<div class="form-group">
		<div class="col-md-3">
		  <label for="colFormLabelSmid" class="control-label">ID</label>
		  @php $num = App\Employee::orderby('id','DESC')->value('id')+1;  @endphp
		  <input type="text" class="form-control" value="{{$Employee->id==0?$num:$Employee->id}}" readonly name="id"  id="colFormLabelSmid" placeholder="ID">
		</div>
		<div class="col-md-3">
		  <label for="colFormLabelSm1" class="control-label">CIN</label>
		  <input type="text" class="form-control" value="{{ $Employee->cin }}"  id="colFormLabelSm1" name="cin" placeholder="Entrer CIN">
		</div>
		<div class="col-md-3">
		  <label for="colFormLabelSm2" class="control-label">Prénom</label>
		  <input type="text" class="form-control" value="{{ $Employee->prenom }}" name="prenom" id="colFormLabelSm2" placeholder="Prénom">
		</div>
	  <div class="col-md-3">
		  <label for="colFormLabelSm3" class="control-label">Nom</label>
		  <input type="text" class="form-control" value="{{ $Employee->nom }}"  name="nom" id="colFormLabelSm3" placeholder="Nom">
		</div>
		<div class="col-md-3">
		  <label for="colFormLabelSm4" class="control-label">DDN</label>
		  <input type="text" class="form-control date" value="{{$Employee->ddn!=null?$Employee->ddn->format('d/m/Y'):''}}" name="ddn" id="colFormLabelSm4" placeholder="">
		</div>
		<div class="col-md-3">
		  <label for="Lieu" class=" control-label">Lieu</label>
		  <input type="text" class="form-control" value="{{ $Employee->lieu }}" name="lieu" id="Lieu" placeholder=" ">
		</div>
		<div class="col-md-3">
		  <label for="Date_Validite_CIN" class="control-label">Date Validite CIN:</label>
		  <input type="text" class="form-control date" value="{{$Employee->date_validite_cin!=null?$Employee->date_validite_cin->format('d/m/Y'):''}}"name="date_validite_cin" id="Date_Validite_CIN" >
		</div>
		<div class="col-md-3">
		  <label for="nationalite" class="control-label">Nationalité</label>
		  <input type="text" class="form-control" id="nationalite" name="nationalite" value="{{ $Employee->nationalite }}" placeholder="">
	 	</div>
	</div>
<div class="form-group">

	<div class="col-md-6">
		  <label for="Adresse" class="control-label">Adresse</label>
		  <input type="text" class="form-control" id="Adresse" name="adresse" value="{{ $Employee->adresse }}"  placeholder="">
	</div>
	<div class="col-md-2">
		<label for="Ville" class=" control-label">Ville</label>
		<input  type="text" class="form-control" value="{{ $Employee->ville }}" name="ville" id="Ville" placeholder=" ">
	</div>
	<div class="col-md-2">
		<label for="sexe" class=" control-label">Sexe</label>
		 <select type="select" name="sexe" class="form-control" >
		  <option value="Masculin" {{'Masculin'==$Employee->sexe?'selected':''}}> Masculin </option>
		  <option value="Féminin" {{'Féminin'==$Employee->sexe?'selected':''}}>  Féminin  </option>
		 </select>
	 </div>
	 <div class="col-md-2">
		<label for="Situation_Familiale" class=" control-label">Situation Familiale</label>
		<select type="select" name="situation_familiale" class="form-control" >
		  <option value="Célibataire" {{'Célibataire'==$Employee->situation_familiale?'selected':''}}> Célibataire </option>

		  <option value="Marié" {{'Marié'==$Employee->situation_familiale?'selected':''}}>   Marié  </option>
		  <option value="Veuf" {{'Veuf'==$Employee->situation_familiale?'selected':''}}>   Veuf  </option>
		  <option value="Divorcé" {{'Divorcé'==$Employee->situation_familiale?'selected':''}}>   Divorcé  </option>
		</select>
	</div>
	<div class="col-md-2">
		<label for="nombre_enfants" class=" control-label">Nombre Enfants</label>
		<input  type="number" class="form-control" min="0" max="100" value="{{ $Employee->nombre_enfants }}" name="nombre_enfants" id="nombre_enfants" placeholder=" ">
	</div>
	 <div class="col-md-2">
		  <label for="date_entree" class="control-label">Date d'entrée</label>
		  <input type="text" class="form-control date" value="{{$Employee->id==0?Carbon\Carbon::toDay()->format('d/m/Y') :$Employee->date_entree->format('d/m/Y')}}" name="date_entree" id="date_entree" >
	 </div>
	 <div class="col-md-2">
		  <label for="Numero_CNSS" class="control-label">Numéro CNSS</label>
		  <input type="text" class="form-control" id="Numero_CNSS" value="{{ $Employee->numero_cnss }}" name="numero_cnss" placeholder="">
	 </div>
	 <div class="col-md-3">
		  <label for="RIB" class="control-label">RIB</label>
		  <input type="text" class="form-control" id="RIB" value="{{ $Employee->rib }}" name="rib" placeholder="">
	 </div>
	 <div class="col-md-3">
		  <label for="Telephone" class="control-label">Télephone</label>
		  <input type="text" class="form-control" id="Telephone" value="{{ $Employee->telephone }}" name="telephone" max="10" placeholder="">
	 </div>
	 <div class="col-md-4">
		  <label for="personee_acontact" class="control-label">Contacter en cas d'urgence</label>
		  <input type="text" class="form-control" id="personee_acontact" value="{{ $Employee->personee_acontact }}" name="personee_acontact" placeholder="PERSONNE A CONTACTER EN CAS D'URGENCE">
	</div>
	<div class="col-md-2">
		  <label for="equipe" class="control-label">L'Équipe</label>
		  <input type="text" class="form-control" id="equipe" value="{{ $Employee->equipe }}" name="equipe" placeholder="">
	 </div>
	 <div class="col-md-3">
		  <label for="transporteur" class="control-label">Transporteur</label>
		  <input type="text" class="form-control" id="transporteur" value="{{ $Employee->transporteur }}" name="transporteur" >
	 </div>
	 <div class="col-md-3">
		  <label for="region" class="control-label">Région</label>
		  <input type="text" class="form-control" id="region" value="{{ $Employee->region }}"  name="region" placeholder="">
	 </div>
	 <div class="col-md-3">
		  <label for="ville_2" class="control-label">Ville</label>
		  <input type="text" class="form-control" id="Ville_2" value="{{ $Employee->Ville_2 }}" name="Ville_2" placeholder="">
	 </div>
	 <div class="col-md-3">
		  <label for="pays" class="control-label">Pays</label>
		  <input type="text" class="form-control" id="pays" value="{{ $Employee->pays }}" name="pays"  placeholder="Pays">
	 </div>
	 <div class="col-md-6">
		  <label for="adresse_actuelle" class="control-label">Adresse actuelle</label>
		  <input type="text" class="form-control" value="{{ $Employee->adresse_actuelle }}" name="adresse_actuelle" id="adresse_actuelle" placeholder="">
	 </div>
	<div class="col-md-3">
		  <label for="fonction" class="control-label">Fonction</label>
		  <select type="select" name="fonction" class="form-control" >
			  <option value="OUVRIER SAISONNIER"> OUVRIER SAISONNIER </option>
		  </select>
	 </div>
	 <div class="col-md-3">
		  <label for="categorie_professionnelle" class="control-label"> Catégorie professionnelle</label>
		  <select type="select" name="categorie_professionnelle" class="form-control" >
			  <option value="SAISONNIER">  SAISONNIER </option>
		  </select>
	 </div>
	 <div class="col-md-3">
		  <label for="departement" class="control-label"> Département</label>
		  <select type="select" name="departement" class="form-control" >
			  <option value="Département">  Département </option>
		  </select>
	 </div>
	 
	</div>
	<div>
	    <button type="button" class="btn btn-danger btn-sm " data-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-success btn-sm "  onclick="fun_add()">Enregistrer</button>
	</div>

</form>

<script type="text/javascript">

function fun_add(){

    var form = $('#form-save');
        $.ajax({
          url      : form.attr('action'),
          method   : form.attr('method'),
          data     : form.serialize(),
          dataType : 'html',
          success  : function(data){
          	$("#show_form").html(data);
          }
        });
  }


	 function setDate(){
        $('.date').daterangepicker({
          singleDatePicker: true,
          showDropdowns: false,
          autoUpdateInput : false,
          locale: {
            format: 'DD/MM/YYYY'
          },    
          minYear: 2000,
          maxYear: parseInt(moment().format('YYYY'),10)
        }).on('apply.daterangepicker', function(ev, picker) {
          $(this).val(picker.startDate.format('DD/MM/YYYY'));
        });
     $('.datetime').daterangepicker({
          singleDatePicker: true,
        timePicker : true,
          showDropdowns: false,
          locale: {
            format: 'DD/MM/YYYY HH:mm'
          },    
          minYear: 2000,
          maxYear: parseInt(moment().format('YYYY'),10)
        });
    }
	$(document).ready(function(){ 
        setDate();
    });

</script>



	  	



	  	

	  	