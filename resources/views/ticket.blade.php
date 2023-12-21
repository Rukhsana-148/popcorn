<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popcorn</title>
    <link rel="icon" type="images/png" href="icon.png" />
    <link href="main.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="movie.js" type="text/javascript"></script>
    <link
rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <style>
        </style>
        </head>
        <body>
          <!-- resources/views/products/show.blade.php -->
          <div class="bg-black flex py-2 text-white fixed z-10 w-full">
            <div class="basis-1/2">
              <img src="/icon.png" width="270px"/>
            </div>
            <div class="basis-1/2">
                <ul class="flex">
                  <li class="px-4 text-white   text-[17px] flex mt-5 font-mono"> 
                    <a href="http://127.0.0.1:8000">Home</a>
                    </li>
                    
                      <li class="px-4  mt-5 fonto-mono flex text-[15px]"><a href="{{ url('/review') }}" class="">Review</a> </li>
                     
                      <li class="px-4  mt-5 fonto-mono flex text-[15px]"><a href="{{ url('/hall') }}" class="">All Halls</a> </li>
                  
        
                    @if (Route::has('login'))
                    
                    @auth
                            @include('dashboard')
                        @else
                       <li> <a href="{{ route('login') }}" class="pr-5 text-white font-mono text-[23px] ml-5 hover:text-orange-600 pt-10">Log in</a><li>
                         @if (Route::has('register'))
                       <li> <a href="{{ route('register') }}" class="pr-5 text-white font-mono text-[23px] ml-5 hover:text-orange-600 pt-10">Register</a></li>
                      @endif
                @endauth
                @endif
                </ul>
            </div>
            
        
        </div>
        <div class="pt-[100px]">
         <p class="text-center text-white text-3xl font-mono" id="name">{{$movie->name}}</p>
         <br/>
          <img src="/uploadimage/{{$movie->poster}}"
          style="margin-left: 43%"
           alt="{{$movie->name}}" width="200px" height="200px"/>
           <p id="price" class="text-center text-white text-xl font-mono">Per Ticket: {{$movie->price}} TK.</p>
           <form method="post"  style="margin-left: 35%; " action="{{url('/payment')}}"  >
            @csrf
            <input type="hidden" name="user_id" value="{{$user_id}}" readonly style="border-radius: 10px"  class="rouded-md
            ml-[60px] mt-3 px-3 py-4   w-[400px]"/>
            <input type="hidden" name="movie_id" value="{{$movie->id}}" readonly style="border-radius: 10px"  class="rouded-md
            ml-[60px] mt-3 px-3 py-4   w-[400px]"/>
            <br/>
            <input type="hidden" name="movie_price" id="movie_price" value="{{$movie->price}}" readonly style="border-radius: 10px"  class="rouded-md
            ml-[60px] mt-3 px-3 py-4   w-[400px]"/>
            <br/>
            <label for="rating"  class="text-xl font-mono text-gray-100">Total Tickets :</label>
           
            <input type="number" onchange="getPrice();" name="total_ticket" id="total_ticket" min="1" max="{{$total}}" required style="border-radius: 10px"  class="rouded-md
            ml-[60px] mt-3 px-3 py-3   w-[400px] bg-orange-700 text-white"><br/>
            <label for="rating"  class="text-xl font-mono text-gray-100">Total Price :</label>
            <input type="number" name="amount" id="totalPrice" readonly required style="border-radius: 10px"  class="rouded-md
            ml-[80px] mt-3 px-3 py-3 bg-orange-700 text-white   w-[400px]">
           <br/>
           <div class="ml-[250px] mt-2">
           
           </div>
            
            <br/>
            <input type="submit" name="submit" value="Submit" class="ml-[220px] text-[20px] mt-1 px-3 py-2 border-none rounded-2xl text-white bg-orange-700  w-[400px]"       />
        </form>
        <form action="{{url('/success')}}" method="POST" >
          <script
            src="https://checkout.stripe.com/checkout.js"
            id="stripeCheckout"
            class="stripe-button"
            data-key="pk_test_51OHRQKGW5vYE8cCms3MQJs2I5VpMjLX6GMWgp7ycU3Kh1URGws8aJRawi3CqHtIWFW0vUePJIF81Wwef2uH2AU2R00GWOaL5jy"
            data-name=""
            data-description=""
            data-amount={}
            data-currency="bd">
          </script>
        </form>
        </div>
        <script>
            function getPrice() {
    var quantity = document.getElementById('total_ticket').value;
    var moviePrice = document.getElementById('movie_price').value;

     // Replace this with the actual price for a movie
    var totalPrice = quantity * moviePrice;
      
       
    // Update the total price field
    document.getElementById('totalPrice').value = totalPrice;

            

    var readOnlyInputValue = document.getElementById('totalPrice').value;

    var name = document.getElementById('name').textContent;
        // Set the data-amount attribute dynamically
        var stripeCheckoutElement = document.getElementById('stripeCheckout');
        console.log(stripeCheckoutElement);

if (stripeCheckoutElement) {
    stripeCheckoutElement.setAttribute('data-amount', readOnlyInputValue);
    stripeCheckoutElement.setAttribute('data-name', name);
    console.log(stripeCheckoutElement);
}else{
  console.log(stripeCheckoutElement);
}
      
            }
        </script>
        </body>
</html>