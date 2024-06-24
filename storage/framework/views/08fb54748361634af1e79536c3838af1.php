<?php $__env->startSection('content'); ?>
<div class="content">
    <div class="breadcrumb-wrapper breadcrumb-contacts">
        <div>
            <h1>Landing Page List</h1>
            <p class="breadcrumbs"><span><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>Landing Page
            </p>
        </div>
        <div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#addBanner"> Add Landing Page
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="ec-vendor-list card card-default">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="responsive-data-table" class="table">
                            <thead>
                                <tr>
                                    <th>Link</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>https://cottonbd.nitebiz.com/black/dress</td>
                                </tr>
                                <tr>
                                    <td>https://cottonbd.nitebiz.com/black/dress</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\all project\cottonbd\resources\views/backend/landingpage.blade.php ENDPATH**/ ?>