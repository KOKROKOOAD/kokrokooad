<template>
  <div class="page-wrapper">
    <!-- Page-header start -->
    <div class="page-header">
      <div class="row align-items-end">
        <div class="col-lg-8">
          <div class="page-header-title">
            <div class="d-inline">
              <h4>File upload form</h4>
              <span>
                What type of file do you want to
                <code>Publish</code>, Select a file to get continue.
              </span>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="page-header-breadcrumb"></div>
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
              <h5>File Upload</h5>
              <!--<div class="card-header-right">-->
              <!--<ul class="list-unstyled card-option">-->
              <!--<li><i class="feather icon-maximize full-card"></i></li>-->
              <!--<li><i class="feather icon-minus minimize-card"></i></li>-->
              <!--<li><i class="feather icon-trash-2 close-card"></i></li>-->
              <!--</ul>-->
              <!--</div>-->
            </div>
            <div class="card-block">
              <!--<div class="sub-title">Example 1</div>-->
              <input
                type="file"
                name="files"
                id="filer_input1"
                ref="file"
                accept=".xlsx, .xls, .pdf, .odt, .docx, .mp3, .wav, .jpeg, .png, .jpg, .mp4, .mkv"
                v-on:change="onFileChange($event)"
              />
              <!--<input v-show="getSelectMedia === 'TV'" type="file" name="files" id="filer_input2" ref="file" accept=".xlsx,.xls,.pdf,.odt,.docx,.mp3,.wav,.mp4,.avi,.jpeg,.png,.jpg" v-on:change="onFileChange($event)">-->
              <!--<input v-show="getSelectMedia === 'PRINT'" type="file" name="files" id="filer_input3" ref="file" accept=".xlsx,.xls,.pdf,.odt,.docx,.jpeg,.png,.jpg" v-on:change="onFileChange($event)">-->

              <div style="padding-top: 16px;">
                <router-link
                  :to="{name:select_media_house}"
                  role="button"
                  type="button"
                  class="btn btn-mat btn-inverse"
                >Back</router-link>
                <router-link
                  :to="{name:select_rate_card, params: {'durat': file_dura },query: { debug: true }}"
                  v-show="valid_file"
                  role="button"
                  type="button"
                  class="btn btn-mat btn-info animated fadeIn"
                >Next</router-link>
              </div>
            </div>
            <audio v-show="audio" id="audio"></audio>
            <video v-show="audio" id="video"></video>
            <input type="hidden" id="test" v-model="file_dura" />
            <!--                        <input type="time" v-model="time">-->
            <!--                        <p id="duration"></p>-->
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import store from "../../vuex/store";
import moment from "moment/moment";

