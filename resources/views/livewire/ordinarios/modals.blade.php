<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Nuevo Expediente hello</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    @csrf
                    <div  class="form-group row">
                        <div class="col">
                            <label for="noexp"></label>
                            <input wire:model="noexp" type="text" class="form-control" id="noexp" placeholder="Noexp">@error('noexp') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col">
                            <label for="year"></label>
                            <input wire:model="year" type="text" class="form-control" id="year" placeholder="Año">@error('year') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col">
                            <label for="no_actores"></label>
                            <input wire:model="no_actores" type="text" class="form-control" id="no_actores" placeholder="No Actores">@error('no_actores') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>                   
                        <div class="form-group">
                            <label for="actor"></label>
                            <input wire:model="actor" type="text" class="form-control" id="actor" placeholder="Actor">@error('actor') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="demandado"></label>
                            <input wire:model="demandado" type="text" class="form-control" id="demandado" placeholder="Demandado">@error('demandado') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    
                        <div class="form-group">
                            <small><label>Acción:</label></small>
                            <select wire:model="actuaciones_id" name="actuaciones_id" id="actuaciones_id" class="form-control">
                                <option value=""> --Seleccione acción--
                                </option>
                                    @foreach ($actuaciones as $row)
                                        <option value="{{ $row->id }}">{{mb_strtoupper($row->descripcion)}}</option>
                                    @endforeach
                            </select>
                        </div>
                  
                    <div  class="row">
                        <div class="col">
                            <div class="form-group">
                                <small><label>Ponencia:</label></small>
                                <select wire:model="ponencias_id" name="ponencias" id="ponencias" class="form-control">@error('ponencias_id') <span class="error text-danger">{{ $message }}</span> @enderror
                                    <option value=""> --Seleccione ponencia--
                                    </option>
                                        @foreach ($ponencias as $row)
                                            <option value="{{ $row->id }}">{{mb_strtoupper($row->descripcion)}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <small><label>Estátus:</label></small>
                                <select wire:model="tipos_id" name="tipos_id" id="tipos_id" class="form-control">@error('tipos_id') <span class="error text-danger">{{ $message }}</span> @enderror
                                    <option value=""> --Seleccione estatus --
                                    </option>
                                        @foreach ($tipos as $row)
                                            <option value="{{ $row->id }}">{{mb_strtoupper($row->descripcion)}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div  class="row">
                        <div class="col">
                            <label for="original"></label>
                            <input wire:model="original" type="text" class="form-control" id="original" placeholder="Original">@error('original') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col">
                            <label for="duplicado"></label>
                            <input wire:model="duplicado" type="text" class="form-control" id="duplicado" placeholder="Duplicado">@error('duplicado') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col">
                            <label for="acumulado"></label>
                            <input wire:model="acumulado" type="text" class="form-control" id="acumulado" placeholder="Acumulado">@error('acumulado') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div  class="form-group">                        
                            <label for="observaciones"></label>
                            <textarea wire:model="observaciones" type="text" class="form-control" id="observaciones" placeholder="Observaciones"></textarea>@error('observaciones') <span class="error text-danger">{{ $message }}</span> @enderror                     
                    </div>
                    <div  class="row">
                        <div class="col">
                            <small><label>Fecha observación:</label></small>
                            <input wire:model="fecha_observacion" type="date" class="form-control" id="fecha_observacion" placeholder="Fecha Observacion">@error('fecha_observacion') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col">
                            <label for="observaciones_colegiado"></label>
                            <input wire:model="observaciones_colegiado" type="text" class="form-control" id="observaciones_colegiado" placeholder="Observaciones Colegiado">@error('observaciones_colegiado') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
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
                <h5 class="modal-title" id="updateModalLabel">Update Expediente</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    @csrf
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="noexp"></label>
                        <input wire:model="noexp" type="text" class="form-control" id="noexp" placeholder="Noexp">@error('noexp') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="year"></label>
                        <input wire:model="year" type="text" class="form-control" id="year" placeholder="Year">@error('year') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="actor"></label>
                        <input wire:model="actor" type="text" class="form-control" id="actor" placeholder="Actor">@error('actor') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="demandado"></label>
                        <input wire:model="demandado" type="text" class="form-control" id="demandado" placeholder="Demandado">@error('demandado') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_actores"></label>
                        <input wire:model="no_actores" type="text" class="form-control" id="no_actores" placeholder="No Actores">@error('no_actores') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="acciones_id"></label>
                        <input wire:model="acciones_id" type="text" class="form-control" id="acciones_id" placeholder="Acciones Id">@error('acciones_id') <span class="error text-danger">{{ $message }}</span> @enderror
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
                        <label for="original"></label>
                        <input wire:model="original" type="text" class="form-control" id="original" placeholder="Original">@error('original') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="duplicado"></label>
                        <input wire:model="duplicado" type="text" class="form-control" id="duplicado" placeholder="Duplicado">@error('duplicado') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="observaciones"></label>
                        <input wire:model="observaciones" type="text" class="form-control" id="observaciones" placeholder="Observaciones">@error('observaciones') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="acumulado"></label>
                        <input wire:model="acumulado" type="text" class="form-control" id="acumulado" placeholder="Acumulado">@error('acumulado') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_observacion"></label>
                        <input wire:model="fecha_observacion" type="text" class="form-control" id="fecha_observacion" placeholder="Fecha Observacion">@error('fecha_observacion') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="observaciones_colegiado"></label>
                        <input wire:model="observaciones_colegiado" type="text" class="form-control" id="observaciones_colegiado" placeholder="Observaciones Colegiado">@error('observaciones_colegiado') <span class="error text-danger">{{ $message }}</span> @enderror
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
<!-- Comment Modal -->
<div wire:ignore.self class="modal fade" id="addcommentModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Agregar observación</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    @csrf
                    <input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <div><small><label for="observacion">Observación:</label></small></div>
                        <textarea wire:model="observaciones_revision" id="observaciones_revision" name="observaciones_revision" rows="3" cols="49"></textarea>
                    </div>                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="store_comment()" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
<!-- Etapa Modal -->
<div wire:ignore.self class="modal fade" id="addetapaModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Etapa del expediente</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    @csrf
                    <input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <small><label>Etapa del expediente:</label></small>
                        <select wire:model="tareas_id" name="tareas_id" id="tareas_id" class="form-control">@error('tareas_id') <span class="error text-danger">{{ $message }}</span> @enderror
                            <option value=""> --Seleccione estado --
                            </option>
                                @foreach ($tareas as $row)
                                    <option value="{{ $row->id }}">{{mb_strtoupper($row->descripcion)}}</option>
                                @endforeach
                        </select>
                    </div>                  
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="store_etapa()" data-bs-dismiss="modal" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>

