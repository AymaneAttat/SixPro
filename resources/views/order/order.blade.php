@extends('layouts.admin_dash')
@section('admin_content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>List of Order</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item active">List of Order</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
</section>
<div class="card card-dark">
    <div class="card-header">
      <h3 class="card-title">Order</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table class="table table-striped table-dark">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Status Payment</th>
            <th scope="col">Total</th>
            <th scope="col">payment_method</th>
            <th scope="col">is_paid</th>
            <th scope="col">address</th>
          </tr>
        </thead>
        <tbody>
            @forelse ($orders as $order)
            <tr>
              <th scope="row">{{ $order->order_number }}</th>
              <td>{{ $order->name }}</td>
              <td>
                @if ($order->status == 'completed')
                    <a class="btn btn-sm bg-success btn-flat active">Completed</a>
                @else
                    <a class="btn btn-sm bg-danger btn-flat active">Pending</a>
                @endif
              </td>
              <td>{{$order->grand_total}}</td>
              <td>{{$order->payment_method}}</td>
              <td>{{$order->is_paid}}</td>
              <td>{{$order->address}}</td>
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
              </tr>
            @endforelse
          </tr>
        </tbody>
      </table>
      {{ $orders->links() }}
    </div><!-- /.card-body -->
</div>
@endsection