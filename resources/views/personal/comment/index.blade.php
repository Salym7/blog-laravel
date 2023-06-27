@extends('personal.layouts.main')

@section('content')
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Comment</h1>
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
                    <th>Edit</th>
                    <th>Delet</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($comments as $comment)
                  <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->message}}</td>
                    
                    <td> <a class="text-success" href="{{route('personal.comment.edit', $comment->id)}}"><i class="fas fa-pencil-alt"></i></a></td>
                    <td>
                      <form action="{{route('personal.comment.delete', $comment->id)}}" method="POST">
                        @method('delete')
                        @csrf
                        <button type="submit" class="border-0 bg-transparent text-danger"><i class="fas fa-trash"></i></button>
                      </form>
                    </td>
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