@include('header')

<h2>Login to your account</h2>
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

<a href="/">Back</a>

@include('errors')
