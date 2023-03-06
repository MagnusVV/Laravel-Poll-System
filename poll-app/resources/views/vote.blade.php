
<p>{{$voteOption['poll-id']}}</p>
<p>{{$voteOption['vote-option-name']}}</p>


<form action="/vote-completed" method="post">
    @csrf
    <label for="register-vote">Please input your e-mail address: </label>
    <input type="email" id="register-voter-email">
    <button type="submit" name="register-vote">Vote!</button>
</form>
