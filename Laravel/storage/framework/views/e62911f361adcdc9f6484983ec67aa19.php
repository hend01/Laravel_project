<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add an agency</title>
</head>
<body>
    <h1>Add a Chef</h1>
    <form method="POST" action="<?php echo e(route('agences.store')); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('POST'); ?>
        
        <div class="form-group">
            <label for="name">Nom:</label>
            <input type="text" name="name" id="name" class="form-control" value="<?php echo e(old('name')); ?>" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="<?php echo e(old('email')); ?>" required>
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" name="address" id="address" class="form-control" value="<?php echo e(old('address')); ?>">
        </div>

        <!-- Add phone_number and description fields -->
        <div class="form-group">
            <label for="phone_number">Phone Number:</label>
            <input type="text" name="phone_number" id="phone_number" class="form-control" value="<?php echo e(old('phone_number')); ?>">
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control"><?php echo e(old('description')); ?></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</body>
</html>
<?php /**PATH C:\Users\hendc\OneDrive\Desktop\Laravel_project\resources\views/agences/create.blade.php ENDPATH**/ ?>