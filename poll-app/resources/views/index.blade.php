<header>
<h1>Poll system™ v13.457</h1>
<nav><a href="/active-polls">Active</a>
<nav><a href="/closed-polls">Closed</a>
<nav><a href="/login-user">Login</a>
<nav><a href="/register-user">Register</a>
</nav>
</header>
<main>

{{-- MV: Shows success-message from RegistrationController, if registration successful. --}}
{{-- MV: Shows success-message from VoteController, if voting successful. --}}
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif


@foreach ($polls as $poll)
@if (!$poll->poll_closed)
    <h2>{{$poll->poll_title}}</h2>
    <p><b>Created By: {{$poll->user_name}}</b></p>
    <p><b>Poll Description:</b> {{$poll->poll_description}}</p>
    <p><b>Poll Closing:</b> {{$poll->date_closing}}</p>
    {{-- MV: Below code not needed for this view? --}}
    {{-- <p><b>Number Of Allowed Votes: </b>{{$poll->no_of_allowed_votes}}</p> --}}

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

</main>
<footer></footer>
