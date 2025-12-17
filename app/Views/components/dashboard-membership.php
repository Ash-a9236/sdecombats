<?php

use App\Helpers\SessionManager;

?>
<div class="page-header">
    <h1 class="page-title">Membership</h1>
    <?php if (SessionManager::get("membership_id") == null) {
    ?>
        <p class="page-subtitle">Subscribe to a membership</p>
    <?php } ?>
</div>

<div>
    <?= App\Helpers\FlashMessage::render() ?></div>

<?php if (SessionManager::get("membership_id") == null) {
?>
    <div class="form-section-medium">
        <form method="POST" action="./membership">
            <label for="" class="nav-text">Duration</label>
            <div class="filters-compact">
                <select name="duration" id="" class="filter-compact">
                    <option value="">Choose the Duration</option>
                    <option value="1">1 Month - $60</option>
                    <option value="3">3 Month - $165</option>
                    <option value="6">6 Month - $270</option>
                    <option value="12">12 Month - $440</option>
                </select>
            </div>

            <label for="" class="nav-text">Locker Choice</label>
            <div class="filters-compact">
                <select name="locker_type" id="" class="filter-compact">
                    <option value="">No Locker</option>
                    <option value="SMALL">Small Locker</option>
                    <option value="MEDIUM">Medium Locker</option>
                    <option value="LARGE">Large Locker</option>
                </select>
            </div>

            <div>
                <label class="check-medium"><input type="checkbox" class="eq-check" name="bow_rental">Bow Rental</label>
            </div>

            <div class="form-button-sections">
                <button class="search-btn-compact" type="submit">SUBSCRIBE TO MEMBERSHIP</button>
            </div>
        </form>
    </div>

<?php } else { ?>

    <div class="res-card-compact reservation-card-view">
        <div class="res-card-header-compact">
            <span class="res-id-compact">MEMBERSHIP ID : <?= $data['membership_info']['membership_id'] ?></span>
        </div>

        <div class="res-card-body-compact">
            <div class="res-info-row-compact">
                <span class="res-label-compact">Start:</span>
                <span class="res-value-compact"><?= date('F d Y', strtotime($data['membership_info']["start"])) ?></span>
            </div>
            <div class="res-info-row-compact">
                <span class="res-label-compact">End:</span>
                <span class="res-value-compact"><?= date('F d Y', strtotime($data['membership_info']["end"])) ?></span>
            </div>
            <div class="res-info-row-compact">
                <span class="res-label-compact">Locker:</span>
                <span class="res-value-compact"><?= ($data['membership_info']['locker_id'] == null) ? "No locker" : "#{$data['membership_info']['locker_id']}" ?></span>
            </div>
            <div class="res-info-row-compact">
                <span class="res-label-compact">Bow Rental:</span>
                <span class="res-value-compact"><?= ($data['membership_info']['bow_rental'] == 0) ? "No" : "Yes" ?></span>
            </div>
        </div>
    </div>
<?php } ?>
