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
              <h4 class="card-title">Create Scholarship</h4>
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
                      'has-items': entry.scholar_type,
                      'is-focused': activeField == 'scholar_type'
                    }"
                  >
                    <label class="bmd-label-floating required">Scholarship Type</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.scholar_type"
                      @input="updateScholarType"
                      @focus="focusField('scholar_type')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.scholar_duration,
                      'is-focused': activeField == 'scholar_duration'
                    }"
                  >
                    <label class="bmd-label-floating required">Scholarship Duration</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.scholar_duration"
                      @input="updateScholarDuration"
                      @focus="focusField('scholar_duration')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.scholar_coverage,
                      'is-focused': activeField == 'scholar_coverage'
                    }"
                  >
                    <label class="bmd-label-floating required">Scholarship Coverage</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.scholar_coverage"
                      @input="updateScholarCoverage"
                      @focus="focusField('scholar_coverage')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.starting_date,
                      'is-focused': activeField == 'starting_date'
                    }"
                  >
                    <label class="bmd-label-floating required">Starting Date</label>
                    <input
                      class="form-control"
                      type="date"
                      :value="entry.starting_date"
                      @input="updateStartingDate"
                      @focus="focusField('starting_date')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.teaching_lang,
                      'is-focused': activeField == 'teaching_lang'
                    }"
                  >
                    <label class="bmd-label-floating required">Teaching Language</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.teaching_lang"
                      @input="updateTeachingLang"
                      @focus="focusField('teaching_lang')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.original_tuition,
                      'is-focused': activeField == 'original_tuition'
                    }"
                  >
                    <label class="bmd-label-floating required">Original Tuition</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.original_tuition"
                      @input="updateOriginalTuition"
                      @focus="focusField('original_tuition')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.desc,
                      'is-focused': activeField == 'desc'
                    }"
                  >
                    <label class="bmd-label-floating">Description</label>
                    <textarea
                      class="form-control"
                      type="text"
                      :value="entry.desc"
                      @input="updateDesc"
                      @focus="focusField('desc')"
                      @blur="clearFocus"
                    ></textarea>
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.university_id !== null,
                      'is-focused': activeField == 'university'
                    }"
                  >
                    <label class="bmd-label-floating">University</label>
                    <v-select
                      name="university"
                      label="name"
                      :key="'university-field'"
                      :value="entry.university_id"
                      :options="lists.university"
                      :reduce="entry => entry.id"
                      @input="updateUniversity"
                      @search.focus="focusField('university')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.levels.length !== 0,
                      'is-focused': activeField == 'levels'
                    }"
                  >
                    <label class="bmd-label-floating">Degree Level</label>
                    <v-select
                      name="levels"
                      label="name"
                      :key="'levels-field'"
                      :value="entry.levels"
                      :options="lists.levels"
                      :closeOnSelect="false"
                      multiple
                      @input="updateLevels"
                      @search.focus="focusField('levels')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <!-- <div class="form-group">
                    <label>Logo</label>
                    <attachment
                      :route="getRoute('scholarships')"
                      :collection-name="'company_logo'"
                      :media="entry.logo"
                      :max-file-size="2"
                      :component="'pictures'"
                      :accept="'image/*'"
                      @file-uploaded="insertLogoFile"
                      @file-removed="removeLogoFile"
                      :max-files="1"
                    />
                  </div> -->
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
// import Attachment from '@components/Attachments/Attachment'

export default {
  // components: {
  //   Attachment
  // },
  data() {
    return {
      status: '',
      activeField: ''
    }
  },
  computed: {
    ...mapGetters('ScholarshipsSingle', ['entry', 'loading', 'lists'])
  },
  mounted() {
    this.fetchCreateData()
  },
  beforeDestroy() {
    this.resetState()
  },
  methods: {
    ...mapActions('ScholarshipsSingle', [
      'storeData',
      'resetState',
      'setScholarType',
      'setScholarDuration',
      'setScholarCoverage',
      'setStartingDate',
      'setTeachingLang',
      'setOriginalTuition',
      'setDesc',
      'setUniversity',
      'setLevels',
      // 'insertLogoFile',
      // 'removeLogoFile',
      'fetchCreateData'
    ]),
    updateScholarType(e) {
      this.setScholarType(e.target.value)
    },
    updateScholarDuration(e) {
      this.setScholarDuration(e.target.value)
    },
    updateScholarCoverage(e) {
      this.setScholarCoverage(e.target.value)
    },
    updateStartingDate(e) {
      this.setStartingDate(e.target.value)
    },
    updateTeachingLang(e) {
      this.setTeachingLang(e.target.value)
    },
    updateOriginalTuition(e) {
      this.setOriginalTuition(e.target.value)
    },
    updateDesc(e) {
      this.setDesc(e.target.value)
    },
    updateUniversity(value) {
      this.setUniversity(value)
    },
    updateLevels(value) {
      this.setLevels(value)
    },
    // getRoute(name) {
    //   return `${axios.defaults.baseURL}${name}/media`
    // },
    submitForm() {
      this.storeData()
        .then(() => {
          this.$router.push({ name: 'scholarships.index' })
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
