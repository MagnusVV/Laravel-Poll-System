<pre>
<p>{{$voteOption}}</p>
</pre>

<form action="/vote-completed" method="post">
    @csrf
    <label for="register-vote">Please input your e-mail address: </label>
    <input type="email" id="register-voter-email">
    <button type="submit" name="register-vote">Vote!</button>
</form>
