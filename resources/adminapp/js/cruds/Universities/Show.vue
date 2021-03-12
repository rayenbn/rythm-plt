<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary card-header-icon">
            <div class="card-icon">
              <i class="material-icons">remove_red_eye</i>
            </div>
            <h4 class="card-title">View University</h4>
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
                          Name
                        </td>
                        <td>
                          {{ entry.name }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          Location
                        </td>
                        <td>
                          {{ entry.location }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          Logo
                        </td>
                        <td>
                          <datatable-pictures :row="entry" :field="'logo'">
                          </datatable-pictures>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          Background Image
                        </td>
                        <td>
                          <datatable-pictures :row="entry" :field="'bg_image'">
                          </datatable-pictures>
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
import DatatablePictures from '@components/Datatables/DatatablePictures'

export default {
  components: {
    DatatablePictures
  },
  data() {
    return {}
  },
  beforeDestroy() {
    this.resetState()
  },
  computed: {
    ...mapGetters('UniversitiesSingle', ['entry'])
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
    ...mapActions('UniversitiesSingle', ['fetchShowData', 'resetState'])
  }
}
</script>
