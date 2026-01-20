<?php

use App\Helpers\SessionManager;

?>
<div class="page-header">
    <h1 class="page-title">UPDATE ACCOUNT INFORMATION</h1>
    <p class="page-subtitle">Update your account information</p>
</div>

<div>
    <?= App\Helpers\FlashMessage::render() ?></div>

<div class="form-section-medium">
    <form method="POST" action="./update-user-info">
        <div class="auth-form-row">
            <div class="auth-form-row-sub-column">
                <input type="text" class="base-form-two-column-input" name="first_name" id="first-name"
                    placeholder="First Name"
                    value="<?= SessionManager::get('fname') ?>"
                    required>
                <label class="base-form-two-column-label" for="first-name">First Name</label>
            </div>
            <div class="auth-form-row-sub-column">
                <input class="base-form-two-column-input" type="text" name="last_name" id="last-name"
                    placeholder="Last Name"
                    value="<?= SessionManager::get('lname') ?>"
                    required>
                <label class="base-form-two-column-label" for="last-name">Last Name</label>
            </div>
        </div>

        <input class="base-form-input" type="text" name="email" id="email" placeholder="Email" value="<?= SessionManager::get('email') ?>" required>
        <label class="base-form-label" for="email">Email Address</label>

        <input class="base-form-input" type="text" name="phone" id="phone" placeholder="Phone Number"
            value="<?= SessionManager::get('phone') ?>"
            required>
        <label class="base-form-label" for="phone">Phone Number</label>
        <input class="base-form-input" type="password" name="password" id="password"
            placeholder="Password"
            required>
        <label class="base-form-label" for="password">Password</label>

        <div class="form-button-sections">
            <button class="search-btn-compact" type="submit">SAVE CHANGES</button>
        </div>
    </form>
</div>
