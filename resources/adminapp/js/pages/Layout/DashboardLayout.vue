<template>
  <div class="wrapper" :class="{ 'nav-open': $sidebar.showSidebar }">
    <event-hub></event-hub>
    <side-bar :sidebarLinks="sidebarLinks">
      <mobile-menu slot="content"></mobile-menu>
    </side-bar>

    <div class="main-panel">
      <top-navbar></top-navbar>
      <div class="content">
        <dashboard-content></dashboard-content>
      </div>
    </div>
  </div>
</template>

<script>
import DashboardContent from './Content.vue'
import TopNavbar from './TopNavbar.vue'
import MobileMenu from './MobileMenu.vue'

export default {
  components: {
    DashboardContent,
    TopNavbar,
    MobileMenu
  },
  data() {
    return {
      sidebarLinks: [
        {
          title: 'Dashboard',
          icon: 'dashboard',
          path: { name: 'dashboard' }
        },
        {
          title: 'User Management',
          icon: 'person',
          path: { name: 'user_management' },
          gate: 'user_management_access',
          children: [
            {
              title: 'Permissions',
              icon: 'perm_data_setting',
              path: { name: 'permissions.index' },
              gate: 'permission_access'
            },
            {
              title: 'Roles',
              icon: 'group',
              path: { name: 'roles.index' },
              gate: 'role_access'
            },
            {
              title: 'Users',
              icon: 'person',
              path: { name: 'users.index' },
              gate: 'user_access'
            }
          ]
        },
        {
          title: 'Universities',
          icon: 'table_view',
          path: { name: 'universities.index' },
          gate: 'city_access'
        },
        {
          title: 'Levels',
          icon: 'table_view',
          path: { name: 'levels.index' },
          gate: 'category_access'
        },
        {
          title: 'Scholarships',
          icon: 'table_view',
          path: { name: 'scholarships.index' },
          gate: 'company_access'
        }
      ]
    }
  }
}
</script>
