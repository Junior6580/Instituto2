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
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'profesor']);
        $role3 = Role::create(['name' => 'estudiante']);

        //permisos de home
        Permission::create(['name' => "home"])->syncRoles([$role1, $role2, $role3]); //muestra vista home

        //permisos de grados
        Permission::create(['name' => "grados"])->assignRole([$role1]); // solo el admin tiene permiso para acceder a esa vista

        //permisos de alumnos
        Permission::create(['name' => "alumnos"])->syncRoles([$role1, $role2, $role3]); //visualizar los alumnos...
        Permission::create(['name' => "getalumnoadd"])->assignRole([$role1]); //agregar alumnos
        Permission::create(['name' => "postalumnoadd"])->assignRole([$role1]); //guardar informacion de alumno agregado
        Permission::create(['name' => "colegio.alumno.edit"])->assignRole([$role1]); //editar alumnos
        Permission::create(['name' => "postalumnoedit"])->assignRole([$role1]); //guardar informacion de alumno editado
        Permission::create(['name' => "colegio.alumno.delete"])->assignRole([$role1]); //eliminar alumno existente

        //permisos de docentes
        Permission::create(['name' => "docentes"])->syncRoles([$role1, $role2]); //mostrar docentes
        Permission::create(['name' => "getdocenteodd"])->assignRole([$role1]); // agregar docentes
        Permission::create(['name' => "postdocenteodd"])->assignRole([$role1]); // guardar docente
        Permission::create(['name' => "getdocenteedot"])->assignRole([$role1]); // editar docentes
        Permission::create(['name' => "postdocenteedot"])->assignRole([$role1]); // guarda docente editado
        Permission::create(['name' => "getdocentedelete"])->assignRole([$role1]); // eliminar docentes

        //permisos de materias
        Permission::create(['name' => "materias"])->assignRole([$role1]); //muestra materias y agregar materias...

        //permisos de calificaciones
        Permission::create(['name' => "calificaciones"])->syncRoles([$role1, $role2, $role3]); // mostrar calificaciones
        Permission::create(['name' => "create_calificaciones"])->syncRoles([$role1, $role2]); // agregar calificaiones

        //permisos de actividades..
        Permission::create(['name' => "actividades"])->syncRoles([$role1, $role2, $role3]); // mostrar calificaciones
        Permission::create(['name' => "nueva_actividad"])->syncRoles([$role1, $role2]); // agregar calificaiones

        //permisos de horarios
        Permission::create(['name' => "mostrarhorarios"])->syncRoles([$role1, $role2, $role3]); // mostrar horarios
        Permission::create(['name' => "nuevo_horario"])->assignRole([$role1]); // asignar horarios

        //permisos jornadas
        Permission::create(['name' => "jornadas"])->assignRole([$role1]); // asignar horarios


        //permisos de perfiles, usuarios y personas
        Permission::create(['name' => "usuarios"])->assignRole([$role1]);
        Permission::create(['name' => "mostrarusuarios"])->assignRole([$role1]);
        Permission::create(['name' => "asignar_rol"])->assignRole([$role1]);
        Permission::create(['name' => "rol_asignado"])->assignRole([$role1]);
        Permission::create(['name' => "crear_usuarios"])->assignRole([$role1]);
        Permission::create(['name' => "usuario_nuevo"])->assignRole([$role1]);
        Permission::create(['name' => "personas"])->assignRole([$role1]);

    }
}