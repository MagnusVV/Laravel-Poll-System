@include('header')

<main>

    <h2>Poll results</h2>

    <a href="/">Back</a>

    {{-- MV: This loops out all the closed polls. --}}
    @foreach ($polls as $poll)
        <h2>{{$poll->poll_title}}</h2>
        <p><b>Created By: {{$poll->user_name}}</b></p>
        <p><b>Poll Description:</b> {{$poll->poll_description}}</p>
        <p><b>Poll Closing:</b> {{$poll->date_closing}}</p>
        {{-- Below the poll's vote options are shown, along with the number of votes they've received. --}}
        <p><b>Vote Option 1: </b>{{$poll->voteOptions->first()->vote_option_1}}<br>No. of votes: {{$poll->countVotes($poll, 'vote_option_1')}}</p>
        <p><b>Vote Option 2: </b>{{$poll->voteOptions->first()->vote_option_2}}<br>No. of votes: {{$poll->countVotes($poll, 'vote_option_2')}}</p>
        <p>Votes total: {{$poll->votes->count()}}</p>

        @if ($poll->countVotes($poll, 'vote_option_1') > $poll->countVotes($poll, 'vote_option_2'))
        <p>Winner: {{$poll->voteOptions->first()->vote_option_1}}</p>

        @elseif ($poll->countVotes($poll, 'vote_option_1') < $poll->countVotes($poll, 'vote_option_2'))
        <p>Winner: {{$poll->voteOptions->first()->vote_option_2}}</p>

        {{-- MV: If both countVotes() above are equal, it's a tie --}}
        @else
        <p>Winner: Its a tie!</p>
        @endif

    @endforeach

    <a href="/">Back</a>

</main>

@include('errors')

@include('footer')
