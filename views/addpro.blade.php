@extends('admin-layout.content')
@push('title')
<title>To Do App | Add product </title>
@endpush
@push('page-title')
<h1 class="m-0">Add product</h1>
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
    text: 'product Already Exists..!'
    });
</script>" @endphp
@endif
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Add new product </h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="/addpro" enctype="multipart/form-data">
        @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputFullName">Product Name</label>
              <input type="text" class="form-control" name="proname" id="exampleInputEmail1" placeholder="Enter Product Name" required>
            </div>
            <div class="form-group">
                <label for="exampleInputFullName">Brand</label>
                <input type="text" class="form-control" name="brand" id="exampleInputEmail1" placeholder="Enter Brand" required>
              </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Color</label>
              <input type="text" class="form-control" name="color" id="exampleInputPassword1" placeholder="Enter Color" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Stock</label>
              <input type="text" class="form-control" name="instock" id="exampleInputPassword1" placeholder="Enter Stock" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Original Price</label>
              <input type="text" class="form-control" name="original_price" id="exampleInputPassword1" placeholder="Enter Original Price" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Discounted Price</label>
              <input type="text" class="form-control" name="discounted_price" id="exampleInputPassword1" placeholder="Enter Discounted Price" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Description</label>
              <textarea class="form-control" name="description" rows="3" placeholder="Enter Description" required></textarea>
            </div>
            <div class="form-group">
              <label for="exampleInputproducttype">Upload Phone Photo</label>
              <input type="file" class="form-control" name="fileupload"/>
            </div>
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
