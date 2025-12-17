<?php

use App\Helpers\ViewHelper;

$basePath = '/sdecombats';
$page_title = $data['title'];

ViewHelper::loadAdminHeader($page_title);
?>

<div class="container-fluid">
    <div class="row">

        <?php include 'sidebar.php'; ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2"><?= $data['title'] ?></h1>
            </div>

            <div class="content">
                <div class="alert alert-info" role="alert">
                    <?= $data['message'] ?? 'Welcome to the dashboard.' ?>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="card text-white bg-primary mb-3">
                            <div class="card-header">Reservations</div>
                            <div class="card-body">
                                <h5 class="card-title">Check Today's Schedule</h5>
                                <p class="card-text">View upcoming bookings.</p>
                                <a href="<?= $basePath ?>/admin/reservations" class="btn btn-light btn-sm">Go</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<?php
ViewHelper::loadJsScripts();
ViewHelper::loadFooter();
?>