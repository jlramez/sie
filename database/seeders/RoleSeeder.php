<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         /* 
        Admin=> all
        Maager=> actividades, tareas
        usuario => tareas
        */
        $admin=Role::create(['name'=>'admin']);
        $magistrado=Role::create(['name'=>'magistrado']);
        $odp=Role::create(['name'=>'oficialia']);
        $amparos=Role::create(['name'=>'amparos']);
        $coordinador=Role::create(['name'=>'coordinador']);
        $instructor=Role::create(['name'=>'instructor']);
        $auxiliar=Role::create(['name'=>'auxiliar']);

        Permission::create(['name'=>'empleados.index'])->syncRoles([$admin]);
        Permission::create(['name'=>'promociones.index'])->syncRoles([$admin,$instructor,$auxiliar, $magistrado, $odp, $amparos, $coordinador]);
        Permission::create(['name'=>'etapas.index'])->syncRoles([$admin]);   
        Permission::create(['name'=>'tareas.index'])->syncRoles([$admin]);
        Permission::create(['name'=>'estados.index'])->syncRoles([$admin]);
        Permission::create(['name'=>'juzgados.index'])->syncRoles([$admin]);
        Permission::create(['name'=>'amtipos.index'])->syncRoles([$admin]);
        Permission::create(['name'=>'show.ordinarios.amparos'])->syncRoles([$admin,$instructor,$auxiliar, $magistrado, $odp, $amparos, $coordinador]);
        Permission::create(['name'=>'especiales.index'])->syncRoles([$admin,$instructor,$auxiliar, $magistrado, $odp, $amparos, $coordinador]);
        Permission::create(['name'=>'ordinarios.index'])->syncRoles([$admin,$instructor,$auxiliar, $magistrado, $odp, $amparos, $coordinador]);
        Permission::create(['name'=>'paraprocesales.index'])->syncRoles([$admin,$instructor,$auxiliar, $magistrado, $odp, $amparos, $coordinador]);
        Permission::create(['name'=>'tipos.index'])->syncRoles([$admin]);
        Permission::create(['name'=>'estatus.index'])->syncRoles([$admin]);
        Permission::create(['name'=>'ponencias.index'])->syncRoles([$admin]);
        Permission::create(['name'=>'expedientes.index'])->syncRoles([$admin,$instructor,$auxiliar, $magistrado, $odp, $amparos, $coordinador]);
        Permission::create(['name'=>'actuaciones.index'])->syncRoles([$admin,$instructor,$auxiliar, $magistrado, $odp, $amparos, $coordinador]);
        Permission::create(['name'=>'home'])->syncRoles([$admin,$instructor,$auxiliar, $magistrado]);

    

        
    }
}
