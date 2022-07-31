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
            <h3 class="panel-title text-center"><b>Liste Contrats</b></h3>
          </div>
        </div>
      </div>
      <div class="col-lg-1 col-md-1">
        <button class="btn btn-primary btn-lg btn-block"  data-target="#myModal" onclick="" data-toggle="modal" >
          <i class="fa fa-plus fa-lg" aria-hidden="true"></i>
        </button>
      </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12" >
            <div class="panel panel-success" style="box-shadow: 10px 10px 5px #888888;min-height: 400px;border-radius: 0">
              <div class="panel-body">
                @include('grh.contrat.liste')
              </div>
            </div>
        </div> 
    </div>
</div>
@endsection

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script type="text/javascript">

    function ContratTable(){

      ContratTable = $('#ContratTable').DataTable({
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
              { 'data': 'id_employee',
                'className': 'text-center'
              },
              { 'data': 'cin_employee',
                'render': function (v, t, r) {
                   //console.log(r);     
                   btn_class = r.duplicate==1?'btn-danger':'btn-default';
                            return '<button class="btn btn-md '+btn_class+'" ><b>'+v+'</b></button>';
                        } }, 
              { 'data': 'ferme',
                'render': function (v, t, r) {

                            return '<button class="btn btn-md" ><b>AB'+v+'</b></button>';
                        } },
              {
              'data': 'date_embauche',
              'searchable': false,
              //'sortable': false,
              'render': function (v) {
                if (v != null) {
                  var date = new Date(v);
                  var month = date.getMonth() + 1;
                  var day = date.getDate();
                  return (day > 9 ? day : '0' + day) + '/' + (month > 9 ? month : '0' + month) + '/' + date.getFullYear();
                }
                return v;
              },
              'className': 'text-center'
              },
              {
              'data': 'date_envoyer',
              'searchable': false,
              //'sortable': false,
              'render': function (v) {
                if (v != null) {
                  var date = new Date(v);
                  var month = date.getMonth() + 1;
                  var day = date.getDate();
                  return (day > 9 ? day : '0' + day) + '/' + (month > 9 ? month : '0' + month) + '/' + date.getFullYear();
                }
                return v;
              },
              'className': 'text-center'
              },
              {
              'data': 'date_recu',
              'searchable': false,
              //'sortable': false,
              'render': function (v) {
                if (v != null) {
                  var date = new Date(v);
                  var month = date.getMonth() + 1;
                  var day = date.getDate();
                  return (day > 9 ? day : '0' + day) + '/' + (month > 9 ? month : '0' + month) + '/' + date.getFullYear();
                }
                return v;
              },
              'className': 'text-center'
              },
                            { 'data': 'legalise',
                'className': 'text-center',
                'render': function (v, t, r) {
                  btn_class = v=='en attent'?'btn-warning':'btn-success';
                    return '<button type="button" class="btn '+btn_class+' btn-xs btn-circle">'+v+'</button>';
                 }
              }, 
              { 'data': 'dossier_valider',
                'className': 'text-center',
                'render': function (v, t, r) {
                  btn_class = v=='Oui'?'btn-success':'btn-warning';
                    return '<button type="button" class="btn '+btn_class+' btn-xs btn-circle">'+v+'</button>';
                 }
              }, 
              { 'data': 'cin_valider',
                'className': 'text-center',
                'render': function (v, t, r) {
                  btn_class = v=='Oui'?'btn-success':'btn-warning';
                    return '<button type="button" class="btn '+btn_class+' btn-xs btn-circle">'+v+'</button>';
                 }
              },
              { 'data': 'cnss_valider',
                'className': 'text-center',
                'render': function (v, t, r) {
                  btn_class = v=='Oui'?'btn-success':'btn-warning';
                    return '<button type="button" class="btn '+btn_class+' btn-xs btn-circle">'+v+'</button>';
                 }
              },
              { 'data': 'ficher_valider',
                'className': 'text-center',
                'render': function (v, t, r) {
                 btn_class = v=='Oui'?'btn-success':'btn-warning';
                    return '<button type="button" class="btn '+btn_class+' btn-xs btn-circle">'+v+'</button>';
                 }
              },
              { 'data': 'rib_valider',
                'className': 'text-center',
                'render': function (v, t, r) {
                  btn_class = v=='Oui'?'btn-success':'btn-warning';
                    return '<button type="button" class="btn '+btn_class+' btn-xs btn-circle">'+v+'</button>';
                 }
              },
              {
              'data': 'date_fin_contrat',
              'searchable': false,
              //'sortable': false,
              'render': function (v) {
                if (v != null) {
                  var date = new Date(v);
                  var month = date.getMonth() + 1;
                  var day = date.getDate();
                  return (day > 9 ? day : '0' + day) + '/' + (month > 9 ? month : '0' + month) + '/' + date.getFullYear();
                }
                return v;
              },
              'className': 'text-center'
              },
              {
                  'data': 'id',
                  'searchable': false,
                  'sortable': false,
                  'className': 'text-right',
                  'render': function (v, t, r) {
                    return '<a class="btn btn-success btn-sm" target="_blank"  href="'+app_url+'/imprimer/contrat/'+v+'" ><i class="fa fa-file-pdf-o fa-xs" aria-hidden="true"></i></a> '+
                    '<button class="btn btn-info btn-sm"  data-target="#myModal" onclick="fun_modal(2,'+v+')" data-toggle="modal" ><i class="fa fa-edit fa-xs" aria-hidden="true"></i></button> '+
                    '<button class="btn btn-danger btn-sm"  data-target="#myModal" onclick="fun_modal(2,'+v+')" data-toggle="modal" ><i class="fa fa-trash fa-xs" aria-hidden="true"></i></button> ';
                                   
                        }
              }
            ],

            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": app_url+'/Contrats',
            dom: 'Bfrtip',
         
                buttons: [ 'pdfHtml5', 'csvHtml5', 'copyHtml5', 'excelHtml5' ]
          

        });


      }
    $(document).ready(function(){

      app_url = $('meta[name="app-url"]').attr('content');
      ContratTable();
    });



</script>