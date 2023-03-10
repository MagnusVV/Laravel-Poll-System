<header>
    <h1>Active polls</h1>
</header>
<main>

    <a href="/">Back</a>

    @foreach ($polls as $poll)
    @if (!$poll->poll_closed)
        <h2>{{$poll->poll_title}}</h2>
        <p><b>Created By: {{$poll->user_name}}</b></p>
        <p><b>Poll Description:</b> {{$poll->poll_description}}</p>
        <p><b>Poll Closing:</b> {{$poll->date_closing}}</p>

        <form action="/vote" method="post">
            @csrf
            <label for="first-option">Option 1: {{$poll->vote_option_1}}</label>
            <input type="number" name="poll_id" value="{{$poll->poll_id}}" readonly hidden>
            <input type="text" name="vote_option_chosen" value="{{$poll->vote_option_1}}" readonly hidden>
            <button type="submit">Vote!</button>
        </form>

        <form action="/vote" method="post">
            @csrf
            <label for="second-option">Option 2: {{$poll->vote_option_2}}</label>
            <input type="number" name="poll_id" value="{{$poll->poll_id}}" readonly hidden>
            <input type="text" name="vote_option_chosen" value="{{$poll->vote_option_2}}" readonly hidden>
            <button type="submit">Vote!</button>
        </form>
    @endif
    @endforeach

    <a href="/">Back</a>

</main>
<footer>

</footer>

@include('errors')
