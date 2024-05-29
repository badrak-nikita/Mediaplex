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
            <h1 class="text-center text-white display-6">Профiль</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Головна</a></li>
                <li class="breadcrumb-item active text-white">Профiль</li>
            </ol>
        </div>
        <!-- Single Page Header End -->
        
        <!-- Contact Start -->
        <div class="container-fluid contact py-5"> 
            <div class="container py-5"> 
                <div class="p-5 bg-light rounded">              
                    <div class="row g-4">                       
                        <div class="col-lg-7">
                            <h1>Придбанi товари</h1>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        @foreach($chackout as $chackout)
                                        <tr>
                                            <th scope="row">
                                                <div class="d-flex align-items-center">
                                                    <img src="/product/{{$chackout->image}}" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                                                </div>
                                            </th>
                                            <td>
                                                <p class="mb-0 mt-4">{{$chackout->product_name}}</p>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <h1>Данi користувача</h1>
                            <div class="d-flex p-4 rounded mb-4 bg-white">
                                <i class="fas fa-user fa-2x text-primary me-4"></i>
                                <div>
                                    <h4>Iм'я</h4>
                                    <p class="mb-2">{{$user->name}}</p>
                                </div>
                            </div>
                            <div class="d-flex p-4 rounded mb-4 bg-white">
                                <i class="fas fa-envelope fa-2x text-primary me-4"></i>
                                <div>
                                    <h4>Ел.Пошта</h4>
                                    <p class="mb-2">{{$user->email}}</p>
                                </div>
                            </div>
                            <div class="d-flex p-4 rounded bg-white">
                                <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
                                <div>
                                    <h4>Телефон</h4>
                                    <p class="mb-2">{{$user->phone}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->

        @include('home.footer')

        <!-- Back to Top -->
        <a href="{{url('profile')}}" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   

        @include('home.script')
    </body>
</html>