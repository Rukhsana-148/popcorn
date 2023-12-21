<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{
    //
    public function ticketPage($id){
        $user_id = Auth::user()->id;
        $movie = Movie::find($id);
        $data = Ticket::where('movie_id', $id)->whereNull('user_id')->get();
     $total = Ticket::where('movie_id', $id)->whereNull('user_id')->count();

        return view('ticket', compact('movie', 'data', 'total', 'user_id'));
    }


public function bookTickets(Request $request)
{
    $user_id = $request->user_id;
    $num_tickets = $request->total_ticket;
    // Start a database transaction
    DB::beginTransaction();

    try {
        // Fetch available tickets
        $availableTickets = Ticket::where('user_id', null)->take($num_tickets)->get();

        // Check if enough tickets are available
        if (count($availableTickets) < $num_tickets) {
            throw new \Exception('Not enough tickets available.');
        }

        // Update the status and user_id of the selected tickets
        $bookedTicketIds = $availableTickets->pluck('id');
        Ticket::whereIn('id', $bookedTicketIds)->update(['user_id' => $user_id]);

        // Commit the transaction
        DB::commit();

        return "Successfully booked $num_tickets tickets for user $user_id.";
    } catch (\Exception $e) {
        // An error occurred, rollback the transaction
        DB::rollBack();

        return $e->getMessage();
    }
}

}
