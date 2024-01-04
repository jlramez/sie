@section('title', __('Expedientes'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fas fa-folder"></i>
							Listado de ordinarios </h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar expedientes">
						</div>
						<div>
							@role(['admin'])<a class="btn btn-sm btn-danger" wire:click="update_actions()">
								<i class="fa fa-update"></i>  Actualizar_actuaciones
							@endrole</a>
							<a class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#createDataModal" align="rigth">
								<i class="fa fa-plus"></i>  Nuevo registro
							</a>
						</div>
					</div>
				</div>
				@if ($errors->any())
							<div class="alert alert-danger">
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif
				
				<div class="card-body">
						@include('livewire.ordinarios.modals')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Noexp</th>
								<th>Year</th>
								<th>Actor</th>
								<th>Demandado</th>
								<th>No Actores</th>
								<th>Acciones Id</th>
								<th>Ponencias Id</th>
								<th>Estatus Id</th>
								<th>Original</th>
								<th>Duplicado</th>
								<th>Observaciones</th>
								<th>Acumulado</th>
								<th>Fecha Observacion</th>
								<th>Observaciones Colegiado</th>
								<th>Etapa del proceso</th>
								<th>Observaciones Revisión</th>
								<th>Revisado</th>
								<td>ACCIONES</td>
							</tr>
						</thead>
						<tbody>
							@forelse($ordinarios as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->noexp }}</td>
								<td>{{ $row->year }}</td>
								<td>{{  mb_strtoupper($row->actor) }}</td>
								<td>{{  mb_strtoupper($row->demandado) }}</td>
								<td>{{ $row->no_actores }}</td>
								<td>{{ mb_strtoupper($row->actuaciones->descripcion ?? '') }}</td>
								<td>{{  mb_strtoupper($row->ponencias->descripcion ?? '' ) }}</td>
								<td>{{  mb_strtoupper($row->tipos->descripcion ?? '')}}</td>
								<td>{{ $row->original }}</td>
								<td>{{ $row->duplicado }}</td>
								<td>{{  mb_strtoupper($row->observaciones) }}</td>
								<td>{{ $row->acumulado }}</td>
								<td>{{ $row->fecha_observacion }}</td>
								<td>{{  mb_strtoupper($row->observaciones_colegiado) }}</td>
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
											<li><a href="{{ route('show.ordinarios.amparos',$row->id)}}"class="dropdown-item" ><i class="fa fa-shield"></i> Ver Amparos </a></li>
											<li><a class="dropdown-item" onclick="confirm('Confirma eliminar Expediente id {{$row->id}}? \nLos regisros eliminados no se podrán recuperar!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Eliminar </a></li>  
										</ul>
									</div>								
								</td>
							</tr>
							@empty
							<tr>
								<td class="text-center" colspan="100%">No existen datos </td>
							</tr>
							@endforelse
						</tbody>
					</table>						
					<div class="float-end">{{ $ordinarios->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>