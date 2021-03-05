@extends('layouts.app')

@section('title')
    Your Orders | Bright Containers
@endsection

@push('css')
  <link href="{{asset('css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">  
@endpush

@section('content')

<h1>Orders page</h1>
<div class="ibox-content">
  <div class="table-responsive">
    <table class="table text-center table-striped table-bordered table-hover" id="ordersTable" >
      <thead>
        <tr>
          <th></th>
          <th>Product Name</th>
          <th>Total Price</th>
          <th>Order Status</th>
          <th>Payment Status</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr class="gradeX">
          <td></td>
          <td>Product 1</td>
          <td>1000</td>
          <td>
            @php
              $status = 'pending';
              // $status = 'shipped';
              // $status = 'canceled';
              // $status = 'completed';
              // $status = 'complet';
              switch($status){
                case 'pending':
                  echo '<span class="label label-warning">Pending</span>';
                  break;
                
                case 'shipped':
                  echo '<span class="label label-success">Shipped</span>';
                  break;
                
                case 'canceled':
                  echo '<span class="label label-danger">Canceled</span>';
                  break;
              
                case 'completed':
                  echo '<span class="label label-primary">Completed</span>';
                  break;
            
                default :
                  echo '<span class="label label-block">Unknown</span>';
                  break;
              }
            @endphp
          </td>
          <td>
            @php
              // $status = 'pending';
              // $status = 'completed';
              // $status = 'canceled';
              $status = 'complet';
              switch($status){
                case 'pending':
                  echo '<span class="label label-warning">Pending</span>';
                  break;
                
                case 'completed':
                  echo '<span class="label label-success">Completed</span>';
                  break;
                
                case 'canceled':
                  echo '<span class="label label-danger">Canceled</span>';
                  break;
              
                default :
                  echo '<span class="label label-block">Unknown</span>';
                  break;
              }
            @endphp
          </td>
          <td>
            <form action="{{URL('orderDetails',[$status => '1'])}}" method="post">
              @csrf
              <button type="submit" class="btn btn-primary">
                Show
            </button>
            </form>
          </td>
        </tr>
        <tr class="gradeU">
          <td></td>
          <td>Product 2</td>
          <td>2000</td>
          <td>
            @php
              // $status = 'pending';
              $status = 'shipped';
              // $status = 'canceled';
              // $status = 'completed';
              // $status = 'complet';
              switch($status){
                case 'pending':
                  echo '<span class="label label-warning">Pending</span>';
                  break;
                
                case 'shipped':
                  echo '<span class="label label-success">Shipped</span>';
                  break;
                
                case 'canceled':
                  echo '<span class="label label-danger">Canceled</span>';
                  break;
              
                case 'completed':
                  echo '<span class="label label-primary">Completed</span>';
                  break;
            
                default :
                  echo '<span class="label label-block">Unknown</span>';
                  break;
              }
            @endphp
          </td>
          <td>
            @php
              // $status = 'pending';
              // $status = 'completed';
              $status = 'canceled';
              // $status = 'complet';
              switch($status){
                case 'pending':
                  echo '<span class="label label-warning">Pending</span>';
                  break;
                
                case 'completed':
                  echo '<span class="label label-success">Completed</span>';
                  break;
                
                case 'canceled':
                  echo '<span class="label label-danger">Canceled</span>';
                  break;
              
                default :
                  echo '<span class="label label-block">Unknown</span>';
                  break;
              }
            @endphp
          </td>
          <td>
            <form action="{{URL('orderDetails',[$status => '2'])}}" method="post">
              @csrf
              <button type="submit" class="btn btn-primary">
                Show
            </button>
            </form>
          </td>
        </tr>
        <tr class="gradeU">
          <td></td>
          <td>Product 2</td>
          <td>2000</td>
          <td>
            @php
              // $status = 'pending';
              // $status = 'shipped';
              $status = 'canceled';
              // $status = 'completed';
              // $status = 'complet';
              switch($status){
                case 'pending':
                  echo '<span class="label label-warning">Pending</span>';
                  break;
                
                case 'shipped':
                  echo '<span class="label label-success">Shipped</span>';
                  break;
                
                case 'canceled':
                  echo '<span class="label label-danger">Canceled</span>';
                  break;
              
                case 'completed':
                  echo '<span class="label label-primary">Completed</span>';
                  break;
            
                default :
                  echo '<span class="label label-block">Unknown</span>';
                  break;
              }
            @endphp
          </td>
          <td>
            @php
              // $status = 'pending';
              $status = 'completed';
              // $status = 'canceled';
              // $status = 'complet';
              switch($status){
                case 'pending':
                  echo '<span class="label label-warning">Pending</span>';
                  break;
                
                case 'completed':
                  echo '<span class="label label-success">Completed</span>';
                  break;
                
                case 'canceled':
                  echo '<span class="label label-danger">Canceled</span>';
                  break;
              
                default :
                  echo '<span class="label label-block">Unknown</span>';
                  break;
              }
            @endphp
          </td>
          <td>
            <form action="{{URL('orderDetails',[$status => '2'])}}" method="post">
              @csrf
              <button type="submit" class="btn btn-primary">
                Show
            </button>
            </form>
          </td>
        </tr>
        <tr class="gradeU">
          <td></td>
          <td>Product 2</td>
          <td>2000</td>
          <td>
            @php
              // $status = 'pending';
              // $status = 'shipped';
              // $status = 'canceled';
              $status = 'completed';
              // $status = 'complet';
              switch($status){
                case 'pending':
                  echo '<span class="label label-warning">Pending</span>';
                  break;
                
                case 'shipped':
                  echo '<span class="label label-success">Shipped</span>';
                  break;
                
                case 'canceled':
                  echo '<span class="label label-danger">Canceled</span>';
                  break;
              
                case 'completed':
                  echo '<span class="label label-primary">Completed</span>';
                  break;
            
                default :
                  echo '<span class="label label-block">Unknown</span>';
                  break;
              }
            @endphp
          </td>
          <td>
            @php
              $status = 'pending';
              // $status = 'completed';
              // $status = 'canceled';
              // $status = 'complet';
              switch($status){
                case 'pending':
                  echo '<span class="label label-warning">Pending</span>';
                  break;
                
                case 'completed':
                  echo '<span class="label label-success">Completed</span>';
                  break;
                
                case 'canceled':
                  echo '<span class="label label-danger">Canceled</span>';
                  break;
              
                default :
                  echo '<span class="label label-block">Unknown</span>';
                  break;
              }
            @endphp
          </td>
          <td>
            <form action="{{URL('orderDetails',[$status => '2'])}}" method="post">
              @csrf
              <button type="submit" class="btn btn-primary">
                Show
            </button>
            </form>
          </td>
        </tr>
        <tr class="gradeU">
          <td></td>
          <td>Product 2</td>
          <td>2000</td>
          <td>
            @php
              // $status = 'pending';
              // $status = 'shipped';
              // $status = 'canceled';
              // $status = 'completed';
              $status = 'complet';
              switch($status){
                case 'pending':
                  echo '<span class="label label-warning">Pending</span>';
                  break;
                
                case 'shipped':
                  echo '<span class="label label-success">Shipped</span>';
                  break;
                
                case 'canceled':
                  echo '<span class="label label-danger">Canceled</span>';
                  break;
              
                case 'completed':
                  echo '<span class="label label-primary">Completed</span>';
                  break;
            
                default :
                  echo '<span class="label label-block">Unknown</span>';
                  break;
              }
            @endphp
          </td>
          <td>
            @php
              // $status = 'pending';
              $status = 'completed';
              // $status = 'canceled';
              // $status = 'complet';
              switch($status){
                case 'pending':
                  echo '<span class="label label-warning">Pending</span>';
                  break;
                
                case 'completed':
                  echo '<span class="label label-success">Completed</span>';
                  break;
                
                case 'canceled':
                  echo '<span class="label label-danger">Canceled</span>';
                  break;
              
                default :
                  echo '<span class="label label-block">Unknown</span>';
                  break;
              }
            @endphp
          </td>
          <td>
            <form action="{{URL('orderDetails',[$status => '2'])}}" method="post">
              @csrf
              <button type="submit" class="btn btn-primary">
                Show
            </button>
            </form>
          </td>
        </tr>
        <tr class="gradeX">
          <td></td>
          <td>Product 1</td>
          <td>1000</td>
          <td>
            @php
              $status = 'pending';
              // $status = 'shipped';
              // $status = 'canceled';
              // $status = 'completed';
              // $status = 'complet';
              switch($status){
                case 'pending':
                  echo '<span class="label label-warning">Pending</span>';
                  break;
                
                case 'shipped':
                  echo '<span class="label label-success">Shipped</span>';
                  break;
                
                case 'canceled':
                  echo '<span class="label label-danger">Canceled</span>';
                  break;
              
                case 'completed':
                  echo '<span class="label label-primary">Completed</span>';
                  break;
            
                default :
                  echo '<span class="label label-block">Unknown</span>';
                  break;
              }
            @endphp
          </td>
          <td>
            @php
              // $status = 'pending';
              // $status = 'completed';
              // $status = 'canceled';
              $status = 'complet';
              switch($status){
                case 'pending':
                  echo '<span class="label label-warning">Pending</span>';
                  break;
                
                case 'completed':
                  echo '<span class="label label-success">Completed</span>';
                  break;
                
                case 'canceled':
                  echo '<span class="label label-danger">Canceled</span>';
                  break;
              
                default :
                  echo '<span class="label label-block">Unknown</span>';
                  break;
              }
            @endphp
          </td>
          <td>
            <form action="{{URL('orderDetails',[$status => '1'])}}" method="post">
              @csrf
              <button type="submit" class="btn btn-primary">
                Show
            </button>
            </form>
          </td>
        </tr>
        <tr class="gradeU">
          <td></td>
          <td>Product 2</td>
          <td>2000</td>
          <td>
            @php
              // $status = 'pending';
              $status = 'shipped';
              // $status = 'canceled';
              // $status = 'completed';
              // $status = 'complet';
              switch($status){
                case 'pending':
                  echo '<span class="label label-warning">Pending</span>';
                  break;
                
                case 'shipped':
                  echo '<span class="label label-success">Shipped</span>';
                  break;
                
                case 'canceled':
                  echo '<span class="label label-danger">Canceled</span>';
                  break;
              
                case 'completed':
                  echo '<span class="label label-primary">Completed</span>';
                  break;
            
                default :
                  echo '<span class="label label-block">Unknown</span>';
                  break;
              }
            @endphp
          </td>
          <td>
            @php
              // $status = 'pending';
              // $status = 'completed';
              $status = 'canceled';
              // $status = 'complet';
              switch($status){
                case 'pending':
                  echo '<span class="label label-warning">Pending</span>';
                  break;
                
                case 'completed':
                  echo '<span class="label label-success">Completed</span>';
                  break;
                
                case 'canceled':
                  echo '<span class="label label-danger">Canceled</span>';
                  break;
              
                default :
                  echo '<span class="label label-block">Unknown</span>';
                  break;
              }
            @endphp
          </td>
          <td>
            <form action="{{URL('orderDetails',[$status => '2'])}}" method="post">
              @csrf
              <button type="submit" class="btn btn-primary">
                Show
            </button>
            </form>
          </td>
        </tr>
        <tr class="gradeU">
          <td></td>
          <td>Product 2</td>
          <td>2000</td>
          <td>
            @php
              // $status = 'pending';
              // $status = 'shipped';
              $status = 'canceled';
              // $status = 'completed';
              // $status = 'complet';
              switch($status){
                case 'pending':
                  echo '<span class="label label-warning">Pending</span>';
                  break;
                
                case 'shipped':
                  echo '<span class="label label-success">Shipped</span>';
                  break;
                
                case 'canceled':
                  echo '<span class="label label-danger">Canceled</span>';
                  break;
              
                case 'completed':
                  echo '<span class="label label-primary">Completed</span>';
                  break;
            
                default :
                  echo '<span class="label label-block">Unknown</span>';
                  break;
              }
            @endphp
          </td>
          <td>
            @php
              // $status = 'pending';
              $status = 'completed';
              // $status = 'canceled';
              // $status = 'complet';
              switch($status){
                case 'pending':
                  echo '<span class="label label-warning">Pending</span>';
                  break;
                
                case 'completed':
                  echo '<span class="label label-success">Completed</span>';
                  break;
                
                case 'canceled':
                  echo '<span class="label label-danger">Canceled</span>';
                  break;
              
                default :
                  echo '<span class="label label-block">Unknown</span>';
                  break;
              }
            @endphp
          </td>
          <td>
            <form action="{{URL('orderDetails',[$status => '2'])}}" method="post">
              @csrf
              <button type="submit" class="btn btn-primary">
                Show
            </button>
            </form>
          </td>
        </tr>
        <tr class="gradeU">
          <td></td>
          <td>Product 2</td>
          <td>2000</td>
          <td>
            @php
              // $status = 'pending';
              // $status = 'shipped';
              // $status = 'canceled';
              $status = 'completed';
              // $status = 'complet';
              switch($status){
                case 'pending':
                  echo '<span class="label label-warning">Pending</span>';
                  break;
                
                case 'shipped':
                  echo '<span class="label label-success">Shipped</span>';
                  break;
                
                case 'canceled':
                  echo '<span class="label label-danger">Canceled</span>';
                  break;
              
                case 'completed':
                  echo '<span class="label label-primary">Completed</span>';
                  break;
            
                default :
                  echo '<span class="label label-block">Unknown</span>';
                  break;
              }
            @endphp
          </td>
          <td>
            @php
              $status = 'pending';
              // $status = 'completed';
              // $status = 'canceled';
              // $status = 'complet';
              switch($status){
                case 'pending':
                  echo '<span class="label label-warning">Pending</span>';
                  break;
                
                case 'completed':
                  echo '<span class="label label-success">Completed</span>';
                  break;
                
                case 'canceled':
                  echo '<span class="label label-danger">Canceled</span>';
                  break;
              
                default :
                  echo '<span class="label label-block">Unknown</span>';
                  break;
              }
            @endphp
          </td>
          <td>
            <form action="{{URL('orderDetails',[$status => '2'])}}" method="post">
              @csrf
              <button type="submit" class="btn btn-primary">
                Show
            </button>
            </form>
          </td>
        </tr>
        <tr class="gradeU">
          <td></td>
          <td>Product 2</td>
          <td>2000</td>
          <td>
            @php
              // $status = 'pending';
              // $status = 'shipped';
              // $status = 'canceled';
              // $status = 'completed';
              $status = 'complet';
              switch($status){
                case 'pending':
                  echo '<span class="label label-warning">Pending</span>';
                  break;
                
                case 'shipped':
                  echo '<span class="label label-success">Shipped</span>';
                  break;
                
                case 'canceled':
                  echo '<span class="label label-danger">Canceled</span>';
                  break;
              
                case 'completed':
                  echo '<span class="label label-primary">Completed</span>';
                  break;
            
                default :
                  echo '<span class="label label-block">Unknown</span>';
                  break;
              }
            @endphp
          </td>
          <td>
            @php
              // $status = 'pending';
              $status = 'completed';
              // $status = 'canceled';
              // $status = 'complet';
              switch($status){
                case 'pending':
                  echo '<span class="label label-warning">Pending</span>';
                  break;
                
                case 'completed':
                  echo '<span class="label label-success">Completed</span>';
                  break;
                
                case 'canceled':
                  echo '<span class="label label-danger">Canceled</span>';
                  break;
              
                default :
                  echo '<span class="label label-block">Unknown</span>';
                  break;
              }
            @endphp
          </td>
          <td>
            <form action="{{URL('orderDetails',[$status => '2'])}}" method="post">
              @csrf
              <button type="submit" class="btn btn-primary">
                Show
            </button>
            </form>
          </td>
        </tr>
        <tr class="gradeX">
          <td></td>
          <td>Product 1</td>
          <td>1000</td>
          <td>
            @php
              $status = 'pending';
              // $status = 'shipped';
              // $status = 'canceled';
              // $status = 'completed';
              // $status = 'complet';
              switch($status){
                case 'pending':
                  echo '<span class="label label-warning">Pending</span>';
                  break;
                
                case 'shipped':
                  echo '<span class="label label-success">Shipped</span>';
                  break;
                
                case 'canceled':
                  echo '<span class="label label-danger">Canceled</span>';
                  break;
              
                case 'completed':
                  echo '<span class="label label-primary">Completed</span>';
                  break;
            
                default :
                  echo '<span class="label label-block">Unknown</span>';
                  break;
              }
            @endphp
          </td>
          <td>
            @php
              // $status = 'pending';
              // $status = 'completed';
              // $status = 'canceled';
              $status = 'complet';
              switch($status){
                case 'pending':
                  echo '<span class="label label-warning">Pending</span>';
                  break;
                
                case 'completed':
                  echo '<span class="label label-success">Completed</span>';
                  break;
                
                case 'canceled':
                  echo '<span class="label label-danger">Canceled</span>';
                  break;
              
                default :
                  echo '<span class="label label-block">Unknown</span>';
                  break;
              }
            @endphp
          </td>
          <td>
            <form action="{{URL('orderDetails',[$status => '1'])}}" method="post">
              @csrf
              <button type="submit" class="btn btn-primary">
                Show
            </button>
            </form>
          </td>
        </tr>
        <tr class="gradeU">
          <td></td>
          <td>Product 2</td>
          <td>2000</td>
          <td>
            @php
              // $status = 'pending';
              $status = 'shipped';
              // $status = 'canceled';
              // $status = 'completed';
              // $status = 'complet';
              switch($status){
                case 'pending':
                  echo '<span class="label label-warning">Pending</span>';
                  break;
                
                case 'shipped':
                  echo '<span class="label label-success">Shipped</span>';
                  break;
                
                case 'canceled':
                  echo '<span class="label label-danger">Canceled</span>';
                  break;
              
                case 'completed':
                  echo '<span class="label label-primary">Completed</span>';
                  break;
            
                default :
                  echo '<span class="label label-block">Unknown</span>';
                  break;
              }
            @endphp
          </td>
          <td>
            @php
              // $status = 'pending';
              // $status = 'completed';
              $status = 'canceled';
              // $status = 'complet';
              switch($status){
                case 'pending':
                  echo '<span class="label label-warning">Pending</span>';
                  break;
                
                case 'completed':
                  echo '<span class="label label-success">Completed</span>';
                  break;
                
                case 'canceled':
                  echo '<span class="label label-danger">Canceled</span>';
                  break;
              
                default :
                  echo '<span class="label label-block">Unknown</span>';
                  break;
              }
            @endphp
          </td>
          <td>
            <form action="{{URL('orderDetails',[$status => '2'])}}" method="post">
              @csrf
              <button type="submit" class="btn btn-primary">
                Show
            </button>
            </form>
          </td>
        </tr>
        <tr class="gradeU">
          <td></td>
          <td>Product 2</td>
          <td>2000</td>
          <td>
            @php
              // $status = 'pending';
              // $status = 'shipped';
              $status = 'canceled';
              // $status = 'completed';
              // $status = 'complet';
              switch($status){
                case 'pending':
                  echo '<span class="label label-warning">Pending</span>';
                  break;
                
                case 'shipped':
                  echo '<span class="label label-success">Shipped</span>';
                  break;
                
                case 'canceled':
                  echo '<span class="label label-danger">Canceled</span>';
                  break;
              
                case 'completed':
                  echo '<span class="label label-primary">Completed</span>';
                  break;
            
                default :
                  echo '<span class="label label-block">Unknown</span>';
                  break;
              }
            @endphp
          </td>
          <td>
            @php
              // $status = 'pending';
              $status = 'completed';
              // $status = 'canceled';
              // $status = 'complet';
              switch($status){
                case 'pending':
                  echo '<span class="label label-warning">Pending</span>';
                  break;
                
                case 'completed':
                  echo '<span class="label label-success">Completed</span>';
                  break;
                
                case 'canceled':
                  echo '<span class="label label-danger">Canceled</span>';
                  break;
              
                default :
                  echo '<span class="label label-block">Unknown</span>';
                  break;
              }
            @endphp
          </td>
          <td>
            <form action="{{URL('orderDetails',[$status => '2'])}}" method="post">
              @csrf
              <button type="submit" class="btn btn-primary">
                Show
            </button>
            </form>
          </td>
        </tr>
        <tr class="gradeU">
          <td></td>
          <td>Product 2</td>
          <td>2000</td>
          <td>
            @php
              // $status = 'pending';
              // $status = 'shipped';
              // $status = 'canceled';
              $status = 'completed';
              // $status = 'complet';
              switch($status){
                case 'pending':
                  echo '<span class="label label-warning">Pending</span>';
                  break;
                
                case 'shipped':
                  echo '<span class="label label-success">Shipped</span>';
                  break;
                
                case 'canceled':
                  echo '<span class="label label-danger">Canceled</span>';
                  break;
              
                case 'completed':
                  echo '<span class="label label-primary">Completed</span>';
                  break;
            
                default :
                  echo '<span class="label label-block">Unknown</span>';
                  break;
              }
            @endphp
          </td>
          <td>
            @php
              $status = 'pending';
              // $status = 'completed';
              // $status = 'canceled';
              // $status = 'complet';
              switch($status){
                case 'pending':
                  echo '<span class="label label-warning">Pending</span>';
                  break;
                
                case 'completed':
                  echo '<span class="label label-success">Completed</span>';
                  break;
                
                case 'canceled':
                  echo '<span class="label label-danger">Canceled</span>';
                  break;
              
                default :
                  echo '<span class="label label-block">Unknown</span>';
                  break;
              }
            @endphp
          </td>
          <td>
            <form action="{{URL('orderDetails',[$status => '2'])}}" method="post">
              @csrf
              <button type="submit" class="btn btn-primary">
                Show
            </button>
            </form>
          </td>
        </tr>
        <tr class="gradeU">
          <td></td>
          <td>Product 2</td>
          <td>2000</td>
          <td>
            @php
              // $status = 'pending';
              // $status = 'shipped';
              // $status = 'canceled';
              // $status = 'completed';
              $status = 'complet';
              switch($status){
                case 'pending':
                  echo '<span class="label label-warning">Pending</span>';
                  break;
                
                case 'shipped':
                  echo '<span class="label label-success">Shipped</span>';
                  break;
                
                case 'canceled':
                  echo '<span class="label label-danger">Canceled</span>';
                  break;
              
                case 'completed':
                  echo '<span class="label label-primary">Completed</span>';
                  break;
            
                default :
                  echo '<span class="label label-block">Unknown</span>';
                  break;
              }
            @endphp
          </td>
          <td>
            @php
              // $status = 'pending';
              $status = 'completed';
              // $status = 'canceled';
              // $status = 'complet';
              switch($status){
                case 'pending':
                  echo '<span class="label label-warning">Pending</span>';
                  break;
                
                case 'completed':
                  echo '<span class="label label-success">Completed</span>';
                  break;
                
                case 'canceled':
                  echo '<span class="label label-danger">Canceled</span>';
                  break;
              
                default :
                  echo '<span class="label label-block">Unknown</span>';
                  break;
              }
            @endphp
          </td>
          <td>
            <form action="{{URL('orderDetails',[$status => '2'])}}" method="post">
              @csrf
              <button type="submit" class="btn btn-primary">
                Show
            </button>
            </form>
          </td>
        </tr>
      </tbody>
    </table>
    
  </div>
</div>
@endsection

@push('script')
  <script src="{{asset('js/plugins/dataTables/datatables.min.js')}}"></script>
  <script src="{{asset('js/plugins/dataTables/dataTables.bootstrap4.min.js')}}"></script>
  <script>
    $(document).ready(function(){
        var t = $('#ordersTable').DataTable({
            "columnDefs": [ {
                "searchable": false,
                "orderable": false,
                "targets": 0
            } ],
            "order": [[ 1, 'asc' ]],
            pageLength: 10,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                {extend: 'excel', title: 'ExampleFile'},
                {extend: 'pdf', title: 'ExampleFile'},

                {extend: 'print',
                customize: function (win){
                  $(win.document.body).addClass('white-bg');
                  $(win.document.body).css('font-size', '10px');
                  $(win.document.body).find('table')
                  .addClass('compact')
                  .css('font-size', 'inherit');
                }
                }
            ]
        });
        t.on( 'order.dt search.dt', function () {
            t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();
    });

  </script>
@endpush