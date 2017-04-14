<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateIdFromAlumnos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alumnos', function (Blueprint $table) {
            $table->renameColumn('idAlumno', 'id');
        });
        // Muchachos: este metodo lo ejecutan escribiendo php artisan migrate en la consola.
        // Consejo , en vez de copiar y pegar todo este file en el proyecto generen una nueva migration por consola
        // con php artisan make:migration changeAlumnosId , y en ese file que se va a crear dentro de database/migrations
        // Copien los metodos up y down alli de esa manera se aseguran no tener dramas para que les reconozca la migration 
        // como valida

        // Asi como esto en donde dice alumnos va el nombre de la tabla a modificar, en el rename column para cambiar los demas ids
        // el primer campo es como se llama nuestro id hoy y en el segundo campo, siempre va id. Que es como queremos que se llame de ahora en 
        // mas.
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alumnos', function (Blueprint $table) {
            $table->renameColumn('id', 'idAlumno');
        });
    }
}

// Les dejo por aca comentado lo otro que faltaba

// Metodo para actualizar un registro de la tabla dentro del modelo

// public static function updateAlumno($id) {
//    $alumno = Alumno::find($id);
//    $alumno->nombre = 'Pepe';

//    if ($alumno->save()) {
//        return 200;
//    else {
//        return 500;
//      }
// }

//        
// }

// Para el get que faltaba tambien
// Obteniendo el id que viene por parametro

// public static getAlumno($id) {
//    return Alumno::find($id);
// }