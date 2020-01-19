<template>
  <div class="page-wrapper">
    <pre-loader v-show="getProcessStatus"></pre-loader>

    <!-- Page-header start -->
    <div v-show="loading" class="page-header">
      <div class="row align-items-end">
        <div class="col-lg-8">
          <div class="page-header-title">
            <div class="d-inline">
              <h4>Media house selection form</h4>
              <span>
                Which media house do you want to
                <code>Publish to</code>, Select and click a media house to continue.
              </span>
              <p>{{no_media}}</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="page-header-breadcrumb">
          </div>
        </div>
      </div>
    </div>
    <div v-show="loading" class="default-grid row" :class="fadeIn">
      <div class="row lightboxgallery-popup">
        <div
          class="col-lg-3 col-md-6 default-grid-item"
          v-for="(logos,index) in mediaHouse"
          :key="index"
        >
          <div class="card gallery-desc">
            <div class="masonry-media">
              <a class="media-middle" href="#!">
                <!--<img class="img-fluid" src="https://colorlib.com//polygon/adminty/files/assets/images/gallery-grid/masonry-1.jpg" alt="masonary">-->
                <label class="image-checkbox" :id="index">
                  <img
                    class="img-fluid"
                    v-bind:src="[ 'http://uploads.kokrokooad.com/uploads/mediaHouseLogos/' + logos.logo]"
                    @click="getSelMediaHouseId(logos.client_id)"
                    width="600"
                    height="515"
                  />
                  <input type="radio" :value="logos.media_house" v-model="selMediaH"/>
<!--                  <i class="fa fa-check hidden"></i>-->
                </label>
              </a>
            </div>
            <div class="card-block">
              <div class="job-meta-data">
                <i class="fa fa-recycle"></i>
                <b class="text-danger">{{logos.media_house}}</b>
              </div>
              <div v-show="getSelectMedia === 'RADIO'" class="job-meta-data">
<!--                <b class="text-info">104.3fm</b>-->
              </div>
            </div>
          </div>
        </div>
      </div>
      <div style="padding-left: 16px;"></div>
    </div>
    <div v-show="loading" class="animated fadeIn">
      <router-link :to="{name : selectMedia}" class="btn btn-mat btn-info">Back</router-link>
      <router-link
        :to="{name:file_upload}"
        class="btn btn-mat btn-inverse animated fadeIn"
        v-show="selMediaH"
        @click.native="fetchSegmentTitles()"
      >Next</router-link>
    </div>
  </div>
</template>

<script>
import store from "../../vuex/store";
import ShowProcessing from "../payment/showProcess.vue";

export default {
  components: {
    ShowProcessing,
  },
  name: "displayMediaHouseImags",
  mounted() {
    if (this.getSelectMedia == ''){
      this.$router.push({
        name : 'selectMedia'
      });
    }
    else{
      this.fetchMediaHouse();

    }
  },
  created() {},
  data() {
    return {
      selMediaH: "",
      selMediaHouse: "",
      showBtn: true,
      file_upload: "fileupload",
      selectMedia: "selectMedia",
      mediaHouseId: null,
      loading: false,
      logo_path: "/thumbnails/",
      live_assets_path: 'http://uploads.kokrokooad.com/uploads/mediaHouseLogos/',
              //"http://kokrokooad.com/kuf/uploads/register/logo/",
      no_media : '',
    };
  },
  methods: {
    fetchSegmentTitles() {
      let self = this;
      store.dispatch("getProcessing", false);
      store.dispatch("getSelMediaHouse", self.selMediaH);
    },
    fetchMediaHouse() {
      let self = this;
      store.dispatch("getProcessing", true);

      axios.get("media-houses-api/" + self.getSelectMedia).then(function(res) {

          if (res && res !== "") {
            store.dispatch("getMediaHouses", res.data);
            // store.dispatch('getSelMediaType',self.getSelectMedia);
            store.dispatch("getProcessing", false);
            self.loading = true;
            store.dispatch("getFadeIn", "animated fadeIn");
            store.dispatch("getShowMediaForm", true);
          }

      });
    },
    getSelMediaHouseId(id) {
      this.mediaHouseId = id;
      store.dispatch("getMediaHouseId", this.mediaHouseId);
    },
    showSubmitBtn() {
      if (this.selMediaH.length > 0) {
        return false;
      } else {
        return true;
      }
    }
  },

  computed: {
    mediaHouse() {
      return store.getters.mediaHouses;
    },
    getSelectMedia() {
      return store.state.selMedia;
    },
    fadeIn() {
      return store.getters.fadeInn;
    },
    showMedia() {
      return store.state.showMediaForm;
    },
    getProcessStatus() {
      return store.state.processing;
    },


  }
};
</script>

