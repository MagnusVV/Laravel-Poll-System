<p>You have chosen the option "{{$voteOption['vote_option_chosen']}}." <br>Please submit your email below to cast your vote.</p>


<form action="/vote-cast" method="post">
    @csrf
    <label for="vote">Please input your e-mail address: </label>
    <input type="number" name="poll_id" value={{$voteOption['poll_id']}} readonly hidden>
    <input type="email" name="email" id="voter-email" required>
    <input type="text" name="vote_option_chosen" value="{{$voteOption['vote_option_chosen']}}" readonly hidden>
    <button type="submit">Send!</button>
</form>

{{-- This will fire if the same email is submitted more than once. --}}
@include('errors')
