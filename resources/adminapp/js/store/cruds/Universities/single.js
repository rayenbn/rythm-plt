function initialState() {
  return {
    entry: {
      id: null,
      name: '',
      location: '',
      logo: [],
      bg_image: [],
      desc: '',
      created_at: '',
      updated_at: '',
      deleted_at: ''
    },
    loading: false
  }
}

const route = 'universities'

const getters = {
  entry: state => state.entry,
  loading: state => state.loading
}

const actions = {
  storeData({ commit, state, dispatch }) {
    commit('setLoading', true)
    dispatch('Alert/resetState', null, { root: true })

    return new Promise((resolve, reject) => {
      let params = objectToFormData(state.entry, {
        indices: true,
        booleansAsIntegers: true
      })
      axios
        .post(route, params)
        .then(response => {
          resolve(response)
        })
        .catch(error => {
          let message = error.response.data.message || error.message
          let errors = error.response.data.errors

          dispatch(
            'Alert/setAlert',
            { message: message, errors: errors, color: 'danger' },
            { root: true }
          )

          reject(error)
        })
        .finally(() => {
          commit('setLoading', false)
        })
    })
  },
  updateData({ commit, state, dispatch }) {
    commit('setLoading', true)
    dispatch('Alert/resetState', null, { root: true })

    return new Promise((resolve, reject) => {
      let params = objectToFormData(state.entry, {
        indices: true,
        booleansAsIntegers: true
      })
      params.set('_method', 'PUT')
      axios
        .post(`${route}/${state.entry.id}`, params)
        .then(response => {
          // commit('setEntry', response.data.data)
          resolve(response)
        })
        .catch(error => {
          let message = error.response.data.message || error.message
          let errors = error.response.data.errors

          dispatch(
            'Alert/setAlert',
            { message: message, errors: errors, color: 'danger' },
            { root: true }
          )

          reject(error)
        })
        .finally(() => {
          commit('setLoading', false)
        })
    })
  },
  setName({ commit }, value) {
    commit('setName', value)
  },
  setLocation({ commit }, value) {
    commit('setLocation', value)
  },
  insertLogoFile({ commit }, file) {
    commit('insertLogoFile', file)
  },
  removeLogoFile({ commit }, file) {
    commit('removeLogoFile', file)
  },
  insertBgImageFile({ commit }, file) {
    commit('insertBgImageFile', file)
  },
  removeBgImageFile({ commit }, file) {
    commit('removeBgImageFile', file)
  },
  setDesc({ commit }, value) {
    commit('setDesc', value)
  },
  setCreatedAt({ commit }, value) {
    commit('setCreatedAt', value)
  },
  setUpdatedAt({ commit }, value) {
    commit('setUpdatedAt', value)
  },
  setDeletedAt({ commit }, value) {
    commit('setDeletedAt', value)
  },
  fetchEditData({ commit, dispatch }, id) {
    axios.get(`${route}/${id}/edit`).then(response => {
      commit('setEntry', response.data.data)
    })
  },
  fetchShowData({ commit, dispatch }, id) {
    axios.get(`${route}/${id}`).then(response => {
      commit('setEntry', response.data.data)
    })
  },
  resetState({ commit }) {
    commit('resetState')
  }
}

const mutations = {
  setEntry(state, entry) {
    state.entry = entry
  },
  setName(state, value) {
    state.entry.name = value
  },
  setLocation(state, value) {
    state.entry.location = value
  },
  insertLogoFile(state, file) {
    state.entry.logo.push(file)
  },
  removeLogoFile(state, file) {
    state.entry.logo = state.entry.logo.filter(item => {
      return item.id !== file.id
    })
  },
  insertBgImageFile(state, file) {
    state.entry.bg_image.push(file)
  },
  removeBgImageFile(state, file) {
    state.entry.bg_image = state.entry.bg_image.filter(item => {
      return item.id !== file.id
    })
  },
  setDesc(state, value) {
    state.entry.desc = value
  },
  setCreatedAt(state, value) {
    state.entry.created_at = value
  },
  setUpdatedAt(state, value) {
    state.entry.updated_at = value
  },
  setDeletedAt(state, value) {
    state.entry.deleted_at = value
  },
  setLoading(state, loading) {
    state.loading = loading
  },
  resetState(state) {
    state = Object.assign(state, initialState())
  }
}

export default {
  namespaced: true,
  state: initialState,
  getters,
  actions,
  mutations
}
