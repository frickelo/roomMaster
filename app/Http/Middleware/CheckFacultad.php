<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckFacultad
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
{
    $user = auth()->user();
    $facultadId = $user->facultades_id;

    $materiaEspacio = $request->route('materia_espacio');
    $materia = $request->route('materia');

    if ($materiaEspacio) {
        if (!$user->hasRole('super_admin')) {
            // Verificar la relación con la facultad en `materias`
            if ($materiaEspacio->materia->carrera->facultades_id !== $facultadId) {
                return redirect()->route('home')->withErrors('No tienes permiso para acceder a esta materia.');
            }

            // Verificar la relación con la facultad en `carreras`
            if ($materiaEspacio->carrera->facultades_id !== $facultadId) {
                return redirect()->route('home')->withErrors('No tienes permiso para acceder a esta carrera.');
            }

            // Verificar la relación con la facultad en `cursos`
            if ($materiaEspacio->curso->facultades_id !== $facultadId) {
                return redirect()->route('home')->withErrors('No tienes permiso para acceder a este curso.');
            }
        }
    }

    if ($materia) {
        if (!$user->hasRole('super_admin') && $materia->carrera->facultades_id !== $facultadId) {
            return redirect()->route('home')->withErrors('No tienes permiso para acceder a esta materia.');
        }
    }

    return $next($request);
}


}
