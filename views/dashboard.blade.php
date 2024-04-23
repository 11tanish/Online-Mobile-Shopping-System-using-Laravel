

@extends('admin-layout.content')
@push('title')
<title>To Do App | Dashboard </title>
@endpush
@push('page-title')
<h1 class="m-0">Dashboard</h1>
@endpush
@push('menu-title')
<li class="breadcrumb-item active">Dashboard</li>
@endpush
@section('main-area')
    <center><h1>Welcome {{session()->get('fullname')}}</h1></center>
@endsection

