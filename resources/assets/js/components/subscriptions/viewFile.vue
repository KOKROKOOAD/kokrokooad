<template>
  <div class="page-wrapper animated fadeIn">
    <!-- Page-header start -->
    <div class="page-header">
      <div class="row align-items-end">
        <div class="col-lg-8">
          <div class="page-header-title">
            <div class="d-inline">
              <h4>Subscription name : {{ title }}</h4>
              <!-- <span>What type of file do you want to <code>Publish</code>, Select a file to get continue.</span> -->
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="page-header-breadcrumb">
            <span>
              <strong>File:</strong>
              {{ file }}
            </span>
          </div>
        </div>
      </div>
    </div>
    <!-- Page-header end -->

    <!-- Page body start -->
    <div class="page-body">
      <div class="row">
        <div class="col-sm-12">
          <!-- File upload card start -->
          <div class="card">
            <div class="card-header">
              <!-- <h5>File Uploa</h5> -->
              <div class="row">
                <div class="col-md-5"></div>
                <div class="col-md-">
                  <p v-show="loader">
                    <img src="/images/loading.gif" style="height: 20px;width: 20px;" />
                    <strong>Loading please wait.....</strong>
                  </p>
                </div>
                <div class="col-md-5"></div>
              </div>
            </div>
            <div class="card-block">
              <!--view file here  -->
              <div class="row text-center">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                  <img :src="file_path + file" v-show="imageFile(ext)" />
                  <audio controls :src="file_path + file" type="audio/*" v-show="audioFile(ext)"></audio>
                  <video v-show="videoFile(ext)" :src="file_path + file"></video>
                  <a
                    :href="'download-sub/' + id"
                    role="button"
                    class="btn btn-primary"
                    v-show="textFile(ext)"
                  >
                    Download file
                    <i class="fa fa-download"></i>
                  </a>
                </div>
              </div>
              <div class="col-md-3"></div>
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
  props: ["id"],
  name: "viewFile",
  data() {
    return {
      loader: true,
      file: "",
      ext: "",
      audioFiles: ["mp3", "wav"],
      videoFiles: ["mp4", "mkv"],
      textFiles: ["csv", "xlsx", "xls", "txt", "docx", "doc", "odt"],
      imageFiles: ["jpeg", "png", "jpg"],
      file_path: "",
      title: ""
    };
  },
  mounted() {
    this.fetchFile(this.id);
  },
  methods: {
    fetchFile(id) {
      let self = this;
      axios.get("fetch-client-file/" + id).then(function(res) {
        if (res.data) {
          self.file = res.data[0].file_name;
          self.ext = res.data[0].file_type;
          self.title = res.data[0].title;
          self.file_path = res.data[0].file_path;
          self.loader = false;
        }
      });
    },
    audioFile(file) {
      if (this.audioFiles.includes(file)) {
        return true;
      }
      return false;
    },
    videoFile(file) {
      if (this.videoFiles.includes(file)) {
        return true;
      }
      return false;
    },
    textFile(file) {
      if (this.textFiles.includes(file)) {
        return true;
      }
      return false;
    },
    imageFile(file) {
      if (this.imageFiles.includes(file)) {
        return true;
      }
      return false;
    }
  },
  computed: {
    getSelectMedia() {
      return store.state.selMedia;
    },
    subId() {
      return store.getters.subId;
    }
  }
};
</script>
