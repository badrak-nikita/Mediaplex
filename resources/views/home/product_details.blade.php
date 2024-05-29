<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="/public">
        @include('home.links')
    </head>
    <body>
        @include('home.header')

        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Деталi</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Головна</a></li>
                <li class="breadcrumb-item"><a href="{{url('products')}}">Продукти</a></li>
                <li class="breadcrumb-item active text-white">Деталi</li>
            </ol>
        </div>
        <!-- Single Page Header End -->

        @if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}}
        </div>
        @endif

        <!-- Single Product Start -->
        <div class="container-fluid py-5 mt-5">
            <div class="container py-5">
                <div class="row g-4 mb-5">
                    <div class="col-lg-8 col-xl-9">
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="border rounded">
                                    <a href="#">
                                        <img src="/product/{{$product->image}}" class="img-fluid rounded" alt="Image" style="height: 400px; width: 500px;">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <h4 class="fw-bold mb-3">{{$product->product_name}}</h4>
                                <p class="mb-3">Категорiя: <b>{{$product->category}}</b></p>
                                <h5 class="fw-bold mb-3">{{$product->price}} грн</h5>
                                <p class="mb-4">{{$product->description}}</p>
                                <form method="POST" action="{{url('add_cart', $product->id)}}">
                                    @csrf
                                    <button class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary" type="submit"><i class="fa fa-shopping-bag me-2 text-primary"></i> Додати в кошик</button>
                                </form>
                            </div>
                            <div class="col-lg-12">
                                <nav>
                                    <div class="nav nav-tabs mb-3">
                                        <button class="nav-link active border-white border-bottom-0" type="button" role="tab"
                                            id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about"
                                            aria-controls="nav-about" aria-selected="true">Опис</button>
                                    </div>
                                </nav>
                                <div class="tab-content mb-5">
                                    <div class="tab-pane active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                        <p>{{$product->description}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Single Product End -->

        @include('home.footer')

        <!-- Back to Top -->
        <a href="{{url('product_details')}}" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   

        @include('home.script')
    </body>
</html>