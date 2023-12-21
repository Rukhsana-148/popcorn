
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popcorn</title>
    <link rel="icon" type="images/png" href="icon.png" />
    <link href="main.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <style>
        .carousel-container {
            width: 100%;
            overflow: hidden;
            position: relative;
        }
        
        .carousel-slide {
            display: none;
            text-align: center;
        }
        
        .carousel-slide img {
            max-width: 100%;
            height: auto;
        }
       

        .btn {
            border-bottom-right-radius: 10px;
            border-bottom-left-radius: 10px;
            cursor: pointer;
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
    <div class="top grid grid-cols-4 bg-orange-900">
        <div class="flex">
            <a href="http://127.0.0.1:8000"><img data-aos="fade-right" data-aos-duration="1500" src="/icon.png" alt="Popcorn" width="270px"  class="mx-5 my-3" />
            </a>
           
        </div>
        <div class="col-span-2"></div>
        <div class="">
            <div class="mt-10">
                <x-app-layout></x-app-layout> 
            </div>
        </div>
       
    </div>
    <div class="grid grid-cols-6">
        <div class="bg-black py-[40px] px-[14px] h-[82vh] overflow-hidden">
            <p class="text-2xl font-mono font-semibold text-white mb-[20px]">Hall Manager</p>
            <ul>
                <li class="my-7" onclick="addHall()"> <a href="#" class="text-lg rounded-md font-mono font-medium text-white px-2  py-1 cursor-pointer hover:bg-orange-500 hover:text-white"> Add Hall </a><br/></li>
                <li class="my-7" onclick="addMovie()"> <a href="#" class="text-lg rounded-md font-mono font-medium text-white px-2  py-1 cursor-pointer hover:bg-orange-500 hover:text-white"> Add Movie </a><br/></li>
                <li class="my-7" onclick="addTrailer()"> <a href="#" class="text-lg rounded-md font-mono font-medium text-white px-2  py-1 cursor-pointer hover:bg-orange-500 hover:text-white">  Add Movie Trailer </a><br/></li>
                <li class="my-7" onclick="showMovie()"> <a href="#" class="text-lg rounded-md font-mono font-medium text-white  px-2 py-1 cursor-pointer hover:bg-orange-500 hover:text-white">  Movie List </a><br/></li>
               <!-- <li class="my-7" onclick="hallUpdate()"> <a href="#" class="text-lg rounded-md font-mono font-medium text-white  cursor-pointer hover:bg-orange-500 hover:text-white"></a><br/></li>!-->
                <li class="my-7" onclick="genTicket()"> <a href="#" class="text-lg rounded-md font-mono font-medium text-white px-2  py-1 cursor-pointer hover:bg-orange-500 hover:text-white">Generate Ticket </a><br/></li>
                <li class="my-7" onclick="ticketBooking()"> <a href="#" class="text-lg rounded-md font-mono font-medium text-white px-2  py-1 cursor-pointer hover:bg-orange-500 hover:text-white">Ticket Sell </a><br/></li>
            </ul>



        </div>
        <div class="col-span-5">
           
            <div class="bg-gray-400 h-[83vh] overflow-y-scroll  custom-scrollbar pb-[50px]" id="add_hall">
                <p class="text-center text-2xl font-mono font-semibold pt-16 pb-[20px] ">Add Hall</p>

                <div class="flex justify-center items-center">
                <form action="{{url('/addHall')}}" method="post" enctype="multipart/form-data" data-aos="fade-up" data-aos-duration="2000">
                    @csrf
                   
                
                    <label for="name" class="text-xl font-mono text-gray-950">Hall Name</label>
                    <input type="text" name="name" placeholder="Enter hall name"  class="in_put
                     mt-3  px-3 py-4    w-[400px] ml-[7px]"    style="border-radius: 10px"/><br/>
                     <label for="name" class="text-xl font-mono text-gray-950"> Location</label>
                     <input type="text" name="location" placeholder="Enter location of the hall"  
                     class="mt-3 ml-[17px] px-3 py-4  w-[400px]"    style="border-radius: 10px"/><br/>
                    <label for="name" class="text-xl font-mono text-gray-950">About</label>
                    <input type="text" name="about" placeholder="Write the about of hall"  class="rouded-md
                     ml-[50px] mt-3 px-3 py-4           w-[400px]" 
                     style="border-radius: 10px"/><br/>
                     <input type="hidden" name="user_id" value="{{$manager->id}}"  class="rouded-md
                         ml-[80px] mt-3 px-3 py-4   w-[400px]"/><br/>
                         <input type="hidden" name="hall_manager" value="{{$manager->name}}"  class="rouded-md
                         ml-[80px] mt-3 px-3 py-4   w-[400px]"/><br/>
                   
                    
                    <input type="submit" name="submit" value="Submit" class="ml-[110px] text-[20px] mt-3 px-3 py-2 border-none rounded-2xl text-white bg-orange-400  w-[400px]" 
                    style="background-color : orange;"/><br/>
                </form>
                </div>
            </div>
            <div id="add_movie" class="bg-gray-400 h-[83vh] overflow-y-scroll  custom-scrollbar pb-[50px]">
                <p class="text-center text-2xl font-mono font-semibold pt-16 pb-[20px] ">Add Movie</p>
               
              
                <div class="flex justify-center items-center">
                  
                    <form action="{{url('/movieInfo')}}" method="post" enctype="multipart/form-data" data-aos="fade-up" data-aos-duration="2000">
                        @csrf
                    
                        <label for="name" class="text-xl font-mono text-gray-950">Movie Name</label>
                        <input type="text" name="name" placeholder="Enter movie name"  class="in_put
                         mt-3 ml-[80px] px-3 py-4    w-[400px]"  style="border-radius: 10px"/><br/>
                         <label for="name" class="text-xl font-mono text-gray-950">Movie Poster</label>
                         <input type="file" name="image" placeholder="Upload Movie's Poster"  
                         class="mt-3  ml-[120px] px-3 py-4  w-[400px]"  style="border-radius: 10px"/><br/>
                        <label for="name" class="text-xl font-mono text-gray-950">Cast</label>
                        <input type="text" name="cast" placeholder="Enter movie's cast's name"  class="rouded-md
                         ml-[150px] mt-3 px-3 py-4           w-[400px]"  style="border-radius: 10px"/><br/>
                         <label for="name" class="text-xl font-mono text-gray-950">SInger</label>
                        <input type="text" name="singer" placeholder="Enter movie's singer name"  class="
                         ml-[130px] mt-3 px-3 py-4           w-[400px]"   style="border-radius: 10px"/><br/>
                        <label for="name" class="text-xl font-mono text-gray-950">Movie Director</label>
                        <input type="text" name="director" placeholder="Enter movie director's name"  class="
                         ml-[40px] mt-3 px-3 py-4   w-[400px]"   style="border-radius: 10px"/><br/>
                        <label for="name" class="text-xl font-mono text-gray-950">Movie Description</label>
                        <input type="text" name="description" placeholder="Enter movie description"  class="
                         ml-[10px] mt-3 px-3 py-4   w-[400px]"   style="border-radius: 10px"/><br/>
                        <label for="name" class="text-xl font-mono text-gray-950">Show Time</label>
                        <input type="text" name="show_time" placeholder="Enter movie's show time"  class="
                          ml-[100px] mt-3 px-3 py-4   w-[400px]"   style="border-radius: 10px"/><br/>
                        <label for="name" class="text-xl font-mono text-gray-950">Movie Price</label>
                        <input type="number" name="price" placeholder="Enter movie price"  class="rouded-md
                         ml-[80px] mt-3 px-3 py-4   w-[400px]"  style="border-radius: 10px"/><br/>
                         @foreach($manager_hall as $hall)

                         <input type="hidden" name="hall_id" value="{{$hall->hall_id}}"  class="rouded-md
                         ml-[80px] mt-3 px-3 py-4   w-[400px]"/><br/>
                         

                         @endforeach
                        <input type="submit" name="submit" value="Submit" class="ml-[200px] text-[20px] mt-3 px-3 py-2 border-none rounded-2xl text-white bg-orange-400  w-[400px]" style="background-color: red; cursor:pointer"/><br/>
                    </form>
                </div>
            </div>
<!--Movie Trailer-->
<div id="movie_trailer" class="bg-gray-400 h-[83vh] overflow-y-scroll  custom-scrollbar pb-[50px]">
    <p class="text-center text-2xl font-mono font-semibold pt-16 pb-[20px] ">Upload Movie Tariler</p>
    <form action="{{url('/addTrailer')}}" method="post" enctype="multipart/form-data" data-aos="fade-up" data-aos-duration="2000">
        @csrf
    <label for="name" class="text-xl font-mono text-gray-950 ml-[50px]">Movie Trailer Link</label>
    <input type="text" name="trailer" placeholder="Enter movie Trailer Link"  class="rouded-md
     ml-[10px] mt-3 px-3 py-4   w-[400px]"  style="border-radius: 10px"/><br/>
     @foreach($manager_hall as $hall)
     <input type="hidden" name="hall_id" value="{{$hall->hall_id}}"  class="rouded-md
     ml-[30px] mt-3 px-3 py-4   w-[400px]"/><br/>
     @endforeach
    <input type="submit" name="submit" value="Submit" class="ml-[260px] text-[20px] mt-3 px-3 py-2 border-none rounded-2xl text-white bg-orange-400  w-[400px]" style="background-color: red; cursor:pointer"/><br/>
</form>

</div>

            <!--show movie list-->
            <div id="show_movie" class="bg-gray-400 h-[83vh] overflow-y-scroll  custom-scrollbar pb-[50px]">
                <p class="text-center text-2xl font-mono font-semibold pt-16 pb-[20px] ">All Movie List</p>
                <div class="overflow-x-auto">
                    <table class="table border">
                      <!-- head -->
                      <thead>
                        <tr>
                          <th class="  bg-orange-700 text-white">Name</th>
                          <th class="  bg-orange-700 text-white">Cast</th>
                          <th class="  bg-orange-700 text-white">Singer</th>
                          <th class="  bg-orange-700 text-white"> Poster </th>
                          <th class="  bg-orange-700 text-white">Director</th>
                          <th class="  bg-orange-700 text-white">Description</th>
                          <th class="  bg-orange-700 text-white">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- row 1 -->
                        @foreach($movies as $movie)
                        <tr class="bg-base-200">
                          <th  class="bg-slate-950 text-white">{{$movie->name}}</th>
                          <td  class="bg-slate-950 text-white">{{$movie->cast}}</td>
                          <td  class="bg-slate-950 text-white">{{$movie->singer}}</td>
                          <td class="bg-slate-950 text-white"><!-- Display image for a specific user -->
                         
                            <img src="\uploadimage\{{$movie->poster}}" alt="{{ $movie->name }}'s  Image">
                            </td>
                            <td  class="bg-slate-950 text-white">{{$movie->director}}</td>
                            <td  class="bg-slate-950 text-white">{{$movie->description}}</td>
                            <td class="bg-slate-950 text-white">
                                <form action="{{url('/approveMovie', $movie->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="{{$movie->id}}" name="movie_id"/>
                                    <input type="number" placeholder="Set Movie Type" name="movie_type" class="rounded-md text-black py-3"/>
                                    <input type="submit" name="submit" value="Approve" class="py-2 px-5  text-white rounded-md border-sm bg-orange-600 " style="background-color: orange; cursor:pointer"/>
                                </form>
                                
        
                            </td>
                        </tr>
                        @endforeach
                        <!-- row 2 -->
                        
                      </tbody>
                    </table>
                    <!--show movie list-->
                  </div>
            </div>
            <div id="hall_update" class="bg-gray-400  h-[83vh] overflow-y-scroll  custom-scrollbar pb-[50px]">
                <p class="text-center text-2xl font-mono font-semibold pt-16 pb-[20px] ">Update Hall Information</p>
            </div>
           <div class="bg-gray-400 h-[83vh] overflow-y-scroll  custom-scrollbar pb-[50px]" id="gen_ticket">
            @if($count_movie>0)
            <p class="text-center text-2xl font-mono font-semibold pt-16 pb-[20px] ">Generate Ticket</p>
            <div class="flex justify-center items-center">
              
            <form action="{{url('/addTicket')}}" method="post" enctype="multipart/form-data" data-aos="fade-up" data-aos-duration="2000">
                @csrf
            
          
           
            
                
                <input type="hidden" name="hall_id" required   class="rouded-md
                ml-[135px] mt-3 px-3 py-4   w-[400px]" value=" {{$hall_id}}"  style="border-radius: 10px"><br/>
            
               
                
                @foreach($movies_id as $movie)
                <input type="hidden" name="movie_id" required value="{{$movie->id}}"  class="rouded-md
                ml-[120px] mt-3 px-3 py-4   w-[400px]"  style="border-radius: 10px"><br/>
                <input type="hidden" name="show_time" required value="{{$movie->show_time}}"  class="rouded-md
                ml-[120px] mt-3 px-3 py-4   w-[400px]"  style="border-radius: 10px"><br/>
                <input type="hidden" name="price" required value="{{$movie->price}}"   class="rouded-md
                ml-[70px] mt-3 px-3 py-4   w-[400px]"  style="border-radius: 10px"><br/>
            
                @endforeach
         
                
                <label for="total_tickets">Total Number of Tickets:</label>
                <input type="text" name="total_tickets" required placeholder="Enter total numbers Trailer Link"  class="rouded-md
                ml-[10px] mt-3 px-3 py-4   w-[400px]"  style="border-radius: 10px"><br/>
            
                <input type="submit" name="submit" value="Submit" class="ml-[190px] text-[20px] mt-3 px-3 py-2 border-none rounded-2xl text-white bg-pink-400  w-[400px]" style="background-color: red; cursor:pointer"/><br/>
            </form>
            @else
    <p class="text-center text-2xl font-mono font-semibold pt-16 pb-[20px] ">Approve one movie for show.</p>
               @endif
            </div>
           </div>
           <div class="bg-gray-400 h-[83vh] overflow-y-scroll  custom-scrollbar pb-[50px]" id="ticket">
            <p class="text-center text-2xl font-mono font-semibold pt-16 pb-[20px] ">Booking Ticket</p>
            <div class="overflow-x-auto">
                <table class="table border w-full">
                 <!-- head -->
                 <thead>
                    <tr>
                      <th class="  bg-orange-700 text-white pyx-5 py-2">Name</th>
                      <th class="  bg-orange-700 text-white pyx-5 py-2">Total Tickets</th>
                      <th class="  bg-orange-700 text-white pyx-5 py-2">Total Prices</th>
                     
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($ticketDetails as $ticketDetail)
                    <tr class="bg-base-200">
                        <th  class="bg-slate-950 text-white pyx-5 py-2">{{$ticketDetail->user_name}}</th>
                        <th  class="bg-slate-950 text-white pyx-5 py-2">{{$ticketDetail->total_tickets}}</th>
                        <th  class="bg-slate-950 text-white pyx-5 py-2">{{$ticketDetail->total_price}}</th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
          
           
           </div>
        </div>


    </div>
    <script src=" https://unpkg.com/aos@next/dist/aos.js "></script>

    <script type="text/javascript ">
        AOS.init();
        const add_Hall = document.getElementById("add_hall");
        const add_Movie = document.getElementById("add_movie");
        const show_Movie = document.getElementById("show_movie");
        const hall_update = document.getElementById("hall_update");
        const movie_tariler = document.getElementById("movie_trailer");
        const gen_ticket = document.getElementById('gen_ticket');
        const ticket = document.getElementById('ticket');
        add_Hall.style.display = "block";
        add_Movie.style.display = "none";
        show_Movie.style.display = "none";
        hall_update.style.display = "none";
        movie_tariler.style.display = "none";
        gen_ticket.style.display = 'none';
        ticket.style.display = 'none';
        
    function addHall(){
        add_Hall.style.display = "block";
        add_Movie.style.display = "none";
        show_Movie.style.display = "none";
        hall_update.style.display = "none";
        movie_tariler.style.display = "none";
        gen_ticket.style.display = 'none';
        ticket.style.display = 'none';

    }
        function addMovie() {
            add_Movie.style.display = "block";
            show_Movie.style.display = "none";
            hall_update.style.display = "none";
               add_Hall.style.display = "none";
               movie_tariler.style.display = "none";
               gen_ticket.style.display = 'none';
               ticket.style.display = 'none';
        }

        function showMovie() {
            add_Movie.style.display = "none";
            show_Movie.style.display = "block";
            hall_update.style.display = "none";
            add_Hall.style.display = "none";
            movie_tariler.style.display = "none";
            gen_ticket.style.display = 'none';
            ticket.style.display = 'none';
        }

        function hallUpdate() {
            add_Movie.style.display = "none";
            show_Movie.style.display = "none";
            hall_update.style.display = "block";
            add_Hall.style.display = "none";
            movie_tariler.style.display = "none";
            gen_ticket.style.display = 'none';
            ticket.style.display = 'none';
        }
        function addTrailer(){
            add_Movie.style.display = "none";
            show_Movie.style.display = "none";
            hall_update.style.display = "none";
            add_Hall.style.display = "none";
            movie_tariler.style.display = "block";
            gen_ticket.style.display = 'none';
            ticket.style.display = 'none';
        }

        function genTicket(){
            add_Movie.style.display = "none";
            show_Movie.style.display = "none";
            hall_update.style.display = "none";
            add_Hall.style.display = "none";
            movie_tariler.style.display = "none";
            gen_ticket.style.display = 'block';
            ticket.style.display = 'none';
        }
        function ticketBooking(){
            add_Movie.style.display = "none";
            show_Movie.style.display = "none";
            hall_update.style.display = "none";
            add_Hall.style.display = "none";
            movie_tariler.style.display = "none";
            gen_ticket.style.display = 'none';
            ticket.style.display = 'block';
        }
    </script>
</body>

</html>