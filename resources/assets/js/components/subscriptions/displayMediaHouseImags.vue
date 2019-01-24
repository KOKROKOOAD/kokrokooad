<template>
    <!--media house selection modal-->
    <!--<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">-->
        <!--<div class="modal-dialog" role="document">-->
            <!--<div class="modal-content">-->
                <!--<div class="modal-header">-->
                    <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
                    <!--&lt;!&ndash;<h5 class="modal-title" id="myModalLabel">Select media house(s)</h5>&ndash;&gt;-->
                    <!--<div class="row">-->
                        <!--<div class="col-sm-1">-->

                        <!--</div>-->
                        <!--<div class="col-sm-10">-->
                            <!--<form>-->
                                <!--<input class="form-control" type="text" placeholder="search media house">-->
                            <!--</form>-->
                        <!--</div>-->
                        <!--<div class="col-sm-1"></div>-->
                    <!--</div>-->

                <!--</div>-->

                <!--<div class="modal-body">-->

                    <!--<div class="row">-->

                        <!--<div  v-for="(logos,index) in mediaHouses"  :key="index" class="col-xs-4 col-sm-3 col-md-2 nopad text-center" >-->
                            <!--<label class="image-checkbox" :id="index">-->
                                <!--<img  class="img-responsive m-logo" v-bind:src="['/thumbnails/' + logos.logo]" @click="getSelMediaHouse(index)" :title="logos.media_house">-->
                                <!--<input type="checkbox"  :value="logos.media_house"  v-model="selMediaH" />-->
                                <!--<i class="fa fa-check hidden"></i>-->
                            <!--</label>-->
<!--&lt;!&ndash;-->
                            <!--{{logos.media_house}}-->
