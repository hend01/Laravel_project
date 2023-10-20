

<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="top-bar">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Modifier</li>
                </ol>
            </nav>
            <!-- Search and Notifications can go here if needed -->
        </div>
        <h2 class="intro-y text-lg font-medium mt-10" style="background-color: #1e40af; color: white; border-radius: 8px;">
            <span style="margin-left: 11px;"> Modifier un Chef </span>
        </h2>
        <div class="grid grid-cols gap-6 mt-5">
            <div class="intro-y col-span-12 lg:col-span-6">
                <!-- Chef Form -->
                <div class="intro-y box">
                    <div class="p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                        <h2 class="font-medium text-base mr-auto">
                            Modifier un Chef
                        </h2>
                    </div>
                    <div class="p-5">
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
                                <label for="email">Email:</label>
                                <input type="email" name="email" id="email" class="form-control" value="<?php echo e($chef->email); ?>" required>
                            </div>

                            <!-- Include input fields for other fields you want to edit -->
                            <div class="form-group">
                                <label for="address">Address:</label>
                                <input type="text" name="address" id="address" class="form-control" value="<?php echo e($chef->address); ?>">
                            </div>

                            <div class="form-group">
                                <label for="date_of_birth">Date of Birth:</label>
                                <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="<?php echo e($chef->date_of_birth); ?>">
                            </div>

                            <div class="form-group">
                                <label for="gender">Gender:</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="national_id">National ID:</label>
                                <input type="text" name="national_id" id="national_id" class="form-control" value="<?php echo e($chef->national_id); ?>">
                            </div>
                            

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hendc\OneDrive\Desktop\Laravel_project\resources\views/admin/chefs/edit.blade.php ENDPATH**/ ?>