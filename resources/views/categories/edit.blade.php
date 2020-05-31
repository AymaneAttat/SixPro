@extends('layouts.admin_dash')
@section('admin_content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Category</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">List of Category</a></li>
            <li class="breadcrumb-item active">Edit Category</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
<section class="content">
    <div class="row">
      <div class="col-md-12">
        {!! Form::open(['action' => ['CategoriesController@update', $category->id], 'method' => 'POST']) !!}
          {!! csrf_field() !!}
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">
                Edit Category
              </h3>
              <!-- tools box -->
              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fas fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body pad">
              <div class="form-group">
                  {{Form::label('name', 'Category Name')}}
                  {{Form::text('name',$category->name , ['class' => 'form-control', 'placeholder' => 'Enter name of category'])}}
              </div>
              <div class="mb-3">
                {{Form::textarea('description',$category->description , ['class' => 'form-control','id' => 'summary-ckeditor', 'placeholder' => 'Place some Description'])}}
              </div>
              <div class="form-check">
                <input type='hidden' value='0' name='status'>
                {{Form::checkbox('status', '1', ['class' => 'form-check-input'])}}
                {{Form::label('status', 'Publication Status', ['class' => 'form-check-label'])}}
            </div>
            <div class="card-footer">
                {{Form::hidden('_method','PUT')}}
                {{Form::submit('Save', ['class' => 'btn btn-success'])}}
            </div>
        {!! Form::close() !!}
      </div>
    </div>
  </section>
@endsection