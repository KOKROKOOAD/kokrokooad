<template>
    <div class="page-wrapper">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h4>Rate card selection</h4>
                            <span>What type of rate card do you want to <code>View</code>, Select a rate card.</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                </div>
            </div>
        </div>
        <!-- Page-header end -->
        <div v-show="process" class="default-grid row">
            <show-processing></show-processing>
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
                                    <h4 class="sub-title"> Select rate card</h4>
                                    <p class="text-danger" v-show="ratecards.length == 0">No rate cards found for selected media house</p>
                                    <select v-show="ratecards.length > 0 " name="select" class="form-control form-control-primary"  v-model="card_title_id" @click="getSelectedRatedCard(card_title_id)">
<!--                                        <option disabled value="" selected>Select a media house</option>-->
                                        <option v-for="(card,index) in ratecards" :value="card.rate_card_title_id" :key="index">{{card.rate_card_title}}</option>

                                    </select>
                                </div>
                                <div class="animated fadeIn" style="padding-left: 16px;">
                                <router-link :to="{name : 'view-mediahouses'}" class="btn btn-mat btn-info">Back</router-link>
                                </div>
                                <div class="animated fadeIn" style="padding-left: 16px;" v-show="  getSelectMedia !== ''">
<!--                                    <router-link :to="{name : 'selectMediaHouse'}"  role="button" type="button" class="btn btn-mat btn-inverse">Next</router-link>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <view-card-details :loader="loader" :label="label" :weekdays="weekdays" :weekends="weekends" :viewWeekendSegments="viewWeekendSegments"
                                       :days_of_week="days_of_week" :days_of_weekend="days_of_weekend" :view_rate_card="view_rate_card" :view_rate_card_w="view_rate_card_w"
                                       :media="medi" :processing="processing" :day="day" :rate_card_title="rate_card_title" :print_segments="print_segments"></view-card-details>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import  store from '../../vuex/store';

    export default {
        props :['media_house_id'],
        name: "viewRateCards",
        data(){
            return{
                ratecards : [],
                card_title_id : '',
                process : true,
                view : false,
                data_list: [],
                data_list2 : [],
                wdata_list :[],
                column_list : [],
                r_animate : '',
                title : [],
                rate_card_title : null,
                hrs : [],
                view_rate_card: [],
                view_rate_card_w : [],
                days_of_week : [],
                weekends : false,
                weekdays : true,
                days_of_weekend : [],
                label : 'View Weekends Segments',
                day : 'weekdays',
                media_h : '',
                print_segments : [],
                processing : false,
                loader : true,
                medi : ''
            }
        },
        mounted(){
            this.fetchRateCardTitles();
            this.card_title_id = '';
            if (this.media == ''){
                this.$router.push({
                    name : 'select-mtype'
                })
            }

        },
        methods: {

            fetchRateCardTitles(){
                let self = this;
                axios.get('fetchratecard/api/' + self.getSelectMedia).then(function (res) {
                    self.process = false;
                    self.view = true;
                    self.ratecards = res.data;
                }).catch(function (error) {
                });
            },
            getSelectedRatedCard(id){
                let self = this;
                let m = self.media.toLowerCase();
                self.medi  = m.charAt(0).toUpperCase() + m.slice(1);
                if(self.medi == 'Print'){
                    axios.get('view-ratecard/api',{params : {'rateCardTitleId' : id,'media' : self.media}}).then(function (res) {
                        if (res.data) {
                            self.print_segments = res.data.rate_card;
                            self.loader = false;
                            self.processing = true;
                            self.rate_card_title = res.data.rate_card_title;
                            $('.bd-example-modal-lg1').modal('show');

                        }
                    });
                }
                else{
                    axios.get('view-ratecard/api',{params : {'rateCardTitleId' : id,'media': self.media}}).then(function (res) {
                        if (res.data) {
                            self.view_rate_card =  res.data.segments;
                            self.view_rate_card_w = res.data.w_segments;
                            self.days_of_week  = JSON.parse(res.data.days_of_week);
                            console.log(self.view_rate_card_w);

                            self.days_of_weekend = JSON.parse(res.data.days_of_weekends);
                            self.rate_card_title = res.data.rate_card_title;
                            self.loader = false;
                            self.processing = true;
                            $('.bd-example-modal-lg1').modal('show');

                        }
                    });
                }
            },
            viewWeekendSegments(){
                if (this.label == 'View Weekends Segments'){
                    this.label = 'View Weekdays Segments';
                    this.weekdays = false;
                    this.weekends  = true;
                    this.day = 'Weekends'
                }
                else{
                    this.label = 'View Weekends Segments';
                    this.weekdays = true;
                    this.weekends  = false;
                    this.day = 'Weekdays'

                }

            },

        },
        computed:{

            getSelectMedia(){
                return store.getters.mediaHouseId;
            },
            media(){
                    return store.state.selMedia;

            }
        },

    }



</script>

<style scoped>



</style>