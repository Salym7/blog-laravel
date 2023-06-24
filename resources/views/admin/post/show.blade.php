@extends('admin.layouts.main')

@section('content')
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 d-flex align-items-center">
            <h1 class="m-0 mr-2">{{$post->title}}</h1>
            <a class="text-success" href="{{route('admin.post.edit', $post->id)}}"><i class="fas fa-pencil-alt"></i></a>
            <form action="{{route('admin.post.delete', $post->id)}}" method="POST">
              @method('delete')
              @csrf
              <button type="submit" class="border-0 bg-transparent text-danger"><i class="fas fa-trash"></i></button>
            </form>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
              <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Main</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.post.index')}}">Posts</a></li>
              <li class="breadcrumb-item active">Create post</li>
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
          <div class="col-1">
            <a  href="{{route('admin.post.index')}}" class=" mb-3 btn btn-block btn-primary">Back</a>
          </div>
        </div>
        <div class="row">
           <div class="col-6">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <tbody>
                    <tr>
                      <td>ID</td>
                      <td>{{$post->id}}</td>
                    </tr>  
                    <tr>
                      <td>Title</td>
                      <td>{{$post->title}}</td>
                    </tr>              
                    <tr>
                      <td>Content</td>
                      <td>{{$post->content}}</td>
                    </tr>              
                    <tr>
                      <td>preview</td>
                      <td><img class="w-25" src="{{Storage::url($post->preview_image)}}" alt=""></td>
                    </tr>              
                    <tr>
                      <td>main image</td>
                      <td><img class="w-25" src="{{Storage::url($post->main_image)}}" alt=""></td>
                    </tr>              
                    <tr>
                      <td>Category</td>
                      <td>{{$category->title}}</td>
                    </tr>              
                    <tr>
                      {{-- <td>Post</td>
                      <td>@foreach ($tags as $tag)

                          <span>{{tag->title}}</span>
                      @endforeach</td>
                    </tr>               --}}
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->     
          </div>
        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection