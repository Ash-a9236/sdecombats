<?php
$base = $basePath ?? '/sdecombats';
$active = $data['active_page'] ?? 'dashboard';
?>

<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <h5 class="px-3 mb-3">Admin Panel</h5>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?= $active === 'dashboard' ? 'active' : '' ?>" href="<?= $base ?>/admin/dashboard">
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $active === 'reservations' ? 'active' : '' ?>" href="<?= $base ?>/admin/reservations">
                    Manage Reservations
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $active === 'employees' ? 'active' : '' ?>" href="<?= $base ?>/admin/employees">
                    Manage Employees
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $active === 'activities' ? 'active' : '' ?>" href="<?= $base ?>/admin/activities">
                    Manage Activities & Events
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $active === 'users' ? 'active' : '' ?>" href="<?= $base ?>/admin/users">
                    User Management
                </a>
            </li>
        </ul>
    </div>
</nav>
