<?php $__env->startSection('content'); ?>
<h2>Edit Student</h2>
<form action="/week08_wor/public/?action=update&id=<?php echo e($student['id']); ?>" method="post">
    <label>Name:</label>
    <input type="text" name="name" value="<?php echo e($student['name']); ?>" required>
    <label>Email:</label>
    <input type="email" name="email" value="<?php echo e($student['email']); ?>" required>
    <label>Course:</label>
    <input type="text" name="course" value="<?php echo e($student['course']); ?>" required>
    <button type="submit" class="btn">Update Student</button>
    <a href="/week08_wor/public/?action=index" class="btn-secondary">Cancel</a>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/week08_wor/app/views/layouts/edit.blade.php ENDPATH**/ ?>