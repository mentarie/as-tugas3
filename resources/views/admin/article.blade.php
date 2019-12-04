@extends('admin.base')
@section('title')
Article
@endsection
@section('konten')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Article</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard2">Dashboard</a></li>
                    <li class="breadcrumb-item active">Article</li>
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
                            New
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width:50px">ID</th>
                                <th>Name</th>
                                <th>Content</th>
                                <th>Category Id</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th style="width:150px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($article as $data)

                            <tr>
                                <td style="width:50px">{{ $data->id }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->content }}</td>
                                <td>{{ $data->category_id }}</td>
                                <td>{{ $data->created_at }}</td>
                                <td>{{ $data->updated_at }}</td>
                                <td style="width:150px">
                                    <button class="btn btn-info btn-flat btnEdit" data-id="{{ $data->id }}">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-pen"></i>
                                        </span>
                                        <span class="text">Edit</span>
                                    </button>
                                    <a href="/article/delete/{{ $data->id }}" class="btn btn-danger btn-flat">
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
                                <th>Name</th>
                                <th>Content</th>
                                <th>Category Id</th>
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
                <form method="POST" action="{{ route('articleAdd') }}" id="form">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Article</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input name="id" id="id" hidden>
                        <input class="form-control" name="name" id="name" placeholder="Title" required><br>
                        <textarea class="form-control" name="content" id="content" placeholder="Content" required></textarea><br>
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}
                                @endforeach
                        </select>
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
        $.get('/article/edit/' + id, function(data) {
            $('.modal-title').html("Edit Article");
            $('#modal-default').modal('show');
            $('#id').val(data.id);
            $('#name').val(data.name);
            $('#stock').val(data.stock);
        })
    });

    $('#btnAdd').click(function() {
        $('.modal-title').html("Add Article");
        $('#modal-default').modal('show');
        $('#id').val("");
        $('#name').val("");
        $('#stock').val("");
    });
</script>
@endsection