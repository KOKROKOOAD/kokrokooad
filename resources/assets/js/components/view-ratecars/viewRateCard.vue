<template>

        <!--view rate cards -->
        <div class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="page-wrapper">
                        <!-- Page-header start -->
                        <div class="page-header" v-show="processing">
                            <div class="row align-items-end">
                                <div class="col-lg-8">
                                    <div class="page-header-title">
                                        <div class="d-inline" v-for="title in rate_card_title">
                                            <h4 class="animated fadeIn"><strong class="text-danger">{{title.rate_card_title}}</strong> Rate Card <span v-show="media != 'Print'">for {{day}}</span></h4>
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
                    <div class="page-body">
                        <!-- Default Styling table start -->
                        <div class="row">
                            <div class="col-md-5"></div>
                            <div class="col-md-">
                                <p v-show="loader"><img src="/images/loading.gif" style="height: 20px;width: 20px;"><strong>Loading... Please wait</strong></p>
                            </div>
                            <div class="col-md-5"></div>

                        </div>
                        <div class="card">

                            <div class="card-block table-border-style">
                               <view-print-rate-card v-show="media == 'Print'" :print_segments="print_segments" v-if="processing"></view-print-rate-card>
                                <div class="table-responsive" v-show="media != 'Print'">
                                    <table id="simpletable" class="table  table-striped table-bordered nowrap">
                                        <thead>
                                        <tr class="table-primary animated fadeIn" v-show="weekdays">

                                            <th>#</th>
