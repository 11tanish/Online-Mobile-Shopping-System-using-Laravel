@extends('admin-layout.content')
@push('title')
<title>To Do App | Edit User </title>
@endpush
@push('page-title')
<h1 class="m-0">Edit User</h1>
@endpush
@push('menu-title')
<li class="breadcrumb-item active">Dashboard</li>
@endpush
@section('main-area')
@if($errors->any()) 
@php echo "<script>
    Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'User Email Already Exists..!'
    });
</script>" @endphp
@endif
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Edit user - {{$userdata->fullname}} </h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="/edit" enctype="multipart/form-data">
        @csrf
          <div class="card-body">
            <div class="form-group">
              <input type="hidden" name="userid" value="{{$userdata->userid}}">
              <label for="exampleInputFullName">Full Name</label>
              <input type="text" value="{{$userdata->fullname}}" class="form-control" name="fullname" id="exampleInputEmail1" placeholder="Enter Full Name" required>
            </div>
            <div class="form-group">
                <label for="exampleInputFullName">Email</label>
                <input type="email" value="{{$userdata->email}}" class="form-control" name="email" id="exampleInputEmail1" placeholder="Enter Email" required>
              </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" value="{{$userdata->password}}" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password" required>
            </div>
            <div class="form-group">
              <input type="hidden" name="currentusertype" value="{{$userdata->usertype}}">
                <label for="exampleInputUsertype">Usertype - {{$userdata->usertype}}</label>
                <select class="form-control" name="usertype">
                    <option>Select Usertype</option>
                    <option>Admin</option>
                    <option>Customer</option>
                </select>
              </div>
             <div class="form-group">
              <label for="exampleInputUsertype">status -
                @if($userdata->isactive==1)
                {{"Active"}}
                @else
                {{"Inactive"}}
                @endif
              </label>
              <select class="form-control" name="userstatus" value="{{$userdata->isactive}}">
                <option>select user status</option>
                <option>Active</option>
                <option>Inactive</option>
              </select>
                </div>

                <div class="form-group">
                <label for="exampleInputprofilephoto">profilephoto - 
                </label>
                <input type="hidden" name="currentprofilephoto" value="{{$userdata->profilephoto}}">
                <img src="uploads/{{$userdata->profilephoto}}" class="img-circle img-thumbnail" style="height:50px; width:50px;"/>
                <input type="file" class="form-control" name="fileupload"/>
            </div>


          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Edituser</button>
          </div>
        </form>
      </div>
      <!-- /.card -->
    </div>
   
  </div>
@endsection