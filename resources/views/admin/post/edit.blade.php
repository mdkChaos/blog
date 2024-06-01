@extends('admin.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit post</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Posts</a></li>
                            <li class="breadcrumb-item active">Edit post</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('admin.post.update', $post->id) }}" method="post">
                            @csrf
                            @method('patch')
                            <div class="form-group form w-25">
                                <label>Name post</label>
                                <input type="text" name="title" class="form-control" value="{{ $post->title }}">
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea id="summernote" name="content" class="form-control">{{ $post->content }}</textarea>
                                @error('content')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- <div class="form-group">
                                <label>Category</label>
                                <input type="text" name="category_id" class="form-control" placeholder="Category">
                                @error('category_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div> --}}
                            <input type="submit" value="Update" class="btn btn-primary col-1">
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
