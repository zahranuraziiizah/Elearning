<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    //method untuk menampilkan data student
    public function index()
    {
        // tarik data student dari database
        $courses = Courses::all();

        // panggil view dan kirim data students
        return view('admin.contents.courses.index', [
            'courses' => $courses,
        ]);
    }

    //panggil view
    public function create()
    {
        return view('admin.contents.courses.create');
    }

    //method untuk menyimpan data courses baru
    public function store(Request $request)
    {
        //validasi data yang diterima
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'category' => 'required',
            'desc' => 'required',
        ]);

        //simpan data ke database
        Courses::create([
            'id' => $request->id,
            'name' => $request->name,
            'category' => $request->category,
            'desc' => $request->desc,
        ]);

        //redirect atau kembali ke halaman student
        return redirect('/admin/courses')->with('message', 'Data courses berhasil ditambahkan!');
    }

    // method untuk menampilkan halaman edit
    public function edit($id)
    {
        // cari data courses berdasarkan id
        $courses = Courses::find($id); // Select * FROM courses WHERE id = $id

        return view('admin.contents.courses.edit', [
            'courses' => $courses
        ]);
    }

    //method untuk meyimpan hasil update
    public function update($id, Request $request)
    {
        // cari data courses berdasarkan id
        $courses = Courses::find($id); // Select * FROM courses WHERE id = $id;  

        //validasi request
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'category' => 'required',
            'desc' => 'required',
        ]);

        //simpan perubahan
        $courses->update([
            'id' => $request->id,
            'name' => $request->name,
            'category' => $request->category,
            'desc' => $request->desc,
        ]);

        //kembalikan
        return redirect('/admin/courses')->with('message', 'Berhasil mengedit courses');
    }

    //method untuk menghapus courses
    public function destroy($id){
        //cari student berdasarkan id
        $courses = Courses::find($id); // Select * FROM courses WHERE id = $id;  

        //hapus courses
        $courses->delete();
        
        //kembalikan
        return redirect('/admin/courses')->with('message', 'Berhasil mengedit courses');
    }
}
