<?php

use App\Helpers\ViewHelper;
use App\Helpers\FlashMessage;

$page_title = 'Welcome to Moss Cabinet!';

ViewHelper ::loadAuthHeader('Login');
?>
<h2 class="auth-message">WELCOME BACK !</h2>
<div class="components-full-page-wrapper">
    <div class="auth-form-shadow">
        <div class="auth-form">
            <div class="auth-form-wrapper">
                <form method="POST" action="./sign-in">
                    <input class="base-form-input" type="text" name="email" placeholder="Email" id="email" required>
                    <label class="base-form-label" id="signup-label" for="email">Email Address</label>

                    <input class="base-form-input" type="password" name="Password" placeholder="Password" id="password"
                           required>
                    <label class="base-form-label" id="signup-label" for="password">Password</label>

                    <div class="form-button-section">
                        <button class="base-button" type="submit">SIGN IN</button>
                        <br> <br> <br>
                        <button class="secondary-base-button" type="button"><a href="./register">I DON'T HAVE AN ACCOUNT ! </a></button>
                        <a href="#">Forgot Password?</a>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <?= FlashMessage ::render() ?>
</div>
