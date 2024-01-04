<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Nueva promoción</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    @csrf
                    <div class="form-group">
                        <label for="folio"></label>
                        <input wire:model="folio" type="text" class="form-control" id="folio" placeholder="Folio">@error('folio') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="noexp"></label>
                        <input wire:model="noexp" type="text" class="form-control" id="noexp" placeholder="Noexp">@error('noexp') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <small><label for="fecha_recibido_op">Fecha recibido:</label></small>
                        <input wire:model="fecha_recibido_op" type="date" class="form-control" id="fecha_recibido_op" placeholder="Fecha Recibido Op">@error('fecha_recibido_op') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group d-none" >
                        <label for="fecha_turnado"></label>
                        <input wire:model="fecha_turnado" type="date" class="form-control" id="fecha_turnado" placeholder="Fecha Turnado">@error('fecha_turnado') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="promovente"></label>
                        <input wire:model="promovente" type="text" class="form-control" id="promovente" placeholder="Promovente">@error('promovente') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="asunto"></label>
                        <input wire:model="asunto" type="text" class="form-control" id="asunto" placeholder="Asunto">@error('asunto') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fojas"></label>
                        <input wire:model="fojas" type="text" class="form-control" id="fojas" placeholder="Fojas">@error('fojas') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <small><label>Tipo de promoción :</label></small>
                        <select wire:model="ptipos_id" name="ptipos_id" id="ptipos_id" class="form-control">@error('ptipos_id') <span class="error text-danger">{{ $message }}</span> @enderror
                            <option value=""> --Seleccione empleado--
                            </option>
                                @foreach ($ptipos as $row)
                                    <option value="{{ $row->id }}">{{mb_strtoupper($row->descripcion)}}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <small><label>Turnado a :</label></small>
                        <select wire:model="empleados_id" name="empleados_id" id="empleados_id" class="form-control">@error('empleados_id') <span class="error text-danger">{{ $message }}</span> @enderror
                            <option value=""> --Seleccione empleado--
                            </option>
                                @foreach ($usuarios as $row)
                                    <option value="{{ $row->id }}">{{mb_strtoupper($row->name)}}</option>
                                @endforeach
                        </select>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div wire:ignore.self class="modal fade" id="updateDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Editar Promoción</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    @csrf
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="folio"></label>
                        <input wire:model="folio" type="text" class="form-control" id="folio" placeholder="Folio">@error('folio') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="noexp"></label>
                        <input wire:model="noexp" type="text" class="form-control" id="noexp" placeholder="Noexp">@error('noexp') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_recibido_op"></label>
                        <input wire:model="fecha_recibido_op" type="text" class="form-control" id="fecha_recibido_op" placeholder="Fecha Recibido Op">@error('fecha_recibido_op') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_turnado"></label>
                        <input wire:model="fecha_turnado" type="text" class="form-control" id="fecha_turnado" placeholder="Fecha Turnado">@error('fecha_turnado') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="promovente"></label>
                        <input wire:model="promovente" type="text" class="form-control" id="promovente" placeholder="Promovente">@error('promovente') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="asunto"></label>
                        <input wire:model="asunto" type="text" class="form-control" id="asunto" placeholder="Asunto">@error('asunto') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fojas"></label>
                        <input wire:model="fojas" type="text" class="form-control" id="fojas" placeholder="Fojas">@error('fojas') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <small><label>Tipo de promoción :</label></small>
                        <select wire:model="ptipos_id" name="ptipos_id" id="ptipos_id" class="form-control">@error('ptipos_id') <span class="error text-danger">{{ $message }}</span> @enderror
                            <option value=""> --Seleccione empleado--
                            </option>
                                @foreach ($ptipos as $row)
                                    <option value="{{ $row->id }}">{{mb_strtoupper($row->descripcion)}}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <small><label>Turnado a :</label></small>
                        <select wire:model="empleados_id" name="empleados_id" id="empleados_id" class="form-control">@error('empleados_id') <span class="error text-danger">{{ $message }}</span> @enderror
                            <option value=""> --Seleccione empleado--
                            </option>
                                @foreach ($usuarios as $row)
                                    <option value="{{ $row->id }}">{{mb_strtoupper($row->name)}}</option>
                                @endforeach
                        </select>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary">Guardar</button>
            </div>
       </div>
    </div>