export default {
  name: "fileUpload",
  data() {
    return {
      select_media_house: "selectMediaHouse",
      select_rate_card: "selectRateCard",
      calender_url: "/user-account/select-calender",
      files: "",
      radio_ext: [
        "xlsx",
        "xls",
        "pdf",
        "odt",
        "docx",
        "mp3",
        "wav",
        "jpeg",
        "jpg",
        "png"
      ],
      tv_ext: [
        "xlsx",
        "xls",
        "pdf",
        "odt",
        "docx",
        "mp3",
        "wav",
        "mp4",
        "avi",
        "jpeg",
        "png",
        "jpg",
        "mkv"
      ],
      print_ext: ["xlsx", "xls", "pdf", "odt", "docx", "jpeg", "png", "jpg"],
      ext: "",
      file_size: "",
      video_ext: ["mp3", "wav", "mp4", "avi"],
      audios_ext: ["mp3", "wav"],
      file_durations: "",
      valid_file: false,
      myVideos: [],
      myFiles: "",
      audio: false,
      duration: "",
      m: "",
      k: "",
      file_dura: "",
      time: "",
      mytest: false,
      url : null
    };
  },
  mounted() {
    if (this.getSelectMedia == "") {
      this.$router.push({
        name: "selectMedia"
      });
      store.dispatch("getFile", "");
      store.dispatch("getUploadFileName", "");
      store.dispatch("getFileSize", "");
    } else {
      store.dispatch("getUploadFileName", "");
    }
    // this.m = this.getAudioDurations();
    // store.dispatch('getFIleDuration',this.dura);
    //  if(this.audios_ext.includes(this.ext)){
    //      alert('tesing');
    //      this.getAudioDurations();
    //
    //  }
    // else if(this.getSelectMedia == 'TV' &&  this.audios_ext.includes(this.ext)){
    //     this.getAudioDurations();
    // }
    // else if(this.getSelectedMedia == 'TV' && this.video_ext.includes(this.ext)){
    //     this.getVideoDuration();
    //
    // }
    store.dispatch("getFIleDuration", 0);

    this.getAudioDurations();
    //   this.getVideoDuration();
  },
  created() {},
  methods: {
    onFileChange(e) {
      let files = e.target.files || e.dataTransfer.files;
      this.ext = files[0].name.split(".").pop();
      this.file_size = files[0].size;

      if (this.getSelectMedia === "RADIO") {
        if (this.radio_ext.includes(this.ext)) {
          store.dispatch("getFile", files[0]);
          store.dispatch("getUploadFileName", files[0].name);
          store.dispatch("getFileSize", this.file_size);
          this.valid_file = true;
        } else {
          store.dispatch("getFile", "");
          store.dispatch("getUploadFileName", "");
        }
      }

      if (this.getSelectMedia === "TV") {
        if (this.tv_ext.includes(this.ext)) {
          store.dispatch("getFile", files[0]);
          store.dispatch("getUploadFileName", files[0].name);
          store.dispatch("getFileSize", this.file_size);
          this.valid_file = true;
          if (
            this.getSelectMedia == "TV" &&
            this.video_ext.includes(this.ext)
          ) {
            //    this.getVideoDuration();
            //    this.getAudioDurations();
          }
        } else {
          store.dispatch("getFile", "");
          store.dispatch("getUploadFileName", "");
        }
      }

      if (this.getSelectMedia === "PRINT") {
        if (this.print_ext.includes(this.ext)) {
          store.dispatch("getFile", files[0]);
          store.dispatch("getUploadFileName", files[0].name);
          store.dispatch("getFileSize", this.file_size);
          this.valid_file = true;
        } else {
          store.dispatch("getFile", "");
          store.dispatch("getUploadFileName", "");
        }
      }

    },
    getAudioDurations() {
      let self = this;
      let objectUrl;

      $("#audio").on("canplaythrough", function(e) {
        let seconds = e.currentTarget.duration;
        let duration = moment.duration(seconds, "seconds");
        if(duration != ''){
          console.log(duration.hours() +':'+ duration.minutes() + ':' + duration.seconds());

          store.dispatch('getMediaFileDuration', duration.hours() +':'+ duration.minutes() + ':' + duration.seconds());

        }

        let time = "";
        let hours = duration.hours();
        if (hours > 0) {
          time = hours + ":";
        }

        time = time + duration.minutes() + ":" + duration.seconds();
        let p = time.split(":");
        let m = 1;
        let s = 0;

        while (p.length > 0) {
          s += m * parseInt(p.pop(), 10);
          m *= 60;
        }

        self.file_dura = s;
        store.dispatch("getFIleDuration", self.file_dura);
        // $("#duration").text(s + ' seconds');

        URL.revokeObjectURL(objectUrl);
      });

      $("#filer_input1").change(function(e) {
        let file = e.currentTarget.files[0];
        objectUrl = URL.createObjectURL(file);
        $("#audio").prop("src", objectUrl);
      });
    },
    getVideoDuration() {
      let self = this;
      let objectUrl;

      $("#video").on("canplaythrough", function(e) {
        let seconds = e.currentTarget.duration;
        let duration = moment.duration(seconds, "seconds");

        let time = "";
        let hours = duration.hours();
        if (hours > 0) {
          time = hours + ":";
        }

        time = time + duration.minutes() + ":" + duration.seconds();
        let p = time.split(":");
        let s = 0;
        let m = 1;

        while (p.length > 0) {
          s += m * parseInt(p.pop(), 10);
          m *= 60;
        }
        // $("#duration").text(s + ' seconds');
        self.file_dura = s;
        store.dispatch("getFIleDuration", self.file_dura);

        URL.revokeObjectURL(objectUrl);
      });

      $("#filer_input1").change(function(e) {
        let file = e.currentTarget.files[0];
        objectUrl = URL.createObjectURL(file);
        $("#video").prop("src", objectUrl);
      });
    },
    hmsToSecondsOnly(str) {
      let p = str.split(":");
      let s = 0;
      let m = 1;

      while (p.length > 0) {
        s += m * parseInt(p.pop(), 10);
        m *= 60;
      }
      $("#duration").text(s);

      return s;
    },
    getFileExt() {
      if (this.getSelectedMedia == "RADIO") {
      }
    }
  },
  computed: {
    segData() {
      return store.getters.segmentsData;
    },
    getSelectMedia() {
      return store.state.selMedia;
    },
    file() {
      return store.state.file;
    },
    getFileDurations() {
      return store.state.fileDuration;
    },
    getUrl(){
      return store.state.readFile;
    }
  }
};
</script>
