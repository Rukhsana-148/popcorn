<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ticket;
use App\Models\MovieTrailer;
use App\Models\Hall;
 use App\Models\HallManager;
use App\Models\Movie;
use App\Models\movieReview;
use Illuminate\Support\Facades\Auth;
use App\Models\HallReview;

class HomeController extends Controller
{
    //
    public function popcorn(){
      if(Auth::id()){
        $userType = Auth::user()->user_type;
          if($userType==1){
            $users = User::whereNotNull('email_verified_at')->get();;
            $user = auth()->user();
            $imageData = base64_encode($user->nid_card);
    $imageUrl = 'data:image/png;base64,' . $imageData;
            $hallApproves = Hall::where('hall_type','=',0)->get();
             $halls = Hall::where('hall_type','=',1)->get();
           $approved_users = User::where('user_type','=',3)->get();
           // $halls = Hall::all();
           // $managers = Hall::join('hall_managers', 'halls.id', '=', 'hall_managers.hall_id')
           // ->join('hall_managers', 'users.id', '=', 'hall_managers.user_id')
        //->select('halls.name as hall_name', 'halls.location', 'hall_managers.user_name as manager_name', 'users.phone_number as phone_number', 'users.email as email')
        // ->get();
        $managers = HallManager::join('users', 'hall_managers.user_id', '=', 'users.id')
                           ->join('halls', 'hall_managers.hall_id', '=', 'halls.id')
                           ->select('halls.name as hall', 'halls.location as location', 'hall_managers.user_name', 'users.email as email', 'users.phone_number as phone_number')
                           ->get();
         
            return view('admin.home', compact('users',  'hallApproves', 'halls', 'managers', 'approved_users'));
          }else if($userType==2){
            $user_id = Auth::user()->id;
            $manager = User::find($user_id);
          $manager_hall = HallManager::where('hall_managers.user_id','=',$user_id)
                          ->join('halls', 'hall_managers.hall_id', '=', 'halls.id')
                          ->select('halls.name', 'halls.id as hall_id')
                          ->get();
                         
                          $hall_id = HallManager::where('user_id', $user_id)
                          ->value('hall_id');

                        
                        $movies = Movie::join('hall_managers', 'movies.hall_id', '=', 'hall_managers.hall_id')
                        ->where('hall_managers.user_id',$user_id)
                        ->select('movies.*')
                        ->get();
                        $movies_id = Movie::join('hall_managers', 'movies.hall_id', '=', 'hall_managers.hall_id')
                        ->where('hall_managers.user_id', $user_id)
                        ->where('movies.movie_type', 1)
                        ->select('movies.*') // Select all columns from the movies table
                        ->get();

                        $count_movie = Movie::join('hall_managers', 'movies.hall_id', '=', 'hall_managers.hall_id')
                        ->where('hall_managers.user_id', $user_id)
                        ->where('movies.movie_type', 1)
                        ->select('movies.*')->count();

                          $trailers= MovieTrailer::with('hall') 
                          ->get();

                          $ticketDetails = Ticket::select('users.name as user_name', 'tickets.user_id', 
                        DB::raw('COUNT(tickets.id) as total_tickets'),
                        DB::raw('SUM(tickets.price) as total_price'))
                    ->join('users', 'users.id', '=', 'tickets.user_id')
                    ->groupBy('tickets.user_id', 'users.name')
                    ->get();
            return view('admin.manager', compact('manager','ticketDetails','manager_hall', 'count_movie', 'movies', 'trailers', 'hall_id', 'movies_id'));
          }else if($userType==0||$userType==3){
            $user_id = Auth::user()->id;
            $movies= Movie::with('hall')->where('movie_type', 1)->get();
            $all_movies= Movie::with('hall')->get();
              $trailers= MovieTrailer::with('hall') 
             ->get();
             $user = User::find($user_id);
             $isEmailVerified = $user ? !is_null($user->email_verified_at) : false;

              $halls = Hall::where('hall_type', 1)->get();
            
              $review = Ticket::where('user_id', $user_id)->select('tickets.user_id')->get();
            return view('user', compact('movies', 'trailers', 'halls', 'all_movies', 'review', 'user_id', 'isEmailVerified'));
          }
    }else{
      $movies= Movie::with('hall')->where('movie_type', 1)->get();
      $all_movies= Movie::with('hall')->get();
       $trailers= MovieTrailer::with('hall') 
       ->get();
        $halls = Hall::where('hall_type', 1)->get();
        return view('welcome', compact('movies','all_movies', 'trailers', 'halls'));
       }
    }

    public function review(){
      $user_id = Auth::user()->id;
      $movies= Movie::with('hall')->get();
      $halls = Hall::where('hall_type', 1)->get();
      return view('review', compact('halls', 'user_id', 'movies'));
    }
    public function movieReview(Request $request)
    {
      $data = new movieReview;
        $data->movie_id = $request->movie_id;
        $data->user_id =  $request->user_id;
        $data->comment =  $request->comment;
        $data->rating = $request->rating;
       
        $data->save();
           

        return redirect()->back()->with('success', 'Review submitted successfully!');
    }

    
    public function hallReview(Request $request)
    {
      $data = new hallReview;
        $data->hall_id = $request->hall_id;
        $data->user_id =  $request->user_id;
        $data->comment =  $request->comment;
        $data->rating = $request->rating;
       
        $data->save();
           

        return redirect()->back()->with('success', 'Review submitted successfully!');
    }
    public function addHall(Request $request){
        $data = new Hall;
        $data->name = $request->name;
        $data->location =  $request->location;
        $data->about =  $request->about;
        $data->user_id = $request->user_id;
        $data->hall_manager = $request->hall_manager;
        $data->save();
       return redirect()->back();

    }
    public function approveHall(Request $request, $id){
        $data = Hall::find($id);
        $data->hall_type=1;
        $manager = new HallManager;

       
        $manager->user_name = $request->user_name;
        $manager->user_id = $request->user_id;
        $manager->hall_id = $request->id;
        $data->save();
        $manager->save();
        return redirect()->back();
      }
      public function deleteHall($id){
        $data = Hall::find($id);
        $data->delete();
        return redirect()->back();
      }
    public function approveId(Request $request, $id){
      $data = User::find($id);
      $data->user_type=$request->user_type;
      $data->save();
      return redirect()->back();
    }
    public function deleteId($id){
      $data = User::find($id);
      $data->delete();
      return redirect()->back();
    }

