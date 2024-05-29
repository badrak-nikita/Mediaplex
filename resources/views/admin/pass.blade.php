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
                        <h1 class="h3 mb-0 text-gray-800">Пiдписки</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="{{url('add_pass')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Додати пiдписку</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Назва пiдписки</th>
                                            <th>Категорiя</th>
                                            <th>Цiна</th>
                                            <th>Тривалiсть (днiв)</th>
                                            <th>Тип</th>
                                            <th>Дiя</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pass as $pass)
                                        <tr>
                                            <td>{{$pass->id}}</td>
                                            <td>{{$pass->pass_name}}</td>
                                            <td>{{$pass->category}}</td>
                                            <td>{{$pass->price}} грн.</td>
                                            <td>{{$pass->duration}}</td>
                                            <td>{{$pass->type}}</td>
                                            <td>
                                                <a onclick="return confirm('Ви впевненi?')" class="btn btn-danger" href="{{url('delete_pass', $pass->id)}}">Видалити</a>
                                                <a class="btn btn-warning" href="{{url('update_pass', $pass->id)}}">Редагувати</a>
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