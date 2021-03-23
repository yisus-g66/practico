<?php

namespace App\Http\Controllers;
use App\Models\Career;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    //
    public function index()
    {
        $career = DB::table('Career')
        ->select('*')
        ->where('State','=','1')
        ->paginate(5);
        //dd($career);
        return view('Career/index',compact('career'));
    }
    //formulario de creación
    public function create()
    {
        return View('career.create');
    }
    //acción de almacenar nuevo registro
    public function store()
    {
        return View('career.index');
    }
    //mostrar estudiante por ID
    public function show($career)
    {
        return View('career.show');
    }
    //formulario de modificación
    public function edit($career)
    {
        return View('career.edit');
    }
    //acción de almacenar modificación de estudiante
    public function update(Career $career)
    {
        return View('career.index');
    }
    //acción de eliminación de estudiante por ID
    public function destroy($career)
    {
        return View('career.index');
    }
}
