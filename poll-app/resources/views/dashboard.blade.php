@include('header')

<p>Pfssshhhhh ... POLLSYSTEM ACTIVATED!<br>
Welcome {{$user->user_name}}!</p>

<a href="/logout">Log out {{$user->user_name}}</a>

<a href="/dashboard-completed-polls">View Completed Polls</a>

<br></br>
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
        <input type="date" name="date_closing" min="<?= date("Y-m-d") ?>" required>
    </div>
    <div>
        <label for="no_of_allowed_votes">Number Of Allowed Votes</label>
        <input type="number" name="no_of_allowed_votes" required>
    </div>
    <div>
        <label for="vote_option_1">Vote Option 1</label>
        <input type="text" name="vote_option_1" required>
        <label for="vote_option_2">Vote Option 2</label>
        <input type="text" name="vote_option_2" required>
    </div>
    <button type="submit">Add Poll</button>
</form>

<div>

    @foreach ($user->polls as $poll)
        @if (!$poll->poll_closed)
            <h2>{{$poll->poll_title}}</h2>
            <p><b>Created By: {{$user->user_name}}</b></p>
            <p><b>Poll Description:</b> {{$poll->poll_description}}</p>
            <p><b>Date Closing:</b> {{$poll->date_closing}}</p>
            <p><b>Number Of Allowed Votes: </b>{{$poll->no_of_allowed_votes}}</p>
            <p><b>Vote Option 1: </b>{{$poll->voteOptions->first()->vote_option_1}}<br>Current no. of votes: {{$poll->countVotes($poll, 'vote_option_1')}}</p>
            <p><b>Vote Option 2: </b>{{$poll->voteOptions->first()->vote_option_2}}<br>Current no. of votes: {{$poll->countVotes($poll, 'vote_option_2')}}</p>

            {{-- MV: Counts no. of total votes on this poll instance. It actually counts the returned number of rows where polls.id and votes.poll_id matches: --}}
            <p>Current votes total: {{$poll->votes->count()}}</p>

            <form action="polls/{{$poll->id}}/closed" method="post">

                @csrf
                @method('PATCH')

                <button type="submit">Close Poll</button>
            </form>
        @endif
    @endforeach
</div>

@include('errors')

