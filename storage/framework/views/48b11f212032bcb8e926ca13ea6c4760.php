<!DOCTYPE html>
<html lang="en">
    <head>
        <?php echo $__env->make('home.links', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </head>
    <body>
        <?php echo $__env->make('home.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Замовлення</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Головна</a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(url('products')); ?>">Товари</a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(url('cart')); ?>">Кошик</a></li>
                <li class="breadcrumb-item active text-white">Замовлення</li>
            </ol>
        </div>
        <!-- Single Page Header End -->

        <!-- Checkout Page Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <h1 class="mb-4">Деталi замовлення</h1>
                <form action="#">
                    <div class="row g-5">
                        <div class="col-md-12 col-lg-6 col-xl-7">
                            <div class="row">
                                <div class="col-md-12 col-lg-6">
                                    <div class="form-item w-100">
                                        <label class="form-label my-3">Iм'я <sup>*</sup></label>
                                        <input type="text" class="form-control" value="<?php echo e($user->name); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Ел.Пошта <sup>*</sup></label>
                                <input type="email" class="form-control" value="<?php echo e($user->email); ?>">
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Телефон <sup>*</sup></label>
                                <input type="tel" class="form-control" value="<?php echo e($user->phone); ?>">
                            </div> 
                        </div>
                        <div class="col-md-12 col-lg-6 col-xl-5">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Товар</th>
                                            <th scope="col">Назва товару</th>
                                            <th scope="col">Цiна</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $totalprice = 0; ?>
                                        <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th scope="row">
                                                <div class="d-flex align-items-center mt-2">
                                                    <img src="/product/<?php echo e($cart->image); ?>" class="img-fluid rounded-circle" style="width: 90px; height: 90px;" alt="">
                                                </div>
                                            </th>
                                            <td class="py-5"><?php echo e($cart->product_name); ?></td>
                                            <td class="py-5"><?php echo e($cart->price); ?> грн</td>
                                        </tr>
                                        <?php $totalprice = $totalprice + $cart->price ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th></th>
                                            <td></td>
                                            <td><?php echo e($totalprice); ?> грн</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>                  
                            <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                                <a type="button" class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary" href="<?php echo e(url('order')); ?>">Пiдтвердити замовлення</a>
                            </div>
                            <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                                <a type="button" class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary" href="<?php echo e(url('stripe', $totalprice)); ?>">Оплатити карткою</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Checkout Page End -->

        <?php echo $__env->make('home.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Back to Top -->
        <a href="<?php echo e(url('chackout')); ?>" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   

        <?php echo $__env->make('home.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </body>
</html><?php /**PATH D:\labs\Павленко Владислав\Mediaplex\resources\views/home/chackout.blade.php ENDPATH**/ ?>