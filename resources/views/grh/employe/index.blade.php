
<div class="panel-body">
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">Information personnelle</a></li>
        <li><a data-toggle="tab" href="#menu1">Contrat</a></li>
        <li><a data-toggle="tab" href="#menu2">Solde to Compte </a></li>
        <li><a data-toggle="tab" href="#menu3"> </a></li>
      </ul>

      <div class="tab-content">
        <div id="home" class="tab-pane fade in active" style="padding-top: 20px ">
          @include('grh.employe.info')
        </div>
        <div id="menu1" class="tab-pane fade">
          @include('grh.employe.contrat')
        </div>
        <div id="menu2" class="tab-pane fade">
          <h3>Menu 2</h3>
          <p>Some content in menu 2.</p>
        </div>
      
      </div>
</div>
