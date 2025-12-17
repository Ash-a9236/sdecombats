<?php

use App\Helpers\ViewHelper;

ViewHelper::loadAdminHeader($data['title']); ?>

<div class="container-fluid">
    <div class="row">
        <?php include 'sidebar.php'; ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h2>Staff Directory</h2>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <a href="/sdecombats/admin/employees/add" class="btn btn-sm btn-outline-primary">
                        + Add New Employee
                    </a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Role Level</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['employees'] as $emp): ?>
                            <tr>
                                <td><?= htmlspecialchars((string)$emp['staff_id']) ?></td>
                                <td><?= htmlspecialchars($emp['name']) ?></td>
                                <td>
                                    <?php
                                    $badge = match ($emp['level']) {
                                        'ADMIN' => 'bg-danger',
                                        'MANAGER' => 'bg-warning text-dark',
                                        default => 'bg-info text-dark'
                                    };
                                    ?>
                                    <span class="badge <?= $badge ?>"><?= htmlspecialchars($emp['level']) ?></span>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-secondary">Edit</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>

<?php ViewHelper::loadJsScripts();
ViewHelper::loadFooter(); ?>