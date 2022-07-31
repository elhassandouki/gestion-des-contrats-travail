@extends('layouts.houcine')
@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-lg-1 col-md-1">
        <a href="{{url('/home')}}">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title text-center">
                <i class="fa fa-th-large fa-lg" aria-hidden="true"></i>
              </h3>
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-10 col-md-10">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title text-center"><b>Liste Fermes</b></h3>
          </div>
        </div>
      </div>
      <div class="col-lg-1 col-md-1">
        <button class="btn btn-primary btn-lg btn-block"  data-target="#myModal" onclick="fun_modal(2,0)" data-toggle="modal" >
          <i class="fa fa-plus fa-lg" aria-hidden="true"></i>
        </button>
      </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12" >
            <div class="panel panel-success" style="box-shadow: 10px 10px 5px #888888;min-height: 400px;border-radius: 0">
              <div class="panel-body">
                @include('grh.ferme.liste')
              </div>
            </div>
        </div> 
    </div>
</div>
@endsection

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script type="text/javascript">

    function FermeTable(){

      FermeTable = $('#FermeTable').DataTable({
          language: {
            "sProcessing": "Traitement en cours...",
                    "sSearch": "Rechercher ",
                    "sLengthMenu": "Afficher  _MENU_  Contrats",
                    "sInfo": "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                    "sInfoEmpty": "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
                    "sInfoFiltered": "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                    "sInfoPostFix": "",
                    "sLoadingRecords": "Chargement en cours...",
                    "sZeroRecords": "Aucun &eacute;l&eacute;ment &agrave; afficher",
                    "sEmptyTable": "Aucune donn&eacute;e disponible dans le tableau",
                    "oPaginate": {
                    "sFirst": "Premier",
                    "sPrevious": "Pr&eacute;c&eacute;dent",
                    "sNext": "Suivant",
                    "sLast": "Dernier"
                    },
                    "oAria": {
                        "sSortAscending": ": activer pour trier la colonne par ordre croissant",
                        "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
                    }
          },

          "columns": [
              { 'data': 'n_ferme',
                'className': 'text-center'
              },
              { 'data': 'ferme',
                'render': function (v, t, r) {
                            return '<button class="btn btn-sm" style="background-color:'+r.color_ferme+'" ><b>'+v+'</b></button>';
                        } },
              { 'data': 'color_ferme' },
              { 'data': 'admin_ferme' },
              { 'data': 'gerant_ferme' },
              { 'data': 'adresse',
                'className': 'text-center',
              },
              {
                  'data': 'id',
                  'searchable': false,
                  'sortable': false,
                  'className': 'text-right',
                  'render': function (v, t, r) {
                            return '<button class="btn btn-info btn-sm"  data-target="#myModal" onclick="fun_modal(2,'+v+')" data-toggle="modal" ><i class="fa fa-edit fa-xs" aria-hidden="true"></i></button> ';
                                   
                        }
              }
            ],

            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": app_url+'/Fermes',
            dom: 'Bfrtip',
         
                buttons: [ 'pdfHtml5', 'csvHtml5', 'copyHtml5', 'excelHtml5' ]
          

        });


      }
    $(document).ready(function(){

      app_url = $('meta[name="app-url"]').attr('content');
      FermeTable();
    });



</script>