    public function movieInfo(Request $request){
      $data = new Movie;
      $image = $request->file('image');
    $imageName = time() . '.' . $image->getClientOriginalExtension();
    $image->move('uploadimage', $imageName);
    $data->poster = $imageName;
    $data->name = $request->name;
    $data->cast =  $request->cast;
    $data->singer =  $request->singer;
    $data->director =  $request->director;
    $data->description =  $request->description;
    $data->show_time =  $request->show_time;
    $data->price =  $request->price;
    
    $data->hall_id =  $request->hall_id;
    $data->save();
    return redirect()->back();
    }
    public function addTrailer(Request $request){
           $data = new MovieTrailer;
           $data->link = $request->trailer;
           $data->hall_id= $request->hall_id;
           $data->save();
           return redirect()->back();
    }

    
    public function getData($id)
{
    $movie= Movie::with('hall')->where('hall_id', $id)->where('movie_type', 1)->get();
   
       $all_movies= Movie::with('hall')->where('hall_id', $id)->get();
   $trailer = MovieTrailer::with('hall')->where('hall_id', $id)->get();
    $halls = Hall::all();

    $result = [
        'movies' => $movie,
        'trailers' => $trailer,
        'halls'=> $halls,
        'all_movies'=> $all_movies,
         ];

    return response()->json($result);
}

public function getMovie($id)
{
  $user_id = Auth::user()->id;
  $user = User::find($user_id);
   $movie= Movie::with('hall')->where('hall_id', $id)->where('movie_type', 1)->get();
   $all_movies= Movie::with('hall')->where('hall_id', $id)->get();
    $trailer = MovieTrailer::with('hall')->where('hall_id', $id)->get();
    $isEmailVerified = $user ? !is_null($user->email_verified_at) : false;
    $halls = Hall::all();

    $result = [
        'movies' => $movie,
        'trailers' => $trailer,
        'halls'=> $halls,
        'all_movies'=> $all_movies,
        'isEmailVerified'=>$isEmailVerified
         ];

    return response()->json($result);
}


    public function selectHall(Request $request){
      $hallId = $request->input('hall');
    
      $movies = $hallId
          ? Movie::where('hall_id', $hallId)->get()
          : Movie::all();
          $trailers=$hallId
          ? MovieTrailer::where('hall_id', $hallId)->get()
          : MovieTrailer::all();
      $halls = Hall::all();
      
      return view('user', compact('movies', 'halls', 'trailers'));
    }





    public function getHall($id){
      $hall = Hall::where('id', $id)->get(); // Assuming 'id' is the primary key of the Hall model
  
      if (!$hall) {
          return response()->json(['error' => 'Hall not found'], 404);
      }
  
      $manager = HallManager::where('hall_managers.hall_id', '=', $id)
          ->join('users', 'hall_managers.user_id', '=', 'users.id')
          ->select('users.email as email', 'users.phone_number as phone')
          ->get();
      $movies = Movie::where('hall_id', $id)->get();
      $trailers = MovieTrailer::where('hall_id', $id)->get();
   $halls = Hall::all();
      $result = [
          'hall' => $hall,
          'movies' => $movies,
          'trailers' => $trailers,
          'manager' => $manager,
          'halls'=> $halls,
      ];
  
      return response()->json($result);
  }
  


    public function hall(){
      $hall_fixed = Hall::first();
       $hallId = $hall_fixed->id;
       $movies = $hallId
          ? Movie::where('hall_id', $hallId)->get()
          : Movie::all();
          $trailers=$hallId
          ? MovieTrailer::where('hall_id', $hallId)->get()
          : MovieTrailer::all();
          $hall_fixed = Hall::where('id', $hallId)->get();
          
          $managers = HallManager::where('hall_managers.hall_id', '=', $hallId)
          ->join('users', 'hall_managers.user_id', '=', 'users.id')
          ->select('users.email as email', 'users.phone_number as phone')
          ->get();
         $halls = Hall::all();
      
      return view('hall', compact('movies', 'halls', 'trailers', 'hall_fixed', 'managers'));
    }


    public function approveMovie(Request $request, $id){
      $movie_id =$request->movie_id; 
      $data = Movie::find($movie_id);
      $data->movie_type=$request->movie_type;
      $data->save();
      return redirect()->back();
    }


    public function addTicket(Request $request){

       
      $totalTickets = $request->input('total_tickets');
      $hallId = $request->input('hall_id');
      $movieId = $request->input('movie_id');
      $show_time = $request->input('show_time');
      $pricePerTicket = $request->input('price');

      for ($i = 0; $i < $totalTickets; $i++) {
          Ticket::create([
              'hall_id' => $hallId,
              'movie_id' => $movieId,
              'price' => $pricePerTicket,
              'show_time'=>$show_time,
              
          ]);
      }

      return redirect()->back()->with('success', 'Tickets created successfully!');
}
    }

