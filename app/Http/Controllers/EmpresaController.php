<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\User;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresa = Empresa::withCount(['tareas' => function ($query) {
            $query->where('estatus',0);
        }])->orderByDesc('tareas_count')->first();

        $users = User::withCount('tareas')
        ->having('tareas_count', '<', 5)
        ->get();

        return response()->json([
            'empresa' => $empresa,
            'users' => $users
        ]);
    }
}
