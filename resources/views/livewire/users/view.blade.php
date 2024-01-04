@section('title', 'Usuarios')
@section('content_header')
    &nbsp
@stop
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fas fa-users "></i>
							Listado de usuarios </h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Users">
						</div>
						<div class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#createDataModal">
						<i class="fa fa-plus"></i>  Nuevo Usuario
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.users.modals')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead bg-info">
							<tr> 
								<td>#</td> 
								<th>Nombre</th>
								<th>Correo electrónico</th>
								<th>Rol</td>
								<td>ACCIONES</td>
							</tr>
						</thead>
						<tbody>
							@forelse($users as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->name }}</td>
								<td>{{ $row->email }}</td>
								<td>
								@if ($row->roles->isNotEmpty())
                                        
										@foreach ($row->roles as $role)
											<span class="badge bg-info">
												{{ $role->name }}                                    
											</span>
										@endforeach
									
									@endif
								</td>
								<td width="90">
									<div class="dropdown">
										<a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
											Acciones
										</a>
										<ul class="dropdown-menu">
											<li><a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a></li>
											<li><a class="dropdown-item" onclick="confirm('Confirm Delete User id {{$row->id}}? \nDeleted Users cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Eliminar </a></li>  
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
					<div class="float-end">{{ $users->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>