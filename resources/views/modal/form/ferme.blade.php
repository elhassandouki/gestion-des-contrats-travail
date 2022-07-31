  @php $role = Auth::user()->role; @endphp
<form class="form-horizontal" id="form-save" method="post" action="{{route($role.'-ferme-store')}}" >
     @csrf
        <div class="form-group">
          <div class="col-md-2">
            <label for="ferme" class=" control-label">Ferme</label>
            <input type="hidden" class="form-control" id="id" value="{{$ferme->id}}" name="id">
            <input type="text" class="form-control" id="cin_employee" value="{{$Employee->ferme }}" readonly="" name="cin_employee">
          </div>
          <div class="col-md-2">
            <label for="ferme" class=" control-label">ID Employee </label>
            <input type="text" class="form-control" id="id_employee" value="{{$Employee->id }}" readonly="" name="id_employee">
          </div>
          <div class="col-md-3">
            <label for="ferme" class=" control-label">Nom & Prénom </label>
            <input type="text" class="form-control"  value="{{$Employee->nom }} {{$Employee->prenom }}" readonly>
          </div>
          <div class="col-md-2">
            <label for="ferme" class=" control-label">N° Ferme </label>
            <select type="select" name="ferme" class="form-control" readonly>
                <option  value="{{Auth::user()->ferme}}" > {{ Auth::user()->ferme}} </option>
            </select>
          </div>
          <div class="col-md-3">
            <label for="date_embauche" class="control-label">Date d'embauch </label>
            <input type="text" class="form-control date" id="date_embauche"  name="date_embauche">
          </div>
            <div class="col-md-3">
            <input type="hidden" class="form-control date" id="date_recu" name="date_recu">
          </div>
          <div class="col-md-3">
            <input type="hidden" class="form-control date" id="date_envoyer" name="date_envoyer">
          </div>
          <div class="col-md-3">
            <input type="hidden" class="form-control date" id="date_fin_contrat"  name="date_fin_contrat" >
          </div>
          <div class="col-md-2">
             <input type="hidden" name="legalise" class="form-control" value="en attent">
          </div>
          <div class="col-md-2">
           <input type="hidden" name="dossier_valider" class="form-control" value="Non" >
          </div>
          <div class="col-md-2">
           <input  type="hidden" name="cin_valider" class="form-control" value="Non" >
          </div>
          <div class="col-md-2">
           <input  type="hidden" name="cnss_valider" class="form-control" value="Non" >
          </div>
          <div class="col-md-2">
           <input  type="hidden" name="ficher_valider" class="form-control" value="Non" >
          </div>
          <div class="col-md-2">
           <input  type="hidden" name="rib_valider" class="form-control" value="Non" >
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
