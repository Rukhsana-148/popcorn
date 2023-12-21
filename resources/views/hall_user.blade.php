<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popcorn</title>
    <link rel="icon" type="images/png" href="icon.png" />
    <link href="main.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
   
    <link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="hall.js" type="text/javascript"></script>
        <style>
  .second  .swiper-slide {
    display: flex;
  margin-right: 20px;
    flex-direction: column;
    align-items: center;
    justify-content: center;
  
  }

  .second .swiper-slide img {
    width:350;
    height : 200px;
  }
  .card{
    opacity: 0;
    background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.6));
    width:350px;
    
  }
  .second .swiper-slide:hover .card{
 opacity: 1;
  }

  @media only screen and (min-width: 769px) {
      .second  .swiper-slide:first-child {
      transition: transform 100ms;
    }

    .second  .swiper-slide:first-child img {
      transition: box-shadow 500ms;
    }

    .second .swiper-slide.swiper-slide-active:first-child {
      transform: translateX(10%);
      z-index: 2;
    }
    
    .swiper-slide.swiper-slide-next:nth-child(2) {
      transform: translateX(5%);
      z-index: 1;
    }
    .second  .swiper-slide.swiper-slide-active:first-child img {
      box-shadow: 0px 32px 80px rgba(0, 0, 0, 0.35);
    }

    .second .swiper-slide:nth-child(2) {
      transition: transform 100ms;
    }

   

    .second .swiper[dir="rtl"] .swiper-slide.swiper-slide-active:first-child {
      transform: translateX(-50%);
    }

    .swiper[dir="rtl"] .swiper-slide.swiper-slide-next:nth-child(2) {
      transform: translateX(65%);
    }
  }
</style>
</head>
<body>
    <!--navbar-->
<div class="bg-black flex py-2 text-white fixed z-10 w-full">
    <div class="basis-1/2">
        <a href="http://127.0.0.1:8000/index.php">
            <img src="/icon.png"   width="270px" /></a>
    </div>
    <div class="basis-1/2">
        <ul class="flex">
          
            <li class="px-4 text-white   text-[17px] flex mt-5 font-mono">  
            <a href="#movie">Movie</a>
              </li>
              <li class="px-4 text-white   text-[17px] flex mt-5 font-mono">  
                <a href="#trailer">Trailer</a> 
                 </li>

            <li class="px-4 text-white   text-[17px] flex mt-5 font-mono ">  
              <form action="{{url('/visitHall')}}" method="GET" style="margin-top: -5px;" class="flex text-white px-2 rounded-sm">
                  
                <select name="hall" id="visit" style="background: transparent; width:150px" class="font-mono" >
                  <option option value="" selected disabled hidden class="text-gray-700  ">--Select Halls--</option>
                  @foreach($halls as $hall)
                      <option value="{{ $hall->id }}" class="bg-gray-500 text-white" >{{ $hall->location }}-{{$hall->name}}</option>
                  @endforeach
              </select>
             
             
            </form>
              </li>
          

            @if (Route::has('login'))
            
            @auth
                    @include('dashboard')
                @else
               <li  class="mt-5"> <a href="{{ route('login') }}"  class="pr-5 text-white font-mono text-[17px]    hover:text-orange-600 ">Log in</a><li>
                 @if (Route::has('register'))
               <li class="mt-5"> <a href="{{ route('register') }}" class="pr-5 text-white font-mono text-[17px]  hover:text-orange-600 ">Register</a></li>
              @endif
        @endauth
        @endif
        </ul>
    </div>
    

</div>
<div class="pt-[100px]  bg-orange-900 " id="hall_info">
   @foreach($hall_fixed as $hall)
          <p class="text-center text-5xl text-white pt-5 font-mono">{{$hall->name}}</p>
          <p class="text-center text-[20px]  text-gray-300  font-mono">{{$hall->location}}</p>
          <p class="text-center text-[20px]  text-gray-300  font-mono">{{$hall->review}}</p>

 @endforeach
</div>
 <div id="manager" class="bg-orange-900">
  @foreach($managers as $manager)
  <p class="text-center text-[20px]  text-gray-300  font-mono">{{$manager->email}}</p>
  <p class="text-center text-[20px]  text-gray-300  font-mono">{{$manager->phone}}</p>
@endforeach
 </div>
  

<div class="second bg-orange-900">
    <!--Movie List-->
    <div class="swiper my_Swiper  pb-10 " id="movie">
     <p class="text-2xl font-mono text-white px-3 py-7">All Movie List</p>
     <div class="swiper-wrapper flex" id="movies">
      @foreach($movies as $movie)
       <div class="swiper-slide">
         <img src="\uploadimage\{{$movie->poster}}" />
         <div class=" items-center  card h-[200px] -mt-[200px]">
          
           <p class="text-xl text-white -mt-26">Price:{{$movie->price}}.</p>
         </div>
       </div>
       @endforeach
      
     </div>
     <div class="swiper-button-next"></div>
     <div class="swiper-button-prev"></div>
     <div class="swiper-scrollbar"></div>
     <div class="swiper-pagination"></div>
   </div>
   <!--Movie Trailer-->
 <div class="swiper my_Swiper  pb-10 " id="trailer">
   <p class="text-2xl font-mono text-white px-3 py-7">Upcoming Movie Trailer</p>
   <div class="swiper-wrapper items-center">
   @foreach($trailers as $trailer)
     <div class="swiper-slide">
       {!!$trailer->link!!}
     </div>
     @endforeach
     
   </div>
   <div class="swiper-button-next"></div>
   <div class="swiper-button-prev"></div>
   <div class="swiper-scrollbar"></div>
   <div class="swiper-pagination"></div>
 </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script type="text/javascript">
var swiper = new Swiper(".my_Swiper", {
      slidesPerView: 1,
      centeredSlides: false,
      slidesPerGroupSkip: 1,
      grabCursor: true,
      keyboard: {
        enabled: true,
      },
      breakpoints: {
        769: {
          slidesPerView: 4,
          slidesPerGroup: 2,
        },
      },
      scrollbar: {
        el: ".swiper-scrollbar",
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
</script>
</body>
</html>