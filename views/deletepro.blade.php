@extends('admin-layout.content')

@push('title')
    <title>Delete Product</title>
@endpush

@section('main-area')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Delete Product Confirmation</div>

                    <div class="card-body">
                        <p>Are you sure you want to delete this product?</p>

                        <form method="POST" action="/deletepro">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="proid" value="{{ $prom->proid }}">
                            <button type="submit" class="btn btn-danger">Delete</button>
                            <a href="/viewpro" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
