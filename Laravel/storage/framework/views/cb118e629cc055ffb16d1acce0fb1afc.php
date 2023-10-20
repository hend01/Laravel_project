<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Agences</title>
</head>
<body>
<div class="container">
    <h1>List of Agences</h1>

    <?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
    <?php endif; ?>

    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Address</th>
                <th>phone number</th>
                <th>description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $agences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agence): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($agence->name); ?></td>
                <td><?php echo e($agence->email); ?></td>
                <td><?php echo e($agence->address); ?></td>

                <td><?php echo e($agence->phone_number); ?></td>
                <td><?php echo e($agence->description); ?></td>

                <td><?php echo e($agence->address); ?></td>
                <td>
                    <a href="<?php echo e(route('agences.edit', $agence)); ?>" class="btn btn-primary">Edit</a>
                    <form action="<?php echo e(route('agences.destroy', $agence)); ?>" method="POST" style="display: inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
</body>
</html>
<?php /**PATH C:\Users\hendc\OneDrive\Desktop\Laravel_project\resources\views/agences/index.blade.php ENDPATH**/ ?>