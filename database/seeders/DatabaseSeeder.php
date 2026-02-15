<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\{User, Sede, Carrera, PerfilEgreso, Usuario, Asignatura, ObjetivoAprendizaje, ResultadoAprendizaje, ObjetivoPde, ResultadoPde, Unidad, Tema, Subtema, HorasSemanales, PracticaMinima, SugerenciaDidactica, FormaDeEvaluar, SistemaDeEvaluacion, BibliografiaBasica, DocenteAsignatura};

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // USERS
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@softui.com',
            'password' => Hash::make('secret')
        ]);

        User::create([
            'name' => 'Juan Docente',
            'email' => 'juan@softui.com',
            'password' => Hash::make('secret'),
            'phone' => '5551234567',
            'location' => 'La Paz',
        ]);

        // SEDES
        Sede::create([
            'descripcion' => 'Sede Central',
            'codigo' => 'SC-01',
            'direccion' => 'Av Central 123',
            'telefono' => '1234567890',
            'estado' => true,
        ]);

        Sede::create([
            'descripcion' => 'Sede Norte',
            'codigo' => 'SN-02',
            'direccion' => 'Calle Norte 45',
            'telefono' => '0987654321',
            'estado' => true,
        ]);

        // CARRERAS
        $carrera1 = Carrera::create([
            'descripcion' => 'Ingeniería en Sistemas',
            'codigo' => 'SIS-01',
            'semestres' => '8',
            'estado' => true,
            'id_sede' => 1,
        ]);

        $carrera2 = Carrera::create([
            'descripcion' => 'Administración de Empresas',
            'codigo' => 'ADM-01',
            'semestres' => '8',
            'estado' => true,
            'id_sede' => 2,
        ]);

        // PERFIL EGRESOS
        $perfil1 = PerfilEgreso::create([
            'descripcion' => 'Diseña y desarrolla sistemas de software',
            'numero' => 1,
            'estado' => true,
            'id_carrera' => $carrera1->id_carrera,
        ]);

        $perfil2 = PerfilEgreso::create([
            'descripcion' => 'Gestiona recursos organizacionales',
            'numero' => 2,
            'estado' => true,
            'id_carrera' => $carrera2->id_carrera,
        ]);

        // USUARIOS
        $usuario1 = Usuario::create([
            'primer_nombre' => 'Juan',
            'segundo_nombre' => 'Carlos',
            'primer_apellido' => 'Pérez',
            'segundo_apellido' => 'García',
            'tipo' => 'docente',
            'estado' => true,
            'id_user' => 2,
        ]);

        $usuario2 = Usuario::create([
            'primer_nombre' => 'María',
            'segundo_nombre' => 'Alejandra',
            'primer_apellido' => 'López',
            'segundo_apellido' => 'Martínez',
            'tipo' => 'estudiante',
            'estado' => true,
            'id_user' => null,
        ]);

        // ASIGNATURAS
        $asignatura1 = Asignatura::create([
            'descripcion' => 'Programación I',
            'codigo' => 'PROG-101',
            'tipo' => 'obligatoria',
            'semestre' => '1',
            'educacion_ambiental' => 'Introducción a conceptos ambientales en sistemas',
            'estado' => true,
            'id_carrera' => $carrera1->id_carrera,
        ]);

        $asignatura2 = Asignatura::create([
            'descripcion' => 'Base de Datos I',
            'codigo' => 'BD-102',
            'tipo' => 'obligatoria',
            'semestre' => '2',
            'educacion_ambiental' => null,
            'estado' => true,
            'id_carrera' => $carrera1->id_carrera,
        ]);

        // OBJETIVOS APRENDIZAJE
        $objetivo1 = ObjetivoAprendizaje::create([
            'descripcion' => 'Comprender conceptos fundamentales de programación',
            'numero' => 1,
            'tipo' => 'conceptual',
            'id_asignatura' => $asignatura1->id_asignatura,
        ]);

        $objetivo2 = ObjetivoAprendizaje::create([
            'descripcion' => 'Implementar algoritmos básicos en Python',
            'numero' => 2,
            'tipo' => 'procedi',
            'id_asignatura' => $asignatura1->id_asignatura,
        ]);

        // RESULTADOS APRENDIZAJE
        $resultado1 = ResultadoAprendizaje::create([
            'descripcion' => 'El estudiante puede escribir código en Python',
            'numero' => 1,
            'estado' => true,
        ]);

        $resultado2 = ResultadoAprendizaje::create([
            'descripcion' => 'El estudiante entiende estructuras de datos',
            'numero' => 2,
            'estado' => true,
        ]);

        // OBJETIVO PDES (Pivot)
        ObjetivoPde::create([
            'id_objetivo_aprendizaje' => $objetivo1->id_objetivo_aprendizaje,
            'id_perfil_egreso' => $perfil1->id_perfil_egreso,
        ]);

        ObjetivoPde::create([
            'id_objetivo_aprendizaje' => $objetivo2->id_objetivo_aprendizaje,
            'id_perfil_egreso' => $perfil1->id_perfil_egreso,
        ]);

        // RESULTADO PDES (Pivot)
        ResultadoPde::create([
            'id_resultado_aprendizaje' => $resultado1->id_resultado_aprendizaje,
            'id_perfil_egreso' => $perfil1->id_perfil_egreso,
        ]);

        ResultadoPde::create([
            'id_resultado_aprendizaje' => $resultado2->id_resultado_aprendizaje,
            'id_perfil_egreso' => $perfil1->id_perfil_egreso,
        ]);

        // UNIDADES
        $unidad1 = Unidad::create([
            'descripcion' => 'Introducción a la programación',
            'numero' => 1,
            'id_asignatura' => $asignatura1->id_asignatura,
        ]);

        $unidad2 = Unidad::create([
            'descripcion' => 'Estructuras de control',
            'numero' => 2,
            'id_asignatura' => $asignatura1->id_asignatura,
        ]);

        // TEMAS
        $tema1 = Tema::create([
            'descripcion' => 'Conceptos básicos de algoritmia',
            'sustentacion' => 'Fundamento para la programación',
            'numero' => 1,
            'semana' => 1,
            'numero_horas' => 4,
            'id_unidad' => $unidad1->id_unidad,
        ]);

        $tema2 = Tema::create([
            'descripcion' => 'Variables y tipos de datos',
            'sustentacion' => 'Elemento esencial de todo programa',
            'numero' => 2,
            'semana' => 2,
            'numero_horas' => 4,
            'id_unidad' => $unidad1->id_unidad,
        ]);

        // SUBTEMAS
        Subtema::create([
            'descripcion' => 'Definición de algoritmo',
            'numero' => 1,
            'id_tema' => $tema1->id_tema,
        ]);

        Subtema::create([
            'descripcion' => 'Propiedades de los algoritmos',
            'numero' => 2,
            'id_tema' => $tema1->id_tema,
        ]);

        // HORAS SEMANALES
        HorasSemanales::create([
            'tipo' => 'teoría',
            'subtipo' => 'clase',
            'horas' => 2,
            'id_asignatura' => $asignatura1->id_asignatura,
        ]);

        HorasSemanales::create([
            'tipo' => 'práctica',
            'subtipo' => 'laboratorio',
            'horas' => 2,
            'id_asignatura' => $asignatura1->id_asignatura,
        ]);

        // PRACTICAS MINIMAS
        PracticaMinima::create([
            'descripcion' => 'Escribir un programa en Python',
            'numero' => 1,
            'resultados_esperados' => 'Programa funcional que resuelve problema propuesto',
            'sustentacion' => 'Verificar comprensión de sintaxis Python',
            'tipo' => 'evaluable',
            'id_asignatura' => $asignatura1->id_asignatura,
        ]);

        PracticaMinima::create([
            'descripcion' => 'Implementar una función reutilizable',
            'numero' => 2,
            'resultados_esperados' => 'Función bien documentada y probada',
            'sustentacion' => 'Enseña reutilización de código',
            'tipo' => 'evaluable',
            'id_asignatura' => $asignatura1->id_asignatura,
        ]);

        // SUGERENCIAS DIDACTICAS
        SugerenciaDidactica::create([
            'descripcion' => 'Usar ejemplos prácticos del mundo real',
            'numero' => 1,
            'estado' => true,
            'id_asignatura' => $asignatura1->id_asignatura,
        ]);

        SugerenciaDidactica::create([
            'descripcion' => 'Implementar pair programming en grupo',
            'numero' => 2,
            'estado' => true,
            'id_asignatura' => $asignatura1->id_asignatura,
        ]);

        // FORMAS DE EVALUAR
        FormaDeEvaluar::create([
            'descripcion' => 'Examen práctico',
            'numero' => 1,
            'estado' => true,
            'id_asignatura' => $asignatura1->id_asignatura,
        ]);

        FormaDeEvaluar::create([
            'descripcion' => 'Proyectos en equipo',
            'numero' => 2,
            'estado' => true,
            'id_asignatura' => $asignatura1->id_asignatura,
        ]);

        // SISTEMAS DE EVALUACION
        SistemaDeEvaluacion::create([
            'numero_unidad' => 1,
            'trabajo_autonomo' => '10',
            'evaluaciones_parciales' => '20',
            'trabajos_en_clase' => '15',
            'examen_parcial' => '25',
            'desarrollo_de_practicas' => '15',
            'proyecto_final' => '15',
            'id_asignatura' => $asignatura1->id_asignatura,
        ]);

        SistemaDeEvaluacion::create([
            'numero_unidad' => 2,
            'trabajo_autonomo' => '10',
            'evaluaciones_parciales' => '25',
            'trabajos_en_clase' => '15',
            'examen_parcial' => '25',
            'desarrollo_de_practicas' => '15',
            'proyecto_final' => '10',
            'id_asignatura' => $asignatura1->id_asignatura,
        ]);

        // BIBLIOGRAFIAS BASICAS
        BibliografiaBasica::create([
            'numero' => 1,
            'descripcion' => 'Python 3 Documentation',
            'sustentacion' => 'Referencia oficial del lenguaje Python',
            'id_asignatura' => $asignatura1->id_asignatura,
        ]);

        BibliografiaBasica::create([
            'numero' => 2,
            'descripcion' => 'Automate the Boring Stuff with Python',
            'sustentacion' => 'Libro práctico para aprender Python',
            'id_asignatura' => $asignatura1->id_asignatura,
        ]);

        // DOCENTE ASIGNATURAS (Pivot)
        DocenteAsignatura::create([
            'requisito_experiencia_docente' => 'Mínimo 3 años enseñando programación',
            'id_docente' => $usuario1->id_usuario,
            'id_asignatura' => $asignatura1->id_asignatura,
        ]);

        DocenteAsignatura::create([
            'requisito_experiencia_docente' => 'Experiencia en educación superior',
            'id_docente' => $usuario1->id_usuario,
            'id_asignatura' => $asignatura2->id_asignatura,
        ]);
    }
}
