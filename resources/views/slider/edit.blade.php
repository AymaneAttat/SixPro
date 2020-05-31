@extends('layouts.admin_dash')
@section('admin_content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Zdit Slider</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('slider.index') }}">List of Sliders</a></li>
            <li class="breadcrumb-item active">Edit Slider</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="row">
      <div class="col-md-12">
        {!! Form::open(['action' => ['SliderController@update', $sli->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
          {!! csrf_field() !!}
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">
                Update Slider
              </h3>
              <!-- tools box -->
              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body pad">
                <div class="form-group">
                    {{Form::file('image',['class' => 'form-control-file'])}} 
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