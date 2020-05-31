@extends('layouts.admin_dash')
@section('admin_content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>List of Products</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('produits.create') }}">Create Product</a></li>
            <li class="breadcrumb-item active">List of Product</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
</section>
<div class="card card-dark">
    <div class="card-header">
      <h3 class="card-title">Products</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table class="table table-striped table-dark">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Status</th>
            <th scope="col">Image</th>
            <th scope="col">Prix</th>
            <th scope="col">Category</th>
            <th scope="col">Manufactue</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @forelse ($product as $pro)
            <tr>
              <th scope="row">{{ $pro->name }}</th>
              <td>{{ $pro->description }}</td>
              <td>
                @if ($pro->status == 1)
                    <a class="btn btn-sm bg-success btn-flat active">Active</a>
                @else
                    <a class="btn btn-sm bg-danger btn-flat active">Desactive</a>
                @endif
              </td>
              <td><img src="{{url('images',$pro->image)}}" style="width: 70px; height: 70px;"></td>
              
              <td>{{$pro->prix}}</td>
              <td>{{optional($pro->category)->name}}</td>
              <td>{{optional($pro->manufacture)->name}}</td>
              <td>
                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                  <div class="btn-group mr-2" role="group" aria-label="First group">
                    {!! Form::open([ 'action' => ['ProductController@destroy', $pro->id] , 'method' => 'POST']) !!}
                      {{Form::hidden('_method', 'DELETE')}}
                      <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                    {!! Form::close() !!}
                  </div>
                  <div class="btn-group mr-2" role="group" aria-label="Second group">
                    <button type="button" class="btn bg-olive"><a href="{{route('produits.edit', $pro->id)}}"><i class="fas fa-edit"></i> Edit</a></button>
                  </div>
                </div>
              </td>
            </tr>
            @empty
              <tr>
                <th scope="row">Empty Data</th>
                <td>Empty Data</td>
                <td>Empty Data</td>
                <td>Empty Data</td>
                <td>Empty Data</td>
                <td>Empty Data</td>
                <td>Empty Data</td>
                <td>Empty Data</td>
                <td>Empty Data</td>
                <td>Empty Data</td>
                <td>Empty Data</td>
              </tr>
            @endforelse
          </tr>
        </tbody>
      </table>
      {{ $product->links() }}
    </div>
    <!-- /.card-body -->
  </div>
@endsection