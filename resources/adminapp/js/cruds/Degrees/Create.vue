<template>
  <div class="container-fluid">
    <form @submit.prevent="submitForm">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary card-header-icon">
              <div class="card-icon">
                <i class="material-icons">add</i>
              </div>
              <h4 class="card-title">Create University</h4>
            </div>
            <div class="card-body">
              <back-button></back-button>
            </div>
            <div class="card-body">
              <bootstrap-alert />
              <div class="row">
                <div class="col-md-12">
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.name,
                      'is-focused': activeField == 'name'
                    }"
                  >
                    <label class="bmd-label-floating required">Name</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.name"
                      @input="updateName"
                      @focus="focusField('name')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.location,
                      'is-focused': activeField == 'location'
                    }"
                  >
                    <label class="bmd-label-floating required">Location</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.location"
                      @input="updateLocation"
                      @focus="focusField('location')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                   <div class="form-group">
                    <label>Logo</label>
                    <attachment
                      :route="getRoute('universities')"
                      :collection-name="'university_logo'"
                      :media="entry.logo"
                      :max-file-size="2"
                      :component="'pictures'"
                      :accept="'image/*'"
                      @file-uploaded="insertLogoFile"
                      @file-removed="removeLogoFile"
                      :max-files="1"
                    />
                  </div>
                  <div class="form-group">
                    <label>Background Image</label>
                    <attachment
                      :route="getRoute('universities')"
                      :collection-name="'university_bg_image'"
                      :media="entry.bg_image"
                      :max-file-size="2"
                      :component="'pictures'"
                      :accept="'image/*'"
                      @file-uploaded="insertBgImageFile"
                      @file-removed="removeBgImageFile"
                      :max-files="1"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.desc,
                      'is-focused': activeField == 'desc'
                    }"
                  >
                    <label class="bmd-label-floating required">Description</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.desc"
                      @input="updateDesc"
                      @focus="focusField('desc')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <vue-button-spinner
                class="btn-primary"
                :status="status"
                :isLoading="loading"
                :disabled="loading"
              >
                Save
              </vue-button-spinner>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
import Attachment from '@components/Attachments/Attachment'

export default {
  components: {
    Attachment
  },
  data() {
    return {
      status: '',
      activeField: ''
    }
  },
  computed: {
    ...mapGetters('UniversitiesSingle', ['entry', 'loading'])
  },
  beforeDestroy() {
    this.resetState()
  },
  methods: {
    ...mapActions('UniversitiesSingle', [
      'storeData', 
      'resetState', 
      'setName',
      'setLocation',
      'insertLogoFile',
      'removeLogoFile',
      'insertBgImageFile',
      'removeBgImageFile',
      'setDesc',
      ]),
    updateName(e) {
      this.setName(e.target.value)
    },
    updateLocation(e) {
      this.setLocation(e.target.value)
    },
    updateDesc(e) {
      this.setDesc(e.target.value)
    },
    getRoute(name) {
      return `${axios.defaults.baseURL}${name}/media`
    },
    submitForm() {
      this.storeData()
        .then(() => {
          this.$router.push({ name: 'universities.index' })
          this.$eventHub.$emit('create-success')
        })
        .catch(error => {
          this.status = 'failed'
          _.delay(() => {
            this.status = ''
          }, 3000)
        })
    },
    focusField(name) {
      this.activeField = name
    },
    clearFocus() {
      this.activeField = ''
    }
  }
}
</script>
