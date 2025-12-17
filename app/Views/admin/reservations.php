<?php

use App\Helpers\ViewHelper;

ViewHelper::loadAdminHeader($data['title']); ?>

<div class="container-fluid">
    <div class="row">
        <?php include 'sidebar.php'; ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
            <h2>Reservations List</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Customer</th>
                            <th>Details</th>
                            <th>Guests</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($data['reservations'])): ?>
                            <?php foreach ($data['reservations'] as $res): ?>
                                <tr>
                                    <td><?= htmlspecialchars((string)$res['reservation_id']) ?></td>
                                    <td><?= htmlspecialchars((string)$res['start']) ?></td>
                                    <td>
                                        <?= htmlspecialchars($res['fname'] . ' ' . $res['lname']) ?><br>
                                        <small class="text-muted"><?= htmlspecialchars($res['email']) ?></small>
                                    </td>
                                    <td>
                                        <?= $res['activity_name'] ? htmlspecialchars($res['activity_name']) : '' ?>
                                        <?= $res['package_name'] ? htmlspecialchars($res['package_name']) : '' ?>
                                    </td>
                                    <td><?= htmlspecialchars((string)$res['num_of_users']) ?></td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="/sdecombats/admin/reservations/edit/<?= $res['reservation_id'] ?>" class="btn btn-sm btn-primary">Edit</a>

                                            <form action="/sdecombats/admin/reservations/delete/<?= $res['reservation_id'] ?>" method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this reservation?');" style="display:inline;">
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6">No reservations found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>

<?php ViewHelper::loadJsScripts();
ViewHelper::loadFooter(); ?>