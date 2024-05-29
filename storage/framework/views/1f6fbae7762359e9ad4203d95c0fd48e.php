<!DOCTYPE html>
<html lang="en">
    <head>
        <?php echo $__env->make('home.links', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </head>
    <body>
        <?php echo $__env->make('home.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Товари</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Головна</a></li>
                <li class="breadcrumb-item active text-white">Товари</li>
            </ol>
        </div>
        <!-- Single Page Header End -->

        <?php if(session()->has('message')): ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            <?php echo e(session()->get('message')); ?>

        </div>
        <?php endif; ?>

        <!-- Fruits Shop Start-->
        <div class="container-fluid fruite py-5">
            <div class="container py-5">
                <h1 class="mb-4">Цифровi товари на будь-який вибiр</h1>
                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="row g-4">
                            <div class="col-lg-3">
                                <div class="row g-4">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <h4>Категорії</h4>
                                            <ul class="list-unstyled fruite-categorie">
                                                <li>
                                                    <div class="d-flex justify-content-between fruite-name">
                                                        <a href="<?php echo e(url('products')); ?>"><i class='far fa-folder'></i> Всi</a>
                                                    </div>
                                                </li>
                                                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorys): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <div class="d-flex justify-content-between fruite-name">
                                                        <a href="<?php echo e(url('product_category', $categorys->category_name)); ?>"><i class='far fa-folder'></i> <?php echo e($categorys->category_name); ?></a>
                                                    </div>
                                                </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="row g-4 justify-content-center">
                                    <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-6 col-lg-6 col-xl-4">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <a href="<?php echo e(url('product_details', $products->id)); ?>"><img src="/product/<?php echo e($products->image); ?>" class="img-fluid w-100 rounded-top" alt="" style="height: 250px; width: 250px;"></a>
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;"><?php echo e($products->category); ?></div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <a href="<?php echo e(url('product_details', $products->id)); ?>"><h4><?php echo e($products->product_name); ?></h4></a>
                                                <p><?php echo e($products->description); ?></p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <?php if($products->discount_price == NULL): ?>
                                                        <p class="text-dark fs-5 fw-bold mb-0"><?php echo e($products->price); ?> грн</p> 
                                                    <?php else: ?>
                                                        <p class="text-dark fs-5 fw-bold mb-0"><span style="text-decoration: line-through;"><?php echo e($products->price); ?> грн</span> /<span style="color: red;"> (<?php echo e($products->discount_price); ?> грн)</span></p>
                                                    <?php endif; ?>
                                                    <form method="POST" action="<?php echo e(url('add_cart', $products->id)); ?>">
                                                        <?php echo csrf_field(); ?>
                                                        <button class="btn border border-secondary rounded-pill px-3 text-primary" type="submit"><i class="fa fa-shopping-bag me-2 text-primary"></i> Додати в кошик</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center mt-4">
                                            <?php echo e($product->links()); ?>

                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fruits Shop End-->

        <?php echo $__env->make('home.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Back to Top -->
        <a href="<?php echo e(url('product')); ?>" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   

        <?php echo $__env->make('home.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </body>
</html><?php /**PATH D:\labs\Павленко Владислав\Mediaplex\resources\views/home/products.blade.php ENDPATH**/ ?>