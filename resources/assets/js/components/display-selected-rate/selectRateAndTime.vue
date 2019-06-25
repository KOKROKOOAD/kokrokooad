<template>

            <div  class="modal fade" id="mol" tabindex="-1" role="dialog" style="margin-left: 220px;">
                <div class="modal-dialog modal-lg" role="document">
                    <form  @submit.prevent="" id="segment-form">
                    <div class="modal-content">
                        <div class="modal-header">


                            <h4 class="modal-title"><b class="text-danger">{{getMediaHouse}}</b>- {{card_title}} rate card</h4>
<!--                            <span>Your file : <b class="text-info">{{fileName}}</b><i style="margin-left: 20px;">File size :</i> <b>{{fileSize}}bytes</b></span>-->
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">

                            <div class="form-group">
                                <input class="form-control" required="required" name="title" type="text" v-model="title"  placeholder="Enter segment title  eg:short video  on  history of gold coast">

                            </div>
                            <div class="table-responsive">
                            <table class="table table-bordered">
                            <thead>
                            <tr v-for="(segment,index) in segmentData" :key="index" style="background: #36475F;color: #ffffff;">
                            <th>#</th>
                                <th v-show="segmentDay.substring(0,3).toUpperCase() === JSON.parse(segment.segments).dura.mon">{{JSON.parse(segment.segments).dura.mon}}</th>
                                <th v-show="segmentDay.substring(0,3).toUpperCase() === JSON.parse(segment.segments).dura.tue">{{JSON.parse(segment.segments).dura.tue}}</th>
                                <th v-show="segmentDay.substring(0,3).toUpperCase() === JSON.parse(segment.segments).dura.wed">{{JSON.parse(segment.segments).dura.wed}}</th>
                                <th v-show="segmentDay.substring(0,3).toUpperCase() === JSON.parse(segment.segments).dura.thu">{{JSON.parse(segment.segments).dura.thu}}</th>
                                <th v-show="segmentDay.substring(0,3).toUpperCase() === JSON.parse(segment.segments).dura.fri">{{JSON.parse(segment.segments).dura.fri}}</th>
                                 <th >Spots</th>
                                <th v-show="JSON.parse(segment.segments).dura.sec1 > 0">{{JSON.parse(segment.segments).dura.sec1 + JSON.parse(segment.segments).dura.time1}}</th>
                                <th v-show="JSON.parse(segment.segments).dura.sec2 > 0">{{JSON.parse(segment.segments).dura.sec2 + JSON.parse(segment.segments).dura.time2}}</th>
                                <th v-show="JSON.parse(segment.segments).dura.sec3 > 0">{{JSON.parse(segment.segments).dura.sec3 + JSON.parse(segment.segments).dura.time3}}</th>
                                <th v-show="JSON.parse(segment.segments).dura.sec4 > 0">{{JSON.parse(segment.segments).dura.sec4 + JSON.parse(segment.segments).dura.time4}}</th>
                                <th v-show="JSON.parse(segment.segments).dura.sec5 > 0">{{JSON.parse(segment.segments).dura.sec5 + JSON.parse(segment.segments).dura.time5}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(segment,index) in segmentData" :key="index">
                            <th scope="row">{{index + 1}}</th>
                                <td v-show="segmentDay.substring(0,3).toUpperCase() === JSON.parse(segment.segments).dura.mon">{{JSON.parse(segment.segments).mon_duration}}-{{JSON.parse(segment.segments).mon_b_duration}}</td>
                                <td v-show="segmentDay.substring(0,3).toUpperCase() === JSON.parse(segment.segments).dura.tue">{{JSON.parse(segment.segments).tue_duration}}-{{JSON.parse(segment.segments).tue_b_duration}}</td>
                                <td v-show="segmentDay.substring(0,3).toUpperCase() === JSON.parse(segment.segments).dura.wed">{{JSON.parse(segment.segments).wed_duration}}-{{JSON.parse(segment.segments).wed_b_duration}}</td>
                                <td v-show="segmentDay.substring(0,3).toUpperCase() === JSON.parse(segment.segments).dura.thu">{{JSON.parse(segment.segments).thu_duration}}-{{JSON.parse(segment.segments).thu_b_duration}}</td>
                                <td v-show="segmentDay.substring(0,3).toUpperCase() === JSON.parse(segment.segments).dura.fri">{{JSON.parse(segment.segments).fri_duration}}-{{JSON.parse(segment.segments).fri_b_duration}}</td>

                                <td> <select name="select" v-model="spots[index]">
                                    <option disabled value="" selected></option>
                                    <option v-for=" (s,index) in spot_avail(spots_available)" :key="index" :name="'seA' + (index)"   :value="s" >{{s}}</option>

                                </select></td>

<!--                                <td v-if="segment.sec1_rate  !== null "><input type="radio"   :name="'seA' + (index)" :value="{'startDate':startDate,'endDate':endDate,'startTime':segment.mon_seg_start,'endTime' :segment.mon_seg_end,durations : segments_headings.sec1,'rate':segment.sec1_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{segment.sec1_rate}} GHC</td>-->
<!--                                <td v-if="segment.sec2_rate  !== null "><input type="radio"   :name="'seB' + (index)" :value="{'startDate':startDate,'endDate':endDate,'startTime':segment.mon_seg_start,'endTime' :segment.mon_seg_end,durations : segments_headings.sec2,'rate':segment.sec2_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{segment.sec2_rate}} GHC</td>-->
<!--                                <td v-if="segment.sec3_rate  !== null "><input type="radio"   :name="'seC' + (index)" :value="{'startDate':startDate,'endDate':endDate,'startTime':segment.mon_seg_start, 'endTime' :segment.mon_seg_end,durations : segments_headings.sec3,'rate':segment.sec3_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{segment.sec3_rate}} GHC</td>-->
<!--                                <td v-if="segment.sec4_rate  !== null "><input type="radio"   :name="'seD' + (index)" :value="{'startDate':startDate,'endDate':endDate,'startTime':segment.mon_seg_start, 'endTime' :segment.mon_seg_end,durations : segments_headings.sec4,'rate':segment.sec4_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{segment.sec4_rate}} GHC</td>-->
<!--                                <td v-if="segment.sec5_rate  !== null "><input type="radio"   :name="'seE' + (index)" :value="{'startDate':startDate,'endDate':endDate,'startTime':segment.mon_seg_start, 'endTime' :segment.mon_seg_end,durations : segments_headings.sec5,'rate':segment.sec5_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{segment.sec5_rate}} GHC</td>-->
                                <td v-show="JSON.parse(segment.segments).dura.sec1 > 0"><input type="radio"   :name="'seA' + (index)" :value="{'startDate':startDate,'endDate':endDate,'startTime':JSON.parse(segment.segments).mon_duration,'endTime' :JSON.parse(segment.segments).mon_b_duration,durations : JSON.parse(segment.segments).dura.sec1 + JSON.parse(segment.segments).dura.time1,'rate':JSON.parse(segment.segments).sec1_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+JSON.parse(segment.segments).sec1_rate}}</td>
                                <td v-show="JSON.parse(segment.segments).dura.sec2 > 0"><input type="radio"   :name="'seB' + (index)" :value="{'startDate':startDate,'endDate':endDate,'startTime':JSON.parse(segment.segments).tue_duration,'endTime' :JSON.parse(segment.segments).tue_b_duration,durations : JSON.parse(segment.segments).dura.sec2 + JSON.parse(segment.segments).dura.time1,'rate':JSON.parse(segment.segments).sec2_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+JSON.parse(segment.segments).sec2_rate}}</td>
                                <td v-show="JSON.parse(segment.segments).dura.sec3 > 0"><input type="radio"   :name="'seC' + (index)" :value="{'startDate':startDate,'endDate':endDate,'startTime':JSON.parse(segment.segments).wed_duration, 'endTime' :JSON.parse(segment.segments).wed_b_duration,durations : JSON.parse(segment.segments).dura.sec3 + JSON.parse(segment.segments).dura.time1,'rate':JSON.parse(segment.segments).sec3_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+JSON.parse(segment.segments).sec3_rate}}</td>
                                <td v-show="JSON.parse(segment.segments).dura.sec4 > 0"><input type="radio"   :name="'seD' + (index)" :value="{'startDate':startDate,'endDate':endDate,'startTime':JSON.parse(segment.segments).thu_duration, 'endTime' : JSON.parse(segment.segments).thu_b_duration,durations : JSON.parse(segment.segments).dura.sec4 + JSON.parse(segment.segments).dura.time1,'rate':JSON.parse(segment.segments).sec4_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+JSON.parse(segment.segments).sec4_rate}}</td>
                                <td v-show="JSON.parse(segment.segments).dura.sec5 > 0"><input type="radio"   :name="'seE' + (index)" :value="{'startDate':startDate,'endDate':endDate,'startTime':JSON.parse(segment.segments).fri_duration, 'endTime' : JSON.parse(segment.segments).fri_b_duration,durations : JSON.parse(segment.segments).dura.sec5 + JSON.parse(segment.segments).dura.time1,'rate':JSON.parse(segment.segments).sec5_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+JSON.parse(segment.segments).sec5_rate}}</td>
                            </tr>
                            </tbody>
                            </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                            <!--<button class="btn btn-mat btn-secondary ">save</button>-->
                            <router-link :to="{name : 'invoice'}" v-if="title" v-show="validateRateCardSelection(this.seg_data)"   class="btn btn-primary waves-effect waves-light " @click.native="submit(title)" >Schedule</router-link>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
</template>

<script>
    import  store from '../../vuex/store';

    export default {
        props :['saveSegment','startDate','endDate','media_id','segments_data','card_title'],
        name : 'selectSegments',

        mounted(){
        // this.eventTime();
         // this.validateRateCardSelection(this.seg_data);

        },
        created(){

        },
        data(){
            return {
                //invoice: '/user-account/create-sub-invoice',
                segment_date: '/user-account/create-sub-date',
                selSegment_url: '/user-account/select-segment',
                // segments_data:
                //     [{"mon_seg_start": "07:00","mon_seg_end": "08:00","mon_spots": "3",
                //         "sec1_rate": "500", "sec2_rate": "800", "sec3_rate": "1200", "sec4_rate": "1800", "sec5_rate": null},{"mon_seg_start": "08:00","mon_seg_end": "09:00","mon_spots": "3",
                //         "sec1_rate": "500", "sec2_rate": "800", "sec3_rate": "1200", "sec4_rate": "1800", "sec5_rate": null},{"mon_seg_start": "09:00","mon_seg_end": "10:00","mon_spots": "3",
                //         "sec1_rate": "500", "sec2_rate": "800", "sec3_rate": "1200", "sec4_rate": "1800", "sec5_rate": null},{"mon_seg_start": "10:00","mon_seg_end": "11:00","mon_spots": "3",
                //         "sec1_rate": "500", "sec2_rate": "800", "sec3_rate": "1200", "sec4_rate": "1800", "sec5_rate": null},{"mon_seg_start": "11:00","mon_seg_end": "12:00","mon_spots": "3",
                //         "sec1_rate": "500", "sec2_rate": "800", "sec3_rate": "1200", "sec4_rate": "1800", "sec5_rate": null},{"mon_seg_start": "13:00","mon_seg_end": "14:00","mon_spots": "3",
                //         "sec1_rate": "500", "sec2_rate": "800", "sec3_rate": "1200", "sec4_rate": "1800", "sec5_rate": null},{"mon_seg_start": "14:00","mon_seg_end": "15:00","mon_spots": "3",
                //         "sec1_rate": "500", "sec2_rate": "800", "sec3_rate": "1200", "sec4_rate": "1800", "sec5_rate": null}]
                // ,
               // segments_data : [],
                segments_headings : {"sec1": 15, "sec2": 20, "sec3": 25, "sec4": 30, "sec5": null},
                spots_available : 10,
                selSegment: '',
                selMedia: '',
                seg_data : [],
                spots : [],
                print_segments: [{

                }],
                title : '',
                rate : '',
                day: 'Monday',
                invoice : 'invoice',
                start : '',
                end : '',
                event_time : false,
                startDates : [],
                endDates : [],
                days_of_week : true,
                schedule : false,

            }
        },
        methods: {
            submit(title){
                store.dispatch('getSegmentTitle', title);
                this.eventTime();

                $('#mol').modal('hide');
                $('#print').modal('hide');
            },
            eventTime(){

                    store.dispatch('getSubData',this.seg_data);
            },
            spot_avail(spot){
                let s = parseInt(spot);
                let results = [];
                for (let i = 1; i < s + 1; i++){
                    results.push(i);
                }
                return results;
            },
            checkSpots(segment){
                let self = this;
                store.dispatch('getProcessing', true);
                setTimeout(function () {
                    axios.get('check-spots-api/' +  segment ).then(function (res) {
                        console.log(res.data);
                        store.dispatch('getProcessing', false);
                    }).catch(function (error) {
                        console.log(error);
                    });
                },3000);
            },
            save(){
                 store.dispatch('getSegmentTitle', this.title);
                $('#mol').modal('hide');
            },
            validateRateCardSelection(segment){
                // alert(segment.length > 0);
               return segment.length > 0;

            }
        },

        computed:{
            notification(){
                return store.getters.checkAvailableDate;
            },
            segmentDay(){
                return store.getters.segmentDay;
            },
            getMediaHouse(){
                return store.getters.selectedMediaHouse;
            },
            getRateCardTitle(){
                return store.getters.segmentTitle;
            },
            segData(){
                return store.getters.segmentsData;
            },
            getProcessStatus(){
                return  store.state.processing;
            },
            segDate(){
                return store.getters.segmentDate;
            },
            selSegments(){
                return store.getters.selectedSegment;
            },
            segTitle(){
                return store.getters.segTitle;
            },
            startTimes(){
                return store.getters.startTime;
            },
            endTimes(){
                return store.getters.endTime;
            },
            getTitle(){
                return store.state.rate_card_title;
            },

            fileName(){
                return store.getters.fileName;
            },
            fileSize(){
                return store.getters.fileSize;
            },
            startDat(){
                return this.startDate;
            },
            schedAdsData(){
                return  store.getters.subData;
            },
            mediaId(){
                return this.media_id;
            },
            segmentData(){
                return this.segments_data;
            }
        },

    }

</script>

