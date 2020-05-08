<template>

    <div  class="modal fade" id="print" tabindex="-1" role="dialog" style="margin-left: 220px;">
        <div class="modal-dialog modal-lg" role="document">
            <form  @submit.prevent="" id="segment-form">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><b class="text-danger">{{getMediaHouse}}</b>- {{card_title}} rate card</h5>

                        <h5 class="float-right text-dark">
                            <small class="text-mute">
                                {{startDate + ' ' +segmentDay}}
                                <span> | Total amount : <strong style="color:rgb(246, 139, 30);font-weight: bolder;font-size: 20px;">GHS{{amountBilled.toFixed(2)}}</strong></span>
                            </small>
                        </h5>

                    </div>


                    <!--{{seg_data}}-->
                    <div class="modal-body">

                        <div class="form-group">
                            <input class="form-control" required="required"  name="title" type="text" v-model="title"  placeholder="Enter segment title  eg:short video  on  history of gold coast">

                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr style="background: #36475F;color: #ffffff;">
                                    <th>#</th>
                                    <th class="text-center">Size & Position</th>
                                    <th class="text-center"> Spots</th>
                                    <th class="text-center">Rate(GHC)</th>
                                    <th class="text-center">Reset</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(print,index) in print_card" class="text-center">
                                    <th scope="row">{{index + 1}}</th>
                                    <td class="text-center">{{print.sizeAndPosition}} <i class="feather icon-eye text-info" style="padding-left: 10px;"> </i> </td>
                                    <td class="text-center">
                                       <print-spots-available :segment_exist="segment_exist" :print="print" :checkIfSegmentExist="checkIfSegmentExist" :index="index" :booked="booked" :totalBill="totalBill" :spots="spots"></print-spots-available>
                                    </td>
                                    <td>
                                        <div class="form-radio" v-show="checkIfSegmentExist(print.sizeAndPosition,print.spots) !== 0">
                                        <div class="radio radio-inline">
                                            <label>
                                        <input type="radio" @change="totalBill"   :name="'print' + (index)" :value="{'index':index,'startDate':startDate,'endDate':endDate,'rate':print.rate,'advert_size':print.sizeAndPosition,'durations': ''}" v-model="seg_data[index]"/> {{print.rate}}
                                                <i class="helper"></i>
                                            </label>
                                        </div>
                                        </div>
                                       <span class="text-danger">{{checkIfSegmentExist(print.sizeAndPosition,print.spots) === 0 ? 'Booked' : '' }}</span>

                                    </td>
                                    <td class="text-center">
                                        <i class="fa fa-refresh text-danger"  :disabled="seg_data[index] === undefined || checkIfSegmentExist(print.sizeAndPosition,print.spots) === 0 " @click="resetSegmentRow(index)" style="cursor:pointer;"></i>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                        <!--<button class="btn btn-mat btn-secondary ">save</button>-->
<!--                        <router-link :to="{name : 'invoice'}" v-if="title" v-show="validateRateCardSelection(this.seg_data)"   class="btn btn-primary waves-effect waves-light " @click.native="submits(title)" >Schedule</router-link>-->
                        <button  v-if="title" v-show="validateRateCardSelection(this.seg_data)"   class="btn btn-primary waves-effect waves-light " @click="submit(title)" >Add to cart</button>

                    </div>
                </div>
            </form>
        </div>
    </div>

</template>

