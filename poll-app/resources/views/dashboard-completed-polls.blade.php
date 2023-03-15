@include('header')

<nav>
    <a href="/dashboard">Back</a>
    <a href="/logout">Log out {{$user->user_name}}</a>
</nav>

<main>
<p>Pfssshhhhh ... COMPLETED POLLS!</p>

<div>
    @foreach ($user->polls as $poll)
        @if ($poll->poll_closed)
            <h2>{{$poll->poll_title}}</h2>
            <p><b>Created By: {{$user->user_name}}</b></p>
            <p><b>Poll Description:</b> {{$poll->poll_description}}</p>
            <p><b>Date Closing:</b> {{$poll->date_closing}}</p>
            <p><b>Number Of Allowed Votes: </b>{{$poll->no_of_allowed_votes}}</p>
            <p><b>Vote Option 1: </b>{{$poll->voteOptions->first()->vote_option_1}}<br>No. of votes: {{$poll->countVotes($poll, 'vote_option_1')}}</p>
            <p><b>Vote Option 2: </b>{{$poll->voteOptions->first()->vote_option_2}}<br>No. of votes: {{$poll->countVotes($poll, 'vote_option_2')}}</p>
            <p>Votes total: {{$poll->votes->count()}}</p>

            @if ($poll->countVotes($poll, 'vote_option_1') > $poll->countVotes($poll, 'vote_option_2'))
            <p>Winner: {{$poll->voteOptions->first()->vote_option_1}}</p>

            @elseif ($poll->countVotes($poll, 'vote_option_1') < $poll->countVotes($poll, 'vote_option_2'))
            <p>Winner: {{$poll->voteOptions->first()->vote_option_2}}</p>

            @else
            <p>Winner: Its a tie!</p>
            @endif
            <form action="/poll/{{$poll->id}}/removed" method="post">

                @csrf
                @method('DELETE')

                <button type="submit">Remove Poll</button>
            </form>
        @endif
    @endforeach
</div>

</main>

@include('errors')

@include('footer')
