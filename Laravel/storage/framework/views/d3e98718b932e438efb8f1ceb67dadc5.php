<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Chef</title>
</head>
<body>
    <h1>Edit Chef</h1>
    <form method="POST" action="<?php echo e(route('chefs.update', $chef)); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?> <!-- Use PUT method to update the chef -->

        <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" name="nom" id="nom" class="form-control" value="<?php echo e($chef->nom); ?>" required>
        </div>

        <div class="form-group">
            <label for="prenom">Prénom:</label>
            <input type="text" name="prenom" id="prenom" class="form-control" value="<?php echo e($chef->prenom); ?>" required>
        </div>
        <div class="form-group">
            <label for="email">email:</label>
            <input type="email" name="email" id="email" class="form-control" value="<?php echo e($chef->email); ?>" required>
        </div>

        <!-- Include input fields for other fields you want to edit -->

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</body>
</html>
<?php /**PATH C:\Users\hendc\OneDrive\Desktop\Laravel_project\resources\views/chefs/edit.blade.php ENDPATH**/ ?>