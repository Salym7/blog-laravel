@extends('admin.layouts.main')

@section('content')
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit user</h1>
            <h2 class="m-0">{{$user->name}}</h2>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Main</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.user.index')}}">Users</a></li>
              <li class="breadcrumb-item active">User</li>
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

           <form action="{{route('admin.user.update', $user->id)}}" method="POST" class="w-25">
            @csrf
            @method('PATCH')
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" name="name" class="form-control" id="name" value="{{old('name') ?  old('name') : $user->name}}" placeholder="Enter name">
            </div>
            @error('name')
              <div class="text-danger mb-2">{{$message}}</div>  
            @enderror
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control" id="email" value="{{old('email') ?  old('email') : $user->email}}" placeholder="Enter email">
            </div>
            @error('email')
              <div class="text-danger mb-2">{{$message}}</div>  
            @enderror
            <div class="form_group mb-3 w-50">
              <label>Choose role</label>
              <select name="role" id="" class="form-control">
                @foreach ($roles as $id => $role)
                <option value="{{$id}}"
                @if (old('role'))
                {{old('role') == $id ? ' selected' : ''}}
                @else
                {{$user->role == $id ? ' selected' : ''}}
                @endif
                  >{{$role}}</option>
                @endforeach
              </select> 
            </div>
            @error('role')
            <div class="text-danger mb-2">{{$message}}</div>  
            @enderror
            <input type="submit" class="btn btn-primary" value="Update">
           </form>
          </div>
        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection