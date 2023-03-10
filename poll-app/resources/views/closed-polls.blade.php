<header>
    <h1>Poll results</h1>
</header>
<main>

    <a href="/">Back</a>

    @foreach ($polls as $poll)

        <h2>{{$poll->poll_title}}</h2>
        <p><b>Created By: {{$poll->user_name}}</b></p>
        <p><b>Poll Description:</b> {{$poll->poll_description}}</p>
        <p><b>Poll Closing:</b> {{$poll->date_closing}}</p>
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

    @endforeach

    <a href="/">Back</a>

</main>
<footer>

</footer>

@include('errors')
