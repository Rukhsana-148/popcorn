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
                  <li class="px-4  mt-5 fonto-mono flex text-[15px]">
                  <a href="http://127.0.0.1:8000">Home</a>
                  </li>
                    
                  
                     
                      <li class="px-4  mt-5 fonto-mono flex text-[15px]"><a href="{{ url('/hall') }}" class="">Hall</a> </li>
                  
        
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
        <div class="flex ">
            <div class="basis-1/2 bg-gray-800 pl-5 pr-2 pb-10">
            
                <form method="post" action="{{url('/movieReview')}}" class="mt-[100px] md:mt-[120px]">
                    @csrf
                    <p class="text-2xl font-mono text-center px-3 py-7 text-white">Movie Review</p>
                    <input type="hidden" name="user_id"  min="1" max="5" required style="border-radius: 10px"  class="rouded-md
                    ml-[60px] mt-3 px-3 py-4   w-[400px]" value="{{$user_id}}">
                    <br/>
                    <label for="movie"  class="text-xl font-mono text-gray-100">Select Movie</label>
                    <select name="movie_id" id="visit" style="background: white; width:390px; height:40px; padding: 0px 30px; border-radius:10px;" class="font-mono ml-[70px]" >
                      <option option value="" selected disabled hidden class="text-gray-100  " style="height: 70px">--Select Movie--</option>
                      @foreach($movies as $hall)
                          <option value="{{ $hall->id }}" class="bg-gray-500 text-white" >{{$hall->name}}</option>
                      @endforeach
                  </select>
                <br/>
                    
                    <label for="comment"  class="text-xl font-mono text-gray-100">Your Review:</label>
                    <textarea name="comment" id="comment" rows="4"  class="rouded-md
                    ml-[70px] mt-3 px-3 py-4   w-[400px]" required style="border-radius: 10px"></textarea>
                    <br/>
                    <label for="rating"  class="text-xl font-mono text-gray-100">Rating (1-5):</label>
                    <input type="number" name="rating" id="rating" min="1" max="5" required style="border-radius: 10px"  class="rouded-md
                    ml-[60px] mt-3 px-3 py-4   w-[400px]">
                    <br/>
                    <input type="submit" name="submit" value="Submit" class="ml-[200px] text-[20px] mt-3 px-3 py-2 border-none rounded-2xl text-white bg-orange-400  w-[400px]" 
                    style="background-color : orangered;"/>
                </form>
            </div>
            <div class="basis-1/2 pl-3 pr-5 bg-slate-400 pb-10">
            
              <form method="post" action="{{url('/hallReview')}}" class="mt-[100px] md:mt-[120px]">
                  @csrf
                  <p class="text-2xl font-mono text-center px-3 py-7"> Hall Review</p>
                  <input type="hidden" name="user_id"  min="1" max="5" required style="border-radius: 10px"  class="rouded-md
                  ml-[60px] mt-3 px-3 py-4   w-[400px]" value="{{$user_id}}">
                  <br/>
                  <label for="movie"  class="text-xl font-mono text-gray-950">Select Hall</label>
                  <select name="hall_id" id="visit" style="background: white; width:390px; height:40px; padding: 0px 30px; border-radius:10px;" class="font-mono ml-[70px]" >
                    <option option value="" selected disabled hidden class="text-gray-700  ">--Select Halls--</option>
                    @foreach($halls as $hall)
                        <option value="{{ $hall->id }}" class="bg-gray-500 text-white" >{{ $hall->location }}-{{$hall->name}}</option>
                    @endforeach
                </select>
              <br/>
                  
                  <label for="comment"  class="text-xl font-mono text-gray-950">Your Review:</label>
                  <textarea name="comment" id="comment" rows="4"  class="rouded-md
                  ml-[70px] mt-3 px-3 py-4   w-[400px]" required style="border-radius: 10px"></textarea>
                  <br/>
                  <label for="rating"  class="text-xl font-mono text-gray-950">Rating (1-5):</label>
                  <input type="number" name="rating" id="rating" min="1" max="5" required style="border-radius: 10px"  class="rouded-md
                  ml-[60px] mt-3 px-3 py-4   w-[400px]">
                  <br/>
                  <input type="submit" name="submit" value="Submit" class="ml-[200px] text-[20px] mt-3 px-3 py-2 border-none rounded-2xl text-white bg-orange-400  w-[400px]" 
                  style="background-color : orangered;"/>
              </form>
          </div>
        </div>

  
        </body>
</html>
