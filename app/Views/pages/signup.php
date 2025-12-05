<?php

use App\Helpers\ViewHelper;
use App\Helpers\FlashMessage;

$page_title = 'Welcome to Sports de Combats!';
ViewHelper ::loadAuthHeader('Login');
?>
<h2 class="auth-message">WELCOME IN !</h2>
<div class="components-full-page-wrapper">
    <div class="2auth-form-shadow">
        <div class="2auth-form">
            <div class="form-section" id="signup-form-section">
                <form method="POST" action="./sign-up">
                    <div class="form-subsection">
                        <input type="text" class="base-form-input" name="first_name" id="first-name"
                               placeholder="First Name"
                               required>
                        <label class="base-form-label" for="first-name">First Name</label>

                        <input class="base-form-input" type="text" name="last_name" id="last-name"
                               placeholder="Last Name"
                               required>
                        <label class="base-form-label" for="last-name">Last Name</label>
                    </div>

                    <input class="base-form-input" type="text" name="email" id="email" placeholder="Email" required>
                    <label class="base-form-label" for="email">Email Address</label>

                    <input class="base-form-input" type="text" name="phone" id="phone" placeholder="Phone Number"
                           required>
                    <label class="base-form-label" for="phone">Phone Number</label>

                    <input class="base-form-input" type="password" name="password" id="password" placeholder="Password"
                           required>
                    <label class="base-form-label" for="password">Password</label>

                    <input class="base-form-input" type="password" name="confirm_password" id="confirm-password"
                           placeholder="Confirm Password" required>
                    <label class="base-form-label" for="confirm-password">Confirm Password</label>

                    <div class="form-button-sections">
                        <button class="form-button" type="submit">Sign Up</button>
                        <button class="secondary-base-button" type="button"><a href="./login">I ALREADY HAVE AN ACCOUNT !!</a>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?= FlashMessage ::render() ?>
</div>
