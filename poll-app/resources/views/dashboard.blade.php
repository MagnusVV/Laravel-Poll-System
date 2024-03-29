<link rel="stylesheet" type="text/css" href="{{ URL::to('css/poll.css') }}">

@include('header')

<nav>
    <div class="left-align-in-navbar">
        <p>Welcome {{$user->user_name}}!</p>
        <a href="/dashboard-completed-polls">View Completed Polls</a>
    </div>
    <a href="/logout">Log out</a>
</nav>

<main>

    <p >Pfssshhhhh ... POLLSYSTEM ACTIVATED!</p>
<section class="create_poll_section">

    <form method="post" action="/polls">

        <h2>Create New Poll</h2>

        @csrf

        <div>
            <label for="poll_title">Poll Title</label>
            <input type="text" name="poll_title" required>
        </div>
        <div>
            <label for="poll_description">Poll Description</label>
            <textarea class="poll-description" type="text" name="poll_description" required></textarea>
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
        </div>
        <div>
            <label for="vote_option_2">Vote Option 2</label>
            <input type="text" name="vote_option_2" required>
        </div>
        <button type="submit">Add Poll</button>
    </form>
</section>

<section class="poll_section">
    <h2>Active Polls</h2>
    <div class="poll_cards_container">
    @foreach ($user->polls as $poll)
        @if (!$poll->poll_closed)
        <article class="poll_card">
            <h2>{{$poll->poll_title}}</h2>
            <p><b>Created By:</b> {{$user->user_name}}</p>
            <p><b>Poll Description:</b> {{$poll->poll_description}}</p>
            <p><b>Date Closing:</b> {{$poll->date_closing}}</p>
            <p><b>Number Of Allowed Votes: </b>{{$poll->no_of_allowed_votes}}</p>
            {{-- Retrieves the data from the column "vote_option_1" and "vote_option_1" trough the method "voteOptions" in Poll model. Gets the first value as to not get a collection. --}}
            <p><b>Vote Option 1: </b>{{$poll->voteOptions->first()->vote_option_1}}<br>Current no. of votes: {{$poll->countVotes($poll, 'vote_option_1')}}</p>
            <p><b>Vote Option 2: </b>{{$poll->voteOptions->first()->vote_option_2}}<br>Current no. of votes: {{$poll->countVotes($poll, 'vote_option_2')}}</p>

            {{-- MV: Counts no. of total votes on this poll instance. It actually counts the returned number of rows where polls.id and votes.poll_id matches: --}}
            <p>Current votes total: {{$poll->votes->count()}}</p>

            <form action="polls/{{$poll->id}}/closed" method="post">

                @csrf
                @method('PATCH')

                <button type="submit">Close Poll</button>
            </form>
        </article>
        @endif
    @endforeach
    </div>

    @include('errors')
</main>

@include('footer')

