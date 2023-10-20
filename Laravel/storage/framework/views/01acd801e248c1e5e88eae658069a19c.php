<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit agences</title>
</head>
<body>
    <h1>Edit agences</h1>
    <form method="POST" action="<?php echo e(route('agences.update', $agence)); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?> <!-- Use PUT method to update the chef -->

        <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" name="name" id="name" class="form-control" value="<?php echo e($agence->name); ?>" required>
        </div>

       

        <!-- Include input fields for other fields you want to edit -->

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</body>
</html>
<?php /**PATH C:\Users\hendc\OneDrive\Desktop\Laravel_project\resources\views/agences/edit.blade.php ENDPATH**/ ?>