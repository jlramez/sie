@section('title', __('Asignadocumentos'))
<div class="box box-info padding-1">
<div class="container-fluid">
	<div class="row justify-content-center">
	    <div class="col-md-12"> 
    	    <div class="card">
				<div class="card-header">							
								<div class="float-left">
									<h4><i class="fas fa-file"></i> Información de la cédula </h4>
								</div>							
				</div>
				<div class="card-body">   
					<div class="row">       
						<div class="form-group col-sm-3">
							{{ Form::label('Expediente') }}
							<div class="input-group-prepend">
								{{ Form::text('contenido', $exp->noexp ?? '', ['class' => 'form-control' . ($errors->has('contenido') ? ' is-invalid' : ''), 'placeholder' => 'Expediente']) }}
								{!! $errors->first('contenido', '<div class="invalid-feedback">:message</div>') !!}
							</div>
						</div>
						<div class="form-group col-sm-3">
							{{ Form::label('Actor') }}
							<div class="input-group-prepend">
								{{ Form::text('contenido', $exp->actor ?? '', ['class' => 'form-control' . ($errors->has('contenido') ? ' is-invalid' : ''), 'placeholder' => 'Actor']) }}
								{!! $errors->first('contenido', '<div class="invalid-feedback">:message</div>') !!}
							</div>
						</div>
						<div class="form-group col-sm-3">
							{{ Form::label('Demandado') }}
							<div class="input-group-prepend">
								{{ Form::text('contenido', $exp->demandado ?? '', ['class' => 'form-control' . ($errors->has('contenido') ? ' is-invalid' : ''), 'placeholder' => 'Demandado']) }}
								{!! $errors->first('contenido', '<div class="invalid-feedback">:message</div>') !!}
							</div>
						</div>	
						<div class="form-group col-sm-3">
							{{ Form::label('Folio') }}
							<div class="input-group-prepend">
								{{ Form::text('contenido', $promo->folio ?? '', ['class' => 'form-control' . ($errors->has('contenido') ? ' is-invalid' : ''), 'placeholder' => 'Folio']) }}
								{!! $errors->first('contenido', '<div class="invalid-feedback">:message</div>') !!}
							</div>
						</div>									
					</div> 
			</div>
		</div>
	</div>
</div>


			<div class="card mt-4">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fa-solid fa-list-check"></i>
							Listado de documentos </h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div class="float-right">							
							@role(['admin', 'oficialia'])
								<a href="{{route('cedula.pdf', $promo_id)}}" class="btn btn-sm btn-danger" target="_blank" ><i class="fa-solid fa-file-pdf"></i> Imprimir cédula</a>
							@endrole												 
							<div class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#createDataModal">
								<i class="fa fa-plus"></i>   Agregar Documento
							</div>
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.asignadocumentos.modals')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Cantidad</th>
								<th>Fojas</th>
								<th>Documento</th>
								<td>ACCIONES</td>
							</tr>
						</thead>
						<tbody>
							@forelse($asignadocumentos as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->cantidad }}</td>
								<td>{{ $row->fojas }}</td>
								<td>{{ $row->documento }}</td>
								<td width="90">
									<div >
									
										
											<!--<li><a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a></li>-->
											<a onclick="confirm('Confirm Delete Asignadocumento id {{$row->id}}? \nDeleted Asignadocumentos cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i></a>
										
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
					<div class="float-end">{{ $asignadocumentos->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>