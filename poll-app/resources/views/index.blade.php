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

@include('errors')

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
