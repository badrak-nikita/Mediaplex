<!DOCTYPE html>
<html lang="en">
    <head>
        @include('home.links')
    </head>
    <body>
        @include('home.header')

        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Товари</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Головна</a></li>
                <li class="breadcrumb-item active text-white">Товари</li>
            </ol>
        </div>
        <!-- Single Page Header End -->

        @if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}}
        </div>
        @endif

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
                                                        <a href="{{url('products')}}"><i class='far fa-folder'></i> Всi</a>
                                                    </div>
                                                </li>
                                                @foreach($category as $categorys)
                                                <li>
                                                    <div class="d-flex justify-content-between fruite-name">
                                                        <a href="{{url('product_category', $categorys->category_name)}}"><i class='far fa-folder'></i> {{$categorys->category_name}}</a>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="row g-4 justify-content-center">
                                    @foreach($product as $products)
                                    <div class="col-md-6 col-lg-6 col-xl-4">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <a href="{{url('product_details', $products->id)}}"><img src="/product/{{$products->image}}" class="img-fluid w-100 rounded-top" alt="" style="height: 250px; width: 250px;"></a>
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">{{$products->category}}</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <a href="{{url('product_details', $products->id)}}"><h4>{{$products->product_name}}</h4></a>
                                                <p>{{$products->description}}</p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    @if($products->discount_price == NULL)
                                                        <p class="text-dark fs-5 fw-bold mb-0">{{$products->price}} грн</p> 
                                                    @else
                                                        <p class="text-dark fs-5 fw-bold mb-0"><span style="text-decoration: line-through;">{{$products->price}} грн</span> /<span style="color: red;"> ({{$products->discount_price}} грн)</span></p>
                                                    @endif
                                                    <form method="POST" action="{{url('add_cart', $products->id)}}">
                                                        @csrf
                                                        <button class="btn border border-secondary rounded-pill px-3 text-primary" type="submit"><i class="fa fa-shopping-bag me-2 text-primary"></i> Додати в кошик</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="col-12">
                                        <div class="d-flex justify-content-center mt-4">
                                            {{ $product->links() }}
                                        </div>
                                        {{-- <div class="pagination d-flex justify-content-center mt-5">
                                            <a href="#" class="rounded">&laquo;</a>
                                            <a href="#" class="active rounded">1</a>
                                            <a href="#" class="rounded">2</a>
                                            <a href="#" class="rounded">3</a>
                                            <a href="#" class="rounded">4</a>
                                            <a href="#" class="rounded">5</a>
                                            <a href="#" class="rounded">6</a>
                                            <a href="#" class="rounded">&raquo;</a>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fruits Shop End-->

        @include('home.footer')

        <!-- Back to Top -->
        <a href="{{url('product')}}" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   

        @include('home.script')
    </body>
</html>