<link rel="stylesheet" type="text/css" href="{{ URL::to('css/poll.css') }}">

@include('header')

<nav>
    <a href="/">Home</a>
</nav>

<main>

    <section class="user-form">

        <h2>Login to your account</h2>
        <form method="post" action="/login">

            @csrf

            <div>
                <label for="email">Email</label>
                <input name="email" type="email" required />
            </div>
            <div>
                <label for="password">Password</label>
                <input name="password" id="password-login" type="password" required />
            </div>
            <button type="submit">Login</button>
        </form>

    </section>

<a href="/">Back</a>

</main>

@include('errors')

@include('footer')
