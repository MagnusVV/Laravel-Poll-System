<p>Pfssshhhhh ... POLLSYSTEM ACTIVATED!</p>

<a href="/logout">Log out {{$user->user_name}}</a>

<form method="post" action="/polls">

    @csrf

    <div>
        <label for="poll_title">Poll Title</label>
        <input type="text" name="poll_title">
    </div>
    <div>
        <label for="poll_description">Poll Description</label>
        <input type="text" name="poll_description">
    </div>
    <div>
        <label for="date_closing">Poll Closing Date</label>
        <input type="date" name="date_closing">
    </div>
    <div>
        <label for="no_of_allowed_votes">Number Of Allowed Votes</label>
        <input type="number" name="no_of_allowed_votes">
    </div>
    <button type="submit">Add Poll</button>
</form>

@include('errors')
