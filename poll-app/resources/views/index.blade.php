@include('header')

<main>
    <nav>
        <a href="/active-polls">Active polls</a>
        <a href="/closed-polls">Poll results</a>
        <a href="/login-user">Login</a>
        <a href="/register-user">Register</a>
    </nav>

{{-- MV: Shows success-message from RegistrationController, if registration successful. --}}
{{-- MV: Shows success-message from VoteController, if voting successful. --}}
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

{{-- MV: Loops out the registered active polls (2-3 open polls according to limit set in LanfingpageController): --}}
@foreach ($polls as $poll)
@if (!$poll->poll_closed)
    <h2>{{$poll->poll_title}}</h2>
    <p><b>Created By: {{$poll->user_name}}</b></p>
    <p><b>Poll Description:</b> {{$poll->poll_description}}</p>
    <p><b>Poll Closing:</b> {{$poll->date_closing}}</p>

    {{-- MV: Two forms for the different vote options are generated here: --}}
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

@include('errors')

</main>
@include('footer')
