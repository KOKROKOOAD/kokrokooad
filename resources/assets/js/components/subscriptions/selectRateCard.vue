<template>
    <div class="page-wrapper">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h4>Rate card selection form</h4>
                            <span>What type of ad do you want to <code>Publish</code>, Select a rate card to continue.</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-header-breadcrumb">
                        <ul class="breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="index.html"> <i class="feather icon-home"></i> </a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!">Select Rate Card</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page-header end -->

        <!-- Page body start -->
        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Default select start -->
                    <div class="card">
                        <div class="card-header">
                            <h5>Selected Media house</h5>
                            <span> <code>{{getSelectMedia[0]}}</code></span>

                        </div>
                        <div class="card-block">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xl-12 m-b-30">
                                    <h4 class="sub-title"> Select rate card</h4>
                                    <select  class="form-control" type="text" name="segment" @click="getSegments()" v-model="title">
                                        <option value="" disabled selected>-Select a segment-</option>
                                        <option v-for="titles in segment_titles" :value="titles.adTitle">{{titles.adTitle}}</option>
                                    </select>
                                </div>
                                <div style="padding-left: 16px;">
                                    <router-link :to="file_upload" role="button" type="button" class="btn btn-mat btn-inverse ">Back</router-link>
                                    <router-link :to="rate_card_segments" role="button" type="button" class="btn btn-mat btn-info ">Next</router-link>

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
    import  store from  '../../vuex/store';

    export default {
        components: {},
        name: "selectRateCard",
        data(){
            return{
                se : 'sec',
                route: "{{route('ad.store')}}",
                disable : true,
                media : [],
                createAd : {
                    spots : '',
                    mediaHouse : '',
                    medias   : '',
                    publishDate : '',
                    program : '',
                    subDesc : '',
                    subTitle : '',
                    file: '',
                    rate : '',
                },
                file_durations : '',
                //image : [],
                mediaHouses : [],
                mediaProgram : [],
                programDate : '',
                rates :'',
                spot : '',
                allErrors : [],
                success : 'Successfully created',
                program : '',
                spotsAndRates : {},
                show : false,
                data_list : [],
                title : '',
                //segment_titles : [],
                segments_data : [],
                wsegments_data : [],
                segments_headings:[],
                wsegments_headings : [],
                mediaTypes : '',
                selMedia : '',
                print_segments : [],
                enable_submit : true,
                selAd : [],
                file : '',
                file_upload : '/user-account/create-sub-file',
                rate_card_segments : '/user-account/create-sub-segments'



            }
        },
        mounted(){
            //this.loadMedia();
            this.fetchMediaTypes();
            //this.getSelectedColumn();
            //this.upLoadFile();
        },
        methods: {

            fetchMediaTypes(index){
                let self = this;
                axios.get('fetch-media-types-api').then(function (res) {
                    self.mediaTypes = res.data;

                });

            },
            fetchMediaHouse() {
                let self = this;
                store.dispatch('getProcessing', true);

                axios.get('media-houses-api/' + self.createAd.medias).then(function (res) {
                    setTimeout(function () {
                        self.mediaHouses = res.data;
                        store.dispatch('getSelMediaType',self.createAd.medias);
                        self.disable = false;
                        $('#myModal').modal('show');
                    },3000);


                });
            },

            getSegments() {
                let self = this;
                store.dispatch('getProcessing', true);
                axios.get('fetch-segments/' + self.getSelectMedia + '/' + self.title).then(function (res) {
                    setTimeout(function () {
                        console.log(res.data[0]);
                        self.selMedia = res.data[1];
                        let dat = res.data[0];

                        for (let key in dat) {
                            if (dat.hasOwnProperty(key)) {
                                //  console.log(dat[key].segments);
                                if(self.selMedia.toLowerCase() === 'print'){
                                    self.print_segments = dat[key].segments;
                                    console.log(self.print_segments);
                                }
                                else{
                                    store.dispatch('getSelMediaId',dat[key].client_id);
                                    self.segments_data = dat[key].segments;
                                    self.wsegments_data = dat[key].weekends_segments;
                                    self.segments_headings = JSON.parse(dat[key].durations);
                                    self.wsegments_headings = JSON.parse(dat[key].weekends_durations);

                                }

                            }
                        }
//                    if(self.segments_headings.sec1 < self.file_durations || self.segments_headings.sec2 < self.file_durations ||
//                        self.segments_headings.sec3 < self.file_durations || self.segments_headings.sec4 < self.file_durations ||
//                        self.segments_headings.sec5 < self.file_durations){
//                                          $('#ifFileUploadGreaterThanSegDuration').modal('show');
//                    }
//                    else{
//
//                           let durations  = [];
//                            durations.push(this.segments_headings.sec1,this.segments_headings.sec2,
//                            this.segments_headings.sec3,this.segments_headings.sec4,this.segments_headings.sec5);
//
//                                              let curr = durations[0];
//                                              let diff = Math.abs (self.file_durations - curr);
//                                              for (let val = 0; val < durations.length; val++) {
//                                                  let newdiff = Math.abs (10 - durations[val]);
//                                                  if (newdiff < diff) {
//                                                      diff = newdiff;
//                                                      curr = durations[val];
//                                                  }
//                                              }
//                                              console.log(curr);
//                                       self.show = true;
//                                      $('#mol').modal('show');
//                    }

                    },300);
                    if(self.selMedia.toLowerCase() !== 'print'){
                        self.show = true;
                        $('#mol').modal('show');
                    }
                    else{
                        self.show = true;
                        $('#mol2').modal('show');
                    }

                });
            },

//
            upLoadFile(){
                let objectUrl;
                let self = this;

                $("#audio").on("canplaythrough", function(e){
                    let seconds = e.currentTarget.duration;
                    let duration = moment.duration(seconds, "seconds");


                    let time = "";
                    let hours = duration.hours();
                    if (hours > 0) { time = hours + ":" ; }

                    time = time + duration.minutes() + ":" + duration.seconds();
                    $("#duration").text(time);
                    self.file_durations =  moment.duration(time).asSeconds();
                    console.log(self.file_durations);

                    URL.revokeObjectURL(objectUrl);
                });

                $("#file").change(function(e){
                    let file = e.currentTarget.files[0];
                    self.createAd.file = file.name;
                    //  store.dispatch('getFileName', self.createAd.file);



                    $("#filename").text(file.name);
                    $("#filetype").text(file.type);
                    $("#filesize").text(file.size);

                    objectUrl = URL.createObjectURL(file);
                    $("#audio").prop("src", objectUrl);

                });


            },
            loopAdData(test_array){

                let index = -1,
                    arr_length = test_array ? test_array.length : 0,
                    resIndex = -1,
                    result = [];

                while (++index < arr_length) {
                    let value = test_array[index];

                    if ( value.mSelRate1 !== '' ||  value.tSelRate1 !== '') {
                        result[++resIndex] = value;
                    }
                }

                console.log(result);
            },
            removeMediaHouse(){

            },
            hideMedia(){
                console.log('hi  world');
                store.dispatch('getShowMediaForm',false);
            }

        },
        computed:{

            programSpot(){
                if(this.createAd.spots === ""){
                    return "0";
                }
                return this.createAd.spots;

            },
            getSelectMedia(){
                return store.state.selMedia;
            },
            segment_titles(){
                return store.state.segment_titles;
            },
            showSelMediaHouseTable(){
                if( this.getSelectMedia.length === 0){
                    return false;
                }
                else{
                    return true;
                }

            },
            getCreateAdData(){
                return store.state.create_ad_data;
            },
            wiz(){
                return  store.state.wizard
            },
            showMedia(){
                return store.state.showMediaForm;
            },
            mediaHouse(){
                return store.getters.mediaHouse;
            }

        },

    }
    // jquery v2.2



</script>
