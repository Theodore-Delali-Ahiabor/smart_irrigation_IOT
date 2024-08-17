<script setup>
    import Nav from './Shared/Nav.vue';
    import Footer from './Shared/Footer.vue';
    import Sidebar from './Shared/Sidebar.vue';

    import {ref} from 'vue';
    import { router, useForm } from '@inertiajs/vue3';

    const addUserForm = useForm({
        first_name: null,
        other_name: null,
        last_name: null,
        email: null,
        password: null,
        confirmPassword: null,
    })


    const manageUserSubmit = () => {
        addUserForm.post('/user-manage', {
            onSuccess: (page) => {
                if(page.props.type == 'success'){
                    $('.modal-backdrop').remove();
                    router.get('/users');
                }
                fireSimpleSWAL(page.props.type, page.props.message);
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

    const toggleStatus = (id, status) => {
        //alert(id)
        const toggleForm = useForm({
            'id' : id,
            'status' : status
        }).post('/user-toggle-status', {
            onSuccess: (page) => {
                router.get('/users')
                fireSimpleSWAL(page.props.type, page.props.message);
            },
            onError: (errors) => {
                for (let key in errors) {
                    if (errors.hasOwnProperty(key)) {
                        fireSimpleSWAL('warning', errors[key])
                    }
                    break;
                }
            },
        })
    }

    // the props to receive data from Inertia
    const props = defineProps({
        users: Object,
        page: String
    });
    // Access the data from inertia
    const users = props.users;
    let page = props.page;

</script>

<template>
    <Nav></Nav>
    <Sidebar></Sidebar>
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row justify-content-between">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title" id="page">{{ page }}</h3>
                </div>
                <div class="content-header-right col-md-4 col-12 mb-2 d-flex justify-content-end">
                    <button type="button" class="btn btn-info btn-min-width mr-1 mb-1" data-toggle="modal" data-target="#manageUserModal"><i class="la la-user"></i> New User</button>
                </div>
            </div>
            <div class="content-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card ecom-card-1 bg-white overflow-hidden">
                            <div class="card-content ecom-card2 min-height-180">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Active</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(row, index) in users">
                                                <th scope="row">{{ index + 1 }}</th>
                                                <td>{{row.first_name + ' ' + ((row.other_name == null || row.other_name == '') ? '' : row.other_name + ' ') + row.last_name}}</td>
                                                <td>{{row.email}}</td>
                                                <td>
                                                    <i class="la font-large-2" :class="{'la-toggle-on text-success' : row.active == 1,'la-toggle-off text-danger' : row.active == 0 }" @click="toggleStatus(row.id, row.active)"></i>
                                                </td>
                                                <td>
                                                    <i class="ft-edit text-success mr-1 font-large-1"></i>
                                                    <i class="ft-user text-info font-large-1"></i>
                                                </td>
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

    <div class="modal fade" id="manageUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form class="card-body" @submit.prevent="manageUserSubmit">
                <h5 class="mt-2">First Name</h5>
                <fieldset class="form-group">
                    <input type="text" class="form-control" v-model="addUserForm.first_name">
                </fieldset>

                <h5 class="mt-2">Other Name(s)</h5>
                <fieldset class="form-group">
                    <input type="text" class="form-control" v-model="addUserForm.other_name">
                </fieldset>

                <h5 class="mt-2">Last Name</h5>
                <fieldset class="form-group">
                    <input type="text" class="form-control" v-model="addUserForm.last_name">
                </fieldset>

                <h5 class="mt-2">Email Address</h5>
                <fieldset class="form-group">
                    <input type="email" class="form-control" v-model="addUserForm.email">
                </fieldset>

                <h5 class="mt-2">Password</h5>
                <fieldset class="form-group">
                    <input type="password" class="form-control" v-model="addUserForm.password">
                </fieldset>

                <h5 class="mt-2">Confirm Password</h5>
                <fieldset class="form-group">
                    <input type="password" class="form-control" v-model="addUserForm.confirmPassword">
                </fieldset>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>
    <Footer></Footer>
</template>
