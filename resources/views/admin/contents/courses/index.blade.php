@extends('admin.main')
@section('content')
<div class="pagetitle">
    <h1>Courses</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"></li>
        <li class="breadcrumb-item active">Courses</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="card">
        <div class="card-body">
            <table class="table">
              <a href="/admin/courses/create" class="btn btn-primary my-3">+ Courses</a>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Deskripsi</th>
                    <th>timestamp</th>
                    @if (Auth::user()->role == 'admin')
                    <th>Action</th>
                    @endif
                </tr>
                @foreach($courses as $cour)
                <tr>
                    <td>{{$cour->id}}</td>
                    <td>{{$cour->name}}</td>
                    <td>{{$cour->category}}</td>
                    <td>{{$cour->desc}}</td>
                    <td>{{$cour->timestamp}}</td>
                    @if (Auth::user()->role == 'admin')
                    <td>
                      <a href="/admin/courses/edit/{{ $cour->id }}" class="btn btn-warning me-2">Edit</a>
                      <form action="/admin/courses/delete/{{ $cour->id }}" method="POST" class="">
                          @method('DELETE')
                          @csrf
                          <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                      </form>
                    </td>
                    @endif
                </tr>
                @endforeach
            </table>
        </div>
    </div>
  </section>
@endsection