<!--&ndash;&gt;-->
                        <!--</div>-->

                    <!--</div>-->
                <!--</div>-->

                <!--<div class="modal-footer">-->
                    <!--<button type="button" class="btn btn-next btn-fill btn-default btn-wd"  data-dismiss="modal" aria-label="Close">Cancel</button>-->
                    <!--<button  v-show="selMediaH.length > 0" type="button" class="btn btn-next btn-fill btn-primary btn-wd" @click="fetchSegmentTitles()" data-dismiss="modal">next</button>-->
                    <!--&lt;!&ndash;<button type="button" class="btn btn-primary">Save changes</button>&ndash;&gt;-->
                <!--</div>-->
            <!--</div>-->
        <!--</div>-->
    <!--</div>-->

    <div class="page-wrapper">

        <!-- Page-header start -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h4>Media house selection form</h4>
                            <span>Which media house do you want to <code>Publish to </code>, Select a media house  to continue.</span>
                            {{getSelectMedia}}

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-header-breadcrumb">
                        <ul class="breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="index.html"> <i class="feather icon-home"></i> </a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!">Select Media house</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page-header end -->

        <!-- Page body start -->
        <!--<div class="page-body">-->
            <!--<div class="row">-->
                <!--<div class="col-sm-12">-->
                    <!--&lt;!&ndash; Default select start &ndash;&gt;-->
                    <!--<div class="card">-->
                        <!--<div class="card-header">-->
                            <!--&lt;!&ndash;<h5>Default Select</h5>&ndash;&gt;-->
                            <!--&lt;!&ndash;<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>&ndash;&gt;-->

                        <!--</div>-->
                        <!--<div class="card-block">-->
                            <!--<div class="row">-->
                                <!--<div  v-for="(logos,index) in mediaHouse"  :key="index" class="col-md-12 col-sm-12 col-xl-12 m-b-30">-->
                                    <!--&lt;!&ndash;<h4 class="sub-title"> Select media type</h4>&ndash;&gt;-->
                                    <!--<label class="image-checkbox" :id="index">-->
                                        <!--<img  class="img-responsive m-logo" v-bind:src="['/thumbnails/' + logos.logo]" @click="getSelMediaHouse(index)" :title="logos.media_house">-->
                                        <!--<input type="checkbox"  :value="logos.media_house"  v-model="selMediaH" />-->
                                        <!--<i class="fa fa-check hidden"></i>-->
                                    <!--</label>-->
                                <!--</div>-->
                                <!--<div style="padding-left: 16px;">-->
                                    <!--<router-link :to="select_media_house"  class="btn btn-mat btn-info" >Back</router-link>-->
                                    <!--<router-link :to="file_upload" class="btn btn-mat btn-inverse ">Next</router-link>-->
                                <!--</div>-->
                            <!--</div>-->
                        <!--</div>-->
                    <!--</div>-->
                    <!--&lt;!&ndash; Default select end &ndash;&gt;-->

                <!--</div>-->
            <!--</div>-->
        <!--</div>-->
        <!--<h5 class="m-b-20">Gallery with description</h5>-->
            <div v-show="getProcessStatus" class="default-grid row">
              <show-processing></show-processing>
            </div>


                <div v-show="showMedia" class="default-grid row" :class="fadeIn">
            <div class="row lightboxgallery-popup">
                <div  v-for="(logos,index) in mediaHouse"  :key="index" class="col-lg-3 col-md-6 default-grid-item">
                    <div class="card gallery-desc">
                        <div class="masonry-media">
                            <a class="media-middle" href="#!">
                                <!--<img class="img-fluid" src="https://colorlib.com//polygon/adminty/files/assets/images/gallery-grid/masonry-1.jpg" alt="masonary">-->
                                <label class="image-checkbox" :id="index">
                                <img  class="img-fluid" v-bind:src="['/thumbnails/' + logos.logo]" @click="getSelMediaHouse(index)">
                                <input type="radio"  :value="logos.media_house"  v-model="selMediaH" />
                                <i class="fa fa-check hidden"></i>
                                </label>

                            </a>
                        </div>
                        <div class="card-block">
                            <h6 class="job-card-desc">Media house Description</h6>
                            <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            <!--<div class="job-meta-data"><i class="icofont icofont-safety"></i>washington</div>-->
                            <div class="job-meta-data"><i class="icofont icofont-university"></i>{{logos.media_house}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="padding-left: 16px;">

            </div>

        </div>
        <div v-show="showMedia" class="animated fadeIn">
            <router-link :to="{name : selectMedia}"  class="btn btn-mat btn-info" >Back</router-link>
            <router-link :to="file_upload" class="btn btn-mat btn-inverse " @click.native="fetchSegmentTitles()">Next</router-link>
        </div>

    </div>




</template>

<script>
    import  store from  '../../vuex/store';
    import PreLoader from "../preloader/preLoader.vue";
    import ShowProcessing from "../payment/showProcess.vue";

    export default {
        //props :['media'],
        components: {
            ShowProcessing,
            PreLoader},
        name : 'displayMediaHouseImags',

        mounted(){
            this.fetchMediaHouse();


        },
        created(){
        },
        data(){
            return {
                r_animate : '',
                selMediaH: '',
                selMediaHouse : '',
                 showBtn : true,
                file_upload : '/user-account/create-sub-file',
                selectMedia : 'selectMedia',
                media : this.$route.params.media,
            }
        },
        methods: {
            fetchSegmentTitles(){
                let self = this;
                store.dispatch('getProcessing', true);

                setTimeout(function () {
                    store.dispatch('getProcessing', false);

                    store.dispatch('fetchSegmentTitles', self.selMediaH);
                    store.dispatch('getSelectedMedia', self.selMediaH);
                   // store.dispatch('changeStateShowSelMediaHouseTable', true);
                },3000);

            },
            fetchMediaHouse() {
                let self = this;
                store.dispatch('getProcessing', true);

                axios.get('media-houses-api/' + self.getSelectMedia).then(function (res) {
                    console.log(res.data);
                    setTimeout(function () {
                        //  self.mediaHouses = res.data;
                        if(res &&  res !== ''){
                            store.dispatch('getMediaHouses', res.data);
                            store.dispatch('getSelMediaType',self.getSelectMedia);
                            // self.disable = false;
                            //    $('#myModal').modal('show');
                           // self.hideMedia();
                            store.dispatch('getProcessing', false);
                            store.dispatch('getFadeIn', 'animated fadeIn');
                            store.dispatch('getShowMediaForm', true);
                        }

                    },3000);


                });
            },
            getSelMediaHouse(id){
//                $('.' + id).toggleClass('selected-media');
//                console.log(id);
                store.dispatch('getSelMediaHouse', this.selMediaH);

            },
            showSubmitBtn(){
                if(this.selMediaH.length > 0){
                    return false;

                }
                else{
                    return true;
                }
            }
        },

        computed:{
           mediaHouse(){
               return store.getters.mediaHouses;
           },
            getSelectMedia(){
                return store.state.selMedia;
            },
            fadeIn(){
                return store.getters.fadeInn;
            },
            showMedia(){
                return store.state.showMediaForm;
            },
            getProcessStatus(){
                return  store.state.processing;
            },
            mediaHousesss(){
               return store.state.selMediaHouse;
            }
        },

    }

</script>

