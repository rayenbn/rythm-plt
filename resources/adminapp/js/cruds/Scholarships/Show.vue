<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary card-header-icon">
            <div class="card-icon">
              <i class="material-icons">remove_red_eye</i>
            </div>
            <h4 class="card-title">View Company</h4>
          </div>
          <div class="card-body">
            <back-button></back-button>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">
                  <div class="table">
                    <tbody>
                      <tr>
                        <td class="text-primary">
                          University
                        </td>
                        <td>
                          <datatable-pictures :row="entry" :field="'university.logo'">
                          </datatable-pictures>
                          <datatable-single :row="entry" field="university.name">
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          Scholarship Type
                        </td>
                        <td>
                          {{ entry.scholar_type }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          Degree Level
                        </td>
                        <td>
                          <datatable-list :row="entry" field="levels.name">
                          </datatable-list>
                        </td>
                      <tr>
                        <td class="text-primary">
                          Starting Date
                        </td>
                        <td>
                          {{ entry.starting_date }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          Teaching Language
                        </td>
                        <td>
                          {{ entry.teaching_lang }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          Description
                        </td>
                        <td>
                          {{ entry.desc }}
                        </td>
                      </tr>
                      
                      <!-- <tr>
                        <td class="text-primary">
                          Logo
                        </td>
                        <td>
                          <datatable-pictures :row="entry" :field="'logo'">
                          </datatable-pictures>
                        </td>
                      </tr> -->
                      
                    </tbody>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
import DatatableSingle from '@components/Datatables/DatatableSingle'
import DatatableList from '@components/Datatables/DatatableList'
import DatatablePictures from '@components/Datatables/DatatablePictures'

export default {
  components: {
    DatatableSingle,
    DatatableList,
    DatatablePictures
  },
  data() {
    return {}
  },
  beforeDestroy() {
    this.resetState()
  },
  computed: {
    ...mapGetters('ScholarshipsSingle', ['entry'])
  },
  watch: {
    '$route.params.id': {
      immediate: true,
      handler() {
        this.resetState()
        this.fetchShowData(this.$route.params.id)
      }
    }
  },
  methods: {
    ...mapActions('ScholarshipsSingle', ['fetchShowData', 'resetState'])
  }
}
</script>
