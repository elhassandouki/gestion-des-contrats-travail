<div class="table-responsive">
  <table class="table table-striped table-sm" id="table">
    <thead>
      <tr>
        <th class="text-left">ID</th>
        <th class="text-left">CIN</th>
        <th class="text-left">Nom</th>
		<th class="text-left">Prénom</th>
      </tr>
    </thead>
    <tbody>
      @foreach($Employee as $e)
      <tr data-id="{{$e->id}}"
          data-cin="{{$e->cin}}" 
          data-nom="{{$e->nom}}" 
          data-prenom="{{$e->prenom}}" >
          
        <td class="text-left" > {{ $e->id}}</td>
        <td class="text-left" > {{ $e->cin}}</td>
        <td class="text-left" > {{ $e->nom}}</td>
        <td class="text-left" > {{ $e->prenom}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>