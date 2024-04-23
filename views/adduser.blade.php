@extends('admin-layout.content')
@push('title')
<title>To Do App | Add User </title>
@endpush
@push('page-title')
<h1 class="m-0">Add User</h1>
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
          <h3 class="card-title">Add new User </h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="/add" enctype="multipart/form-data">
        @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputFullName">Full Name</label>
              <input type="text" class="form-control" name="fullname" id="exampleInputEmail1" placeholder="Enter Full Name" required>
            </div>
            <div class="form-group">
                <label for="exampleInputFullName">Email</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Enter Email" required>
              </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password" required>
            </div>
            <div class="form-group">
                <label for="exampleInputUsertype">Usertype</label>
                <select class="form-control" name="usertype">
                    <option>Select Usertype</option>
                    <option>Admin</option>
                    <option>customer</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputUsertype">Upload Profile Photo</label>
                <input type="file" class="form-control" name="fileupload"/>
            </div>
            {{-- <div class="form-group">
              <label for="exampleInputFile">File input</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="exampleInputFile">
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text">Upload</span>
                </div>
              </div>
            </div> --}}
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
      <!-- /.card -->
    </div>
   
  </div>
@endsection