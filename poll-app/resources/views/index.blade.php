<h2>Login here</h2>
<form method="post" action="/login">

    @csrf

    <div>
        <label for="email">Email</label>
        <input name="email" id="email" type="email" />
    </div>
    <div>
        <label for="password">Password</label>
        <input name="password" id="password" type="password" />
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
        <input name="password" id="password" type="password" />
    </div>
    <button type="submit">Submit</button>
</form>

@include('errors')

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

@foreach ($polls as $poll)
@if (!$poll->poll_closed)
    <h1>{{$poll->poll_title}}</h1>
    <p><b>Created By: {{$users->find($poll->user_id)->user_name}}</b></p>
    <p><b>Poll Description:</b> {{$poll->poll_description}}</p>
    <p><b>Date Closing:</b> {{$poll->date_closing}}</p>
    <p><b>Number Of Allowed Votes: </b>{{$poll->no_of_allowed_votes}}</p>
    <form action="polls/{{$poll->id}}/closed" method="post">

        @csrf
        @method('PATCH')

        {{-- <button type="submit">Close Poll</button> --}}
    </form>
@endif
@endforeach
