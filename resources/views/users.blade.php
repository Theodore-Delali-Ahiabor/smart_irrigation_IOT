<x-dashboard.layout>
    {{-- Page content --}}
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row justify-content-between">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">{{ucfirst(request()->path())}}</h3>
                </div>
                <div class="content-header-right col-md-4 col-12 mb-2 d-flex justify-content-end">
                    <button type="button" class="btn btn-info btn-min-width mr-1 mb-1"><i class="la la-user"></i> New User</button>
                </div>
            </div>
            <div class="content-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card ecom-card-1 bg-white overflow-hidden">
                            <div class="card-content ecom-card2 height-180">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">First Name</th>
                                                <th scope="col">Last Name</th>
                                                <th scope="col">Username</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td>@fat</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>@twitter</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- / Page content --}}
</x-dashboard.layout>
