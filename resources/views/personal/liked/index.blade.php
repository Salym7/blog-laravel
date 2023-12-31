@extends('personal.layouts.main')

@section('content')
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Liked</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('personal.main.index')}}">Main</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
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
        <div class="col-6">
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Liked</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($posts as $post)
                  <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td><form action="{{route('personal.liked.store',$post->id)}}" method="POST">
                      @csrf
                      <button type="submit" class="border-0 bg-transparent">
                          @auth
                              @if(auth()->user()->likedPosts->contains($post->id))
                              <i class="fas fa-heart"></i>
                              @else
                              <i class="far fa-heart"></i>
                              @endif
                          @endauth
                      </button>
                  </form></td>
                    {{-- <td><a href="{{route('admin.post.show', $post->id)}}"><i class="far fa-eye"></i></a></td>
                    <td>
                      <form action="{{route('pesonal.liked.delete', $post->id)}}" method="POST">
                        @method('delete')
                        @csrf
                        <button type="submit" class="border-0 bg-transparent text-danger"><i class="fas fa-trash"></i></button>
                      </form>
                    </td> --}}
                  </tr>  
                  @endforeach
                  
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->     
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection