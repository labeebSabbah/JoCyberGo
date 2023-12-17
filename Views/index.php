<?php

if (isset($_SESSION['user'])) {
  header('location:home');
}
?>

<style>
  #logo {
    border: none;
    border-radius: 50%;
}

  img {
    margin: 0 auto;
  }

  body {
    padding-top: 0;
  }
</style>

<center>

  </center>
  <section class="section main-section md:w-10/12">
    <div class="card">
      <header class="card-header">
        <p class="card-header-title mb-0 pb-0">
          <img id="logo" src="/src/img/logo_1.png" width="300" height="300"  >
          <!-- <span class="icon"><i class="mdi mdi-lock"></i></span>
          Login -->
        </p>
      </header>
      <div class="card-content mt-0 pt-1">
        <form method="POST" action="login">

          <div class="field spaced">
            <label class="label">Login</label>
            <div class="control icons-left">
              <input class="input" type="text" name="username" placeholder="user@example.com" autocomplete="username">
              <span class="icon is-small left"><i class="mdi mdi-account"></i></span>
            </div>
            <p class="help">
              Please enter your login
            </p>
          </div>

          <div class="field spaced">
            <label class="label">Password</label>
            <p class="control icons-left">
              <input class="input" type="password" name="password" placeholder="Password"
                autocomplete="current-password">
              <span class="icon is-small left"><i class="mdi mdi-asterisk"></i></span>
            </p>
            <p class="help">
              Please enter your password
            </p>
          </div>

          <hr>

          <div class="field grouped">
            <div class="control">
              <button type="submit" class="button blue">
                Login
              </button>
            </div>
          </div>

        </form>
      </div>
    </div>

  </section>

  