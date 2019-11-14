<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                margin: 30px;
            }

            .clearfix{
                clear: both;
                padding: 30px;
            }

            .col-md-4, .col-md-2 , .col-md-1, .col-md-3, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11 {
                float: left;
            }

           
        </style>
    </head>
    <body>
    <div class="container">
      <div class="row">
          @if(Session::get('error'))
                <div class="alert alert-error">{{Session::get('error')}}</div>
                @endif
                 @if(Session::get('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
                 @endif
                 <div class="clearfix"></div>
        <div class="col-lg-12 bg-white rounded shadow-sm mb-5">

          <!-- Shopping cart table -->
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" class="border-0 bg-light">
                    <div class="p-2 px-3 text-uppercase">Product</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Price</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Quantity</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Remove</div>
                  </th>
                </tr>
              </thead>
              <tbody>
                 <?php 
                 $ttlprice = array_sum(array_column(Session::get('cart'), 'price'));
                 $ttlitem = array_sum(array_column(Session::get('cart'), 'qty'));
                 ?>
                @foreach(Session::get('cart') as $id =>  $cart)
                <tr>
                  <th scope="row" class="border-0">
                    <div class="p-2">
                      <img src="{{$cart['image']}}" alt="{{$cart['name']}}" width="70" class="img-fluid rounded shadow-sm">
                      <div class="ml-3 d-inline-block align-middle">
                        <h5 class="mb-0"> <a href="javascript:void(0);" class="text-dark d-inline-block align-middle">{{$cart['name']}}</a></h5>
                      </div>
                    </div>
                  </th>
                  <td class="border-0 align-middle"><strong>${{$cart['price']}}</strong></td>
                  <td class="border-0 align-middle"><strong>{{$cart['qty']}}</strong></td>
                  <td class="border-0 align-middle">
                      <a href="{{url('removeCart')}}/{{$id}}" class="text-dark">
                      <i class="fa fa-trash"></i>
                      </a>
                </td>
                </tr>
               @endforeach

                <tr>
                  <td></td>
                   <td>$<?php echo $ttlprice; ?></td>
                    <td><?php echo $ttlitem; ?></td>
                    <td class="align-middle">
                    <a href="#" class="btn btn-dark rounded-pill py-2 btn-block">Checkout</a>
                  </td>
                </tr>


              </tbody>
            </table>
          </div>
          <!-- End -->
        </div>
      </div>
    </div>

      

    </body>


</html>
