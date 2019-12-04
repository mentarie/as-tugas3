@extends('base')
@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Kategori</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">
      <a href="#" class="btn btn-success btn-icon-split float-right">
        <span class="icon text-white-50">
          <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah</span>
      </a>
    </h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" cellspacing="0">
        <thead>
          <tr>
            <th style="width:50px">ID</th>
            <th>Nama</th>
            <th colspan="2" style="width:150px">Aksi</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th style="width:50px">ID</th>
            <th>Nama</th>
            <th colspan="2" style="width:150px">Aksi</th>
          </tr>
        </tfoot>
        <tbody>

          @foreach($kategori as $data)

          <tr>
            <td style="width:50px">{{ $data->id }}</td>
            <td>{{ $data->name }}</td>
            <td style="width:75px">
              <a href="#" class="btn btn-info btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-pen"></i>
                </span>
                <span class="text">Edit</span>
              </a>
            </td>
            <td style="width:75px">
              <a href="#" class="btn btn-danger btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-trash"></i>
                </span>
                <span class="text">Hapus</span>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection