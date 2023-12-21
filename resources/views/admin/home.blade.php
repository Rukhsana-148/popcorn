
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popcorn</title>
    <link rel="icon" type="images/png" href="icon.png" />
    <link href="main.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.2/dist/full.css" rel="stylesheet" type="text/css" />
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
            <a href="index.html"><img data-aos="fade-right" data-aos-duration="1500" src="/icon.png" alt="Popcorn" width="270" class="mx-5 my-3" />
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
        <div class="bg-black py-[40px] md:px-[14px] pl-2  h-screen">
            <p class="text-2xl font-mono font-semibold text-white mb-[20px]">Admin</p>
           
            <ul>
                <li class="md:my-7 my-5 mr-2" onclick="addMovie()"> <a href="#" class="text-md rounded-md font-mono font-medium text-white  md:px-2 pr-3 py-1 cursor-pointer hover:bg-orange-500 hover:text-white">  User List </a><br/></li>
       
                <li class="md:my-7 my-5 mr-2" onclick="hallRequest()"> <a href="#" class="text-md rounded-md font-mono font-medium text-white  md:px-2 pr-3 py-1 cursor-pointer hover:bg-orange-500 hover:text-white">Hall  Request </a><br/></li>
                <li class="md:my-7 my-5 mr-2" onclick="hallUpdate()"> <a href="#" class="text-md rounded-md font-mono font-medium text-white  md:px-2 pr-3 py-1 cursor-pointer hover:bg-orange-500 hover:text-white">Hall  List </a><br/></li>
                <li class="md:my-7 my-5 mr-2" onclick="hallManager()"> <a href="#" class="text-md rounded-md font-mono font-medium text-white  md:px-2 pr-3 py-1 cursor-pointer hover:bg-orange-500 hover:text-white">Hall  Managers </a><br/></li>
            </ul>
          
              </div>

        
