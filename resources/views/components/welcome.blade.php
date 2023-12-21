<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popcorn</title>
    <link rel="icon" type="images/png" href="icon.png" />
    <link href="main.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
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
      text-align: center;
      font-size: 18px;
      background: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .swiper-slide img {
      display: block;
      width: 100%;
      height: 560px;
      object-fit: cover;
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
  <div class="bg-black flex py-5 text-white fixed z-10 w-full">
    <div class="basis-1/2">
        <p class="text-4xl font-mono text-white px-5">POPCORN</p>
    </div>
    <div class="basis-1/2">
        <ul class="flex">
            <li>   <a href="" class="pr-5 text-white font-mono text-[23px] ml-5 hover:text-orange-600 pt-10">About</a></li>
            <li>   <a href="" class="pr-5 text-white font-mono text-[23px] ml-5 hover:text-orange-600 pt-10">City</a></li>
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


    <div class="swiper mySwiper pt-10">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <img src="/carousel_1.jpeg"/>
        </div>
        <div class="swiper-slide">
          <img src="/carousel_2.jpeg"/>
        </div>
        <div class="swiper-slide">
          <img src="/carousel_3.jpeg"/>
        </div>
        <div class="swiper-slide">
          <img src="/carousel_1.jpeg"/>
        </div>
        <div class="swiper-slide">
          <img src="/carousel_2.jpeg"/>
        </div>
       
      </div>
      <div class="swiper-button-next" class="text-black"></div>
      <div class="swiper-button-prev" class="text-black"></div>
      <div class="swiper-pagination"></div>
    </div>
    <div class="second bg-black">
       <!--Movie List-->
       <div class="swiper my_Swiper  pb-10 ">
        <p class="text-2xl font-mono text-white px-3 py-7">All Movie List</p>
        <div class="swiper-wrapper">
         
          <div class="swiper-slide">
            <img src="/carousel_3.jpeg" />
            <div class=" items-center  card h-[200px] -mt-[200px]">
              <p class="font-semibold text-white pt-16">Hall:MoniHar<p>
              <p class="text-xl text-white -mt-26">Price:250Tk.</p>
            </div>
          </div>
          <div class="swiper-slide">
            <img src="/slide_2.jpeg" />
            <div class=" items-center  card h-[200px] -mt-[200px]">
              <p class="font-semibold text-white pt-16">Hall:MoniHar<p>
              <p class="text-xl text-white -mt-26">Price:250Tk.</p>
            </div>
          </div>
          <div class="swiper-slide">
            <img src="/carousel_3.jpeg" />
            <div class=" items-center  card h-[200px] -mt-[200px]">
              <p class="font-semibold text-white pt-16">Hall:MoniHar<p>
              <p class="text-xl text-white -mt-26">Price:250Tk.</p>
            </div>
          </div>
          <div class="swiper-slide">
            <img src="/slide_1.jpeg" />
            <div class=" items-center  card h-[200px] -mt-[200px]">
              <p class="font-semibold text-white pt-16">Hall:MoniHar<p>
              <p class="text-xl text-white -mt-26">Price:250Tk.</p>
            </div>
          </div>
          <div class="swiper-slide">
            <img src="/carousel_3.jpeg" />
            <div class=" items-center  card h-[200px] -mt-[200px]">
              <p class="font-semibold text-white pt-16">Hall:MoniHar<p>
              <p class="text-xl text-white -mt-26">Price:250Tk.</p>
            </div>
          </div>
          <div class="swiper-slide">
            <img src="/slide_2.jpeg" />
            <div class=" items-center  card h-[200px] -mt-[200px]">
              <p class="font-semibold text-white pt-16">Hall:MoniHar<p>
              <p class="text-xl text-white -mt-26">Price:250Tk.</p>
            </div>
          </div>
          <div class="swiper-slide">
            <img src="/carousel_3.jpeg" />
            <div class=" items-center  card h-[200px] -mt-[200px]">
              <p class="font-semibold text-white pt-16">Hall:MoniHar<p>
              <p class="text-xl text-white -mt-26">Price:250Tk.</p>
            </div>
          </div>
          <div class="swiper-slide">
           <img src="/slide_1.jpeg" />
           <div class=" items-center  card h-[200px] -mt-[200px]">
            <p class="font-semibold text-white pt-16">Hall:MoniHar<p>
            <p class="text-xl text-white -mt-26">Price:250Tk.</p>
          </div>
          </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-scrollbar"></div>
        <div class="swiper-pagination"></div>
      </div>
      <!--Movie Trailer-->
    <div class="swiper my_Swiper  pb-10 ">
      <p class="text-2xl font-mono text-white px-3 py-7">Upcoming Movie Trailer</p>
      <div class="swiper-wrapper items-center">
      
        <div class="swiper-slide">
          <iframe width="350" height="255" src="https://www.youtube.com/embed/QFf91hnpClI?si=ykLkM7jKGxKvWQcj" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
          allowfullscreen></iframe>
        </div>
        <div class="swiper-slide">
          <iframe width="350" height="285" src="https://www.youtube.com/embed/Gy_5ZRXU1L0?si=aQn3tRH7nTNnyan8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
          allowfullscreen></iframe>
        </div>
        <div class="swiper-slide">
          <iframe width="350" height="285" src="https://www.youtube.com/embed/QFf91hnpClI?si=ykLkM7jKGxKvWQcj" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
          allowfullscreen></iframe>
        </div>
        <div class="swiper-slide">
          <iframe width="350" height="285" src="https://www.youtube.com/embed/Gy_5ZRXU1L0?si=aQn3tRH7nTNnyan8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
          allowfullscreen></iframe>
        </div>
        <div class="swiper-slide">
          <iframe width="350" height="285" src="https://www.youtube.com/embed/QFf91hnpClI?si=ykLkM7jKGxKvWQcj" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
          allowfullscreen></iframe>
        </div>
        <div class="swiper-slide">
          <iframe width="350" height="285" src="https://www.youtube.com/embed/Gy_5ZRXU1L0?si=aQn3tRH7nTNnyan8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
          allowfullscreen></iframe>
        </div>
        <div class="swiper-slide">
          <iframe width="350" height="285" src="https://www.youtube.com/embed/Gy_5ZRXU1L0?si=aQn3tRH7nTNnyan8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
          allowfullscreen></iframe>
        </div>
        <div class="swiper-slide">
          <iframe width="350" height="285" src="https://www.youtube.com/embed/Dydmpfo68DA?si=47bSV-ZSiZgoW1tT" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
          allowfullscreen></iframe>
        </div>
        <div class="swiper-slide">
          <iframe width="350" height="285" src="https://www.youtube.com/embed/QFf91hnpClI?si=ykLkM7jKGxKvWQcj" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
          allowfullscreen></iframe>
        </div>
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
  <div class="grid gird-cols-4 py-6">
       <div class="grid-cols-3">
        
       </div>
       <div class="">
        <ul>
          <li>017.......</li>
          <li>017.......</li>
          <li>017.......</li>
          <li>017.......</li>

        </ul>
       </div>
  </div>

    <button onclick="scrollToTop()" id="scrollToTop" title="Go to top">/\</button>


    
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
        popup.style.display = 'none';

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