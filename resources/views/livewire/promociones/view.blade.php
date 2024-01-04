@section('title', __('Promociones'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fa-solid fa-forward"></i>
							Listado promociones</h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar promociones">
						</div>
						
						<div class="float-right">	
						@role(['admin'])						
							<button type="button" wire:click.prevent="migrate_afile()" class="btn btn-sm btn-danger">
							<i class="fa-solid fa-file-excel"></i>  Migrar Afile</button>
						@endrole		
						@role(['admin','oficialia'])														 
							<div class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#createDataModal">
								<i class="fa fa-plus"></i>  Nueva Promoción
							</div>
						</div>
						@endrole
					</div>
				</div>
				@include('livewire.promociones.modals')
				<div class="card-body">
						
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Folio(s)</th>
								<th>Noexp</th>
								<th>Fecha Recibido Op</th>								
								<th>Promovente</th>
								<th>Asunto</th>
								<th>Fojas</th>
								<th>Turnado a</th>
								<th>Fecha Turnado</th>
								<th>Recibido ponencia</th>
								<th>Asignado a</th>
								<th>Fecha Asignado</th>
								<th>Recibido instructor</th>
								<th>Fecha acuerdo</th>
								<th>Estátus</th>
								
								<td>ACCIONES</td>
							</tr>
						</thead>
						<tbody>
							@forelse($promociones as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->folio }}</td>
								<td>{{ $row->noexp }}</td>
								<td>{{ $row->fecha_recibido_op }}</td>
								
								<td>{{ mb_strtoupper($row->promovente) ?? '' }}</td>
								<td>{{ mb_strtoupper($row->asunto) ?? '' }}</td>
								<td>{{  mb_strtoupper($row->fojas) ?? '' }}</td>
								<td>{{ mb_strtoupper($row->empleados->name ?? '') }}</td>
								<td>{{ $row->fecha_turnado }}</td>
								@if ($row->fecha_turnado==NULL)
									<td align="center"><i class="fa-solid fa-xmark text-danger"></i></td>
									@else 
									<td  align="center"><i class="fa-solid fa-check text-success"></i></td>
								@endif
								<td>{{ mb_strtoupper($row->licenciados->name ?? '') }}</td>
								<td>{{ $row->fecha_asignado }}</td>
								@if ($row->fecha_asignado==NULL)
									<td align="center"><i class="fa-solid fa-xmark text-danger"></i></td>
									@else 
									<td  align="center"><i class="fa-solid fa-check text-success"></i></td>
								@endif
								<td>{{ $row->fecha_acuerdo ?? '' }}</td>
								@if($row->fecha_acuerdo==NULL)
									<td><span class="badge bg-danger">Sin acordar</span></td>
									@else
									<td><span class="badge bg-success">Acordado</span></td>
								@endif
								
								<td width="90">
									<div class="dropdown">
										<a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
											Acciones
										</a>
										<ul class="dropdown-menu">



											@if ($row->fecha_turnado==NULL)
											@role(['admin', 'auxiliar', 'sga', 'amparos'])
												<li><a class="dropdown-item" wire:click="receive_aux({{$row->id}})"><i class="fa-brands fa-get-pocket"></i> Recibe auxiliar </a></li>
											@endrole 	
												@else
											@role(['admin', 'auxiliar', 'sga', 'amparos'])
												 <li><a class="dropdown-item" wire:click="receive_aux({{$row->id}})" style="pointer-events: none; cursor: default;"><i class="fa-brands fa-get-pocket"></i> Recibe auxiliar </a></li>
											@endrole 
											 @endif
										



											 @if ($row->fecha_asignado==NULL)
											 @role(['admin', 'auxiliar', 'sga'])
												 <li><a class="dropdown-item" wire:click="auto_assign({{$row->id}})"><i class="fa-solid fa-reply"></i> Auto-recibir-asignar  </a></li>
											 @endrole 	
												 @else
											 @role(['admin', 'auxiliar'])
												  <li><a class="dropdown-item" wire:click="auto_assign({{$row->id}})" style="pointer-events: none; cursor: default;"><i class="fa-solid fa-reply"></i> Auto-asignar auxiliar</a></li>
											 @endrole 
											  @endif

											  @role(['admin', 'auxiliar', 'sga'])
											  <li><a class="dropdown-item" wire:click="auto_accord({{$row->id}})"><i class="fas fa-check"></i> Auto-acordar  </a></li>
											 @endrole


											 @if ($row->fecha_asignado==NULL)
											 @role(['admin', 'instructor'])
												<li><a class="dropdown-item" wire:click="receive_ins({{$row->id}})"><i class="fa-solid fa-reply"></i> Recibe instructor </a></li>
											 @endrole	
												@else
											@role(['admin', 'instructor'])
													 <li><a class="dropdown-item" wire:click="receive_ins({{$row->id}})" style="pointer-events: none; cursor: default;"><i class="fa-brands fa-get-pocket"></i> Recibe instructor </a></li>
											 @endrole
											 @endif




											 @role(['admin', 'instructor'])
											 	<li><a class="dropdown-item" wire:click="accord({{$row->id}})"><i class="fas fa-check"></i> Acordar </a></li>
											@endrole
											@role(['admin', 'auxiliar', 'sga'])
											<li><a data-bs-toggle="modal" data-bs-target="#assignModal" class="dropdown-item" wire:click="assign({{$row->id}})"><i class="fa fa-forward"></i> Asignar </a></li>
											@endrole
											@role(['admin', 'oficialia']) 
												<li><a data-bs-toggle="modal" data-bs-target="#attachModal" class="dropdown-item" wire:click="attach({{$row->id}})"><i class="fa fa-paperclip"></i> Adjuntar archivo </a></li>
											@endrole
											@if ($row->archivos_id)
											
												<li><a href="{{route('documents.detail',$row->id)}}"class="dropdown-item" ><i class="fas fa-eye"></i> Ver Documento </a></li>
											
												@endif
											@role(['admin', 'oficialia'])
												
												<li><a href="{{ route('asignadocumentos.index', $row->id) }}"class="dropdown-item"><i class="fa fa-file"></i> Generar cédula </a></li>
											
											@endrole
											@role(['admin', 'oficialia'])
												<li><a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a></li>
											@endrole
											@role(['admin'])
											<li><a class="dropdown-item" onclick="confirm('Confirm Delete Promocione id {{$row->id}}? \nDeleted Promociones cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Eliminar </a></li>  
											@endrole
										</ul>
									</div>								
								</td>
							</tr>
							@empty
							<tr>
								<td class="text-center" colspan="100%">No se encontraron datos </td>
							</tr>
							@endforelse
						</tbody>
					</table>						
					<div class="float-end">{{ $promociones->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>