<div class="col-span-5">
  
        <div class="bg-gray-400 h-[83vh] overflow-y-scroll  custom-scrollbar pb-[50px]" id="add_movie">
           
          <p class="text-center text-2xl font-mono font-semibold pt-16 pb-[20px] "> User List</p>
          <div class="overflow-x-auto">
            <table class="table border">
              <!-- head -->
              <thead>
                <tr>
                  <th class="  bg-orange-700 text-white">Name</th>
                  <th class="  bg-orange-700 text-white">Email</th>
                 <!-- <th class="  bg-orange-700 text-white">Phone Number</th>-->
                
                  <th class="  bg-orange-700 text-white">Action</th>
                </tr>
              </thead>
              <tbody>
                <!-- row 1 -->
                @foreach($users as $user)
                <tr class="bg-base-200">
                  <th  class="bg-slate-950 text-white">{{$user->name}}</th>
                  <td  class="bg-slate-950 text-white">{{$user->email}}</td>
                 <!-- <td  class="bg-slate-950 text-white">{{$user->phone_number}}</td>-->
                 
                    <td class="bg-slate-950 text-white">
                        <form action="{{url('/approveId', $user->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{$user->id}}" name="id"/>
                            <input type="number" placeholder="Set User Type" name="user_type" class="rounded-md text-black py-3"/>
                            <input type="submit" name="submit" value="Approve" class="py-2 px-5  text-white rounded-md border-sm bg-orange-600 " style="background-color: orange; cursor:pointer"/>
                        </form>
                        <form action="{{url('/deleteId',  $user->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{$user->id}}" name="id"/>
                            <input type="submit" name="submit" value="Cancel" class="mt-1  py-2 px-5 rounded-md bg-orange-400 text-white" style="background-color: red; cursor:pointer"/>
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
         
            <div id="hall_request" class="bg-gray-400 h-[83vh] overflow-y-scroll  custom-scrollbar pb-[50px]" >
           
              <p class="text-center text-2xl font-mono font-semibold pt-16 pb-[20px] ">Unapproved Hall List</p>
              <div class="overflow-x-auto">
                  <table class="table border">
                    <!-- head -->
                    <thead>
                      <tr>
                        <th class="  bg-orange-700 text-white">Name</th>
                        <th class="  bg-orange-700 text-white">Location</th>
                        <th class="  bg-orange-700 text-white">About</th>
                        <th class="  bg-orange-700 text-white">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- row 1 -->
                      @foreach($hallApproves as $user)
                      <tr class="bg-base-200">
                        <th  class="bg-slate-950 text-white">{{$user->name}}</th>
                        <td  class="bg-slate-950 text-white">{{$user->location}}</td>
                        <td  class="bg-slate-950 text-white">{{$user->about}}</td>
                        
                          <td class="bg-slate-950 text-white">
                              <form action="{{url('/approveHall', $user->id)}}" method="post" enctype="multipart/form-data">
                                  @csrf
                                  <input type="hidden" value="{{$user->id}}" name="id" />
                                  <input type="hidden" value="{{$user->hall_manager}}" name="user_name"/>
                                  <input type="hidden" value="{{$user->user_id}}" name="user_id"/>
                                  <input type="submit" name="submit" value="Approve" class="py-2 px-5  text-white rounded-md border-sm bg-orange-600 " style="background-color: orange; cursor:pointer"/>
                              </form>
                              <form action="{{url('/deleteHall',  $user->id)}}" method="post" enctype="multipart/form-data">
                                  @csrf
                                  <input type="hidden" value="{{$user->id}}" name="id"/>
                                  <input type="submit" name="submit" value="Cancel" class="mt-1  py-2 px-5 rounded-md bg-orange-400 text-white" style="background-color: red; cursor:pointer"/>
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
                <p class="text-center text-2xl font-mono font-semibold pt-16 pb-[20px] ">All Hall Information</p>
                <div class="overflow-x-auto">
                    <table class="table border">
                      <!-- head -->
                      <thead>
                        <tr>
                          <th class="  bg-orange-700 text-white">Name</th>
                          <th class="  bg-orange-700 text-white">Location</th>
                          <th class="  bg-orange-700 text-white">About</th>
                          <th class="  bg-orange-700 text-white">Review </th>
                         
                        </tr>
                      </thead>
                      <tbody>
                        <!-- row 1 -->
                        @foreach($halls as $user)
                        <tr class="bg-base-200">
                          <th  class="bg-slate-950 text-white">{{$user->name}}</th>
                          <td  class="bg-slate-950 text-white">{{$user->location}}</td>
                          <td  class="bg-slate-950 text-white">{{$user->about}}</td>
                          
                           
                        </tr>
                        @endforeach
                        <!-- row 2 -->
                        
                      </tbody>
                    </table>
            </div>
            </div>
            <div id="hall_manager" class="bg-gray-400  h-[83vh] overflow-y-scroll  custom-scrollbar pb-[50px]">
                <p class="text-center text-2xl font-mono font-semibold pt-16 pb-[20px] "> Hall Managers</p>
                <div class="overflow-x-auto">
                    <table class="table border">
                      <!-- head -->
                      <thead>
                        <tr>
                          <th class="  bg-orange-700 text-white">Name</th>
                          <th class="  bg-orange-700 text-white">Phone Number</th>
                          <th class="  bg-orange-700 text-white">Email</th>
                          <th class="  bg-orange-700 text-white">Hall Name</th>
                          <th class="  bg-orange-700 text-white">Hall Location</th>
                       
                         
                        </tr>
                      </thead>
                      <tbody>
                        <!-- row 1 -->
                        @foreach($managers as $user)
                        <tr class="bg-base-200">
                          <th  class="bg-slate-950 text-white">{{$user->user_name}}</th>
                          <td  class="bg-slate-950 text-white">{{$user->phone_number}}</td>
                          <td  class="bg-slate-950 text-white">{{$user->email}}</td>
                          <td  class="bg-slate-950 text-white">{{$user->hall}}</td>
                          <td  class="bg-slate-950 text-white">{{$user->location}}</td>
                          
                           
                        </tr>
                        @endforeach
                        <!-- row 2 -->
                        
                      </tbody>
                    </table>
            </div>
            </div>
        </div>


    </div>
    <script src=" https://unpkg.com/aos@next/dist/aos.js "></script>

    <script type="text/javascript ">
        AOS.init();
        let add_Movie = document.getElementById("add_movie");
        
        let hall_update = document.getElementById("hall_update");
        let hall_manager = document.getElementById("hall_manager");
        let hall_request = document.getElementById("hall_request");
        
        add_Movie.style.display = "block";

       
        hall_update.style.display = "none";
        hall_manager.style.display = "none";
        hall_request.style.display = "none";

          

        function addMovie() {
            add_Movie.style.display = "block";
            show_Movie.style.display = "none";
            hall_update.style.display = "none";
            hall_manager.style.display = "none";
            hall_request.style.display = "none";
        }

        
        function hallRequest(){
            add_Movie.style.display = "none";
          
            hall_update.style.display = "none";
            hall_request.style.display = "block";
            hall_manager.style.display = "none";
            console.log('Hall Request');
                }

        function hallUpdate() {
            add_Movie.style.display = "none";
           
            hall_update.style.display = "block";
            hall_request.style.display = "none";
            hall_manager.style.display = "none";
            console.log('Hall Update');
        }

        function hallManager() {
            add_Movie.style.display = "none";
        
            hall_update.style.display = "none";
            hall_manager.style.display = "block";
            hall_request.style.display = "none";
            console.log('Hall Update');
        }
    </script>
</body>

</html>