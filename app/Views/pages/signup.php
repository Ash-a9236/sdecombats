<?php

use App\Helpers\ViewHelper;
use App\Helpers\FlashMessage;

$page_title = 'Welcome to Sports de Combats!';
ViewHelper ::loadAuthHeader('Login');
?>
<h2 class="auth-message">WELCOME IN !</h2>
<div class="components-full-page-wrapper">

    <div class="auth-form-shadow">
        <div class="auth-form">
            <div class="form-section" id="register-form-section">
                <form method="POST" action="./register">

                    <div class="base-form-two-column-input-wrapper">
                        <div>
                            <input type="text" class="base-form-two-column-input" name="first_name" id="first-name"
                                   placeholder="First Name"
                                   required>
                            <label class="base-form-two-column-label" for="first-name">First Name</label>
                        </div>
                        <div>
                            <input class="base-form-two-column-input" type="text" name="last_name" id="last-name"
                                   placeholder="Last Name"
                                   required>
                            <label class="base-form-two-column-label" for="last-name">Last Name</label>
                        </div>
                    </div>

                    <input class="base-form-input" type="text" name="email" id="email" placeholder="Email" required>
                    <label class="base-form-label" for="email">Email Address</label>

                    <input class="base-form-input" type="text" name="phone" id="phone" placeholder="Phone Number"
                           required>
                    <label class="base-form-label" for="phone">Phone Number</label>


                    <div class="base-form-two-column-input-wrapper">
                        <div>
                            <input class="base-form-two-column-input" type="password" name="password" id="password"
                                   placeholder="Password"
                                   required>
                            <label class="base-form-two-column-label" for="password">Password</label>
                        </div>
                        <div>
                            <input class="base-form-two-column-input" type="password" name="confirm_password"
                                   id="confirm-password"
                                   placeholder="Confirm Password" required>
                            <label class="base-form-two-column-label" for="confirm-password">Confirm Password</label>
                        </div>
                    </div>

                    <div class="form-button-sections">
                        <button class="base-button" type="submit">Sign Up</button>
                        <a href="./login">
                            <button class="secondary-base-button" id="register-form-button" type="button"><span>SIGN IN</span>
                            </button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
        <?= FlashMessage ::render() ?>
    </div>
