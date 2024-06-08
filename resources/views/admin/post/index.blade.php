@extends('admin.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Posts</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Posts</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-1 mb-3">
                        <a href="{{ route('admin.post.create') }}" class="btn btn-block btn-primary">Add</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th colspan="3" class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($posts as $post)
                                            <tr>
                                                <td>{{ $post->id }}</td>
                                                <td>{{ $post->title }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('admin.post.show', $post->id) }}"
                                                        class="far fa-eye text-info"></a>
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('admin.post.edit', $post->id) }}"
                                                        class="fas fa-edit text-success"></a>
                                                </td>
                                                <td class="text-center">
                                                    <form action="{{ route('admin.post.delete', $post->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="border-0 bg-transparent">
                                                            <i class="fas fa-trash-alt text-danger" role="button"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>

                @if ($deletedPosts->count() > 0)
                    <div class="row mt-4">
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Deleted Posts</h3>
                                </div>
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th class="text-center">Restore</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($deletedPosts as $delPost)
                                                <tr>
                                                    <td>{{ $delPost->id }}</td>
                                                    <td>{{ $delPost->title }}</td>
                                                    <td class="text-center">
                                                        <form action="{{ route('admin.post.restore', $delPost->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('patch')
                                                            <button type="submit"
                                                                class="btn btn-sm btn-primary">Restore</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
