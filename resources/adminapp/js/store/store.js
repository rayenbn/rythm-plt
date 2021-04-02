import Vue from 'vue'
import Vuex from 'vuex'

import Alert from './modules/alert'

import PermissionsIndex from './cruds/Permissions'
import PermissionsSingle from './cruds/Permissions/single'
import RolesIndex from './cruds/Roles'
import RolesSingle from './cruds/Roles/single'
import UsersIndex from './cruds/Users'
import UsersSingle from './cruds/Users/single'
import UniversitiesIndex from './cruds/Universities'
import UniversitiesSingle from './cruds/Universities/single'
import DegreesIndex from './cruds/Degrees'
import DegreesSingle from './cruds/Degrees/single'
// import LevelsIndex from './cruds/Levels'
// import LevelsSingle from './cruds/Levels/single'
import ScholarshipsIndex from './cruds/Scholarships'
import ScholarshipsSingle from './cruds/Scholarships/single'

Vue.use(Vuex)

const debug = process.env.NODE_ENV !== 'production'

export default new Vuex.Store({
  modules: {
    Alert,
    PermissionsIndex,
    PermissionsSingle,
    RolesIndex,
    RolesSingle,
    UsersIndex,
    UsersSingle,
    UniversitiesIndex,
    UniversitiesSingle,
    DegreesIndex,
    DegreesSingle,
    // LevelsIndex,
    // LevelsSingle,
    ScholarshipsIndex,
    ScholarshipsSingle
  },
  strict: debug
})
