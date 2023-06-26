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
        <div class="row>
          <div class="col-12">

            <form action="{{route('personal.comment.update', $comment->id)}}" method="POST" class="w-50">
             @csrf
             @method('PATCH')
             <div class="form-group">
               <label for="title">Message</label>
               <textarea name="message" class="form-control" id="message" placeholder="Message">{{$comment->message}}</textarea>
             </div>
             @error('message')
               <div class="text-danger mb-2">{{$message}}</div>  
             @enderror
             <input type="submit" class="btn btn-primary" value="Update">
            </form>
           </div> 
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection