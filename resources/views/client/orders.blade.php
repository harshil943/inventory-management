@extends('layouts.app')

@section('content')
@include('layouts.nav')
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
            <?php
              $data = 0;
              if($data == 1){
                echo '<i class="fa fa-check" aria-hidden="true"></i>';
              }
              else {
                echo '<i class="fa fa-times" aria-hidden="true"></i>';
              }
            ?>
          </td>
          <td>
            <?php
              $data = 1;
              if($data == 1){
                echo '<i class="fa fa-check" aria-hidden="true"></i>';
              }
              else {
                echo '<i class="fa fa-times" aria-hidden="true"></i>';
              }
            ?>
          </td>
          <td></td>
        </tr>
        <tr class="gradeU">
          <td></td>
          <td>Product 2</td>
          <td>2000</td>
          <td>
            <?php
              $data = 1;
              if($data == 1){
                echo '<i class="fa fa-check" aria-hidden="true"></i>';
              }
              else {
                echo '<i class="fa fa-times" aria-hidden="true"></i>';
              }
            ?>
          </td>
          <td>
            <?php
              $data = 0;
              if($data == 1){
                echo '<i class="fa fa-check" aria-hidden="true"></i>';
              }
              else {
                echo '<i class="fa fa-times" aria-hidden="true"></i>';
              }
            ?>
          </td>
          <td></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
@endsection