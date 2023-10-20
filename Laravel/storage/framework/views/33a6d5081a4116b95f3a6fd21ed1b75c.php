<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>add  a chef</h1>
    <form method="POST" action="<?php echo e(route('chefs.store')); ?>">
        
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

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</body>
</html><?php /**PATH C:\Users\hendc\OneDrive\Desktop\Laravel_project\resources\views/front/create.blade.php ENDPATH**/ ?>