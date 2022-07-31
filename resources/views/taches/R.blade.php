 <li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Employee <span class="caret"></span>
  </a>
  <ul class="dropdown-menu" role="menu">
    <li>
      <a href="{{route($role.'-employee-index')}}"> Employee </a>
      <a href="{{route($role.'-contrat-index')}}"> Contrats </a>
    </li>
    </ul>  
</li>
<li class="item"><a href="{{route($role.'-Ferme-index')}}">Ferme</a></li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> Export <span class="caret"></span></a>
    <ul class="dropdown-menu" role="menu">
      <li>
        <a href="{{route($role.'-export-Contrats')}}"> Contrats </a>
        <a href="{{route($role.'-export-Employees')}}"> Employees </a>
      </li>
    </ul>
</li>