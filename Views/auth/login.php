<?php
/** @var $error */
?>

<?php
    if(isset($error) && $error)
    {
    ?>
        <p style="color: red">Username ou password estão errados, por favor tente novamente!</p>
    <?php
    }
?>

<main class="form-signin text-center">
    <form data-bitwarden-watching="1" method="post">
        <img class="mb-4" src="https://getbootstrap.com/docs/5.1/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

        <div class="form-floating">
            <input type="text" class="form-control" name="username" id="username" placeholder="username">
            <label for="username">Username</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            <label for="password">Password</label>
        </div>

        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted">© 2017–2021</p>
    </form>
</main>
