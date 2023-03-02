<p>Pfssshhhhh ... POLLSYSTEM ACTIVATED!</p>

<a href="/logout">Log out {{$user->user_name}}</a>

<br></br>

<form method="post" action="/polls">

    @csrf

    <div>
        <label for="poll_title">Poll Title</label>
        <input type="text" name="poll_title" required>
    </div>
    <div>
        <label for="poll_description">Poll Description</label>
        <input type="text" name="poll_description" required>
    </div>
    <div>
        <label for="date_closing">Poll Closing Date</label>
        <input type="date" name="date_closing" required>
    </div>
    <div>
        <label for="no_of_allowed_votes">Number Of Allowed Votes</label>
        <input type="number" name="no_of_allowed_votes" required>
    </div>
    <button type="submit">Add Poll</button>
</form>

<div>

    @foreach ($user->polls as $poll)
        @if (!$poll->poll_closed)
            <h1>{{$poll->poll_title}}</h1>
            <p><b>Created By: {{$users->find($poll->user_id)->user_name}}</b></p>
            <p><b>Poll Description:</b> {{$poll->poll_description}}</p>
            <p><b>Date Closing:</b> {{$poll->date_closing}}</p>
            <p><b>Number Of Allowed Votes: </b>{{$poll->no_of_allowed_votes}}</p>
            <form action="/vote-options" method="post">

                @csrf

                <label for="vote_option_1">Vote Option 1</label>
                <input type="text" name="vote_option_1" required>
                <label for="vote_option_2">Vote Option 2</label>
                <input type="text" name="vote_option_2" required>
                <button type="submit">Submit Options</button>
            </form>
            <form action="polls/{{$poll->id}}/closed" method="post">

                @csrf
                @method('PATCH')

                <button type="submit">Close Poll</button>
            </form>
        @endif
    @endforeach
</div>

@include('errors')
