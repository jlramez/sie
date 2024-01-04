@section('title', __('Paraprocesales'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fas fa-folder"></i>
							Listado de expedientes paraprocesales </h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Paraprocesales">
						</div>
						<div class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#createDataModal">
						<i class="fa fa-plus"></i>  Nuevo registro
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.paraprocesales.modals')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Noexp</th>
								<th>Year</th>
								<th>Actor</th>
								<th>Demandado</th>
								<th>Acciones Id</th>
								<th>Fecha Recepcion</th>
								<th>Observaciones</th>
								<th>Ponencias Id</th>
								<th>Etapa del proceso</th>
								<th>Observaciones Revisión</th>
								<th>Revisado</th>
								<td>ACCIONES</td>
							</tr>
						</thead>
						<tbody>
							@forelse($paraprocesales as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->noexp }}</td>
								<td>{{ $row->year }}</td>
								<td>{{ $row->actor }}</td>
								<td>{{ $row->demandado }}</td>
								<td>{{ $row->acciones_id }}</td>
								<td>{{ $row->fecha_recepcion }}</td>
								<td>{{ $row->observaciones }}</td>
								<td>{{ $row->ponencias->descripcion ?? '' }}</td>
								<td><span class="badge bg-warning">{{  mb_strtoupper($row->tareas->descripcion ?? '') }}</span></td>
								<td>{{  mb_strtoupper($row->observaciones_revision) }}</td>
								<td align="center">
									@if($row->revisado==1)
									
											<i class="fa-solid fa-check text-success"></i>
									@endif
										@if($row->revisado==0)
											<i class="fa-solid fa-x text-danger"></i>
										@endif	
									
								</td>
								<td width="90">
									<div class="dropdown">
										<a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
											Acciones
										</a>
										<ul class="dropdown-menu">
											<li><a class="dropdown-item" wire:click="review({{$row->id}})"><i class="fa fa-check"></i> Revisado(Sí/No) </a></li>
											<li><div class="dropdown-item" data-bs-toggle="modal" data-bs-target="#addcommentModal" wire:click="addcomment({{$row->id}})"><i class="fa fa-comment"></i> Observaciones revisión </a></li>
											<li><div class="dropdown-item" data-bs-toggle="modal" data-bs-target="#addetapaModal" wire:click="addetapa({{$row->id}})"><i class="fa-solid fa-arrow-right"></i> Agregar etapa </a></li>
											<li><a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a></li>
											<li><a class="dropdown-item" onclick="confirm('Confirm Delete Paraprocesale id {{$row->id}}? \nDeleted Paraprocesales cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Eliminar </a></li>  
										</ul>
									</div>								
								</td>
							</tr>
							@empty
							<tr>
								<td class="text-center" colspan="100%">No data Found </td>
							</tr>
							@endforelse
						</tbody>
					</table>						
					<div class="float-end">{{ $paraprocesales->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>