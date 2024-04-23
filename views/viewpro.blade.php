@extends('admin-layout.content')
@push('title')
<title>To Do App | View Products </title>
@endpush
@push('page-title')
<h1 class="m-0">View Products</h1>
@endpush
@push('menu-title')
<li class="breadcrumb-item active">View Products</li>
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
          <th>Profile Photo</th>
          <th>Product Name</th>
          <th>Brand</th>
          <th>Color</th>
          <th>Stock</th>
          <th>Original Price</th>
          <th>Discounted Price</th>
          <th>Description</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach($products as $prom)
            <tr>
                  <td>
                    {{$prom->proid}}
                  </td>
                  <td>
                    <img src="uploads/{{$prom->prodphoto}}" class="img-circle img-thumbnail" style="height:50px; width:50px;"/>
                  </td>
                  <td>
                    {{$prom->proname}}
                  </td>
                  <td>
                    {{$prom->brand}}
                  </td>
                  <td>
                    {{$prom->color}}
                  </td>
                  <td>
                    {{$prom->instock}}
                  </td>
                  <td>
                    {{$prom->original_price}}
                  </td>
                  <td>
                    {{$prom->discounted_price}}
                  </td>
                  <td>
                    {{$prom->description}}
                  </td>                  
                  <td>
                    <a class="btn btn-info" href="/editpro?id={{$prom->proid}}">
                      <i class="fas fa-edit"></i> Edit
                    </a> 
                    <a class="btn btn-danger" href="/deletepro?id={{$prom->proid}}">
                                <i class="fas fa-trash"></i> Delete
                            </a>
                  </td>
              </tr>
            @endforeach            
        </tbody>
        <tfoot>
        <tr>          
        <th>Id</th>
        <th>Profile Photo</th>
        <th>Product Name</th>
        <th>Brand</th>
        <th>Color</th>
        <th>Stock</th>
        <th>Original Price</th>
        <th>Discounted Price</th>
        <th>Description</th>
        <th>Actions</th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection
