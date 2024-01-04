@section('title', __('Amparos'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fa-solid fa-shield"></i>
							Listado de amparos del expediente {{$nexp}} </h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div class="d-none">
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar Amparo">
						</div>
						<div class="btn btn-sm btn-success d-none" data-bs-toggle="modal" data-bs-target="#createDataModal">
						<i class="fa fa-plus"></i>  Nuevo Amparo
						</div>
					</div>
				</div>
				
				<div class="card-body">
					@include('livewire.ordinarios.modals')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Carpeta</th>
								<th>Amtipos Id</th>
								<th>Folio</th>
								<th>Fecha Recibido Tjlb</th>
								<th>Fecha Presidencia</th>
								<th>No Oficio</th>
								<th>J Exp</th>
								<th>Expediente Tjlb</th>
								<th>Resolutivo</th>
								<th>Causa</th>
								<th>Plazo</th>
								<th>Multa</th>
								<th>Fecha Vencimiento</th>
								<th>Juzgados Id</th>
								<th>Ponencias Id</th>
								<th>Estatus Id</th>
								<th>Observaciones</th>
								
							</tr>
						</thead>
						<tbody>
							@forelse($amparos as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->carpeta }}</td>
								<td>{{ $row->amtipos->descripcion ?? '' }}</td>
								<td>{{ $row->folio }}</td>
								<td>{{ $row->fecha_recibido_tjlb }}</td>
								<td>{{ $row->fecha_presidencia }}</td>
								<td>{{ $row->no_oficio }}</td>
								<td>{{ $row->j_exp }}</td>
								<td>{{ $row->expediente_tjlb }}</td>
								<td>{{ $row->resolutivo }}</td>
								<td>{{ $row->causa }}</td>
								<td>{{ $row->plazo }}</td>
								<td>{{ $row->multa }}</td>
								<td>{{ $row->fecha_vencimiento }}</td>
								<td>{{ $row->juzgados->descripcion ?? '' }}</td>
								<td>{{ $row->ponencias->descripcion ?? '' }}</td>
								<td>{{ $row->estados->descripcion ?? ''}}</td>
								<td>{{ $row->observaciones }}</td>
							</tr>
							@empty
							<tr>
								<td class="text-center" colspan="100%">No data Found </td>
							</tr>
							@endforelse
						</tbody>
					</table>						
					<div class="float-end">{{ $amparos->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
