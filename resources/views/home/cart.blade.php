<!DOCTYPE html>
<html lang="en">
    <head>
        @include('home.links')
    </head>
    <body>
        @include('home.header')

        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Кошик</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Головна</a></li>
                <li class="breadcrumb-item"><a href="{{url('products')}}">Товари</a></li>
                <li class="breadcrumb-item active text-white">Кошик</li>
            </ol>
        </div>
        <!-- Single Page Header End -->

        @if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}}
        </div>
        @endif

        <!-- Cart Page Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Товар</th>
                            <th scope="col">Назва товару</th>
                            <th scope="col">Цiна</th>
                            <th scope="col">Дiя</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php $totalprice = 0; ?>
                            @foreach($cart as $cart)
                            <tr>
                                <th scope="row">
                                    <div class="d-flex align-items-center">
                                        <img src="/product/{{$cart->image}}" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                                    </div>
                                </th>
                                <td>
                                    <p class="mb-0 mt-4">{{$cart->product_name}}</p>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">{{$cart->price}} грн</p>
                                </td>
                                <td>
                                    <a class="btn btn-md rounded-circle bg-light border mt-4" href="{{url('delete_cart', $cart->id)}}">
                                        <i class="fa fa-times text-danger"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php $totalprice = $totalprice + $cart->price ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row g-4 justify-content-end">
                    <div class="col-8"></div>
                    <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                        <div class="bg-light rounded">
                            <div class="p-4">
                                <h1 class="display-6 mb-4">До сплати</h1>
                                <div class="d-flex justify-content-between mb-4">
                                    <h5 class="mb-0 me-4">Всього:</h5>
                                    <p class="mb-0">{{$totalprice}} грн</p>
                                </div>
                            </div>
                            <a class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" href="{{url('chackout')}}">Оформити замовлення</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cart Page End -->

        @include('home.footer')

        <!-- Back to Top -->
        <a href="{{url('cart')}}" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   

        @include('home.script')
    </body>
</html>