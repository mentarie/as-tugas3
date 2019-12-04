@extends('admin.base')
@section('title')
Category
@endsection
@section('konten')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Category</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard2">Dashboard</a></li>
                    <li class="breadcrumb-item active">Category</li>
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
                            Add
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
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th style="width:150px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($categories as $data)

                            <tr>
                                <td style="width:50px">{{ $data->id }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->created_at }}</td>
                                <td>{{ $data->updated_at }}</td>
                                <td style="width:150px">
                                    <button class="btn btn-info btn-flat btnEdit" data-id="{{ $data->id }}">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-pen"></i>
                                        </span>
                                        <span class="text">Edit</span>
                                    </button>
                                    <a href="/Category/delete/{{ $data->id }}" class="btn btn-danger btn-flat">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                        <span class="text">Delete</span>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th style="width:50px">ID</th>
                                <th>Nama</th>
                                <th>Created At</th>
                                <th>Updated At</th>
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
                <form method="POST" action="{{ route('categoryAdd') }}" id="form">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Category</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input name="id" id="id" hidden>
                        <input class="form-control" name="name" id="name" placeholder="Category" required>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="save" class="btn btn-primary">Save</button>
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
        $.get('/category/edit/' + id, function(data) {
            $('.modal-title').html("Edit Category");
            $('#modal-default').modal('show');
            $('#id').val(data.id);
            $('#name').val(data.name);
        })
    });

    $('#btnAdd').click(function() {
        $('.modal-title').html("Add Category");
        $('#modal-default').modal('show');
        $('#id').val("");
        $('#name').val("");
    });
</script>
@endsection