<template>
  <div class="page-wrapper">
    <!-- Page-header start -->
    <div class="page-header">
      <div class="row align-items-end">
        <div class="col-lg-8">
          <div class="page-header-title">
            <div class="d-inline">
              <h4>Media selection form</h4>
              <span>
                What type of ad do you want to
                <code>Publish</code>, Select a media to get started.
              </span>
            </div>
          </div>
        </div>
        <div class="col-lg-4"></div>
      </div>
    </div>
    <!-- Page-header end -->

    <div class="row" v-show="process">
      <div class="col-md-4"></div>
      <div class="col-md-3">
        <show-processing class="float-right"></show-processing>
      </div>
      <div class="col-md-4"></div>
    </div>

    <!-- Page body start -->
    <div class="page-body" v-show="view">
      <div class="row">
        <div class="col-sm-12">
          <!-- Default select start -->
          <div class="card">
            <div class="card-block animated fadeIn">
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xl-12 m-b-30">
                  <h4 class="sub-title">Select media type</h4>
                  <select
                    name="select"
                    class="form-control form-control-primary"
                    v-model="createAd.medias"
                    @click="getSelectedMedia"
                  >
                    <option disabled value selected>Select a media</option>
                    <option
                      v-for="(mTypes,index) in mediaTypes"
                      :value="mTypes.mediaType"
                      :key="index"
                    >{{mTypes.mediaType}}</option>
                  </select>
                </div>
                <div
                  class="animated fadeIn"
                  style="padding-left: 16px;"
                  v-show="  getSelectMedia !== ''"
                >
                  <router-link
                    :to="{name : 'selectMediaHouse'}"
                    role="button"
                    type="button"
                    class="btn btn-mat btn-inverse"
                  >Next</router-link>
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
import store from "../../vuex/store";

export default {
  name: "createAd",
  data() {
    return {
      createAd: {
        medias: ""
      },
      mediaTypes: [],
      process: true,
      view: false
    };
  },
  mounted() {
    this.fetchMediaTypes();
  },
  methods: {
    fetchMediaTypes(index) {
      let self = this;
      axios
        .get("fetch-media-types-api")
        .then(function(res) {
          self.process = false;
          self.view = true;
          self.mediaTypes = res.data;
          store.dispatch("getSelectedMedia", "");
          store.dispatch("getFIleDuration", "");
        })
        .catch(function(error) {});
    },
    getSelectedMedia() {
      store.dispatch("getSelectedMedia", this.createAd.medias);
    }
  },
  computed: {
    getSelectMedia() {
      return store.state.selMedia;
    },
    showMedia() {
      return store.state.showMediaForm;
    }
  }
};
</script>

<style scoped>
</style>