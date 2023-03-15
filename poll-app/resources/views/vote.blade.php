@include('header')

<nav>
    <a href="/">Home</a>
</nav>

<main>
<p>You have chosen the option <b>{{$voteOption['vote_option_chosen']}}</b>. <br>Please submit your email below to cast your vote.</p>

{{-- MV: This form catches the vote option choosen from the previous page. Email needs to be submitted to finalise the vote. --}}
<form action="/vote-cast" method="post">
    @csrf
    <label for="vote">Please input your e-mail address: </label>
    <input type="number" name="poll_id" value={{$voteOption['poll_id']}} readonly hidden>
    <input type="email" name="email" id="voter-email" required>
    <input type="text" name="vote_option_chosen" value="{{$voteOption['vote_option_chosen']}}" readonly hidden>
    <button type="submit">Send!</button>
</form>

</main>

{{-- This will fire if the same email is submitted more than once for the same poll. --}}
@include('errors')

@include('footer')
