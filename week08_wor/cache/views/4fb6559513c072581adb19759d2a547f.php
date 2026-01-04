<?php $__env->startSection('content'); ?>
    <h2>Add New Student</h2>
    <form action="/week08_wor/public/?action=store" method="post">
        <label>Name:</label>
        <input type="text" name="name" required>
        <label>Email:</label>
        <input type="email" name="email" required>
        <label>Course:</label>
        <input type="text" name="course" required>
        <button type="submit" class="btn">Add Student</button>
        <a href="/week08_wor/public/?action=index" class="btn-secondary">Cancel</a>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/week08_wor/app/views/layouts/create.blade.php ENDPATH**/ ?>