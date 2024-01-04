<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Nuevo amparo</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <small><label for="carpeta">Carpeta:</label></small>
                                <input wire:model="carpeta" type="text" class="form-control" id="carpeta" placeholder="Carpeta">@error('carpeta') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <small><label>Tipo de amparo:</label></small>
                                <select wire:model="amtipos_id" name="amtipos_id" id="amtipos_id" class="form-control">
                                    <option value=""> --Seleccione tipo de amparo--
                                    </option>
                                        @foreach ($amtipos as $row)
                                            <option value="{{ $row->id }}">{{mb_strtoupper($row->descripcion)}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <small><label for="folio">Folio:</label></small>
                                <input wire:model="folio" type="text" class="form-control" id="folio" placeholder="Folio">@error('folio') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <small><label for="fecha_recibido_tjlb">Fecha recibido TJLB:</label>
                                <input wire:model="fecha_recibido_tjlb" type="date" class="form-control" id="fecha_recibido_tjlb" placeholder="Fecha Recibido Tjlb">@error('fecha_recibido_tjlb') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                               <small> <label for="fecha_presidencia">Fecha recibido amparo:</label></small>
                                <input wire:model="fecha_presidencia" type="date" class="form-control" id="fecha_presidencia" placeholder="Fecha Presidencia">@error('fecha_presidencia') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                      
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <small><label for="no_oficio">No. oficio:</label></small>
                                <input wire:model="no_oficio" type="text" class="form-control" id="no_oficio" placeholder="No Oficio">@error('no_oficio') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <small><label for="j_exp">J. exp:</label></small>
                                <input wire:model="j_exp" type="text" class="form-control" id="j_exp" placeholder="J Exp">@error('j_exp') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <small><label for="expediente_tjlb">No. expediente TJLB:</label></small>
                                <input wire:model="expediente_tjlb" type="text" class="form-control" id="expediente_tjlb" placeholder="Expediente Tjlb">@error('expediente_tjlb') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                  
                    <div class="form-group">
                                <small><label for="resolutivo">Resolutivo:</label></small>
                                <textarea wire:model="resolutivo" cols="3" type="text" class="form-control" id="resolutivo" placeholder="Resolutivo" ></textarea>@error('resolutivo') <span class="error text-danger" >{{ $message }}</span> @enderror
                    </div>
                                       
                                            
                    <div class="form-group">
                    <small><label for="causa">Causa:</label></small>
                        <textarea wire:model="causa" type="text" class="form-control" id="causa" placeholder="Causa"></textarea>@error('causa') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="row">        
                        <div class="col">
                            <div class="form-group">
                                <small><label for="plazo">Plazo:</label></small>
                                <input wire:model="plazo" type="text" class="form-control" id="plazo" placeholder="Plazo">@error('plazo') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <small><label for="multa">Multa:</label></small>
                                <input wire:model="multa" type="text" class="form-control" id="multa" placeholder="Multa">@error('multa') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <small><label for="fecha_vencimiento">Fecha vencimiento:</label></small>
                                <input wire:model="fecha_vencimiento" type="date" class="form-control" id="fecha_vencimiento" placeholder="Fecha Vencimiento">@error('fecha_vencimiento') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <small><label>Juzgados:</label></small>
                                <select wire:model="juzgados_id" name="juzgados_id" id="juzgados_id" class="form-control">
                                    <option value=""> --Seleccione el juzgado--
                                    </option>
                                        @foreach ($juzgados as $row)
                                            <option value="{{ $row->id }}">{{mb_strtoupper($row->descripcion)}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <small><label>Ponencia:</label></small>
                                <select wire:model="ponencias_id" name="ponencias_id" id="ponencias_id" class="form-control">
                                    <option value=""> --Seleccione la ponencia--
                                    </option>
                                        @foreach ($ponencias as $row)
                                            <option value="{{ $row->id }}">{{mb_strtoupper($row->descripcion)}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <small><label>Estátus:</label></small>
                        <select wire:model="estados_id" name="estados_id" id="estados_id" class="form-control">
                            <option value=""> --Seleccione el estado--
                            </option>
                                @foreach ($estatus as $row)
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
                    <div class="form-group">
                        <small><label for="observaciones">Observaciones:</label></small>
                        <textarea wire:model="observaciones" type="text" class="form-control" id="observaciones" placeholder="Observaciones"></textarea>@error('observaciones') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div wire:ignore.self class="modal fade" id="updateDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Amparo</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    @csrf
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="carpeta"></label>
                        <input wire:model="carpeta" type="text" class="form-control" id="carpeta" placeholder="Carpeta">@error('carpeta') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="amtipos_id"></label>
                        <input wire:model="amtipos_id" type="text" class="form-control" id="amtipos_id" placeholder="Amtipos Id">@error('amtipos_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="folio"></label>
                        <input wire:model="folio" type="text" class="form-control" id="folio" placeholder="Folio">@error('folio') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_recibido_tjlb"></label>
                        <input wire:model="fecha_recibido_tjlb" type="text" class="form-control" id="fecha_recibido_tjlb" placeholder="Fecha Recibido Tjlb">@error('fecha_recibido_tjlb') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_presidencia"></label>
                        <input wire:model="fecha_presidencia" type="text" class="form-control" id="fecha_presidencia" placeholder="Fecha Presidencia">@error('fecha_presidencia') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_oficio"></label>
                        <input wire:model="no_oficio" type="text" class="form-control" id="no_oficio" placeholder="No Oficio">@error('no_oficio') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="j_exp"></label>
                        <input wire:model="j_exp" type="text" class="form-control" id="j_exp" placeholder="J Exp">@error('j_exp') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="expediente_tjlb"></label>
                        <input wire:model="expediente_tjlb" type="text" class="form-control" id="expediente_tjlb" placeholder="Expediente Tjlb">@error('expediente_tjlb') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="resolutivo"></label>
                        <input wire:model="resolutivo" type="text" class="form-control" id="resolutivo" placeholder="Resolutivo">@error('resolutivo') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="causa"></label>
                        <input wire:model="causa" type="text" class="form-control" id="causa" placeholder="Causa">@error('causa') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="plazo"></label>
                        <input wire:model="plazo" type="text" class="form-control" id="plazo" placeholder="Plazo">@error('plazo') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="multa"></label>
                        <input wire:model="multa" type="text" class="form-control" id="multa" placeholder="Multa">@error('multa') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_vencimiento"></label>
                        <input wire:model="fecha_vencimiento" type="text" class="form-control" id="fecha_vencimiento" placeholder="Fecha Vencimiento">@error('fecha_vencimiento') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="juzgados_id"></label>
                        <input wire:model="juzgados_id" type="text" class="form-control" id="juzgados_id" placeholder="Juzgados Id">@error('juzgados_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="ponencias_id"></label>
                        <input wire:model="ponencias_id" type="text" class="form-control" id="ponencias_id" placeholder="Ponencias Id">@error('ponencias_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="estatus_id"></label>
                        <input wire:model="estatus_id" type="text" class="form-control" id="estatus_id" placeholder="Estatus Id">@error('estatus_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="observaciones"></label>
                        <input wire:model="observaciones" type="text" class="form-control" id="observaciones" placeholder="Observaciones">@error('observaciones') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary">Save</button>
            </div>
       </div>
    </div>
</div>
<!-- Execute Modal -->
<div wire:ignore.self class="modal fade" id="executeModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Asignar fecha de ejecución del amparo</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    @csrf
                    <input type="hidden" wire:model="selected_id">
                            
                        <input wire:model="amparos_id" type="hidden"> 
                    
                     <div class="form-group">
                        <small><label for="fecha_ejecucion">Fecha de ejecución del amparo:</label></small>
                        <input wire:model="fecha_ejecucion" type="date" class="form-control" id="fecha_ejecucion" placeholder="Fecha ejecución del amparo">@error('fecha_ejecucon') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="execute_store()" class="btn btn-primary " data-bs-dismiss="modal">Guardar</button>
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
                                @error('file') <span class="text-danger">{{$message}}</span>@enderror
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

