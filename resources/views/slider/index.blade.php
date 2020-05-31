@extends('layouts.admin_dash')
@section('admin_content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>List of Slider</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('slider.create') }}">Create Slider</a></li>
            <li class="breadcrumb-item active">List of Slider</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
</section>
<div class="card card-dark">
  <div class="card-header">
    <h3 class="card-title">Slider</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table class="table table-striped table-dark">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Image</th>
          <th scope="col">Publication Status</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
          @forelse ($sliders as $sli)
          <tr>
            <th scope="row">{{ $sli->id }}</th>
            <td><img src="{{url('images',$pro->image)}}" style="width: 70px; height: 70px;"></td>
            <td>
              @if ($manu->status == 1)
                  <a class="btn btn-sm bg-success btn-flat active">Active</a>
              @else
                  <a class="btn btn-sm bg-danger btn-flat active">Desactive</a>
              @endif
            </td>
            <td>
              <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group mr-2" role="group" aria-label="First group">
                  {!! Form::open([ 'action' => ['SliderController@destroy', $sli->id] , 'method' => 'POST']) !!}
                    {{Form::hidden('_method', 'DELETE')}}
                    <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                  {!! Form::close() !!}
                </div>
                <div class="btn-group mr-2" role="group" aria-label="Second group">
                  <button type="button" class="btn bg-olive"><a href="{{route('manufacture.edit', $sli->id)}}"><i class="fas fa-edit"></i> Edit</a></button>
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
            </tr>
          @endforelse
        </tr>
      </tbody>
    </table>
    {{ $slider->links() }}
  </div>
  <!-- /.card-body -->
</div>
@endsection