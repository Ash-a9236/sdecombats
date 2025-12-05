<?php

use App\Helpers\ViewHelper;

$basePath = '/sdecombats';
$page_title = $data['title'];
ViewHelper::loadAdminHeader($page_title);
?>

<div class="container-fluid">
    <div class="row">

        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
            <div class="position-sticky pt-3">
                <h5 class="px-3 mb-3">Admin Panel</h5>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $basePath ?>/admin/reservations">Manage Reservations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $basePath ?>/admin/memberships">Create Membership</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $basePath ?>/admin/employees">Manage Employees</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $basePath ?>/admin/activities">Manage Activities</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $basePath ?>/admin/events">Manage Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $basePath ?>/admin/users">Update User Information</a>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
            <div class="d-flex justify-content-between">
                <h1 class="h2"><?= $data['title'] ?></h1>
            </div>

            <div class="content">
                <p><?= $data['message'] ?? 'Select an option from the menu to get started.' ?></p>
            </div>
        </main>
    </div>
</div>

<?php
ViewHelper::loadJsScripts();
ViewHelper::loadFooter();
?>