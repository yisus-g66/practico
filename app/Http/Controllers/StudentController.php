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
        // return view('student.create');

    }
    //acción de almacenar nuevo registro
    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'name' => 'required|unique:Student,name',
            'code' =>'required|unique:Student,code',
            'Career_Id'=> 'required',
        ]);
        $student = new Student();
        $student->name = ucwords(strtolower($request->name));
        $student->code = ucwords(strtoupper($request->code));
        $student->Career_Id = $request->Career_Id;
        $student->save();
        return redirect()->route('student.index');
    }

    //mostrar student por ID
    public function show($student)
    {
        return View('student.show');
    }
    //formulario de modificación
    public function edit($student_id)
    {
        $student = Student::Where('id', '=', $student_id)->first();
        $careerReal = Career::Where('Id', '=', $student->Career_id)->first();
        $career = Career::All();
        /*
        $student = DB::table('Student')
            ->join('Career', 'Student.Career_Id', '=', 'Career.Id')
            ->select(
                'Student.*',
                'Career.Name as Career'
            )
            ->where('Student.id', '=', $student_id)
            ->first();
        */
        return view('Student.edit', compact('student','career','careerReal'));

    }
    //acción de almacenar modificación de student
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required',
            'code' =>'required',
            'Career_Id'=> 'required',
        ]);
        $student->name = ucwords(strtolower($request->name));
        $student->code = ucwords(strtoupper($request->code));
        $student->Career_id = $request->Career_Id;
        $student->save();
        return redirect()->route('student.index');
    }
    //acción de eliminación de student por ID
    public function destroy($student)
    {
        return View('student.index');
    }
}
