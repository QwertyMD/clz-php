<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Management</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="container">
        <h1>Student Management</h1>
        <?php
        require_once 'crud.php';
        ?>

        <!-- Student Form (Add or Edit) -->
        <form class="student-form" method="post" action="">
            <?php if ($editStudent): ?>
                <input type="hidden" name="id" value="<?php echo $editStudent['id']; ?>">
            <?php endif; ?>
            <input type="text" name="name" placeholder="Name" required value="<?php echo htmlspecialchars($editStudent['name'] ?? ''); ?>">
            <input type="email" name="email" placeholder="Email" required value="<?php echo htmlspecialchars($editStudent['email'] ?? ''); ?>">
            <input type="text" name="course" placeholder="Course" required value="<?php echo htmlspecialchars($editStudent['course'] ?? ''); ?>">
            <?php if ($editStudent): ?>
                <button type="submit" name="update"><i class="fa-solid fa-pen-to-square"></i> Update Student</button>
                <a href="<?php echo $_SERVER['PHP_SELF']; ?>"><i class="fa-solid fa-xmark"></i> Cancel</a>
            <?php else: ?>
                <button type="submit" name="add"><i class="fa-solid fa-plus"></i> Add Student</button>
            <?php endif; ?>
        </form>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Course</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $row): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td><?php echo htmlspecialchars($row['course']); ?></td>
                        <td class="actions">
                            <a href="?edit=<?php echo $row['id']; ?>"><i class="fa-solid fa-pen"></i></a>
                            <a href="?delete=<?php echo $row['id']; ?>" onclick="return confirm('Delete this student?');"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php $conn->close(); ?>
    </div>
</body>

</html>