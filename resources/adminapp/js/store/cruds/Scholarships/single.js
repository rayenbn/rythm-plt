function initialState() {
  return {
    entry: {
      id: null,
      scholar_type: '',
      scholar_duration: '',
      scholar_coverage: '',
      starting_date: '',
      teaching_lang: '',
      original_tuition: '',
      desc: '',
      university_id: null,
      levels: [],
      created_at: '',
      updated_at: '',
      deleted_at: ''
    },
    lists: {
      university: [],
      levels: []
    },
    loading: false
  }
}

const route = 'scholarships'

const getters = {
  entry: state => state.entry,
  lists: state => state.lists,
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
  setScholarType({ commit }, value) {
    commit('setScholarType', value)
  },
  setScholarDuration({ commit }, value) {
    commit('setScholarDuration', value)
  },
  setScholarCoverage({ commit }, value) {
    commit('setScholarCoverage', value)
  },
  setStartingDate({ commit }, value) {
    commit('setStartingDate', value)
  },
  setTeachingLang({ commit }, value) {
    commit('setTeachingLang', value)
  },
  setOriginalTuition({ commit }, value) {
    commit('setOriginalTuition', value)
  },
  setDesc({ commit }, value) {
    commit('setDesc', value)
  },
  setUniversity({ commit }, value) {
    commit('setUniversity', value)
  },
  setLevels({ commit }, value) {
    commit('setLevels', value)
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
  fetchCreateData({ commit }) {
    axios.get(`${route}/create`).then(response => {
      commit('setLists', response.data.meta)
    })
  },
  fetchEditData({ commit, dispatch }, id) {
    axios.get(`${route}/${id}/edit`).then(response => {
      commit('setEntry', response.data.data)
      commit('setLists', response.data.meta)
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
  setScholarType(state, value) {
    state.entry.scholar_type = value
  },
  setScholarDuration(state, value) {
    state.entry.scholar_duration = value
  },
  setScholarCoverage(state, value) {
    state.entry.scholar_coverage = value
  },
  setStartingDate(state, value) {
    state.entry.starting_date = value
  },
  setTeachingLang(state, value) {
    state.entry.teaching_lang = value
  },
  setOriginalTuition(state, value) {
    state.entry.original_tuition = value
  },
  setDesc(state, value) {
    state.entry.desc = value
  },
  setUniversity(state, value) {
    state.entry.university_id = value
  },
  setLevels(state, value) {
    state.entry.levels = value
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
  setLists(state, lists) {
    state.lists = lists
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