</div>
<!-- Modal attach-->
<div wire:ignore.self class="modal fade" id="attachModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Adjuntar archivo</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<div class="table-responsive mb-4">
                        <form wire:submit.prevent="save" enctype="multipart/form-data" >
                            @csrf
                            <input type="hidden" name="selected_id" id="selected_id">
                            <div class="form-group">
                                <label>Archivos</label> 
                                <input type="file" wire:model="archivo" class="form-control mb -2" accept = "application/pdf">
                                @error('archivo') <span class="text-danger">{{$message}}</span>@enderror
                            </div>
                            <div class="form-group mt-4" align="right">
                                <button type="submit" class="btn btn-danger">Adjuntar</button>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal assign-->
<div wire:ignore.self class="modal fade" id="assignModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Asignar instructor</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<div class="table-responsive mb-4">
                        <form wire:submit.prevent="store_assign" >
                            @csrf
                            <input type="hidden" name="selected_id" id="selected_id">
                            <div class="form-group">
                                <small><label>Asignar a :</label></small>
                                <select wire:model="licenciados_id" name="licenciados_id" id="licenciados_id" class="form-control">@error('empleados_id') <span class="error text-danger">{{ $message }}</span> @enderror
                                    <option value=""> --Seleccione instructor--
                                    </option>
                                        @foreach ($licenciados as $row)
                                            <option value="{{ $row->id }}">{{mb_strtoupper($row->name)}}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="form-group mt-4" align="right">
                                <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Asignar</button>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal doccreate-->
<div wire:ignore.self class="modal fade" id="doccreateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Asignar instructor</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<div class="table-responsive mb-4">
                        <form wire:submit.prevent="store_cell" >
                            @csrf
                            <input type="hidden" name="selected_id" id="selected_id">
                            <div class="form-group">
                                <small><label for="Cantidad">Cantidad:</label></small>
                                <input wire:model="cantidad" type="text" class="form-control" id="cantidad" placeholder="Cantidad">@error('cantidad') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <small><label for="Fojas">Fojas:</label></small>
                                <input wire:model="fojas_cedula" type="text" class="form-control" id="fojas_cedula" placeholder="Fojas cédula">@error('fojas_cedula') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <small><label>Documento:</label></small>
                                <select wire:model="tipodocumentos_id" name="tipodocumentos_id" id="tipodocumentos_id" class="form-control">@error('tipodocumentos_id') <span class="error text-danger">{{ $message }}</span> @enderror
                                    <option value=""> --Seleccione documento--
                                    </option>
                                        @foreach ($tipodocumentos as $row)
                                            <option value="{{ $row->id }}">{{mb_strtoupper($row->descripcion)}}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="form-group mt-4" align="right">
                                <button type="submit" class="btn btn-danger" >Agregar</button>
                            </div>
                              
                            <div class="table-responsive mt-4">
                                <table class="table table-bordered table-sm">
                                    <thead class="thead">
                                        <tr> 
                                            <td>#</td> 
                                            <th>Cantidad</th>
                                            <th>Fojas</th>
                                            <th>Concepto</th>								
                                            <td>ACCIONES</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     
                                        @forelse($asignadocumentos as $row)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td> 
                                                    <td>{{ $row->cantidad }}</td>
                                                    <td>{{ $row->fojas }}</td>
                                                    <td>{{ $row->tipodocumentos->descripcion ?? '' }}</td>

                                                    <td width="90">
                                                        <div class="dropdown">
                                                            <a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                Acciones
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                            
                                                                <li><a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a></li>
                                                            
                                                                <li><a class="dropdown-item" onclick="confirm('Confirm Delete Promocione id {{$row->id}}? \nDeleted Promociones cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Eliminar </a></li>  
                                                
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
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>
