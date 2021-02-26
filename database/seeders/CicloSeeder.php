<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class CicloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $familias = [
            "Comercio y Marketing" => ["Actividades Comerciales",
                "Comercin Internacional",
                "Gestión de ventas  y espacios comerciales",
                "Transporte y logística",
                "Marketing y Publicidad"],
            "Imagen y Sonio" => [
                "Video Disk-jokey y sonido",
                "Animación 3D, juegos y Entorno interactivos",
                "Iluminación, Captación y Tratamiento de imagen",
                "Producción de Audiovisuales y Espectáculos",
                "Realización de Proyectos Audiovisuales y Espectáculos"],
            "Informática y Comunicaciones"=>[
                "Sistemas Microinformáticos y en Red",
                "Administración se Sistemas Informáticos en Red",
                "Desarrollo de Aplicaciones Multiplataforma",
                "Desarrollo de Aplicaciones Web"
            ]
        ];
            

        foreach ($familias as $familia=>$ciclos)
            foreach ($ciclos as $ciclo) {
                DB::table('ciclos')->insert([
                    'familia' => $familia,
                    'nombre' => $ciclo
                ]);
            }
        //
    }
}
