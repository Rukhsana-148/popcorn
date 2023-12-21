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
  href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"
/>
   
    <style>
        .swiper {
      width: 100%;
      height: 100%;
    }

    .swiper-slide {
      
      font-size: 18px;
      background: #fff;
      display: flex;
     
    }

  .first .swiper-slide img {
      display: block;
      width: 450px;
      height: 360px;
      margin-left: 50px;
      border-radius: 20px;
      margin-top: 80px;
      object-fit: cover;
    }

    @media only screen and (max-width: 769px) {
      .first .swiper-slide img {
        display: none;
      }
      .swiper{
        background-color: black;
      }
      .second .swiper-slide{
        background-color: black;
      }
     
      .swiper-slide{
       height : 600px;
      }
    }
        .btn {
            border-bottom-right-radius: 10px;
            border-bottom-left-radius: 10px;
            cursor: pointer;
        }
        /*second */
       
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
    /*third section*/
.third{
  padding : 30px 0px;
}
    .my__Swiper  .swiper {
      width: 100%;
      height: 100%;
    }

    .my__Swiper .swiper-slide {
      text-align: center;
      font-size: 18px;
      margin-right: 10px;
      background: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .my__Swiper .swiper-slide img {
     text-align: center;
      width: 500px;
      height: 250px;
      
    }
    
    @media only screen and (min-width: 769px) {
        .third  .swiper-slide:first-child {
        transition: transform 100ms;
      }

      .third  .swiper-slide:first-child img {
        transition: box-shadow 500ms;
      }

      .third .swiper-slide.swiper-slide-active:first-child {
        transform: translateX(2%);
        z-index: 2;
      }
      
      .swiper-slide.swiper-slide-next:nth-child(2) {
        transform: translateX(2%);
        z-index: 1;
      }
      .third  .swiper-slide.swiper-slide-active:first-child img {
        box-shadow: 0px 32px 80px rgba(0, 0, 0, 0.35);
      }

      .third .swiper-slide:nth-child(2) {
        transition: transform 100ms;
      }

     

      .third .swiper[dir="rtl"] .swiper-slide.swiper-slide-active:first-child {
        transform: translateX(-50%);
      }

      .swiper[dir="rtl"] .swiper-slide.swiper-slide-next:nth-child(2) {
        transform: translateX(65%);
      }
    }
         ::-webkit-scrollbar {
            width: 10px;
            height: 10px;
        }
        /* Track */
        
         ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px grey;
            border-radius: 10px;
        }
        
        html {
            scroll-behavior: smooth;
        }
        /* Handle */
        
         ::-webkit-scrollbar-thumb {
            background: rgb(207, 96, 56);
            border-radius: 20px;
        }
        /* Handle on hover */
        
         ::-webkit-scrollbar-thumb:hover {
            background: orangered;
        }
        
        #scrollToTop {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 30px;
            z-index: 99;
            font-size: 18px;
            border: none;
            outline: none;
            background-color: orangered;
            color: white;
            cursor: pointer;
            padding: 15px;
            border-radius: 50%;
        }
    </style>
</head>

<body>
  <div class="bg-black grid  grid-cols-5 py-2 text-white fixed z-10 w-full ">
    <div class="">
      <img src="/icon.png" width="270px"/>
    </div>
    <div class=""></div>
    <div class="grid-cols-3">
        <ul class="flex">
          
            <li class="px-4  mt-10 text-[17px] flex">  
              <form action="{{url('/selectHall')}}" method="GET" style="margin-top: -30px;" class="flex text-white px-2  rounded-md">
                  
                <select name="hall" id="hall" style="background: transparent; width:190px" class="font-mono" >
                    <option option value="" selected disabled hidden class="text-gray-700  ">--Select Halls--</option>
                    @foreach($halls as $hall)
                        <option value="{{ $hall->id }}" class="bg-gray-500 text-white" >{{ $hall->location }}-{{$hall->name}}</option>
                    @endforeach
                </select>
                
            </form>
              </li>
            
              <li class="pl-2 w-[200px]  mt-3 fonto-mono flex text-[17px] "><a href="{{ url('/hall') }}" class="w-[70px]">All Halls</a> </li>
                
                
          

            @if (Route::has('login'))
            
            @auth
                    @include('dashboard')
                @else
               <li class="px-4 text-white   text-[15px]  mt-3 font-mono "> <a href="{{ route('login') }}" class="pr-5 pt-10 text-white font-mono text-[17px] ml-5 hover:text-orange-600">Login</a><li>
                 @if (Route::has('register'))
               <li class="px-4 text-white   text-[17px]  mt-3 font-mono "> <a href="{{ route('register') }}" class="pr-5  text-white font-mono text-[17px] ml-5 hover:text-orange-600 pt-10">Register</a></li>
              @endif
        @endauth
        @endif
        </ul>
    </div>
    

