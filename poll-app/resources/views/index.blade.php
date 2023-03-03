<h2>Login here</h2>
<form method="post" action="/login">

    @csrf

    <div>
        <label for="email">Email</label>
        <input name="email" id="email" type="email" />
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
        <input name="email" id="email" type="email" />
    </div>
    <div>
        <label for="password">Password</label>
        <input name="password" id="password-register" type="password" />
    </div>
    <button type="submit">Submit</button>
</form>

@include('errors')

{{-- MV: Shows success-message from RegistrationController, if registration successful. --}}
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

@foreach($vote_options as $option)
<?php echo $option->poll_id ?> </br>
@endforeach

@foreach ($polls as $poll)
@if (!$poll->poll_closed)
    <h1>{{$poll->poll_title}}</h1>
    <p><b>Created By: {{$users->find($poll->user_id)->user_name}}</b></p>
    <p><b>Poll Description:</b> {{$poll->poll_description}}</p>
    <p><b>Date Closing:</b> {{$poll->date_closing}}</p>
    <p><b>Number Of Allowed Votes: </b>{{$poll->no_of_allowed_votes}}</p>

    <form action="/vote" method="post">
        @csrf
        <label for="first-option">Option 1: </label>
        <input type="text" id="first-option" value="1" readonly>
        <button type="submit" name="first-option">Vote!</button>
    </form>

    <form action="/vote" method="post">
        @csrf
        <label for="second-option">Option 2: </label>
        <input type="text" id="first-option" value="2" readonly>
        <button type="submit" name="first-option">Vote!</button>
    </form>
@endif
@endforeach
