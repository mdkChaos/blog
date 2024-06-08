@extends('admin.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add post</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Posts</a></li>
                            <li class="breadcrumb-item active">Add post</li>
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
                        <form action="{{ route('admin.post.store') }}" method="post" class="form"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group w-25">
                                <label>Name post</label>
                                <input type="text" name="title" class="form-control" placeholder="Name post"
                                    value="{{ old('title') }}">
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea id="summernote" name="content" class="form-control">{{ old('content') }}</textarea>
                                @error('content')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label for="exampleInputFile">Add preview image, max 1 MB</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="preview_image">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                                @error('preview_image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label for="exampleInputFile">Add main image, max 1 MB</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="main_image">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                                @error('main_image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group w-25">
                                <label>Select Category</label>
                                <select name="category_id" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == old('category_id') ? 'selected' : '' }}>
                                            {{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group w-50">
                                <label>Tags</label>
                                <select name="tag_ids[]" class="select2 form-control" multiple="multiple"
                                    data-placeholder="Select a tags">
                                    @foreach ($tags as $tag)
                                        <option
                                            {{ is_array(old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? 'selected' : '' }}
                                            value="{{ $tag->id }}">{{ $tag->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Add" class="btn btn-primary col-1">
                            </div>
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
