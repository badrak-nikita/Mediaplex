<!DOCTYPE html>
<html lang="en">
    <head>
        @include('home.links')
    </head>
    <body>
        @include('home.header')

        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Пiдписки</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Головна</a></li>
                <li class="breadcrumb-item active text-white">Пiдписки</li>
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
                <h1 class="mb-4">Пiдписки на будь-якi категорії</h1>
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
                                                        <a href="{{url('pass')}}"><i class='far fa-folder'></i> Всi</a>
                                                    </div>
                                                </li>
                                                @foreach($category as $categorys)
                                                <li>
                                                    <div class="d-flex justify-content-between fruite-name">
                                                        <a href="{{url('pass_category', $categorys->category_name)}}"><i class='far fa-folder'></i> {{$categorys->category_name}}</a>
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
                                    @foreach($pass as $passes)
                                    <div class="col-md-6 col-lg-6 col-xl-4">
                                        <div class="rounded position-relative fruite-item">
                                            @if($passes->type == 'Basic')
                                            <div class="fruite-img">
                                                <a href="{{url('pass_details', $passes->id)}}"><img src="/Home/img/green.png" class="img-fluid w-100 rounded-top" alt="" style="height: 250px; width: 250px;"></a>
                                            </div>
                                            @elseif($passes->type == 'Normal')
                                            <div class="fruite-img">
                                                <a href="{{url('pass_details', $passes->id)}}"><img src="/Home/img/blue.png" class="img-fluid w-100 rounded-top" alt="" style="height: 250px; width: 250px;"></a>
                                            </div>
                                            @else
                                            <div class="fruite-img">
                                                <a href="{{url('pass_details', $passes->id)}}"><img src="/Home/img/purple.png" class="img-fluid w-100 rounded-top" alt="" style="height: 250px; width: 250px;"></a>
                                            </div>
                                            @endif
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">{{$passes->category}}</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <a href="{{url('pass_details', $passes->id)}}"><h4>{{$passes->pass_name}}</h4></a>
                                                <p>{{$passes->type}}</p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-0">{{$passes->price}} грн / {{$passes->duration}} днiв</p> 
                                                    <form method="POST" action="{{url('add_cart_pass', $passes->id)}}">
                                                        @csrf
                                                        <button class="btn border border-secondary rounded-pill px-3 text-primary" type="submit"><i class="fa fa-shopping-bag me-2 text-primary"></i> Додати в кошик</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
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
        <a href="{{url('pass')}}" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   

        @include('home.script')
    </body>
</html>