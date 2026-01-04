<?php $__env->startSection('content'); ?>
<h2>Student List</h2>
<a href="/week08_wor/public/?action=create" class="btn">Add New Student</a>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Course</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($student['name']); ?></td>
            <td><?php echo e($student['email']); ?></td>
            <td><?php echo e($student['course']); ?></td>
            <td>
                <a href="/week08_wor/public/?action=edit&id=<?php echo e($student['id']); ?>" class="btn-secondary">Edit</a>
                <a href="/week08_wor/public/?action=delete&id=<?php echo e($student['id']); ?>" class="btn-danger" onclick="return confirm('Delete this student?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php if(count($students) === 0): ?>
        <tr>
            <td colspan="4">No students found.</td>
        </tr>
        <?php endif; ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/week08_wor/app/views/layouts/index.blade.php ENDPATH**/ ?>