<script>
    import  store from '../../vuex/store';

    export default {
        props :['saveSegment','startDate','endDate','print_card','card_title','spot_check'],
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
                spots : [],
                title : '',
                rate : '',
                day: 'Monday',
                invoice : 'invoice',
                start : '',
                end : '',
                event_time : false,
                startDates : [],
                endDates : [],
                seg_data : [],
                segment_exist: false,
                booked: "Booked",
                selected_item : 1
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
                        store.dispatch('getProcessing', false);
                    }).catch(function (error) {
                    });
                },3000);
            },
            save(){
                store.dispatch('getSegmentTitle', this.title);
                $('#mol').modal('hide');
            },
            validateRateCardSelection(segment){

                return segment.length > 0;

            },
            spot_avail(spot) {
                let s = parseInt(spot);
                let results = [];
                for (let i = 1; i < s + 1; i++) {
                    results.push(i);
                }
                this.segment_avail = true;
                return results;
            },
            checkIfSegmentExist(segment, spots) {
                let z = 0;
                let n = 0;
                this.spot_check.forEach(function(item, index) {
                    if (segment == item.segments) {

                        z = item.spots_used;
                        n = segment[index];
                    }
                });

                if (segment !== '') {
                    let spots_left = parseInt(spots) - parseInt(z);

                    if (spots_left > 0) {

                        this.segment_exist = true;
                        // this.segment_avail = false;

                    } else {
                        // this.segment_exist = false;
                        this.segment_exist = false;

                        this.segment_avail = true;
                    }
                    return parseInt(spots_left);
                } else {

                    this.spot_avail(spots);
                }
            },
            selectSpots(index){
                this.spots[index] = this.selected_item;
                this.totalBill();
             //   store.dispatch('getTotalSpots', this.spots);

            },
            resetSegmentRow(index) {
                if (index > -1) {
                    this.seg_data.splice(index, 1);
                }
            },
            resetSegmentRows(index,data) {
                for(let i=0; i < data.length; i++){
                    if(data[i] === undefined){
                        continue
                    }

                    if (data[i].index === index){
                        data.splice(index,1);
                        this.totalBill();
                        break;

                    }
                }
                return data;
            },
            storeSub(title) {
                let self = this;
                self.saveSegmentData(title);
            },
            // create a subscription
            saveSegmentData(title, segments) {
                let self = this;
                let formData = new FormData();
                if (title !== "") {
                    self.add_to_cart = true;
                    self.switch_buttons_off  = false;
                    // check spots and ad data if length is equal

                    formData.append("title", title);
                    formData.append("durations", self.schedAdsData[0].durations);
                    formData.append(
                        "segments",
                        JSON.stringify({
                            startDate: self.schedAdsData[0].startDate.substr(10, 16),
                            endDate: self.schedAdsData[0].endDate.substr(10, 16)
                        })
                    );
                    formData.append("uploadedFile", self.file);
                    formData.append("day", self.segmentDay);
                    formData.append("card_id", self.rateCardTitleId);
                    formData.append("media_house_id", self.mediaHouseIds);
                    formData.append("media_house", self.getMediaHouse);
                    formData.append("amount", self.amountBilled);
                    formData.append("scheduledData", JSON.stringify(self.schedAdsData));
                    formData.append("startDate", self.schedAdsData[0].startDate);
                    formData.append("endDate", self.schedAdsData[0].endDate);
                    if(this.schedAdsData.length < this.getSpots.length){
                        for(let i=0; i < this.getSpots.length; i++){
                            if( this.schedAdsData[i] == undefined){
                                continue
                            }
                            self.final_spots.push(this.getSpots[this.schedAdsData[i].index]);
                        }
                        formData.append("spots", self.final_spots);

                    }
                    else{
                        formData.append("spots", self.getSpots);

                    }
                    self.process = true;
                    axios.post("ads-store", formData).then(function(response) {
                        if (response.data.success === "success") {
                            self.seg_data = [];
                            //  self.spots = [];
                            self.title = '';
                            self.final_spots = [];
                            self.process = false;
                            store.dispatch("getTotalBill", "");
                            store.dispatch("getSelSegmentDay", "");
                            self.title = '';
                            store.dispatch("getSegmentTitle", "");
                            // self.$router.push("cart");
                            self.add_to_cart = false;
                            self.switch_buttons_off  = true;
                            new PNotify({
                                title: "Success Notice",
                                type: "success",
                                text: "Subscription successfully added to your cart",
                                desktop: {
                                    desktop: true,
                                    icon: "assets/images/pnotify/success.png"
                                }
                            });
                        }

                        else {
                            self.process = false;
                            self.add_to_cart = false;
                            self.switch_buttons_off  = true;
                            self.final_spots = [];

                            new PNotify({
                                title: "Info Desktop Notice",
                                type: "info",
                                text: "We could not create subscription please try again later",
                                desktop: {
                                    desktop: true,
                                    icon: "assets/images/pnotify/success.png"
                                }
                            });
                        }
                    });

                    //  $("#mol").modal("hide");
                    // $("#print").modal("hide");
                }
            },
            submit(title) {
                store.dispatch("getSegmentTitle", title);
                this.eventTime();
                this.storeSub(title)

                $("#radio_tv").modal("hide");
                $("#print").modal("hide");
            },
            eventTime() {
                let data = this.seg_data.filter(el => el === 0 || Boolean(el));
                store.dispatch("getSubData", data);
                store.dispatch('getTotalSpots', this.spots);

                // store.dispatch("getAmountBilled", 0.00);

            },
            totalBill(){
                let total  = 0;
                for(let i=0; i < this.seg_data.length; i++){
                    if(this.seg_data[i] === undefined){
                        continue;
                    }
                    total  = total + (parseFloat(this.seg_data[i].rate) * parseInt(this.spots[i]));
                }
                store.dispatch('getAmountBilled',total);
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
            amountBilled(){
                return store.state.amountBilled;
            },
            schedAdsData() {
                return store.getters.subData;
            },
            getSpots(){
                return store.getters.getSpots;
            },
            file() {
                return store.getters.file;
            },
            rateCardTitleId() {
                return store.state.card_id;
            },
            mediaHouseIds() {
                return store.state.mediaHouseId;
            },

        },

    }

</script>

