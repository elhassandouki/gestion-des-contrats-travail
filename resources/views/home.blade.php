@push('style')
  <style type="text/css">
      .ui-autocomplete {
          max-height: 100px;
          overflow-y: auto;
          z-index: 9999;
          font-family: 'Ubuntu Condensed', sans-serif;
          /* prevent horizontal scrollbar */
          overflow-x: hidden;
      }
      /* IE 6 doesn't support max-height
      * we use height instead, but this forces the menu to always be this tall
      */
      html .ui-autocomplete {
          height: 100px;
      }
  </style>
@endpush  
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
      <div class="col-lg-11 col-md-11">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title text-center"><b>Nouveau Recrutement</b></h3>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12" >
            <div class="panel panel-default" style="box-shadow: 10px 10px 5px #888888;">
              <div class="panel-body">
                <form id="form-rdv" class="form-horizontal" action="" method="post" onsubmit="return false;">
                  <div class="input-group col-sm-6 col-sm-offset-3">
                    <input type="text" class="form-control" placeholder="Rechercher Par CIN" name="cin">
                    <div class="input-group-btn">
                        <button class="btn btn-primary" onclick="fun_afficher()" type="button">Rechercher</button>
                    </div>
                </div>
                </form>
              </div>
            </div>
            <div class="panel panel-default" id="container" style="box-shadow: 10px 10px 5px #888888;min-height: 400px;border-radius: 0">
                
            </div>
        </div> 
    </div>
</div>
@endsection

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script type="text/javascript">

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

    function fun_afficher(){
        $("#container").show();
        var cin = $('input[name=cin]').val(); 
        var container = $("#container");
        container.html('<div class="text-center"><i class="fa fa-spinner fa-pulse fa-3x fa-fw" style="margin: 180px 0 180px 0;color:#337ab7;"></i></div>');

        $.ajax({
          url: app_url+'/Employee/'+cin,
          dataType: 'html',
          type :'get',
          success: function(data){
            container.html(data);
            setDate();
          }
        });      
    }

    function modals(term){
        var container = $("#show_data");
        if($.trim(term).length>1){
            var type = INPUT.data('type');
            $.ajax({
              url      : app_url+'/autocomplete',
              method   : 'post',
              data     : {term:term,type:type},
              dataType : 'html',
              success  : function(data){
                  container.html(data);
                  container.find('tbody tr').on('click',function(){
                    agadev_upd_type(type,$(this));
                    $("#autocomplete-modal").modal('hide');
                  });
                }
            });
        }
        else{
          container.empty();
        }
      }


    $(document).ready(function(){
      $("#container").hide();
      app_url = $('meta[name="app-url"]').attr('content');
      setDate();
   
    });



</script>