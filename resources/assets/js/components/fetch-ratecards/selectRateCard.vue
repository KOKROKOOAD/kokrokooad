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

                    </div>
                </div>
            </div>
        </div>
        <!-- Page-header end -->

        <div class="row">
            <div class="col-md-5"></div>
            <div class="col-md-">

                    <show-processing v-show="process"></show-processing>

            </div>
            <div class="col-md-5"></div>

        </div>




        <!-- Page body start -->
        <div class="page-body animated fadeIn" v-show="ratecards">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Default select start -->
                    <div class="card">
                        <div class="card-header">
                            <h5>Selected Media house</h5>

                            <div class="row">
                                <div class="col-md-5"></div>
                                <div class="col-md-">
                                    <p v-show="loader"><img src="/images/loading.gif" style="height: 20px;width: 20px;"><strong>Loading rate card. Please wait.....</strong></p>


                                </div>
                                <div class="col-md-5"></div>

                            </div>
                        </div>
                        <div class="card-block">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xl-12 m-b-30">
                                    <h4 class="sub-title"> Select rate card</h4>
                                    <select  class="form-control" type="text" name="segment" @change="getSelRateCard(title)" v-model="title">
                                        <option value="" disable  selected>-Select a rate card-</option>
                                        <option v-for="(titles,ind) in seg_titles" :key="ind"   :value="titles.rate_card_title_id">{{titles.rate_card_title}}</option>

                                    </select>
                                </div>
                                <div style="padding-left: 16px;">
                                    <router-link :to="{name:file_upload}" role="button" type="button" class="btn btn-mat btn-inverse ">Back</router-link>
                                    <router-link v-show="title" :to="{name:calender_url}" role="button" type="button" class="btn btn-mat btn-info animated fadeIn">Next</router-link>

                                </div>
                            </div>
<!--                            display error to user-->
                            <div  class="modal fade" id="file_durations" tabindex="-1" role="dialog" style="margin-left: 220px;">
                                <div class="modal-dialog modal-lg" role="document">
                                    <!--                <form  id="segment-form">-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"><b class="text-dark">File Durations check</b></h5>
                                            <small class="pull-right text-muted">Selected file Durations : <b>{{getFileDurations}}seconds</b></small>

                                            <!--                            <span>Your file : <b class="text-info">{{fileName}}</b><i style="margin-left: 20px;">File size :</i> <b>{{fileSize}}bytes</b></span>-->
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <div class="table-responsive" style="text-align:center;">
                                               <p class="text-primary">Your file duration exceeds selected rate card duration. Confirm selection from the view rate cards section.</p>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger waves-effect " data-dismiss="modal">Ok</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!--                 show no records message to user-->
        <div class="page-body animated fadeIn" v-show="no_records">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Default select start -->
                    <div class="card">
                        <div class="card-header">
<!--                            <h5>Selected Media house</h5>-->
                            <!--<span class="pull-right"> <code>{{getSelectMedia}}-</code></span>-->

                        </div>
                        <div class="card-block">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xl-12 m-b-30">
                                    <p class="text-danger">{{no_records_found}}</p>
                                </div>
                                <div style="padding-left: 16px;">
                                    <router-link :to="{name:selectMediaHouse}" role="button" type="button" class="btn btn-mat btn-inverse ">Back</router-link>
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
    import  store from '../../vuex/store';

    export default {
        components: {},
        name: "selectRateCard",
        data(){
            return{
                title : '',
                file : '',
                file_upload : 'fileupload',
                rate_card_segments : '/user-account/create-sub-date',
                calender_url : 'fullcalender',
                seg_titles : null,
                rate_card_id : null,
                ratecards : false,
                process : true,
                no_records_found : '',
                no_records :  false,
                selectMediaHouse : 'selectMediaHouse',
                r_id : '',
                hide : false,
                loader : false,
                days : [],
                p : [],
                dura : 0,
                rate_card_found : false,
                card :  '',
            }
        },
        mounted(){
            //check if  media type  is selected
            if(this.getSelectMedia == ''){
                this.$router.push({
                    name : 'selectMedia'
                })
            }
            else{
                this.fetchRateCards();

            }

            if(this.rate_card_found){
            }


        },
        created() {

        },
        methods: {

            getSelRateCard(id) {
                let self = this;
                let p = [];
                if(self.getSelectMedia != 'PRINT'){
                    self.loader = true;
                    axios.get('checkratecard/duration-api/' + id).then(function (res) {
                        if (res.data){
                            self.days  =   JSON.parse(res.data.days_of_week);
                            self.rate_card_found = true;
                            store.dispatch('getRateCardTitle', self.title);
                            self.getRateCardDurations(self.days,self.getFileDurations);
                            self.loader = false;
                        }

                    });
                }
                else{
                    store.dispatch('getRateCardTitle', self.title);

                }

            },
            // check audio and video file  if duration matches any of selceted rate card time durations
            getRateCardDurations(dura,file_dura){
                let k;
                let  n;
                let l;
                let o;
                let q;
                let secs = [];
                let m = []; let sec1,sec2,sec3,sec4,sec5;
                for (let key in dura) {
                    sec1 = dura['time1'];
                    sec2 = dura['time2'];
                    sec3 = dura['time3'];
                    sec4 = dura['time4'];
                    sec5 = dura['time5'];
                    k = dura['sec1'] + sec1;
                    n = dura['sec2'] + sec2;
                    l = dura['sec3'] + sec3;
                    o = dura['sec4'] + sec4;
                    q = dura['sec5'] + sec5;

                }
                    m.push(k, n, l, o, q);
                    let arr = [];
                    for (let i = 0; i < m.length; i++) {
                        if (m[i].slice(-3) == 'Sec') {
                            arr.push(m[i].substring(0, m[i].length - 3));

                        } else if (m[i].slice(-3) == 'Min') {
                            let sec = parseInt(m[i].substring(0, m[i].length - 3)) * 60;
                            arr.push(sec);
                        } else if (m[i].slice(-2) == 'Hr') {
                            let sec = parseInt(m[i].substring(0, m[i].length - 2)) * 60 * 60;
                            arr.push(sec);
                        }
                    }

                    let ma = Math.max.apply(Math, arr);
                    if (file_dura > ma) {
                        this.title = false;
                        $("#file_durations").modal('show');
                    }

            },

            hideMedia(){
                console.log('hi  world');
                store.dispatch('getShowMediaForm',false);
            },
            fetchRateCards(){
                let self = this;
                    axios.get('fetch-segments-titles/' + self.mediaId).then(function(res){
                        if (res.data == ''){
                            self.no_records_found = 'Sorry! no rate card found for selected media house.Please try other media house.';
                            self.process =  false;
                            self.no_records = true;
                            new PNotify({
                                title: "Rate card error",
                                type: "error",
                                text:  'No  rate cards found.',
                                desktop: {
                                    desktop: true,
                                    icon: "assets/images/pnotify/error.png"
                                }
                            });
                        }
                        else{
                            self.seg_titles = res.data;
                            self.process =  false;
                            self.ratecards = true;
                        }

                    });


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
            // segment_titles(){
            //     return store.state.segment_titles;
            // },
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
            getTitle(){
                return store.state.card_id;
            },
            mediaHousesss(){
                return store.state.selMediaHouse;
            },
            mediaId(){
                return store.state.mediaHouseId;

            },
            getFileDurations(){
                return  store.state.fileDuration;
            },
            getSelectMedia(){
                return store.state.selMedia;
            },

        },

    }
    // jquery v2.2



</script>
