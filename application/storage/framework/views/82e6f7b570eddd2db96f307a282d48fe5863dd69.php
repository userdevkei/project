<?php $__env->startSection('content'); ?>
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-0">
                <div class="flex-grow-0">
                    <h5 class="h5 fw-bold mb-0">
                        Update Application Status
                    </h5>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="javascript:void(0)">Application</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Status
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="block block-rounded">
            <div class="block-content block-content-full">
                <div class="row">
                    <div class="col-lg-6 mb-1">
                        <div class="row p-1">
                        <div class="col-md-4 fw-bolder text-start">Applicant Name </div>
                        <div class="col-md-8"> <?php echo e($app->applicant->sname); ?> <?php echo e($app->applicant->fname); ?> <?php echo e($app->applicant->mname); ?></div>
                        </div>
                        <div class="row p-1">
                            <div class="col-md-4 fw-bolder text-start">Department</div>
                            <div class="col-md-8"> <?php echo e($app->courses->department_id); ?> </div>
                        </div>
                        <div class="row p-1">
                            <div class="col-md-4 fw-bolder text-start">Course Name</div>
                            <div class="col-md-8"> <?php echo e($app->courses->course_name); ?> </div>
                        </div>
                        <div class="row p-1">
                            <div class="col-md-4 fw-bolder text-start">Institution</div>
                            <div class="col-md-8"> <?php echo e($school->institution); ?> </div>
                        </div>
                        <div class="row p-1">
                            <div class="col-md-4 fw-bolder text-start">KCSE Grade</div>
                            <div class="col-md-8"> <?php echo e($school->qualification); ?> </div>
                        </div>
                        <div class="row p-1">
                            <div class="col-md-4 fw-bolder text-start">Cluster Subjects</div>
                            <div class="col-md-8">
                               <p> ENGLISH <?php echo e($app->subject_1); ?></p>
                                <p> MATHEMATICS <?php echo e($app->subject_2); ?></p>
                                <p> BUSINESS <?php echo e($app->subject_3); ?></p>
                                <p> HISTORY <?php echo e($app->subject_4); ?></p>
                            </div>
                        </div>
                        <div class="row p-1">
                            <div class="col-md-4 fw-bolder text-start">Dean Status</div>
                            <div class="col-md-8">

                                <?php if($app->dean_status === 1): ?>
                                    <span class="badge bg-success">Approved by Dean</span>
                                <?php elseif($app->dean_status === 2): ?>
                                    <span class="badge bg-danger">Rejected by Dean</span>
                                <?php elseif($app->dean_status === 3): ?>
                                    <span class="badge bg-primary">Awaiting COD review</span>
                                <?php else: ?>
                                    <span class="badge bg-info">Awaiting Dean review</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 space-y-2">
                        <div class="d-flex justify-content-center">
                            <div class="card-img" style="margin: auto !important;">
                                <img style="margin: auto !important; max-height: 80vh !important; width: 100% !important;" src="<?php echo e(url('certs/', $school->certificate)); ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div class="d-flex justify-content-center py-1">

            <?php if($app->dean_status === 3): ?>
                <a class="btn btn-sm btn-alt-success m-2" data-toggle="click-ripple" href="<?php echo e(route('dean.acceptApplication', $app->id)); ?>">Approve</a>
                <a class="btn btn-sm btn-alt-danger m-2" href="#" data-bs-toggle="modal" data-bs-target="#modal-block-popin"> Reject</a>
                <a class="btn btn-sm btn-alt-secondary m-2" data-toggle="click-ripple" href="<?php echo e(route('dean.applications')); ?>">Close</a>
            <?php elseif($app->dean_status === 4): ?>
                    <a class="btn btn-sm btn-alt-success m-2" data-toggle="click-ripple" href="<?php echo e(route('dean.acceptApplication', $app->id)); ?>">Approve</a>
                    <a class="btn btn-sm btn-alt-danger m-2" href="#" data-bs-toggle="modal" data-bs-target="#modal-block-popin"> Reject</a>
                    <a class="btn btn-sm btn-alt-secondary m-2" data-toggle="click-ripple" href="<?php echo e(route('dean.applications')); ?>">Close</a>
                <?php elseif($app->dean_status === 0): ?>
                <a class="btn btn-sm btn-alt-success m-2" data-toggle="click-ripple" href="<?php echo e(route('dean.acceptApplication', $app->id)); ?>">Approve</a>
                <a class="btn btn-sm btn-alt-danger m-2" href="#" data-bs-toggle="modal" data-bs-target="#modal-block-popin"> Reject</a>
                <a class="btn btn-sm btn-alt-secondary m-2" data-toggle="click-ripple" href="<?php echo e(route('dean.applications')); ?>">Close</a>
            <?php elseif($app->dean_status === 1): ?>
                <a class="btn btn-sm btn-alt-danger m-2" href="#" data-bs-toggle="modal" data-bs-target="#modal-block-popin"> Reject</a>
                <a class="btn btn-sm btn-alt-secondary m-2" data-toggle="click-ripple" href="<?php echo e(route('dean.applications')); ?>">Close</a>
            <?php else: ?>
                <a class="btn btn-sm btn-alt-success m-2" data-toggle="click-ripple" href="<?php echo e(route('dean.acceptApplication', $app->id)); ?>">Approve</a>
                <a class="btn btn-sm btn-alt-secondary m-2" data-toggle="click-ripple" href="<?php echo e(route('dean.applications')); ?>">Close</a>
            <?php endif; ?>
        </div>
        </div>
    </div>

    <div class="modal fade" id="modal-block-popin" tabindex="-1" role="dialog" aria-labelledby="modal-block-popin" aria-hidden="true">
        <div class="modal-dialog modal-dialog-popin" role="document">
            <div class="modal-content">
                <div class="block block-rounded block-transparent mb-0">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Reason(s) </h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content fs-sm">
                        <form action="<?php echo e(route('dean.rejectApplication', $app->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="row col-md-12 mb-3">
                            <textarea class="form-control" placeholder="Write down the reasons for declining this application" name="comment" required></textarea>
                            <input type="hidden" name="<?php echo e($app->id); ?>">
                            </div>
                            <div class="d-flex justify-content-center mb-2">
                            <button type="submit" class="btn btn-alt-danger btn-sm">Reject</button>
                            </div>
                        </form>
                    </div>
                    <div class="block-content block-content-full text-end bg-body">
                        <button type="button" class="btn btn-sm btn-alt-secondary me-1" data-bs-dismiss="modal">Close</button>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('dean::layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sims\application\Modules/Dean\Resources/views/applications/viewApplication.blade.php ENDPATH**/ ?>