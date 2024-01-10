<?php
// Assuming you have a function to fetch admin data from the database
$admins = getAdminsFromDatabase();

include('includes/header.php');
?>

<div class="container-fluid px-4">
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Admins/Staff
                <a href="admins-create.php" class="btn btn-primary float-end">Add Admin</a>
            </h4>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($admins as $admin): ?>
                            <tr>
                                <td><?= $admin['id']; ?></td>
                                <td><?= $admin['name']; ?></td>
                                <td><?= $admin['email']; ?></td>
                                <td>
                                    <!-- Add action buttons/links here -->
                                    <!-- Example: <a href="edit-admin.php?id=<?= $admin['id']; ?>">Edit</a> -->
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>