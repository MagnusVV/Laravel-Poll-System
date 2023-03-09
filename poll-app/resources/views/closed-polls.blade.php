<header>

</header>
<main>

    @foreach ($polls as $poll)

        <h2>{{$poll->poll_title}}</h2>
        <p><b>Created By: {{$poll->user_name}}</b></p>
        <p><b>Poll Description:</b> {{$poll->poll_description}}</p>
        <p><b>Poll Closing:</b> {{$poll->date_closing}}</p>

        @if ($poll->countVotes($poll, 'vote_option_1') > $poll->countVotes($poll, 'vote_option_2'))
        <p>Winner: {{$poll->voteOptions->first()->vote_option_1}}</p>

        @elseif ($poll->countVotes($poll, 'vote_option_1') < $poll->countVotes($poll, 'vote_option_2'))
        <p>Winner: {{$poll->voteOptions->first()->vote_option_2}}</p>

        @else
        <p>Winner: Its a tie!</p>
        @endif

    @endforeach

</main>
<footer>

</footer>

@include('errors')
