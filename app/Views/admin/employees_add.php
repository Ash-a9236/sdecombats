<?php

use App\Helpers\ViewHelper;

ViewHelper::loadAdminHeader($data['title']); ?>

<div class="container-fluid">
    <div class="row">
        <?php include 'sidebar.php'; ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
            <h2>Add New Employee</h2>

            <form action="/sdecombats/admin/employees/add" method="POST">

                <div class="mb-3">
                    <label for="staff_id" class="form-label">Staff ID (Required)</label>
                    <input type="number" class="form-control" id="staff_id" name="staff_id" placeholder="e.g. 4001" required>
                    <div class="form-text">Enter a unique ID for this employee.</div>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="John Doe" required>
                </div>

                <div class="mb-3">
                    <label for="level" class="form-label">Role Level</label>
                    <select class="form-select" id="level" name="level" required>
                        <option value="EMPLOYEE">Employee</option>
                        <option value="MANAGER">Manager</option>
                        <option value="ADMIN">Admin</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" value="Hello123" required>
                </div>

                <button type="submit" class="btn btn-primary">Create Employee</button>
                <a href="/sdecombats/admin/employees" class="btn btn-secondary">Cancel</a>
            </form>

        </main>
    </div>
</div>

<?php ViewHelper::loadJsScripts();
ViewHelper::loadFooter(); ?>