  @php $role = Auth::user()->role; @endphp
<form class="form-horizontal" id="form-save" method="post" action="{{route($role.'-Contrat-store2')}}" >
     @csrf
        <div class="form-group">
          <div class="col-md-4">
            <label for="ferme" class=" control-label">CIN</label>
            <input type="hidden" class="form-control" id="id" value="{{$Contrats->id }}" s name="id">
            <input type="text" class="form-control" id="cin_employee" value="{{$Contrats->cin_employee }}" readonly="" name="cin_employee">
          </div>
          <div class="col-md-4">
            <label for="ferme" class=" control-label">ID Employee </label>
            <input type="text" class="form-control" id="id_employee" value="{{$Contrats->id_employee }}" readonly="" name="id_employee">
          </div>
          <div class="col-md-4">
            <label for="ferme" class=" control-label">N° Ferme </label>
            <select type="select" name="ferme" readonly class="form-control" >
                <option  value="{{$Contrats->ferme }}" > AB{{$Contrats->ferme }}</option>
            </select>
          </div>
          <div class="col-md-3">
            <label for="date_embauche" class="control-label">Date d'embauch </label>
            <input type="text" class="form-control date" id="date_embauche" value="{{$Contrats->date_embauche!=null?$Contrats->date_embauche->format('d/m/Y'):''}}" name="date_embauche">
          </div>
            <div class="col-md-3">
            <label for="date_recu" class="control-label">Date Reçu </label>
            <input type="text" class="form-control date" id="date_recu" value="{{$Contrats->date_recu!=null?$Contrats->date_recu->format('d/m/Y'):''}}" name="date_recu">
          </div>
          <div class="col-md-3">
            <label for="date_envoyer" class="control-label">Date Envoye</label>
            <input type="text" class="form-control date" value="{{$Contrats->date_envoyer!=null?$Contrats->date_envoyer->format('d/m/Y'):''}}" id="date_envoyer" name="date_envoyer">
          </div>
          <div class="col-md-3">
            <label for="date_fin_contrat" class="control-label">Date Fin de contrat </label>
            <input type="text" class="form-control date" id="date_fin_contrat" value="{{$Contrats->date_fin_contrat!=null?$Contrats->date_fin_contrat->format('d/m/Y'):''}}" name="date_fin_contrat" >
          </div>
          <div class="col-md-2">
            <label for="legalise" class=" control-label">Legalise</label>
             <select type="select" name="legalise" class="form-control" >
              <option value="en attent" {{'en attent'==$Contrats->legalise?'selected':''}}> En attent </option>
              <option value="Ok" {{'Ok'==$Contrats->legalise?'selected':''}}> Ok </option>
             </select>
          </div>
          <div class="col-md-2">
           <label for="dossier_valider" class=" control-label">Dossier</label>
           <select type="select" name="dossier_valider" class="form-control" >
            <option value="Non" {{'Non'==$Contrats->dossier_valider?'selected':''}}> Non </option>
            <option value="Oui" {{'Oui'==$Contrats->dossier_valider?'selected':''}}> Oui </option>
           </select>
          </div>
          <div class="col-md-2">
           <label for="cin_valider" class=" control-label">Cin</label>
           <select type="select" name="cin_valider" class="form-control" >
            <option value="Non" {{'Non'==$Contrats->cin_valider?'selected':''}}> Non </option>
            <option value="Oui" {{'Oui'==$Contrats->cin_valider?'selected':''}}> Oui </option>
           </select>
          </div>
          <div class="col-md-2">
           <label for="cnss_valider" class=" control-label">Cnss</label>
           <select type="select" name="cnss_valider" class="form-control" >
            <option value="Non" {{'Non'==$Contrats->cnss_valider?'selected':''}}> Non </option>
            <option value="Oui" {{'Oui'==$Contrats->cnss_valider?'selected':''}}> Oui </option>
           </select>
          </div>
          <div class="col-md-2">
           <label for="ficher_valider" class=" control-label">Ficher</label>
           <select type="select" name="ficher_valider" class="form-control" >
            <option value="Non" {{'Non'==$Contrats->ficher_valider?'selected':''}}> Non </option>
            <option value="Oui" {{'Oui'==$Contrats->ficher_valider?'selected':''}}> Oui </option>
           </select>
          </div>
          <div class="col-md-2">
           <label for="rib_valider" class=" control-label">RIB</label>
           <select type="select" name="rib_valider" class="form-control" >
            <option value="Non" {{'Non'==$Contrats->rib_valider?'selected':''}}> Non </option>
            <option value="Oui" {{'Oui'==$Contrats->rib_valider?'selected':''}}> Oui </option>
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
