<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="createDataModalLabel">Nuevo usuario</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    @csrf
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input wire:model="name" type="text" class="form-control" id="name" placeholder="Name">@error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <input wire:model="email" type="text" class="form-control" id="email" placeholder="Email">@error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                <label for="password" >Contraseña</label>
                <input  wire:model="password" id="password" type="password" placeholder="Contraseña" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" autocomplete=”off” >
                     @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                </div>

                <div class="form-group">
                    <label for="password-confirm">Confirmar contraseña</label>
                    <input wire:model="password_confirmation"id="password_confirmation" type="password" placeholder="Confirmar contraseña" class="form-control" name="password_confirmation" >
                </div>
                <div class="form-group ">
                            <label for="roles_id" >Roles de usuario</label>
                                  <select wire:model="rol_id" name="rol_id" id="rol_id" class="form-control">
                                     <option>--Seleccione un rol de usuario--</option>  
                                     @foreach ($roles as $row) 
                                      <option  value="{{ $row->id }}">{{ $row->name }}</option>
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
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="updateModalLabel">Actualizar usuario</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    @csrf
                        <input type="hidden" wire:model="selected_id">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input wire:model="name" type="text" class="form-control" id="name" placeholder="Name">@error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Correo electrónico</label>
                            <input wire:model="email" type="text" class="form-control" id="email" placeholder="Email">@error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                    <label for="password" >Contraseña</label>
                    <input  wire:model="password" id="password" type="password" placeholder="Contraseña" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" autocomplete=”off” >
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password-confirm">Confirmar contraseña</label>
                        <input wire:model="password_confirmation"id="password_confirmation" type="password" placeholder="Confirmar contraseña" class="form-control" name="password_confirmation" >
                    </div>
                    <div class="form-group ">
                                <label for="roles_id" >Roles de usuario</label>
                                    <select wire:model="rol_id" name="rol_id" id="rol_id" class="form-control">
                                        <option>--Seleccione una actividad--</option>  
                                        @foreach ($roles as $row) 
                                        <option  value="{{ $row->id }}">{{ $row->name }}</option>
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
