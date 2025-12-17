<?php

use App\Helpers\ViewHelper;

ViewHelper::loadAdminHeader($data['title']); ?>

<div class="container-fluid">
    <div class="row">
        <?php include 'sidebar.php'; ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
            <h2>Registered Users</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Membership Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['users'] as $user): ?>
                            <tr>
                                <td><?= htmlspecialchars((string)$user['user_id']) ?></td>
                                <td><?= htmlspecialchars($user['fname'] . ' ' . $user['lname']) ?></td>
                                <td>
                                    <?= htmlspecialchars($user['email']) ?><br>
                                    <?= htmlspecialchars($user['phone']) ?>
                                </td>
                                <td>
                                    <?php if ($user['membership_id']): ?>
                                        <span class="badge bg-success">Active</span>
                                        <small>Exp: <?= $user['membership_end'] ?></small>
                                    <?php else: ?>
                                        <span class="badge bg-secondary">None</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-dark">Update</button>
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