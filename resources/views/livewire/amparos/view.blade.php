@section('title', __('Amparos'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fa-solid fa-shield"></i>
							Listado de amparos </h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar Amparo">
						</div>
						<div class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#createDataModal">
						<i class="fa fa-plus"></i>  Nuevo Amparo
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.amparos.modals')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Carpeta</th>
								<th>Amtipos Id</th>
								<th>Folio</th>
								<th>Fecha Recibido Tjlb</th>
								<!--<th>Fecha Presidencia</th>-->
								<th>No Oficio</th>
								<th>J Exp</th>
								<th>Expediente TJLBZ</th>
								<th>Resolutivo</th>
								<th>Causa</th>
								<th>Multa</th>
								<th>Fecha Vencimiento</th>
								<th>Fecha Ejecución</th>
								<th>Juzgado</th>
								<th>Ponencia</th>
								<th>Estátus</th>
								<th>Plazo de notificación</th>
								<th>Días  restantes</th>
								<th>Turnado a: </th>
								<th>Fecha turnado</th>
								<th>Observaciones</th>
								<th>Semeforización antes de cumplimiento</th>

								<td>ACTIONS</td>
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
								<!--<td>{{ $row->fecha_presidencia }}</td>-->
								<td>{{ $row->no_oficio }}</td>
								<td>{{ $row->j_exp }}</td>
								<td>{{ $row->expediente_tjlb }}</td>
								<td>{{ $row->resolutivo }}</td>
								<td>{{ $row->causa }}</td>
								<td>{{ $row->multa }}</td>
								<td>{{ $row->fecha_vencimiento ?? '' }}</td>
								<td>{{ $row->fecha_ejecucion ?? '' }}</td>
								<td>{{ $row->juzgados->descripcion ?? '' }}</td>
								<td>{{ $row->ponencias->descripcion ?? '' }}</td>
								@if ($row->estados->id==1)
									<td><span class="badge bg-success">Completado</span></td>
								@endif
								@if ($row->estados->id==2)
									<td><span class="badge bg-warning">Espera resolución</span></td>
								@endif
								@if ($row->estados->id==3)
									<td><span class="badge bg-danger">Pendiente</span></td>
								@endif
								
								<td>{{intval(abs((strtotime($row->fecha_vencimiento) - strtotime($row->fecha_recibido_tjlb))/(60 * 60)/24)) }}</td>
								@if ( $row->fecha_ejecucion)
									<td>{{ intval(((strtotime($row->fecha_vencimiento) - strtotime($row->fecha_ejecucion))/(60 * 60)/24)) }}</td>
									@else
										<td>{{ intval(((strtotime($row->fecha_vencimiento) - strtotime(date('Y-m-d')))/(60 * 60)/24))}}  </td>
								
								@endif
								<td>{{$row->empleados->name ?? ''}}</td>
								<td>{{ $row->fecha_turnado }}</td>
								<td>{{ $row->observaciones ?? '' }}</td>
								<!--SEMAFORO-->
								@if($row->fecha_ejecucion)
								<td><span class="badge bg-success">Ejecutado</span></td>
								@endif
								@if(is_null($row->fecha_ejecucion))
																													
												@if ((strtotime($row->fecha_vencimiento) - strtotime(date('Y-m-d')))/(60 * 60)/24<0)
														<td class="table-danger"> Vencido</td>
													@elseif (abs((strtotime($row->fecha_vencimiento) - strtotime(date('Y-m-d')))/(60 * 60)/24)>=0 && abs((strtotime($row->fecha_vencimiento) - strtotime(date('Y-m-d')))/(60 * 60)/24)<5)
																<td class="table-warning">  Riesgo vencimiento</td>
													
												@endif
												@if (((strtotime($row->fecha_vencimiento) - strtotime(date('Y-m-d')))/(60 * 60)/24)>=5)
														<td class="table-success"> A tiempo </td>
															
												@endif
													
								@endif
								<!--SEMAFORO-->
								<td width="90">
									<div class="dropdown">
										<a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
											Actions
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
											@role(['admin', 'instructor'])
											   <li><a class="dropdown-item" wire:click="receive_ins({{$row->id}})"><i class="fa-solid fa-reply"></i> Recibe instructor </a></li>
											@endrole	
											   @else
										   @role(['admin', 'instructor'])
													<li><a class="dropdown-item" wire:click="receive_ins({{$row->id}})" style="pointer-events: none; cursor: default;"><i class="fa-brands fa-get-pocket"></i> Recibe instructor </a></li>
											@endrole
											@endif
											@role(['admin', 'auxiliar', 'sga'])
											<li><a data-bs-toggle="modal" data-bs-target="#assignModal" class="dropdown-item" wire:click="assign({{$row->id}})"><i class="fa fa-forward"></i> Asignar </a></li>
											@endrole
											@role(['admin', 'oficialia']) 
												<li><a data-bs-toggle="modal" data-bs-target="#attachModal" class="dropdown-item" wire:click="attach({{$row->id}})"><i class="fa fa-paperclip"></i> Adjuntar archivo </a></li>
											@endrole
											@if ($row->archivos_id==NULL)
												<li><a href="{{route('amparos.detail',$row->id)}}"class="dropdown-item" style="pointer-events: none; cursor: default;"><i class="fas fa-eye"></i> Ver Documento </a></li>
												@else
												<li><a href="{{route('amparos.detail',$row->id)}}"class="dropdown-item" ><i class="fas fa-eye"></i> Ver Documento </a></li>
											@endif
											<li><div class="dropdown-item" data-bs-toggle="modal" data-bs-target="#executeModal" wire:click="execute({{$row->id}})"><i class="fa fa-circle-check"></i> Concluido (Sí/No) </a></li>
											<li><a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Edit </a></li>
											<li><a class="dropdown-item" onclick="confirm('Confirm Delete Amparo id {{$row->id}}? \nDeleted Amparos cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Delete </a></li>  
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
					<div class="float-end">{{ $amparos->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>