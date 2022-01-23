import AllBug from './components/bugs/AllBug.vue';

import AllUser from './components/users/AllUser.vue';
import CreateUser from './components/users/CreateUser.vue';
import EditUser from './components/users/EditUser.vue';

export const routes = [
    {
        name: 'home',
        path: '/restrito/',
        component: AllBug
    },
    {
        name: 'home-bug',
        path: '/restrito/home',
        component: AllBug
    },
    {
        name: 'users',
        path: '/restrito/users',
        component: AllUser
    },
    {
        name: 'create.users',
        path: '/restrito/users/create',
        component: CreateUser
    },
    {
        name: 'edit.users',
        path: '/restrito/users/edit/:id',
        component: EditUser
    }
];
