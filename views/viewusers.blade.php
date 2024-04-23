@extends('admin-layout.content')
@push('title')
<title>To Do App | View Users </title>
@endpush
@push('page-title')
<h1 class="m-0">View Users</h1>
@endpush
@push('menu-title')
<li class="breadcrumb-item active">View Users</li>
@endpush
@section('main-area')
<div class="card">
    <div class="card-header">
      <h3 class="card-title"></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Id</th>
          <th>Profile photo</th>
          <th>Full Name</th>
          <th>Email</th>
          <th>Password</th>
          <th>Usertype</th>
          <th>Status</th>
          <th>Actions</th>

        </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
              <tr>
                  <td>
                    {{$user->userid}}
                  </td>
                  <td>
                    <img src="uploads/{{$user->profilephoto}}" class="img-circle img-thumbnail" style="height:50px; width:50px;"/>
                  </td>
                  <td>
                    {{$user->fullname}}
                  </td>
                  <td>
                    {{$user->email}}
                  </td>
                  <td>
                    {{$user->password}}
                  </td>
                  <td>
                    {{$user->usertype}}
                  </td>
                  <td>
                    @if($user->isactive == 1)
                    <span class="text-success">{{"Active"}}</span>
                    @else
                    <p class="text-danger">{{"Inactive"}}</p>
                    @endif
                  </td>
                  <td>
                    <a class="btn btn-app" href="/edituser?id={{$user->userid}}">
                      <i class="fas fa-edit"></i> Edit
                    </a> 
                    <a class="btn btn-app" href="/deleteuser?id={{$user->userid}}">
                      <i class="fas fa-trash"></i> Delete
                    </a>                     
                  </td>
              </tr>
            @endforeach
        </tbody>
        <tfoot>
        <tr>
          <th>Id</th>
          <th>Profile photo</th>
          <th>Full Name</th>
          <th>Email</th>
          <th>Password</th>
          <th>Usertype</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  @if(!is_null($userId))
    <div>User ID: {{ $userId }}</div>
  @endif
@endsection