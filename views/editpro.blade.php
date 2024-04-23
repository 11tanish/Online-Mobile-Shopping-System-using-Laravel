@extends('admin-layout.content')

@push('title')
<title>To Do App | Edit product </title>
@endpush

@push('page-title')
<h1 class="m-0">Edit product</h1>
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
    text: 'Product Email Already Exists..!'
    });
</script>" @endphp
@endif

<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit product - {{$prodata->proname}} </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="/edit1">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <input type="hidden" name="proid" value="{{$prodata->proid}}">
                        <label for="exampleInputFullName">Product Name</label>
                        <input type="text" value="{{$prodata->proname}}" class="form-control" name="proname"
                            id="exampleInputEmail1" placeholder="Enter Full Name" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputBrand">Brand</label>
                        <input type="text" value="{{$prodata->brand}}" class="form-control" name="brand"
                            id="exampleInputEmail1" placeholder="Enter Email" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputColor">Color</label>
                        <input type="text" value="{{$prodata->color}}" class="form-control" name="color"
                            id="exampleInputPassword1" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputStock">Stock</label>
                        <input type="text" value="{{$prodata->instock}}" class="form-control" name="instock"
                            id="exampleInputStock" placeholder="Enter Email" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputOriginalPrice">Original Price</label>
                        <input type="text" value="{{$prodata->original_price}}" class="form-control"
                            name="original_price" id="exampleInputOriginalPrice" placeholder="Enter Original Price"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputDiscountedPrice">Discounted Price</label>
                        <input type="text" value="{{$prodata->discounted_price}}" class="form-control"
                            name="discounted_price" id="exampleInputDiscountedPrice" placeholder="Enter Discounted Price"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputDescription">Description</label>
                        <textarea class="form-control" name="description" rows="3"
                            placeholder="Enter Description" required>{{$prodata->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProdPhoto">Product Photo</label>
                        <input type="hidden" name="currentprodphoto" value="{{$prodata->prodphoto}}">
                        <img src="uploads/{{$prodata->prodphoto}}" class="img-circle img-thumbnail"
                            style="height:50px; width:50px;" />
                        <input type="file" class="form-control" name="fileupload" />
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Edit product</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection
