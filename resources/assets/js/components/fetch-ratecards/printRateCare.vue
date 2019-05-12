<template>

    <div  class="modal fade" id="print" tabindex="-1" role="dialog" style="margin-left: 220px;">
        <div class="modal-dialog modal-lg" role="document">
            <form  @submit.prevent="" id="segment-form">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><b class="text-danger">{{getMediaHouse}}</b>- {{getTitle}} rate card</h4>
                        <!--<span>Your file : <b class="text-info">{{fileName}}</b><i style="margin-left: 20px;">File size :</i> <b>{{fileSize}}bytes</b></span>-->
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!--<ul v-show="event_time" v-for="sig in seg_data">-->
                    <!--<li>{{start = sig.startTime}}</li>-->
                    <!--<li>{{end = sig.endTime}}</li>-->
                    <!--</ul>-->

                    <!--{{seg_data}}-->
                    <div class="modal-body">

                        <div class="form-group">
                            <input class="form-control" required="required" name="title" type="text" v-model="title"  placeholder="Enter segment title  eg:short video  on  history of gold coast">

                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr style="background: #36475F;color: #ffffff;">
                                    <th>#</th>
                                    <th class="text-center"> Advert size</th>
                                    <th class="text-center">Rate(GHC)</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(print,index) in print_segments">
                                    <th scope="row">{{index + 1}}</th>
                                    <td class="text-center">{{print.advert_size}} <i class="feather icon-eye text-info" style="padding-left: 10px;"> </i> </td>
                                    <td class="text-center"><input type="radio"   :name="'print' + (index)" :value="{'startDate':startDate,'endDate':endDate,'startTime': print.startTime,'endTime':print.endTime,'rate':print.rate,'advert_size':print.advert_size}" v-model="seg_data[index]"/> {{print.rate}}</td>

                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                        <!--<button class="btn btn-mat btn-secondary ">save</button>-->
                        <router-link :to="{name:'invoice'}"  :disabled="seg_data.length === 0" class="btn btn-primary waves-effect waves-light " @click.native="submit(title)">Schedule</router-link>
                    </div>
                </div>
            </form>
        </div>
    </div>

</template>

<script>
    import  store from '../../vuex/store';

    export default {
        props :['saveSegment','startDate','endDate','submit'],
        name : 'printRateCard',

        mounted(){
            this.eventTime();

        },
        created(){
            //this.fetchSegments();
        },
        data(){
            return {
                //invoice: '/user-account/create-sub-invoice',
                segment_date: '/user-account/create-sub-date',
                selSegment_url: '/user-account/select-segment',
                segments_headings : {"sec1": 15, "sec2": 20, "sec3": 25, "sec4": 30, "sec5": null},
                spots_available : 10,
                selSegment: '',
                selMedia: '',
                advert_size : '',
                seg_data : [],
                spots : [],
                print_segments: [{'advert_size': '1/1" Inside','rate':'104','startTime':'','endTime': ''},{'advert_size': '2/2" Inside','rate':'149','startTime':'','endTime': ''},{'advert_size': '2/3" Inside','rate':'208','startTime':'','endTime': ''}],
                title : '',
                rate : '',
                day: 'Monday',
                invoice : 'invoice',
                start : '',
                end : '',
                event_time : false,
                startDates : [],
                endDates : []

            }
        },
        methods: {
            fetchSegments(){
                let self = this;
                store.dispatch('getProcessing', true);

                setTimeout(function () {
                    axios.get('fetch-segments/' +  self.getSelectMedia + '/' + self.getRateCardTitle).then(function (res) {

                        self.print_segments  = res.data.segments;
                        store.dispatch('getProcessing', false);

                    }).catch(function (error) {
                        console.log(error);
                    });
                },3000);

            },
            eventTime(){
                // store.dispatch('getEventStart',this.start);
                //    store.dispatch('getEventEnd',this.end);

                store.dispatch('getSubData',this.seg_data);
                // this.startDates.push('hello');
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
            getSelectMedia(){
                return store.state.selMedia;
            },

        },

    }

</script>

