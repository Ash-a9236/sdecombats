<?php

use App\Helpers\ViewHelper;

ViewHelper::loadAdminHeader($data['title']); ?>

<div class="container-fluid">
    <div class="row">
        <?php include 'sidebar.php'; ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
            <h2>Activities</h2>
            <div class="row">
                <?php foreach ($data['activities'] as $act): ?>
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($act['name']) ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted">ID: <?= htmlspecialchars($act['activity_id']) ?></h6>
                                <p class="card-text">
                                    Duration: <?= htmlspecialchars((string)$act['duration']) ?> mins<br>
                                    Room: <?= htmlspecialchars($act['room_id']) ?>
                                </p>
                                <a href="#" class="card-link">Edit Details</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </main>
    </div>
</div>

<?php ViewHelper::loadJsScripts();
ViewHelper::loadFooter(); ?>