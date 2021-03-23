<?php
namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    //principal
    public function index()
    {
        $student = DB::table('Student')
        ->select('*')
        ->where('State','=','1')
        ->paginate(5);
        return view('Student/index',compact('student'));
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
    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'name' => 'required',
            'code' =>'required',
        ]);
        $estudiante = new Student();
        $estudiante->name = $request->name;
        $estudiante->code = $request->code;
        // dd($estudiante);
        $estudiante->save();
        return redirect()->route('student.index', $estudiante);
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
