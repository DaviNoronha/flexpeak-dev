import AllBug from './components/bugs/AllBug.vue';
import CreateBug from './components/bugs/CreateBug.vue';
//import ShowBug from './components/bugs/AllBug.vue';

import AllUser from './components/users/AllUser.vue';
import CreateUser from './components/users/CreateUser.vue';
import EditUser from './components/users/EditUser.vue';

export const routes = [
    {
        name: 'home',
        path: '/',
        component: AllBug
    },
    {
        name: 'create.bugs',
        path: '/bugs/create',
        component: CreateBug
    },
    /*{
        name: 'show.bugs',
        path: '/bugs/1',
        component: ShowBug
    },*/
    {
        name: 'users',
        path: '/users',
        component: AllUser
    },
    {
        name: 'create.users',
        path: '/users/create',
        component: CreateUser
    },
    {
        name: 'edit.users',
        path: '/users/edit/:id',
        component: EditUser
    }
];
