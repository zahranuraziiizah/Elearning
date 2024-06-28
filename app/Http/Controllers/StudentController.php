<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // method untuk menapilkan data student
    public function index()
    {
        // tarik data student dari db
        $students = Student::all();

        //panggil view dan kirim data students
        return view('admin.contents.student.index', [
            'students' => $students,
        ]);
    }

    //panggil view
    public function create()
    {
        //mendapatkan data course
        $courses = Courses::all();

        return view('admin.contents.student.create', [
            'courses' => $courses
        ]);
    }


    //method untuk menyimpan data student baru
    public function store(Request $request)
    {
        //validasi data yang diterima
        $request->validate([
            'name' => 'required',
            'nim' => 'required|numeric',
            'major' => 'required',
            'class' => 'required',
            'course_id' => 'nullable',
        ]);

        //simpan data ke database
        Student::create([
            'name' => $request->name,
            'nim' => $request->nim,
            'major' => $request->major,
            'class' => $request->class,
            'courses_id' => $request->course_id
        ]);

        //redirect atau kembali ke halaman student
        return redirect('/admin/student')->with('message', 'Data student berhasil ditambahkan!');
    }

    // method untuk menampilkan halaman edit
    public function edit($id)
    {
        // cari data student berdasarkan id
        $student = Student::find($id); // Select * FROM students WHERE id = $id
        
        $courses = Courses::all();

        return view('admin.contents.student.edit', [
            'student' => $student, 'courses' => $courses
        ]);
    }

    //method untuk meyimpan hasil update
    public function update($id, Request $request)
    {
        // cari data student berdasarkan id
        $student = Student::find($id); // Select * FROM students WHERE id = $id;  

        //validasi request
        $request->validate([
            'name' => 'required',
            'nim' => 'required|numeric',
            'major' => 'required',
            'class' => 'required',
            'course_id' => 'nullable',
        ]);

        //simpan perubahan
        $student->update([
            'name' => $request->name,
            'nim' => $request->nim,
            'major' => $request->major,
            'class' => $request->class,
            'courses_id' => $request->course_id,
        ]);

        //kembalikan
        return redirect('/admin/student')->with('message', 'Berhasil mengedit student');
    }

    //method untuk menghapus student
    public function destroy($id)
    {
        //cari student berdasarkan id
        $student = Student::find($id); // Select * FROM students WHERE id = $id;  

        //hapus student
        $student->delete();

        //kembalikan
        return redirect('/admin/student')->with('message', 'Berhasil mengedit student');
    }
}