</div>


    <div class="swiper mySwiper pt-10 first">
      <div class="swiper-wrapper" id="poster">
        @foreach($movies as $movie)
        <div class="swiper-slide pb-40px" style="background: linear-gradient(to left, rgba(0, 0, 0, 0.85), rgba(0, 0, 0,0.75)), url('uploadimage/{{$movie->poster}}'); background-repeate:no-repeate;background-size : cover ; width:1500px; height : 550px;">
        <div class="flex">
<div class=""> <img src="uploadimage\{{$movie->poster}}"/></div>
<div class="mt-[70px] ml-[10px] md:ml-[50px]">
<p class="text-orange-500 text-3xl font-mono font-semibold ">{{$movie->name}}</p>
<p class="text-white font-mono text-[18px]  mb-3"><span class="font-semibold text-[20px]">Cast : </span>{{$movie->cast}}</p>
<p class="text-white font-mono text-[18px]  mb-3"><span class="font-semibold text-[20px]">Singer : </span>{{$movie->singer}}</p>
<p class="text-white font-mono text-[18px]  mb-3 "><span class="font-semibold text-[20px]">Director : </span>{{$movie->director}}</p>
<p class="text-white font-mono text-[15px] md:text-[18px] mb-3 md:w-[450px] w-[400px] "><span class="font-semibold text-[20px]">Description </span>{{$movie->description}}</p>

<p class="text-white font-mono text-[18px]  mb-3"><span class="font-semibold text-[20px]">Price : </span>{{$movie->price}} <span>Show Time :{{$movie->show_time}}</p>
  <p class="text-white font-mono text-[18px]  mb-3"><span class="font-semibold text-[20px]">Hall Name: </span>@if($movie->hall)
    {{$movie->hall->name}}
  @else
    No Hall Assigned
  @endif</p>
 
</div>
        </div>
        </div>
        @endforeach
      </div>
      <div class="swiper-button-next" class="text-black"></div>
      <div class="swiper-button-prev" class="text-black"></div>
      <div class="swiper-pagination"></div>
    </div>
    <div class="second bg-black">
       <!--Movie List-->
       <div class="swiper my_Swiper  pb-10 ">
        <p class="text-2xl font-mono text-white px-3 py-7"> Movie List</p>
        <div class="swiper-wrapper" id="list">
         @foreach($all_movies as $movie)
          <div class="swiper-slide" id="list">
            <img src="uploadimage\{{$movie->poster}}" />
            <div class=" items-center  card h-[200px] -mt-[200px]">
             
              <p class="text-xl text-white -mt-26">Price:{{$movie->price}}.</p>
              <p class="text-xl text-white -mt-26">@if($movie->hall)
                {{$movie->hall->name}}
              @else
                No Hall Assigned
              @endif.</p>
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
    <div class="swiper my_Swiper  pb-10 ">
      <p class="text-2xl font-mono text-white px-3 py-7">Upcoming Movie Trailer</p>
      <div class="swiper-wrapper items-center" id="trailer">
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
  <div class="third bg-gray-600">
    <p class="py-10 text-white px-5 font-mono font-semibold text-4xl">Our Offers</p>
    <div class="swiper my__Swiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <img src="/offers_1.jpeg"/>
        </div>
        <div class="swiper-slide">
          <img src="/offers_2.jpeg"/>
        </div>
        <div class="swiper-slide">
          <img src="/offers_3.jpeg"/>
        </div>
        <div class="swiper-slide">
         <div class="group items-center  h-[250px] w-[500px] bg-orange-500">
          <p class="text-center text-black font-semibold pt-6">Group Discount</p>
          <p class="text-gray-500 pt-7 font-mono">If you book more than 19 tickets, you will get 30% discounts.</p>
         </div>
        </div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>
  @include('footer')

   


   
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script type="text/javascript">
        var swiper = new Swiper(".mySwiper", {
      cssMode: true,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      pagination: {
        el: ".swiper-pagination",
      },
      mousewheel: true,
      keyboard: true,
    });

//second swiper
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

//third swiper
var swiper = new Swiper(".my__Swiper", {
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
      
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });


        const popup = document.getElementById("mypopup");
        

        function mypop() {
            if (popup.style.display == 'none') {
                popup.style.display = 'block';
                popup.style.marginLeft = "-40px";

            } else {
                popup.style.display = 'none';
            }

        }
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("scrollToTop").style.display = "block";
            } else {
                document.getElementById("scrollToTop").style.display = "none";
            }
        }

        /* Scroll to the top when the button is clicked */
        function scrollToTop() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE, and Opera
        }






    </script>
</body>

</html>