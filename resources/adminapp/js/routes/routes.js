import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const View = { template: '<router-view></router-view>' }

const routes = [
  {
    path: '/',
    component: () => import('@pages/Layout/DashboardLayout.vue'),
    redirect: '/dashboard',
    children: [
      {
        path: 'dashboard',
        name: 'dashboard',
        component: () => import('@pages/Dashboard.vue'),
        meta: { title: 'Dashboard' }
      },
      {
        path: 'user-management',
        name: 'user_management',
        component: View,
        redirect: { name: 'permissions.index' },
        children: [
          {
            path: 'permissions',
            name: 'permissions.index',
            component: () => import('@cruds/Permissions/Index.vue'),
            meta: { title: 'Permissions' }
          },
          {
            path: 'permissions/create',
            name: 'permissions.create',
            component: () => import('@cruds/Permissions/Create.vue'),
            meta: { title: 'Permissions' }
          },
          {
            path: 'permissions/:id',
            name: 'permissions.show',
            component: () => import('@cruds/Permissions/Show.vue'),
            meta: { title: 'Permissions' }
          },
          {
            path: 'permissions/:id/edit',
            name: 'permissions.edit',
            component: () => import('@cruds/Permissions/Edit.vue'),
            meta: { title: 'Permissions' }
          },
          {
            path: 'roles',
            name: 'roles.index',
            component: () => import('@cruds/Roles/Index.vue'),
            meta: { title: 'Roles' }
          },
          {
            path: 'roles/create',
            name: 'roles.create',
            component: () => import('@cruds/Roles/Create.vue'),
            meta: { title: 'Roles' }
          },
          {
            path: 'roles/:id',
            name: 'roles.show',
            component: () => import('@cruds/Roles/Show.vue'),
            meta: { title: 'Roles' }
          },
          {
            path: 'roles/:id/edit',
            name: 'roles.edit',
            component: () => import('@cruds/Roles/Edit.vue'),
            meta: { title: 'Roles' }
          },
          {
            path: 'users',
            name: 'users.index',
            component: () => import('@cruds/Users/Index.vue'),
            meta: { title: 'Users' }
          },
          {
            path: 'users/create',
            name: 'users.create',
            component: () => import('@cruds/Users/Create.vue'),
            meta: { title: 'Users' }
          },
          {
            path: 'users/:id',
            name: 'users.show',
            component: () => import('@cruds/Users/Show.vue'),
            meta: { title: 'Users' }
          },
          {
            path: 'users/:id/edit',
            name: 'users.edit',
            component: () => import('@cruds/Users/Edit.vue'),
            meta: { title: 'Users' }
          }
        ]
      },
      {
        path: 'universities',
        name: 'universities.index',
        component: () => import('@cruds/Universities/Index.vue'),
        meta: { title: 'Universities' }
      },
      {
        path: 'universities/create',
        name: 'universities.create',
        component: () => import('@cruds/Universities/Create.vue'),
        meta: { title: 'Universities' }
      },
      {
        path: 'universities/:id',
        name: 'universities.show',
        component: () => import('@cruds/Universities/Show.vue'),
        meta: { title: 'Universities' }
      },
      {
        path: 'universities/:id/edit',
        name: 'universities.edit',
        component: () => import('@cruds/Universities/Edit.vue'),
        meta: { title: 'Universities' }
      },
      {
        path: 'levels',
        name: 'levels.index',
        component: () => import('@cruds/Levels/Index.vue'),
        meta: { title: 'Levels' }
      },
      {
        path: 'levels/create',
        name: 'levels.create',
        component: () => import('@cruds/Levels/Create.vue'),
        meta: { title: 'Levels' }
      },
      {
        path: 'levels/:id',
        name: 'levels.show',
        component: () => import('@cruds/Levels/Show.vue'),
        meta: { title: 'Levels' }
      },
      {
        path: 'levels/:id/edit',
        name: 'levels.edit',
        component: () => import('@cruds/Levels/Edit.vue'),
        meta: { title: 'Levels' }
      },
      {
        path: 'scholarships',
        name: 'scholarships.index',
        component: () => import('@cruds/Scholarships/Index.vue'),
        meta: { title: 'Scholarships' }
      },
      {
        path: 'scholarships/create',
        name: 'scholarships.create',
        component: () => import('@cruds/Scholarships/Create.vue'),
        meta: { title: 'Scholarships' }
      },
      {
        path: 'scholarships/:id',
        name: 'scholarships.show',
        component: () => import('@cruds/Scholarships/Show.vue'),
        meta: { title: 'Scholarships' }
      },
      {
        path: 'scholarships/:id/edit',
        name: 'scholarships.edit',
        component: () => import('@cruds/Scholarships/Edit.vue'),
        meta: { title: 'Scholarships' }
      }
    ]
  }
]

export default new VueRouter({
  mode: 'history',
  base: '/admin',
  routes
})
