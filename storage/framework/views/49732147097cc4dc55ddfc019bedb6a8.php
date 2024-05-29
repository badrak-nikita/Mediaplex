<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="/public">
        <?php echo $__env->make('home.links', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </head>
    <body>
        <?php echo $__env->make('home.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Деталi</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Головна</a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(url('pass')); ?>">Пiдписки</a></li>
                <li class="breadcrumb-item active text-white">Деталi</li>
            </ol>
        </div>
        <!-- Single Page Header End -->

        <?php if(session()->has('message')): ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            <?php echo e(session()->get('message')); ?>

        </div>
        <?php endif; ?>

        <!-- Single Product Start -->
        <div class="container-fluid py-5 mt-5">
            <div class="container py-5">
                <div class="row g-4 mb-5">
                    <div class="col-lg-8 col-xl-9">
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="border rounded">
                                    <?php if($pass->type == 'Basic'): ?>
                                    <a href="#">
                                        <img src="/Home/img/green.png" class="img-fluid rounded" alt="Image" style="height: 400px; width: 500px;">
                                    </a>
                                    <?php elseif($pass->type == 'Normal'): ?>
                                    <a href="#">
                                        <img src="/Home/img/blue.png" class="img-fluid rounded" alt="Image" style="height: 400px; width: 500px;">
                                    </a>
                                    <?php else: ?>
                                    <a href="#">
                                        <img src="/Home/img/purple.png" class="img-fluid rounded" alt="Image" style="height: 400px; width: 500px;">
                                    </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <h4 class="fw-bold mb-3"><?php echo e($pass->pass_name); ?></h4>
                                <p class="mb-3">Категорiя: <b><?php echo e($pass->category); ?></b></p>
                                <h5 class="fw-bold mb-3"><?php echo e($pass->price); ?> грн</h5>
                                <p class="mb-4"><?php echo e($pass->type); ?></p>
                                <p class="mb-4"><?php echo e($pass->duration); ?> днiв</p>
                                <form method="POST" action="<?php echo e(url('add_cart_pass', $pass->id)); ?>">
                                    <?php echo csrf_field(); ?>
                                    <button class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary" type="submit"><i class="fa fa-shopping-bag me-2 text-primary"></i> Додати в кошик</button>
                                </form>
                            </div>
                            <div class="col-lg-12">
                                <nav>
                                    <div class="nav nav-tabs mb-3">
                                        <button class="nav-link active border-white border-bottom-0" type="button" role="tab"
                                            id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about"
                                            aria-controls="nav-about" aria-selected="true">Тип пiдписки</button>
                                    </div>
                                </nav>
                                <div class="tab-content mb-5">
                                    <div class="tab-pane active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                        <p><?php echo e($pass->type); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Single Product End -->

        <?php echo $__env->make('home.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Back to Top -->
        <a href="<?php echo e(url('pass_details')); ?>" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   

        <?php echo $__env->make('home.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </body>
</html><?php /**PATH D:\labs\Павленко Владислав\Mediaplex\resources\views/home/pass_details.blade.php ENDPATH**/ ?>