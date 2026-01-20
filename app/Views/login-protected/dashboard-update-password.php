<?php

use App\Helpers\SessionManager;

?>
<div class="page-header">
    <h1 class="page-title">CHANGE PASSWORD</h1>
    <p class="page-subtitle">Change your account's password</p>
</div>

<div>
    <?= App\Helpers\FlashMessage::render() ?></div>

<div class="form-section-medium">
    <form method="POST" action="./update-password">
        <input class="base-form-input" type="password" name="password" id="password"
            placeholder="Current Password"
            required>
        <label class="base-form-label" for="password">Password</label>

        <input class="base-form-input" type="password" name="new_password" id="password"
            placeholder="New Password"
            required>
        <label class="base-form-label" for="password">New Password</label>

        <input class="base-form-input" type="password" name="confirm_new_password" id="password"
            placeholder="Confirm New Password"
            required>
        <label class="base-form-label" for="password">Confirm New Password</label>

        <div class="form-button-sections">
            <button class="search-btn-compact" type="submit">SAVE CHANGES</button>
        </div>
    </form>
</div>
