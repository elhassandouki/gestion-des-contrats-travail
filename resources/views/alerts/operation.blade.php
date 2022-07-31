<div class="container">
	<div class="row">
		@if($b)
		<div class="col-md-8">
			<center>
				<div style="padding: 20px;text-align: center;background-color: #4cae4c;color: white">
					<h1 style="color: white"><i class="fa fa-check fa-5x" aria-hidden="true"></i></h1>
					<h1 style="color: white">{{$msg}}</h1>
				</div>	
			</center>
		</div>
		@else
		<div class="col-md-8">
		<center>
			<div style="padding: 20px;text-align: center;background-color: #d9534f;color: white">
				<h1><i class="fa fa-times-circle fa-5x" aria-hidden="true"></i></h1>
				<h1>{{$msg}}</h1>
			</div>
		</center>
		</div>
		@endif
	</div>
</div>