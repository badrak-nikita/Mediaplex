<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.links')
</head>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        @include('admin.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                @include('admin.header')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{session()->get('message')}}
                    </div>
                    @endif

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Замовлення</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Покупець</th>
                                            <th>Ел.Пошта</th>
                                            <th>Назва</th>
                                            <th>Цiна</th>
                                            <th>Статус замовлення</th>
                                            <th>Статус оплати</th>
                                            <th>Товар</th>
                                            <th>Дiя</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($chackout as $chackout)
                                        <tr>
                                            <td>{{$chackout->id}}</td>
                                            <td>{{$chackout->name}}</td>
                                            <td>{{$chackout->email}}</td>
                                            <td>{{$chackout->product_name}}</td>
                                            <td>{{$chackout->price}}</td>
                                            <td>{{$chackout->delivery_status}}</td>
                                            <td>{{$chackout->payment_status}}</td>
                                            <td>
                                                <img src="/product/{{$chackout->image}}" style="width: 50px; height: 50px;">
                                            </td>
                                            <td>
                                                @if($chackout->delivery_status == 'В процесi')
                                                <a class="btn btn-primary" href="{{url('delivered', $chackout->id)}}">Доставлено</a>
                                                @else
                                                <a class="btn btn-secondary" disabled>Доставлено</a>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            @include('admin.footer')

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    @include('admin.script')
</body>
</html>