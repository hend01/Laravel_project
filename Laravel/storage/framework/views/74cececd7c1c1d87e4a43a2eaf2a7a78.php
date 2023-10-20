


<?php $__env->startSection('content'); ?>

<div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
                    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Agences de location</li>
                        </ol>
                    </nav>
                    <!-- END: Breadcrumb -->
                    <!-- BEGIN: Search -->
                 
                    <!-- END: Search -->
                    <!-- BEGIN: Notifications -->
                    <div class="intro-x dropdown mr-auto sm:mr-6">
                        <div class="dropdown-toggle notification notification--bullet cursor-pointer" role="button" aria-expanded="false" data-tw-toggle="dropdown"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="bell" data-lucide="bell" class="lucide lucide-bell notification__icon dark:text-slate-500"><path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 01-3.46 0"></path></svg> </div>
                      
                    </div>
                    <!-- END: Notifications -->
                    <!-- BEGIN: Account Menu -->
                 
                    <!-- END: Account Menu -->
                </div>
                <!-- END: Top Bar -->
                <h2 class="intro-y text-lg font-medium mt-10" style="background-color:#1e40af;color:white;border-radius: 8px;">
                   <span style="margin-left: 11px;">  Liste des agences </span>
                </h2>
                <div class="grid grid-cols-12 gap-6 mt-5">
                   
                    <!-- BEGIN: Data List -->
                    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                  
                    <?php if(session('success')): ?>
<div class="alert alert-success">
    <?php echo e(session('success')); ?>

</div>
<?php endif; ?>

<?php if($errors->any()): ?>
<div class="alert alert-danger">
    <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
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
    <button class="btn btn-danger" onclick="deleteChef(<?php echo e($agence->id); ?>)">Delete</button>
</td>

<script>
    function deleteChef(agenceId) {
        if (confirm("Are you sure you want to delete this agence?")) {
            // If the user confirms, submit the delete form
            document.getElementById('delete-agence-form-' + agenceId).submit();
        }
    }
</script>

<form id="delete-agence-form-<?php echo e($agence->id); ?>" action="<?php echo e(route('agences.destroy', $agence)); ?>" method="POST" style="display: none;">
    <?php echo csrf_field(); ?>
    <?php echo method_field('DELETE'); ?>
</form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
                                </div>
                            
                        </div>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hendc\OneDrive\Desktop\Laravel_project\resources\views/admin/agences/index.blade.php ENDPATH**/ ?>