<!--                                            <th>Rate card ID</th>-->
                                            <th>{{days_of_week.mon}}</th>
                                            <th>{{days_of_week.tue}}</th>
                                            <th>{{days_of_week.wed}}</th>
                                            <th>{{days_of_week.thu}}</th>
                                            <th>{{days_of_week.fri}}</th>

                                            <th v-show="days_of_week.sec1 > 0">{{days_of_week.sec1 + days_of_week.time1}}</th>
                                            <th v-show="days_of_week.sec2 > 0">{{days_of_week.sec2 + days_of_week.time2}}</th>
                                            <th v-show="days_of_week.sec3 > 0">{{days_of_week.sec3 + days_of_week.time3}}</th>
                                            <th v-show="days_of_week.sec4 > 0">{{days_of_week.sec4 + days_of_week.time4}}</th>
                                            <th v-show="days_of_week.sec5 > 0">{{days_of_week.sec5 + days_of_week.time5}}</th>
                                        </tr>




                                        <!--show if  view weekends button is clicked-->
                                        <tr class="table-primary animated fadeIn"  v-show="weekends">

                                            <th>#</th>

                                            <th>{{days_of_weekend.sat}}</th>
                                            <th>{{days_of_weekend.sun}}</th>


                                            <th v-show="days_of_weekend.wsec1 > 0">{{days_of_weekend.wsec1 + days_of_weekend.time1}}</th>
                                            <th v-show="days_of_weekend.wsec2 > 0">{{days_of_weekend.wsec2 + days_of_weekend.time2}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                          <!--weekdays segments-->
                                        <tr class="animated fadeIn" v-for="(card,index) in view_rate_card" v-show="weekdays">
                                            <th scope="row" >{{index + 1}}</th>
<!--                                            <td>{{card.rate_card_id}}</td>-->
                                            <td>{{card.mon_duration.substr(0,2) + ':' + card.mon_b_duration}} - {{ card.mon_c_duration.substr(0,2) + ':'+ card.mon_d_duration + '' +  card.mon_c_duration.substr(2,3)}}
                                                 <am-pm :time="card.mon_c_duration.substr(0,2) "> </am-pm>
                                                <span class="pull-right text-primary" style="font-weight:bolder">{{'SPOTS :' + card.mon_spots}}</span>
                                            </td>

                                            <td>{{card.tue_duration.substr(0,2) + ':' + card.tue_b_duration}} - {{ card.tue_c_duration.substr(0,2) + ':'+ card.tue_d_duration + '' +  card.tue_c_duration.substr(2,3)}}
                                                <am-pm :time="card.tue_c_duration.substr(0,2) "> </am-pm>

                                                <span class="pull-right text-primary" style="font-weight:bolder">{{'SPOTS :' + card.tue_spots}}</span></td>
                                            <td>{{card.wed_duration.substr(0,2) + ':' + card.wed_b_duration}} - {{ card.wed_c_duration.substr(0,2) + ':'+ card.wed_d_duration + '' +  card.wed_c_duration.substr(2,3)}}
                                                <am-pm :time="card.wed_c_duration.substr(0,2) "> </am-pm>

                                                <span class="pull-right text-primary" style="font-weight:bolder">{{'SPOTS :' + card.wed_spots}}</span></td>
                                            <td>{{card.thu_duration.substr(0,2) + ':' + card.thu_b_duration}} - {{ card.thu_c_duration.substr(0,2) + ':'+ card.thu_d_duration + '' +  card.thu_c_duration.substr(2,3)}}
                                                <am-pm :time="card.thu_c_duration.substr(0,2) "> </am-pm>

                                                <span class="pull-right text-primary" style="font-weight:bolder">{{'SPOTS :' + card.tue_spots}}</span></td>
                                            <td>{{card.fri_duration.substr(0,2) + ':' + card.fri_b_duration}} - {{ card.fri_c_duration.substr(0,2) + ':'+ card.fri_d_duration + '' +  card.fri_c_duration.substr(2,3)}}
                                                <am-pm :time="card.fri_c_duration.substr(0,2) "> </am-pm>
                                                <span class="pull-right text-primary" style="font-weight:bolder">{{'SPOTS :' + card.fri_spots}}</span></td>
                                            <td v-show="days_of_week.sec1 > 0">{{'GHS'+ card.sec1_rate}}</td>
                                            <td v-show="days_of_week.sec2 > 0">{{'GHS'+ card.sec2_rate}}</td>
                                            <td v-show="days_of_week.sec3 > 0">{{'GHS'+ card.sec3_rate}}</td>
                                            <td v-show="days_of_week.sec4 > 0">{{'GHS'+ card.sec4_rate}}</td>
                                            <td v-show="days_of_week.sec5 > 0">{{'GHS'+ card.sec5_rate}}</td>
                                        </tr>





                                        <!--view weekends-->
                                        <tr class="animated fadeIn" v-for="(card,index) in view_rate_card_w" v-show="weekends" v-if="card.wsec1_rate !== ''">
                                            <th scope="row" >{{index + 1}}</th>
                                            <!--                                            <td>{{card.rate_card_id}}</td>-->
                                            <td>{{card.sat_duration.substr(0,2) + ':' + card.sat_b_duration}} - {{ card.sat_c_duration.substr(0,2) + ':'+ card.sat_d_duration + '' +  card.sat_c_duration.substr(2,3)}} <span class="pull-right text-primary" style="font-weight:bolder">{{'SPOTS :' + card.sat_spots}}</span></td>
                                            <td>{{card.sun_duration.substr(0,2) + ':' + card.sun_b_duration}} - {{ card.sun_c_duration.substr(0,2) + ':'+ card.sun_d_duration + '' +  card.sun_c_duration.substr(2,3)}}<span class="pull-right text-primary" style="font-weight:bolder">{{'SPOTS :' + card.sun_spots}}</span></td>
                                            <td v-show="days_of_weekend.wsec1 > 0 ">{{'GHS'+ card.wsec1_rate}}</td>
                                            <td v-show="days_of_weekend.wsec2 > 0">{{'GHS'+ card.wsec2_rate}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" v-show="media != 'Print'" class="btn btn-primary" @click="viewWeekendSegments">{{label}}</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
</template>

<script>
    import  store from  '../../vuex/store';
    import printRateCare from "../view-ratecars/printRateCare";

    export default {
        name: "viewRateCard",
        components :{printRateCare},
        props : ['label','media','view_rate_card','weekends','days_of_week','days_of_weekend',
            'weekdays','loader','view_rate_card_w','processing','rate_card_title','day','viewWeekendSegments','print_segments'],
        data(){
            return{

            }
        },
        mounted(){
        },
        methods:{
        },
        computed:{

        }
    }
</script>

<style scoped>

</style>