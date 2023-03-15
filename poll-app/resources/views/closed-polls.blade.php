<link rel="stylesheet" type="text/css" href="{{ URL::to('css/poll.css') }}">

@include('header')

<nav>
    <a href="/">Home</a>
</nav>

<main>

    {{-- MV: This loops out all the closed polls. --}}
    <section class="poll_section">
        <h2>Poll results</h2>
        <div class="poll_cards_container">
        @foreach ($polls as $poll)
        <article class="poll_card">
            <h2>{{$poll->poll_title}}</h2>
            <p><b>Created By: {{$poll->user_name}}</b></p>
            <p><b>Poll Description:</b> {{$poll->poll_description}}</p>
            <p><b>Poll Closing:</b> {{$poll->date_closing}}</p>
            {{-- Below the poll's vote options are shown, along with the number of votes they've received. --}}
            <p><b>Vote Option 1: </b>{{$poll->voteOptions->first()->vote_option_1}}<br>No. of votes: {{$poll->countVotes($poll, 'vote_option_1')}}</p>
            <p><b>Vote Option 2: </b>{{$poll->voteOptions->first()->vote_option_2}}<br>No. of votes: {{$poll->countVotes($poll, 'vote_option_2')}}</p>
            <p>Votes total: {{$poll->votes->count()}}</p>

            @if ($poll->countVotes($poll, 'vote_option_1') > $poll->countVotes($poll, 'vote_option_2'))
            <p>Winner: <b>{{$poll->voteOptions->first()->vote_option_1}}</b></p>

            @elseif ($poll->countVotes($poll, 'vote_option_1') < $poll->countVotes($poll, 'vote_option_2'))
            <p>Winner: <b>{{$poll->voteOptions->first()->vote_option_2}}</b></p>

            {{-- MV: If both countVotes() above are equal, it's a tie --}}
            @else
            <p>Winner:<b> Its a tie!</b></p>
        @endif
    </article>
    @endforeach
    </div>
</section>

    <a href="/">Back</a>

</main>

@include('errors')

@include('footer')
