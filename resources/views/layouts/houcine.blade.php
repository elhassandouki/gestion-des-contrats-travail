<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if(Auth::check())
    <!-- AJAX URL -->
    @php $role = Auth::user()->role; @endphp
    <meta name="ajx-url" content="{{ url('app') }}">
    <meta name="app-url" content="{{ url('app/'.$role) }}">
    @endif

    <title>{{ config('app.name', 'laravel') }}</title>
    <link rel="icon" href="{{ url('/favicon.ico') }}">
    
    <!-- Bootstrap -->
    <link href="{{ url('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ url('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="{{ url('vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <!-- PNotify -->
    <link href="{{ url('vendors/pnotify/pnotify.custom.min.css') }}" rel="stylesheet">
    <link href="{{ url('vendors/pnotify/animate.css') }}" rel="stylesheet">
    <!-- JqueryUI -->
    <link href="{{ url('vendors/jquery-ui/jquery-ui.css') }}" rel="stylesheet">
    <!-- DataTables -->
    <link href="{{asset('dataTables/css/jquery.dataTables.min.css')}}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    <!-- Font google -->
    <style type="text/css">
        @font-face {
            font-family: 'Nova Square';
            src: url({{url('font/NovaSquare.ttf')}});
        }

        @font-face {
            font-family: 'Ropa Sans';
            src: url({{url('font/RopaSans-Regular.ttf')}});
        }

        body{
            padding-top: 70px;
            font-family: 'Ropa Sans', sans-serif;
            background-color: #eee;
        }
        
        nav{
            font-family: 'Nova Square', cursive;
        }

        .ui-autocomplete {
          max-height: 200px;
          overflow-y: auto;
          font-family: 'Ropa Sans', sans-serif;
          /* prevent horizontal scrollbar */
          overflow-x: hidden;
        }
        
        /* IE 6 doesn't support max-height
         * we use height instead, but this forces the menu to always be this tall
        */
        html .ui-autocomplete {
            height: 200px;
        }

        .highlight{
            background-color: red;
        }
    </style>
    @stack('style')
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    <b style="color : #888888;">Atlas</b> <b style="color : #fd0303;">Berry </b><b style="color : #888888;">Farms</b>
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav navbar-left">
                      @include('taches.'.$role)
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('login') }}">Connexion</a></li>
                    @else
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Déconnexion
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    @include('modal.modal')
    @yield('content')

    <br/><br/>
    <footer id="footer" class="footer navbar-fixed-bottom" style="height: 40px;background-color: white">
        @yield('footer')
    </footer>

    <!-- jQuery -->
    <script src="{{ url('vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ url('vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>


    <!-- -->
    <script type="text/javascript" src="{{ url('vendors/jquery-ui/jquery-ui.js') }}"></script>
    <!--dataTables-->
   <!-- <script src="{{asset('dataTables/js/jquery.dataTables.min.js')}}"></script>-->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ url('vendors/moment/min/moment.min.js') }}"></script>
    <script src="{{ url('vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>


    <!-- Script -->
    <script type="text/javascript">
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    </script>

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


    function fun_modal(type,id){
        //$container = $('#show_form');
        switch(type){
        case 1:
            show_data(type,id);
            break;
        case 2:
            show_data(type,id);
            break;
        case 3:
            show_data(type,id);
            break;
        }


    
    }
    function show_data(type,id){
        $.ajax({
              url      : app_url+'/automodel/'+type+'/'+id,
              method   : 'get',
              dataType : 'html',
              success  : function(data){
                  $('#show_form').html(data);
                }
            });
    }


    $(document).ready(function(){ 
      app_url = $('meta[name="app-url"]').attr('content');

       $('#myModal').on('shown.bs.modal', function (event) {
      
      });

    });

    </script>
    @stack('script-bottom')
</body>
</html>
