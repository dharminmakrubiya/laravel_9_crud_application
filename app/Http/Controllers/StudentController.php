<?php
namespace App\Http\Controllers;


use App\Models\Student;
Use Hash;
Use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;


class StudentController extends Controller
{

    public function index()
    {
        $data = Student::latest()->paginate(5);

        return view('index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    






    public function create()
    {
        return view('create');
    }

    public function login_auth()
    {
        return view('login');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'student_name'          =>  'required|max:120',
            'email'         =>  'required|email|unique:students',
            'student_phone'          =>  'required|numeric|digits:10',
            'student_gender'          =>  'required',
            'student_hobbies'       =>  'required',
            'student_address'          =>  'required',
            'student_image'         =>  'required|image|mimes:jpg,png,jpeg,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'password'      =>  'required|string|min:8'
        ]);

        $file_name = time() . '.' . request()->student_image->getClientOriginalExtension();
        request()->student_image->move(public_path('images'), $file_name);
        $student = new Student;
        $student->student_name = $request->student_name;
        $student->student_email = $request->student_email;
        $student->student_phone = $request->student_phone;
        $student->student_gender = $request->student_gender;
        $student->student_hobbies = json_encode($request->student_hobbies);
        $student->student_address = $request->student_address;
        $student->student_image = $file_name;
        $student->student_password = Hash::make($request['student_password']);
        
        // dd($student);
        echo "<pre>";
        print_r($student);
        echo "</pre>";
        // die();
        $student->save();
        return redirect()->route('students.index')->with('success', 'Your record insert successfully.');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'         =>  'required',
            'password'      =>  'required',
        ]);
        
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('You have Successfully loggedin');
        }
        
        return redirect()->route('login')->with('message', 'Login details are not valid');
    }

    public function dashboard()
    {
        if(Auth::check()){
            return view('index');
        }
        return redirect('/login');
    }
     
    public function signOut() {
        Session::flush();
        Auth::logout();
   
        return redirect('login');
    }
 
   
    public function show(Student $student)
    {
        return view('show', compact('student'));
    }

   
    public function edit(Student $student)
    {
        return view('edit', compact('student'));
    }

    
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'student_name'          =>  'required|max:120',
            'student_email'         =>  'required|email',
            'student_phone'          =>  'required|min:11|numeric',
            'student_gender'          =>  'required',
            'student_hobbies'       =>  'required',
            'student_address'          =>  'required',
            'student_image'         =>  'image|mimes:jpg,png,jpeg,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'
        ]);

        $student_image = $request->hidden_student_image;

        if($request->student_image != '')
        {
            $student_image = time() . '.' . request()->student_image->getClientOriginalExtension();

            request()->student_image->move(public_path('images'), $student_image);
        }

        $student = Student::find($request->hidden_id);
        $student->student_name = $request->student_name;
        $student->student_email = $request->student_email;
        $student->student_phone = $request->student_phone;
        $student->student_gender = $request->student_gender;
        $student->student_hobbies = json_encode($request->student_hobbies);
        // $student->student_hobbies = $request->get('student_hobbies',0) ? 1 : 0;
        $student->student_address = $request->student_address;
        $student->student_image = $student_image;
        
        // echo "<pre>";
        // print_r($student);
        // echo "</pre>";
        
        // dd($student);
        $student->save();

        return redirect()->route('students.index')->with('success', 'your record has been updated successfully');
    }

   
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'your record has been deleted successfully');
    }


    
}