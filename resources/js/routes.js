import AllBug from './components/bugs/AllBug.vue';

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
