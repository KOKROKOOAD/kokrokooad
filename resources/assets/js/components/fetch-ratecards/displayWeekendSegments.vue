<template>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr  style="background: #36475F;color: #ffffff;">
                                            <th>#</th>
                                            <th v-show="segDay.substr(0,3).toUpperCase()  === days.sat">{{days.sat}}</th>
                                            <th v-show="segDay.substr(0,3).toUpperCase()  === days.sun">{{days.sat}}</th>
                                            <th >Spots</th>
                                            <th v-show="segDay.substr(0,3).toUpperCase()  === days.sat" v-if="days.wsec1 > 0">{{days.wsec1 + days.time1}}</th>
                                            <th v-show="segDay.substr(0,3).toUpperCase()  === days.sat" v-if="days.wsec2 > 0">{{days.wsec2 + days.time2}}</th>
                                            <th v-show="segDay.substr(0,3).toUpperCase()  === days.sat" v-if="days.wsec3 > 0">{{days.wsec3 + days.time3}}</th>
                                            <th v-show="segDay.substr(0,3).toUpperCase()  === days.sat" v-if="days.wsec4 > 0">{{days.wsec4 + days.time4}}</th>
                                            <th v-show="segDay.substr(0,3).toUpperCase()  === days.sat" v-if="days.wsec5 > 0">{{days.wsec5 + days.time5}}</th>

                                            <th v-show="segDay.substr(0,3).toUpperCase()  === days.sun"  v-if="days.wsec1 > 0">{{days.wsec1 + days.time1}}</th>
                                            <th v-show="segDay.substr(0,3).toUpperCase()  === days.sun"  v-if="days.wsec2 > 0">{{days.wsec2 + days.time2}}</th>
                                            <th v-show="segDay.substr(0,3).toUpperCase()  === days.sun"  v-if="days.wsec3 > 0">{{days.wsec3 + days.time3}}</th>
                                            <th v-show="segDay.substr(0,3).toUpperCase()  === days.sun"  v-if="days.wsec4 > 0">{{days.wsec4 + days.time4}}</th>
                                            <th v-show="segDay.substr(0,3).toUpperCase()  === days.sun"  v-if="days.wsec5 > 0">{{days.wsec5 + days.time5}}</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="(seg,index) in wsegments" :key="index">
                                            <th scope="row">{{index + 1}}</th>
                                            <td v-show="segDay.substr(0,3).toUpperCase() == days.sat">{{seg.sat_duration.substr(0,2) + ':' + seg.sat_b_duration }}-{{seg.sat_c_duration.substr(0,2) + ':' + seg.sat_d_duration + '' + seg.sat_c_duration.substr(2,3) }}</td>
                                            <td v-show="segDay.substr(0,3).toUpperCase() == days.fri">{{seg.sun_duration.substr(0,2) + ':' + seg.sun_b_duration }}-{{seg.sun_c_duration.substr(0,2) + ':' + seg.sun_d_duration + '' + seg.sun_c_duration.substr(2,3) }}</td>

                                            <td v-show="segDay.substr(0,3).toUpperCase() == days.sat"> <select name="select" v-model="spots[index]">
                                                <option disabled value="" selected>spots</option>
                                                <option v-for=" (s,index) in spot_avail(seg.sat_spots)" :key="index" :name="'seA' + (index)"   :value="s" >{{s}}</option>

                                            </select></td>
                                            <td v-show="segDay.substr(0,3).toUpperCase() == days.sun"> <select name="select" v-model="spots[index]">
                                                <option disabled value="" selected>spots</option>
                                                <option v-for=" (s,index) in spot_avail(seg.sun_spots)" :key="index" :name="'seA' + (index)"   :value="s" >{{s}}</option>

                                            </select></td>
                                            <td v-show="segDay.substr(0,3).toUpperCase() == days.sat" v-if="days.wsec1 > 0"><input type="radio"   :name="'seA' + (index)"  :value="{'startDate': startDate + '' + seg.sat_duration.substr(0,2) + ':' + seg.sat_b_duration  + '' +seg.sat_duration.substr(2,3),'endDate':endDate + '' + seg.sat_c_duration.substr(0,2) + ':' + seg.sat_d_duration  + '' +seg.sat_c_duration.substr(2,3),'endTime' :seg.sat_b_duration,durations : days.wsec1 + days.time1,'rate': seg.wsec1_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.wsec1_rate}}</td>
                                            <td v-show="segDay.substr(0,3).toUpperCase() == days.sat" v-if="days.wsec2 > 0"><input type="radio"   :name="'seA' + (index)"  :value="{'startDate': startDate + '' + seg.sat_duration.substr(0,2) + ':' + seg.sat_b_duration  + '' +seg.sat_duration.substr(2,3),'endDate':endDate + '' + seg.sat_c_duration.substr(0,2) + ':' + seg.sat_d_duration  + '' +seg.sat_c_duration.substr(2,3),'endTime' :seg.sat_b_duration,durations : days.wsec1 + days.time2,'rate': seg.wsec2_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.wsec2_rate}}</td>
                                            <td v-show="segDay.substr(0,3).toUpperCase() == days.sat" v-if="days.wsec3 > 0"><input type="radio"   :name="'seA' + (index)"  :value="{'startDate': startDate + '' + seg.sat_duration.substr(0,2) + ':' + seg.sat_b_duration  + '' +seg.sat_duration.substr(2,3),'endDate':endDate + '' + seg.sat_c_duration.substr(0,2) + ':' + seg.sat_d_duration  + '' +seg.sat_c_duration.substr(2,3),'endTime' :seg.sat_b_duration,durations : days.wsec1 + days.time3,'rate': seg.wsec3_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.wsec3_rate}}</td>
                                            <td v-show="segDay.substr(0,3).toUpperCase() == days.sat" v-if="days.wsec4 > 0"><input type="radio"   :name="'seA' + (index)"  :value="{'startDate': startDate + '' + seg.sat_duration.substr(0,2) + ':' + seg.sat_b_duration  + '' +seg.sat_duration.substr(2,3),'endDate':endDate + '' + seg.sat_c_duration.substr(0,2) + ':' + seg.sat_d_duration  + '' +seg.sat_c_duration.substr(2,3),'endTime' :seg.sat_b_duration,durations : days.wsec1 + days.time4,'rate': seg.wsec4_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.wsec4_rate}}</td>
                                            <td v-show="segDay.substr(0,3).toUpperCase() == days.sat" v-if="days.wsec5 > 0"><input type="radio"   :name="'seA' + (index)"  :value="{'startDate': startDate + '' + seg.sat_duration.substr(0,2) + ':' + seg.sat_b_duration  + '' +seg.sat_duration.substr(2,3),'endDate':endDate + '' + seg.sat_c_duration.substr(0,2) + ':' + seg.sat_d_duration  + '' +seg.sat_c_duration.substr(2,3),'endTime' :seg.sat_b_duration,durations : days.wsec1 + days.time5,'rate': seg.wsec5_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.wsec5_rate}}</td>

                                            <td v-show="segDay.substr(0,3).toUpperCase() == days.sun" v-if="days.wsec1 > 0"><input type="radio"   :name="'seA' + (index)"  :value="{'startDate': startDate + '' + seg.sun_duration.substr(0,2) + ':' + seg.sun_b_duration  + '' +seg.sun_duration.substr(2,3),'endDate':endDate + '' + seg.sun_c_duration.substr(0,2) + ':' + seg.sun_d_duration  + '' +seg.sun_c_duration.substr(2,3),'endTime' :seg.sun_b_duration,durations : days.wsec1 + days.time1,'rate': seg.wsec1_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.wsec1_rate}}</td>
                                            <td v-show="segDay.substr(0,3).toUpperCase() == days.sun" v-if="days.wsec2 > 0"><input type="radio"   :name="'seA' + (index)"  :value="{'startDate': startDate + '' + seg.sun_duration.substr(0,2) + ':' + seg.sun_b_duration  + '' +seg.sun_duration.substr(2,3),'endDate':endDate + '' + seg.sun_c_duration.substr(0,2) + ':' + seg.sun_d_duration  + '' +seg.sun_c_duration.substr(2,3),'endTime' :seg.sun_b_duration,durations : days.wsec1 + days.time2,'rate': seg.wsec2_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.wsec2_rate}}</td>
                                            <td v-show="segDay.substr(0,3).toUpperCase() == days.sun" v-if="days.wsec3 > 0"><input type="radio"   :name="'seA' + (index)"  :value="{'startDate': startDate + '' + seg.sun_duration.substr(0,2) + ':' + seg.sun_b_duration  + '' +seg.sun_duration.substr(2,3),'endDate':endDate + '' + seg.sun_c_duration.substr(0,2) + ':' + seg.sun_d_duration  + '' +seg.sun_c_duration.substr(2,3),'endTime' :seg.sun_b_duration,durations : days.wsec1 + days.time3,'rate': seg.wsec3_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.wsec3_rate}}</td>
                                            <td v-show="segDay.substr(0,3).toUpperCase() == days.sun" v-if="days.wsec4 > 0"><input type="radio"   :name="'seA' + (index)"  :value="{'startDate': startDate + '' + seg.sun_duration.substr(0,2) + ':' + seg.sun_b_duration  + '' +seg.sun_duration.substr(2,3),'endDate':endDate + '' + seg.sun_c_duration.substr(0,2) + ':' + seg.sun_d_duration  + '' +seg.sun_c_duration.substr(2,3),'endTime' :seg.sun_b_duration,durations : days.wsec1 + days.time4,'rate': seg.wsec4_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.wsec4_rate}}</td>
                                            <td v-show="segDay.substr(0,3).toUpperCase() == days.sun" v-if="days.wsec5 > 0"><input type="radio"   :name="'seA' + (index)"  :value="{'startDate': startDate + '' + seg.sun_duration.substr(0,2) + ':' + seg.sun_b_duration  + '' +seg.sun_duration.substr(2,3),'endDate':endDate + '' + seg.sun_c_duration.substr(0,2) + ':' + seg.sun_d_duration  + '' +seg.sun_c_duration.substr(2,3),'endTime' :seg.sun_b_duration,durations : days.wsec1 + days.time5,'rate': seg.wsec5_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.wsec5_rate}}</td>

                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
</template>

<script>
    import store from "../../vuex/store";

    export default {
        props :['days','wsegments','checkDay','weekend','segDay','card_title','seg_data'],
        name: "displayWeekendSegments",
        data(){
            return{
                startDate : [],
                endDate : [],
                spots : [],
            }
        },
        methods:{
            spot_avail(spot){
                let s = parseInt(spot);
                let results = [];
                for (let i = 1; i < s + 1; i++){
                    results.push(i);
                }
                return results;
            },
        },
        computed:{
            getTitle(){
                return store.state.rate_card_title;
            },
        }
    }
</script>

<style scoped>

</style>