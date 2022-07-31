 
<div class="table-responsive">
	<table class="table table-hover table-sm">
		<thead class="thead-light">
			<th scope="col" >Ferme</th>
			<th scope="col" >Date d'embauch</th>
			<th scope="col" >Date Reçu</th>
			<th scope="col" >Date Envoye</th>
			<th scope="col" >Date Fin de contrat</th>
			<th scope="col" >Legalise</th>
			<th scope="col" >Dossier</th>
			<th scope="col" >Cin</th>
			<th scope="col" >Cnss</th>
			<th scope="col" >Ficher</th>
			<th scope="col" >RIB</th>
			<th scope="col" ></th>
		</thead>
		<tbody>
			@foreach($Employee->contrats as $employees)
			<tr style="cursor: pointer;" data-id="{{$employees->id}}" data-ferme="{{$employees->ferme}}" data-dembauche="{{$employees->date_embauche}}" data-drecu="{{$employees->date_recu}}" data-envoye="{{$employees->date_envoyer}}" data-dfincontrat="{{$employees->date_fin_contrat}}" data-legalise="{{$employees->legalise}}" data-dossier="{{$employees->dossier_valider}}" data-cin="{{$employees->cin_valider}}" data-cnss="{{$employees->cnss_valider}}" data-ficher="{{$employees->ficher_valider}}" data-rib="{{$employees->rib}}">

				<td><button type="button" class="btn btn-danger btn-sm">{{$employees->ferme}}</button></td>
				<td>{{$employees->date_embauche}}</td>
				<td>{{$employees->date_recu}}</td>
				<td>{{$employees->date_envoyer}}</td>
				<td>{{$employees->date_fin_contrat}}</td>

				@if($employees->legalise == 'Ok')
				 <td class="text-left">
          <button type="button" class="btn btn-success btn-xs">{{$employees->legalise}}</button>
        </td>
				@else
				 <td class="text-left">
          <button type="button" class="btn btn-warning btn-xs">{{$employees->legalise}}</button>
        </td>
				@endif

				@if($employees->dossier_valider == 'Oui')
				 <td class="text-left">
          <button type="button" class="btn btn-success btn-xs">{{$employees->dossier_valider}}</button>
        </td>
				@else
				 <td class="text-left">
          <button type="button" class="btn btn-warning btn-xs">{{$employees->dossier_valider}}</button>
        </td>
				@endif

				@if($employees->cin_valider == 'Oui')
				 <td class="text-left">
          <button type="button" class="btn btn-success btn-xs">{{$employees->cin_valider}}</button>
        </td>
				@else
				 <td class="text-left">
          <button type="button" class="btn btn-warning btn-xs">{{$employees->cin_valider}}</button>
        </td>
				@endif

				@if($employees->cnss_valider == 'Oui')
				 <td class="text-left">
          <button type="button" class="btn btn-success btn-xs">{{$employees->cnss_valider}}</button>
        </td>
				@else
				 <td class="text-left">
          <button type="button" class="btn btn-warning btn-xs">{{$employees->cnss_valider}}</button>
        </td>
				@endif

				@if($employees->ficher_valider == 'Oui')
				 <td class="text-left">
          <button type="button" class="btn btn-success btn-xs">{{$employees->ficher_valider}}</button>
        </td>
				@else
				 <td class="text-left">
          <button type="button" class="btn btn-warning btn-xs">{{$employees->ficher_valider}}</button>
        </td>
				@endif

				@if($employees->rib_valider == 'Oui')
				 <td class="text-left">
          <button type="button" class="btn btn-success btn-xs">{{$employees->rib_valider}}</button>
        </td>
				@else
				 <td class="text-left">
          <button type="button" class="btn btn-warning btn-xs">{{$employees->rib_valider}}</button>
        </td>
				@endif	

				<td class="text-right">
						<a href="{{route('imp-contrat',$employees->id)}}" class="btn btn-sm btn-warning" target="_blank">
						  <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
						</a>
						<button class="btn btn-sm btn-default btn-modif" >
						  <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
						</button>
						<button class="btn btn-sm btn-danger btn-suppr">
						  <i class="fa fa-trash" aria-hidden="true"></i>
						</button>
				</td>
			</tr>
			@endforeach
		
		</tbody>
	</table>
</div>