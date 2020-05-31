@extends('layouts.admin_dash')
@section('admin_content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Product</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('produits.index') }}">List of Products</a></li>
            <li class="breadcrumb-item active">Edit Product</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="row">
      <div class="col-md-12">
        {!! Form::open(['action' => ['ProductController@update',$pro->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
          {!! csrf_field() !!}
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">
                Update Product
              </h3>
              <!-- tools box -->
              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fas fa-minus"></i></button>
                
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body pad">
              <div class="form-group">
                  {{Form::label('name', 'Product Name')}}
                  {{Form::text('name',$pro->name , ['class' => 'form-control', 'placeholder' => 'Enter name of your Product'])}}
                </div>
                <div class="mb-3">
                    {{Form::label('description', 'Description')}}
                    {{Form::textarea('description',$pro->description , ['class' => 'form-control','rows' => '3', 'placeholder' => 'Place some Description'])}}
                </div>
                <div class="mb-3">
                    {{Form::label('DetailDescription', 'Detail Description')}}
                    {{Form::textarea('DetailDescription',$pro->DetailDescription , ['class' => 'form-control','id' => 'summary-ckeditor','rows' => '4', 'placeholder' => 'Place some Description'])}}
                </div>
                <div class="form-group">
                    {{Form::label('category_id', 'Category')}}
                    {{Form::select('category_id', array_pluck( $category , 'name','id'), 'Choose Category', ['class' => 'form-control', 'placeholder' => 'Choose Category']) }}
                </div>
                <div class="form-group">
                    {{Form::label('manufact_id', 'Manufacture')}}
                    {{Form::select('manufacture_id', array_pluck( $manufact , 'name','id'), 'Choose Manufacture', ['class' => 'form-control', 'placeholder' => 'Choose Manufacture']) }}
                </div>
                <div class="form-group">
                    {{Form::label('prix', 'Prix')}}
                    {{Form::number('prix', $pro->prix, ['class' => 'form-control', 'placeholder' => 'Enter price'])}}
                </div>
                <div class="form-group">
                  {{Form::label('shipping_cost', 'Shipping Cost')}}
                  {{Form::number('shipping_cost', $pro->shipping_cost, ['class' => 'form-control', 'placeholder' => 'Enter cost shipping'])}}
                </div>
                <div class="form-group">
                    {{Form::label('size', 'Size')}}
                    {{Form::text('size',$pro->size , ['class' => 'form-control', 'placeholder' => 'Enter size of the product'])}}
                </div>
                <div class="form-group">
                    {{Form::label('color', 'Color')}}
                    {{Form::text('color',$pro->color , ['class' => 'form-control', 'placeholder' => 'Enter color of the product'])}}
                </div>
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