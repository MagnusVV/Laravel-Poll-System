<h2>Login here</h2>
<form method="post" action="/login">

    @csrf

    <div>
        <label for="email">Email</label>
        <input name="email" type="email" />
    </div>
    <div>
        <label for="password">Password</label>
        <input name="password" id="password-login" type="password" />
    </div>
    <button type="submit">Login</button>
</form>


<h2>Add new user</h2>
<form method="post" action="/add-user">

    @csrf

    <div>
        <label for="user_name">Select username</label>
        <input name="user_name" id="user_name" type="text" />
    </div>
    <div>
        <label for="email">Email</label>
        <input name="email" type="email" />
    </div>
    <div>
        <label for="password">Password</label>
        <input name="password" id="password-register" type="password" />
    </div>
    <button type="submit">Submit</button>
</form>

@include('errors')

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
