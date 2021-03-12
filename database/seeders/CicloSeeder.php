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
        //Ojo sin comas que lo uso en el controlador y ajax......
        $familias = [
            "Comercio y Marketing" => ["Actividades Comerciales",
                "Comercio Internacional",
                "Gestión de ventas  y espacios comerciales",
                "Transporte y logística",
                "Marketing y Publicidad"],
            "Imagen y Sonio" => [
                "Video Disk-jokey y sonido",
                "Animación 3D juegos y Entorno interactivos",
                "Iluminación, Captación y Tratamiento de imagen",
                "Producción de Audiovisuales y Espectáculos",
                "Realización de Proyectos Audiovisuales y Espectáculos"],
            "Informática y Comunicaciones" => [
                "Sistemas Microinformáticos y en Red",
                "Administración se Sistemas Informáticos en Red",
                "Desarrollo de Aplicaciones Multiplataforma",
                "Desarrollo de Aplicaciones Web"
            ]
        ];

        $color = "";
        foreach ($familias as $familia => $ciclos) {
            $color = $familia == "Comercio y Marketing" ? "red" : $color;
            $color = $familia == "Imagen y Sonio" ? "green" : $color;
            $color = $familia == "Informática y Comunicaciones" ? "blue" : $color;
            foreach ($ciclos as $ciclo) {
                DB::table('ciclos')->insert([
                    'familia' => $familia,
                    'nombre' => $ciclo,
                    'color' => $color
                ]);
            }
        }
        //
    }
}
