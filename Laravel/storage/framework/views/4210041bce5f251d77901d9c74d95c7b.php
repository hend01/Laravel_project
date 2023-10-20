


<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="top-bar">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Ajouter</li>
                </ol>
            </nav>
            <!-- Search and Notifications can go here if needed -->
        </div>
        <h2 class="intro-y text-lg font-medium mt-10" style="background-color: #1e40af; color: white; border-radius: 8px;">
            <span style="margin-left: 11px;"> Ajouter une agence </span>
        </h2>
        <div class="grid grid-cols gap-6 mt-5">
            <div class="intro-y col-span-12 lg:col-span-6">
                <!-- Chef Form -->
                <div class="intro-y box">
                    <div class="p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                        <h2 class="font-medium text-base mr-auto">
                            Ajouter une agence
                        </h2>
                    </div>
                    <div class="p-5">
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

        <div class="form-group">
    <label for="phone_number">Phone Number:</label>
    <input type="text" name="phone_number" id="phone_number" class="form-control" value="<?php echo e(old('phone_number')); ?>" oninput="validatePhoneNumber(this)" required>
</div>


        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control"><?php echo e(old('description')); ?></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
    <script>
    // Get the phone number input element
    const phoneNumberInput = document.getElementById('phone_number');

    // Add an event listener to the input for the blur event
    phoneNumberInput.addEventListener('blur', function() {
        const phoneNumber = this.value.replace(/\D/g, ''); // Remove non-numeric characters
        if (phoneNumber.length !== 8) {
            alert('Phone Number must be exactly 8 digits.');
        }
    });
</script>



                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hendc\OneDrive\Desktop\Laravel_project\resources\views/admin/agences/create.blade.php ENDPATH**/ ?>