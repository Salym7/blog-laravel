@extends('admin.layouts.main')

@section('content')
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Adding posts</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
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

           <form action="{{route('admin.post.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group w-50">
              <label for="title">Title</label>
              <input type="text" name="title" class="form-control" id="title" placeholder="post`s name" value={{old('title')}}>
            </div>
            @error('title')
            <div class="text-danger mb-2">{{$message}}</div>  
          @enderror
            <div class="form-group">
              <textarea name="content" id="summernote">{{old('content')}}</textarea>
            </div>
            @error('content')
              <div class="text-danger mb-2">{{$message}}</div>  
            @enderror
            <div class="form-group w-50">
              <label for="exampleInputFile">Add preview image</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="preview_image" id="preview_image">
                  <label class="custom-file-label" for="preview_image">Choose preview_image</label>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text">Upload</span>
                </div>
              </div>
            </div>
            @error('preview_image')
            <div class="text-danger mb-2">{{$message}}</div>  
            @enderror
            <div class="form-group w-50">
              <label for="exampleInputFile">Add image</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="main_image" id="main_image">
                  <label class="custom-file-label" for="main_image">Choose image</label>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text">Upload</span>
                </div>
              </div>
            </div>
            @error('main_image')
            <div class="text-danger mb-2">{{$message}}</div>  
            @enderror
            <div class="form_group mb-3 w-50">
              <label>Choose category</label>
              <select name="category_id" id="" class="form-control">
                @foreach ($categories as $category)
                <option value="{{$category->id}}"
                  {{old('category_id') == $category->id ? ' selected' : ''}}>{{$category->title}}</option>
                @endforeach
              </select> 
            </div>
            @error('category_id')
            <div class="text-danger mb-2">{{$message}}</div>  
            @enderror
            <div class="form_group">
              <input type="submit" class="btn btn-primary" value="Add">
            </div>
           </form>
          </div>
        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection