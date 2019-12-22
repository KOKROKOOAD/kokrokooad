<template>
    <div class="page-wrapper animated fadeIn">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h4>Update Uploaded file</h4>
                            <span>What type of file do you want to <code>Publish</code>, Select a file to get continue.</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-header-breadcrumb">

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
                            <h5>File Upload</h5>
                            <div class="row">
                                <div class="col-md-5"></div>
                                <div class="col-md-">
                                    <p v-show="loader"><img src="/images/loading.gif" style="height: 20px;width: 20px;"><strong>Updating please wait.....</strong></p>


                                </div>
                                <div class="col-md-5"></div>

                            </div>

                        </div>
                        <div class="card-block">
                            <!--<div class="sub-title">Example 1</div>-->
                            <input  type="file" name="files" id="file" ref="file" accept=".xlsx,.xls,.pdf,.odt,.docx,.mp3,.wav,.jpeg,.png,.jpg" v-on:change="onFileChange($event)">

                            <div style="padding-top: 16px;">
                                <router-link  :to="{name: 'subs'}" v-show="back" role="button" type="button" class="btn btn-mat btn-inverse animated fadeIn " >Subscriptions</router-link>
                                <button v-show="valid_file" role="button" :disabled="update"  @click="updateSub" type="button" class="btn btn-mat btn-info animated fadeIn" >Update File</button>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import  store from '../../vuex/store';
    import moment from 'moment/moment';



    export default {

        name: "updateSubs",
        data(){
            return{
                files : '',
                radio_ext : ["xlsx","xls","pdf","odt","docx","mp3","wav","jpeg","jpg","png"],
                tv_ext : ["xlsx","xls","pdf","odt","docx","mp3","wav","mp4","avi","jpeg","png","jpg"],
                print_ext : ["xlsx","xls","pdf","odt","docx","jpeg","png","jpg" ],
                audio_video_ext : ['.mp3','.wav','mp4','avi'],
                valid_file : false,
                back :  true,
                update : false,
                loader : false,
            }
        },
        mounted(){

        },
        methods: {

            onFileChange(e) {

                let files = e.target.files || e.dataTransfer.files;

                this.ext  =  files[0].name.split('.').pop();
                this.file_size = files[0].size;

                this.ext  =  files[0].name.split('.').pop();
                this.file_size = files[0].size;


                if (this.getSelectMedia.toUpperCase() === 'RADIO'){
                    if(this.radio_ext.includes(this.ext)){

                        store.dispatch('getFile' ,files[0]);
                        store.dispatch('getUploadFileName',files[0].name);
                        store.dispatch('getFileSize', this.file_size);
                        this.valid_file = true;
                        // console.log(this.ext);

                    }
                    else{
                        store.dispatch('getFile' , '');
                        store.dispatch('getUploadFileName', '');

                        // console.log('Invalid file selected');
                        // console.log(this.ext);

                    }
                }


                if (this.getSelectMedia.toUpperCase() === 'TV') {
                    if (this.tv_ext.includes(this.ext)) {
                        store.dispatch('getFile', files[0]);
                        store.dispatch('getUploadFileName', files[0].name);
                        store.dispatch('getFileSize', this.file_size);
                        this.valid_file = true;


                    }
                    else{
                        store.dispatch('getFile' , '');
                        store.dispatch('getUploadFileName', '');

                        console.log('Invalid file selected');
                        console.log(this.ext);

                    }
                }


                if (this.getSelectMedia.toUpperCase() === 'PRINT'){
                    if(this.print_ext.includes(this.ext)){
                        store.dispatch('getFile' ,files[0]);
                        store.dispatch('getUploadFileName',files[0].name);
                        store.dispatch('getFileSize', this.file_size);
                        this.valid_file = true;


                    }
                    else{
                        store.dispatch('getFile' , '');
                        store.dispatch('getUploadFileName', '');

                    }
                }


                if(this.audio_video_ext.includes(this.ext)){
                    let seconds = e.currentTarget.duration;
                    let duration = moment.duration(seconds, "seconds");


                    let time = "";
                    let hours = duration.hours();
                    if (hours > 0) { time = hours + ":" ; }

                    time = time + duration.minutes() + ":" + duration.seconds();
                    // $("#duration").text(time);
                    self.file_durations =  moment.duration(time).asSeconds();
                }

            },
            updateSub(id) {
                    let self = this;
                    let formData  =  new FormData();
                    self.back  = false;
                    self.update = false;
                    self.loader  = true;
                if (self.file !== '') {
                    formData.append('file', self.file);
                    formData.append('id', self.subId);

                  //  self.process = true;
                    axios.post('subs-update', formData).then(function (response) {
                        if (response.data  == 'success') {
                            self.valid_file = false;
                            self.back  =  true;
                            self.update = false;
                            self.loader  = false;
                            store.dispatch('getFile', '');
                           // store.dispatch('getSubId', '');
                           // store.dispatch('getSelectedMedia','');

                            new PNotify({
                                title: "success",
                                type: "success",
                                text:  'Subscription successfully updated.',
                                desktop: {
                                    desktop: true,
                                    icon: "assets/images/pnotify/success.png"
                                }
                            });
                        }

                    });
                }

            }


        },
        computed:{

            getSelectMedia(){
                return store.state.selMedia;
            },
            file(){
                return store.state.file;
            },
            subId(){
                return store.getters.subId;
            },

        },

    }



</script>
