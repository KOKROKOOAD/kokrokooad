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
                            <!--<span class="pull-right"> <code>{{getSelectMedia}}-</code></span>-->

                        </div>
                        <div class="card-block">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xl-12 m-b-30">
                                    <h4 class="sub-title"> Select rate card</h4>
                                    <select  class="form-control" type="text" name="segment" @click="getSelRateCard()" v-model="title">
                                        <option value="" disabled selected>-Select a segment-</option>
                                        <option v-for="titles in seg_titles" :value="titles.rate_card_title_id">{{titles.rate_card_title}}</option>
                                    </select>
                                </div>
                                <div style="padding-left: 16px;">
                                    <router-link :to="{name:file_upload}" role="button" type="button" class="btn btn-mat btn-inverse ">Back</router-link>
                                    <router-link v-show="title" :to="{name:calender_url}" role="button" type="button" class="btn btn-mat btn-info animated fadeIn">Next</router-link>

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

                allErrors : [],
                success : 'Successfully created',
                title : '',
                file : '',
                file_upload : 'fileupload',
                rate_card_segments : '/user-account/create-sub-date',
                calender_url : 'fullcalender',
                seg_titles : null,
                rate_card_id : null



            }
        },
        mounted(){
            this.fetchRateCards();


        },
        methods: {

            getSelRateCard() {
                store.dispatch('getRateCardTitle', this.title);
            },

            hideMedia(){
                console.log('hi  world');
                store.dispatch('getShowMediaForm',false);
            },
            fetchRateCards(){
                let self = this;
                axios.get('fetch-segments-titles/' + self.mediaId).then(function(res){
                     alert(res.data);
                    self.seg_titles = res.data;
                   // context.commit('setSegment_titles',res.data);
                    //  context.commit('getSelMediaId',res.data[1].client_id);

                    //self.showSelMediaHouseTable = true;
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
            },
            getTitle(){
                return store.state.rate_card_title;
            },
            mediaHousesss(){
                return store.state.selMediaHouse;
            },
            mediaId(){
                return store.state.mediaHouseId;

            }

        },

    }
    // jquery v2.2



</script>
