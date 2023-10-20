<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Chefs d'Agence</title>
</head>
<body>
<div class="container">
    <h1>List of Chefs d'Agence</h1>

    <?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
    <?php endif; ?>

    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Address</th>
                <th>Date of Birth</th>
                <th>Gender</th>
                <th>National ID</th>
                <th>Nom de l'Agence</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $chefs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chef): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($chef->nom); ?></td>
                <td><?php echo e($chef->prenom); ?></td>
                <td><?php echo e($chef->email); ?></td>
                <td><?php echo e($chef->address); ?></td>
                <td><?php echo e($chef->date_of_birth); ?></td>
                <td><?php echo e($chef->gender); ?></td>
                <td><?php echo e($chef->national_id); ?></td>
                <td>
                <?php if($chef->agenceLocation): ?>
                    <?php echo e($chef->agenceLocation->name); ?>

                <?php else: ?>
                    No Agency
                <?php endif; ?>
            </td>                <td>
                    <a href="<?php echo e(route('chefs.edit', $chef)); ?>" class="btn btn-primary">Edit</a>
                    <form action="<?php echo e(route('chefs.destroy', $chef)); ?>" method="POST" style="display: inline;">
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
<?php /**PATH C:\Users\hendc\OneDrive\Desktop\Laravel_project\resources\views/chefs/index.blade.php ENDPATH**/ ?>