@extends('base')
@section('title')
Produk
@endsection
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Produk</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Produk</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <button type="button" class="btn btn-primary float-sm-right" id="btnAdd">
                            Tambah
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width:50px">ID</th>
                                <th>Nama</th>
                                <th>Stok</th>
                                <th style="width:150px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($produk as $data)

                            <tr>
                                <td style="width:50px">{{ $data->id }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->stok }}</td>
                                <td style="width:150px">
                                    <button class="btn btn-info btn-flat btnEdit" data-id="{{ $data->id }}">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-pen"></i>
                                        </span>
                                        <span class="text">Edit</span>
                                    </button>
                                    <a href="/produk/delete/{{ $data->id }}" class="btn btn-danger btn-flat">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                        <span class="text">Hapus</span>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th style="width:50px">ID</th>
                                <th>Nama</th>
                                <th>Stok</th>
                                <th style="width:150px">Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ route('produkAdd') }}" id="form">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Produk</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input name="id" id="id" hidden>
                        <input class="form-control" name="name" id="name" placeholder="Nama Produk" required><br>
                        <input class="form-control" name="stok" id="stock" placeholder="Jumlah" type="number" required>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="submit" name="save" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

</section>
<!-- /.content -->
@endsection
@section('js')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.btnEdit').click(function() {
        var id = $(this).data('id');
        $.get('/produk/edit/' + id, function(data) {
            $('.modal-title').html("Edit Produk");
            $('#modal-default').modal('show');
            $('#id').val(data.id);
            $('#name').val(data.name);
            $('#stock').val(data.stock);
        })
    });

    $('#btnAdd').click(function() {
        $('.modal-title').html("Tambah Produk");
        $('#modal-default').modal('show');
        $('#id').val("");
        $('#name').val("");
        $('#stock').val("");
    });
</script>
@endsection