<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Nuevo expediente especial</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    @csrf
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
                        <label for="entidad"></label>
                        <input wire:model="entidad" type="text" class="form-control" id="entidad" placeholder="Entidad">@error('entidad') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="trabajador_fallecido"></label>
                        <input wire:model="trabajador_fallecido" type="text" class="form-control" id="trabajador_fallecido" placeholder="Trabajador Fallecido">@error('trabajador_fallecido') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_recepcion"></label>
                        <input wire:model="fecha_recepcion" type="date" class="form-control" id="fecha_recepcion" placeholder="Fecha Recepcion">@error('fecha_recepcion') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <small><label>Acción:</label></small>
                        <select wire:model="acciones_id" name="acciones_id" id="acciones_id" class="form-control">
                            <option value=""> --Seleccione acción--
                            </option>
                                @foreach ($actuaciones as $row)
                                    <option value="{{ $row->id }}">{{mb_strtoupper($row->descripcion)}}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="observaciones"></label>
                        <input wire:model="observaciones" type="text" class="form-control" id="observaciones" placeholder="Observaciones">@error('observaciones') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
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
                    <div class="form-group d-none">
                        <label for="nike"></label>
                        <input wire:model="nike" type="text" class="form-control" id="nike" placeholder="Nike">@error('nike') <span class="error text-danger">{{ $message }}</span> @enderror
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
                <h5 class="modal-title" id="updateModalLabel">Actualidar expediente especial</h5>
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
                        <label for="entidad"></label>
                        <input wire:model="entidad" type="text" class="form-control" id="entidad" placeholder="Entidad">@error('entidad') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="trabajador_fallecido"></label>
                        <input wire:model="trabajador_fallecido" type="text" class="form-control" id="trabajador_fallecido" placeholder="Trabajador Fallecido">@error('trabajador_fallecido') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_recepcion"></label>
                        <input wire:model="fecha_recepcion" type="text" class="form-control" id="fecha_recepcion" placeholder="Fecha Recepcion">@error('fecha_recepcion') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="acciones_id"></label>
                        <input wire:model="acciones_id" type="text" class="form-control" id="acciones_id" placeholder="Acciones Id">@error('acciones_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="observaciones"></label>
                        <input wire:model="observaciones" type="text" class="form-control" id="observaciones" placeholder="Observaciones">@error('observaciones') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="ponencias_id"></label>
                        <input wire:model="ponencias_id" type="text" class="form-control" id="ponencias_id" placeholder="Ponencias Id">@error('ponencias_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="nike"></label>
                        <input wire:model="nike" type="text" class="form-control" id="nike" placeholder="Nike">@error('nike') <span class="error text-danger">{{ $message }}</span> @enderror
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


