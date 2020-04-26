<template>
  <div class="page-wrapper">
<!--    <pre-loader v-show="getProcessStatus"></pre-loader>-->
    <!-- Page-header start -->
    <div class="page-header" v-show="loading">
      <div class="row align-items-end">
        <div class="col-lg-8">
          <div class="page-header-title">
            <div class="d-inline">
              <h4>Media Houses</h4>
              <!-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> -->
              <span>
                Which media house do you want to
                <code>Publish to</code>, Click to select a media house to continue.
              </span>
            </div>
          </div>
        </div>
        <div class="col-lg-4"></div>
      </div>
    </div>
    <!-- Page-header end -->

    <!-- Page body start -->
    <div class="page-body gallery-page">
      <div class="row">
        <div class="col-sm-12">
          <!-- Gallery advance card start -->
          <div class="card">
            <div class="card-header">
              <h5>
                Selected media house :
                <strong
                  class="text-danger"
                  style="font-weight:900"
                >{{ selected_media }}</strong>
              </h5>

              <!-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> -->
            </div>
            <div class="card-block text-center">
              <div class="row">
                <div
                  style="margin-right:-36px;border-color:green !important"
                  class="col-sm-3"
                  v-for="(logos,index) in mediaHouse"
                  :key="index"
                  @click="getSelMediaHouseId(logos.client_id,logos.media_house)"
                >
                  <div class="grid">
                    <figure class="effect-apollo" style="width:70px !important;height:160px;">
                      <img class="img-fluid" v-bind:src="[ live_assets_path + logos.logo]" />
                      <figcaption>
                        <!-- <h2>
                          Strong
                          <span>Apollo</span>
                        </h2>-->
                        <p>{{ logos.media_house }}</p>
                      </figcaption>
                    </figure>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="animated fadeIn" style="padding:40px;">
                <router-link :to="{name : selectMedia}" class="btn btn-mat btn-info">Back</router-link>
                <router-link
                  :to="{name:file_upload}"
                  class="btn btn-mat btn-inverse animated fadeIn"
                  v-show="selMediaH"
                  @click.native="fetchSegmentTitles()"
                >Next</router-link>
              </div>
            </div>
          </div>
          <!-- Gallery advance card end -->
        </div>
      </div>
    </div>
    <!-- Page body end -->

    <!-- Main-body end -->

    <div id="styleSelector"></div>
  </div>
</template>

<script>
import store from "../../vuex/store";
import ShowProcessing from "../payment/showProcess.vue";

export default {
  components: {
    ShowProcessing
  },
  name: "displayMediaHouseImags",
  mounted() {
    if (this.getSelectMedia == "") {
      this.$router.push({
        name: "selectMedia"
      });
    } else {
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
      live_assets_path: "http://uploads.kokrokooad.com/mediaHouseLogos/",

      no_media: "",
      selected_media: ""
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
    getSelMediaHouseId(id, media_house) {
      this.mediaHouseId = id;
      store.dispatch("getMediaHouseId", this.mediaHouseId);
      this.selMediaH = this.mediaHouseId;
      this.selected_media = media_house;
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
    }
  }
};
</script>

