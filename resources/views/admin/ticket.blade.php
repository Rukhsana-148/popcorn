<form method="POST"action="{{url('/add_ticket')}}">
    @csrf

    <label for="hall_id">Hall ID:</label>
    <input type="text" name="hall_id" required>

    <label for="movie_id">Movie ID:</label>
    <input type="text" name="movie_id" required>

    <label for="price_per_ticket">Price per Ticket:</label>
    <input type="text" name="price_per_ticket" required>

    <label for="total_tickets">Total Number of Tickets:</label>
    <input type="text" name="total_tickets" required>

    <button type="submit">Submit</button>
</form>