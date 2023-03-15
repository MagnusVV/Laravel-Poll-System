@include('header')

<nav>
    <a href="/">Home</a>
</nav>

<main>

    <section class="user-form">

        <h2>Register new account</h2>
        <form method="post" action="/add-user">

            @csrf

            <div>
                <label for="user_name">Select username</label>
                <input name="user_name" id="user_name" type="text" required/>
            </div>
            <div>
                <label for="email">Email</label>
                <input name="email" type="email" required/>
            </div>
            <div>
                <label for="password">Password</label>
                <input name="password" id="password-register" type="password" required/>
            </div>
            <button type="submit">Submit</button>
        </form>

    </section>

<a href="/">Back</a>

</main>

@include('errors')

@include('footer')
