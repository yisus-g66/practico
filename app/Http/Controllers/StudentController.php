<?php
namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    //principal
    public function index()
    {
        return View('student.index');
    }
    //formulario de creación
    public function create()
    {
        $career = Career::All();
        // return $todos['admin'];
        // dd($career);
        return view('Student.create', compact('career'));
        // return view('estudiante.create');

    }
    //acción de almacenar nuevo registro
    public function store()
    {
        return View('student.index');
    }
    //mostrar estudiante por ID
    public function show($student)
    {
        return View('student.show');
    }
    //formulario de modificación
    public function edit($student)
    {
        return View('student.edit');
    }
    //acción de almacenar modificación de estudiante
    public function update(Student $student)
    {
        return View('student.index');
    }
    //acción de eliminación de estudiante por ID
    public function destroy($student)
    {
        return View('student.index');
    }
}
