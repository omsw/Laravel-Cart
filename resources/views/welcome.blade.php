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
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="container">
              
           <div class="row">    
            <div class="col-md-12">
                <a href="/viewcart" class="pull-right" style="font-size:48px;color:green">
                     <?php
                $cart = Session::get('cart');
                    if($cart){
                        $ttlqty = array_sum(array_column($cart, 'qty'));
                    }else{
                       $ttlqty = 0; 
                    }
                    ?>
                <i class="fa fa-cart-arrow-down"></i> {{$ttlqty}}
                </a>
            </div>
           </div>
           <div class="clearfix"></div>
               @if(Session::get('error'))
                <div class="alert alert-error">{{Session::get('error')}}</div>
                @endif
                 @if(Session::get('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
                 @endif
           

            <div class="row">    
            <div class="col-md-12">
             <?php  $i =1 ; ?>
              @foreach($products as $product)     
              <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                      <img class="card-img-top" src="/storage/images/{{$product->image}}" alt="{{$product->name}}">
                      <div class="card-body">
                        <h5 class="card-title">{{$product->name}}</h5>
                      </div>
                      <div class="card-body">
                        <a href="javascript:void(0);" class="card-link">${{$product->price}}</a>
                        <a href="/addcart/{{$product->id}}" class="btn btn-warning" style="float: right;">Add To Cart</a>
                      </div>
                </div>
                 
               </div> 

                <?php
                if($i%3==0){

                    echo '<div class="clearfix"></div>';

                }
                 $i++;

                ?>
              @endforeach
             </div>
              
            </div>
            </div>
        </div>
    </body>


</html>
