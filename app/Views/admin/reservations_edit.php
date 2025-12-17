<?php

use App\Helpers\ViewHelper;

ViewHelper::loadAdminHeader($data['title']); ?>

<div class="container-fluid">
    <div class="row">
        <?php include 'sidebar.php'; ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
            <h2>Edit Reservation #<?= htmlspecialchars($data['reservation']['reservation_id']) ?></h2>

            <form action="/sdecombats/admin/reservations/edit/<?= $data['reservation']['reservation_id'] ?>" method="POST">

                <div class="mb-3">
                    <label for="start" class="form-label">Reservation Date</label>
                    <input type="date" class="form-control" id="start" name="start"
                        value="<?= htmlspecialchars($data['reservation']['start']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="num_of_users" class="form-label">Number of Guests</label>
                    <input type="number" class="form-control" id="num_of_users" name="num_of_users"
                        value="<?= htmlspecialchars($data['reservation']['num_of_users']) ?>" required>
                </div>

                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="/sdecombats/admin/reservations" class="btn btn-secondary">Cancel</a>
            </form>

        </main>
    </div>
</div>

<?php ViewHelper::loadJsScripts();
ViewHelper::loadFooter(); ?>