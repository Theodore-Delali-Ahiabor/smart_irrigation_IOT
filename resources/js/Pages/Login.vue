<script setup>
    import { router, useForm } from '@inertiajs/vue3';

    const form = useForm({
        email: null,
        password: null,
    })

    const loginSubmit = () => {
        form.post('/login', {
            onSuccess: (page) => {
                fireSimpleSWAL(page.props.type, page.props.message)
                router.get('/dashboard');
            },
            onError: (errors) => {
                for (let key in errors) {
                    if (errors.hasOwnProperty(key)) {
                        fireSimpleSWAL('warning', errors[key])
                    }
                    break;
                }
            },
        });
    }
</script>
<template>
    <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="col-lg-4 col-md-6 col-sm-12 ">
            <div class="card">
                <div class="card-header text-center">
                    <img class="brand-logo " alt="Chameleon admin logo" src="theme-assets/images/logo/logo.png" width="50" >
                    <h4 class="card-title">User Login</h4>
                </div>
                <div class="card-block">
                    <form class="card-body" @submit.prevent="loginSubmit">
                        <h5 class="mt-2">Email Address</h5>
                        <fieldset class="form-group">
                            <input type="email" class="form-control" v-model="form.email">
                        </fieldset>

                        <h5 class="mt-2">Password</h5>
                        <fieldset class="form-group">
                            <input type="password" class="form-control" v-model="form.password">
                        </fieldset>

                        <a href="" class="d-block text-right">Forgot password ?</a>

                        <button type="submit" class="d-block btn btn-primary w-100 my-2">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
