<link rel="stylesheet" type="text/css" href="{{ URL::to('css/poll.css') }}">

@include('header')

<nav>
    <a href="/">Home</a>
</nav>

<main>

    <h2>Active polls</h1>

    <a href="/">Back</a>

    {{-- MV: This loops out all the active (open) polls. --}}
    <section class="poll_section">
        <div class="poll_cards_container">
            @foreach ($polls as $poll)
            @if (!$poll->poll_closed)
            <article class="poll_card">
                <h2>{{$poll->poll_title}}</h2>
                <p><b>Created By: {{$poll->user_name}}</b></p>
                <p><b>Poll Description:</b> {{$poll->poll_description}}</p>
                <p><b>Poll Closing:</b> {{$poll->date_closing}}</p>

         {{-- MV: Two forms for the different vote options are generated here: --}}
                <form action="/vote" method="post" class="vote_form">
                    @csrf
                    <label for="first-option">Option 1: {{$poll->vote_option_1}}</label>
                    <input type="number" name="poll_id" value="{{$poll->poll_id}}" readonly hidden>
                    <input type="text" name="vote_option_chosen" value="{{$poll->vote_option_1}}" readonly hidden>
                    <button type="submit">Vote!</button>
                </form>

                <form action="/vote" method="post" class="vote_form">
                    @csrf
                    <label for="second-option">Option 2: {{$poll->vote_option_2}}</label>
                    <input type="number" name="poll_id" value="{{$poll->poll_id}}" readonly hidden>
                    <input type="text" name="vote_option_chosen" value="{{$poll->vote_option_2}}" readonly hidden>
                    <button type="submit">Vote!</button>
                </form>
            </article>
            @endif
            @endforeach
        </div>
    </section>
    <a href="/">Back</a>

</main>

@include('errors')

@include('footer')
