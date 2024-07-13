<x-website.layout>
    <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="col-lg-4 col-md-6 col-sm-12 ">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">User Login</h4>
                </div>
                <div class="card-block">
                    <form class="card-body">
                        @csrf
                        <h5 class="mt-2">Email Address</h5>
                        <fieldset class="form-group">
                            <input type="email" class="form-control">
                        </fieldset>

                        <h5 class="mt-2">Password</h5>
                        <fieldset class="form-group">
                            <input type="password" class="form-control">
                        </fieldset>

                        <a href="" class="d-block text-right">Forgot password ?</a>

                        <button type="submit" class="d-block btn btn-primary w-100 my-2">Login</button>
                    </form>
                </div>
            </div>
        </div>
</div>
</x-website.layout>