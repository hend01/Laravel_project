<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a Chef</title>
</head>
<body>
    <h1>Add a Chef</h1>
    <form method="POST" action="<?php echo e(route('chefs.store')); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('POST'); ?>
        
        <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" name="nom" id="nom" class="form-control" value="<?php echo e(old('nom')); ?>" required>
        </div>

        <div class="form-group">
            <label for="prenom">Prénom:</label>
            <input type="text" name="prenom" id="prenom" class="form-control" value="<?php echo e(old('prenom')); ?>" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="<?php echo e(old('email')); ?>" required>
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" name="address" id="address" class="form-control" value="<?php echo e(old('address')); ?>">
        </div>

        <div class="form-group">
            <label for="date_of_birth">Date of Birth:</label>
            <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="<?php echo e(old('date_of_birth')); ?>">
        </div>

        <div class="form-group">
            <label for="gender">Gender:</label>
            <input type="text" name="gender" id="gender" class="form-control" value="<?php echo e(old('gender')); ?>">
        </div>

        <div class="form-group">
            <label for="national_id">National ID:</label>
            <input type="text" name="national_id" id="national_id" class="form-control" value="<?php echo e(old('national_id')); ?>">
        </div>

        <div class="form-group">
        <label for="agency_id">Select Agency:</label>
        <select name="agency_id" id="agency_id" class="form-control">
            <option value="">Select an Agency</option>
            <?php $__currentLoopData = $agencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($agency->id); ?>"><?php echo e($agency->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

      

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</body>
</html>
<?php /**PATH C:\Users\hendc\OneDrive\Desktop\Laravel_project\resources\views/chefs/create.blade.php ENDPATH**/ ?>