import AllBug from './components/bugs/AllBug.vue';
import AllUser from './components/users/AllUser.vue';
import CreateUser from './components/users/CreateUser.vue';
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
        path: '/create',
        component: CreateUser
    }
];
