<template>
    <div class="page-wrapper full-calender">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Create Segments</h4>
                        <span style="color: #9e1317 ">Click a date to create your ad.</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="feather icon-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Segments</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Page-header end -->
    <div class="page-body">
        <div class="card">
            <div class="card-header">
                <h5>Segment Calender</h5>
                {{day}}
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li><i class="feather icon-maximize full-card"></i></li>
                        <li><i class="feather icon-minus minimize-card"></i></li>
                        <li><i class="feather icon-trash-2 close-card"></i></li>
                    </ul>
                </div>
            </div>
            <div class="card-block">
                <div class="row">
                    <div class="col-xl-2 col-md-12">
                        <div id="external-events">
                            <h6 class="m-b-30 m-t-20">Subscription lists</h6>

                            <div v-for="event in eventLists" class="fc-event ui-draggable ui-draggable-handle">{{event.title}}</div>

                            <div class="checkbox-fade fade-in-primary m-t-10">
                                <label>
                                    <input type="checkbox" value="">
                                    <span class="cr">
                                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                    </span>
                                    <span>Remove After Drop</span>
                                </label>
                                <button class="btn btn-primary" @click="test">test</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-10 col-md-12">
                        <!--<div id='calendar'></div>-->
                        <full-calendar ref="calendar" :config="config" :event-sources="eventSources" @day-click="daySelected"></full-calendar>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-error">
        <div class="card text-center">
            <div class="card-block">
                <div class="m-t-10">
                    <i class="icofont icofont-warning text-white bg-c-yellow"></i>
                    <h4 class="f-w-600 m-t-25">Not supported</h4>
                    <p class="text-muted m-b-0">Full Calender not supported in this device</p>
                </div>
            </div>
        </div>
    </div>
        <div style="padding-top: 20px;">
            <router-link :to="selSegment_url"  class="btn btn-mat btn-info" >Back</router-link>
            <router-link :to="invoice" class="btn btn-mat btn-secondary ">save</router-link>
            <router-link :to="invoice" class="btn btn-mat btn-inverse ">Next</router-link>
            <!--<button @click="fetchSegments()">click me</button>-->
        </div>

        <segment-title></segment-title>
        <segments :saveSegment="saveSegmentData"></segments>

    </div>

    <!-- Main-body end -->
</template>

<script>
    "use strict";
    import  store from  '../../vuex/store';
    import segmentTitle from "./segmentTitle";

    export default {
        name : 'fullcalender',

        mounted(){

        },
        created(){
            //let self = this;

        },
        data(){
            return {
                invoice : '/user-account/create-sub-invoice',
                segment_date : '/user-account/create-sub-date',
                selSegment_url : '/user-account/select-segment',
                segments_data : [],
                selSegment : '',
                selMedia : '',
                print_segments : [],
                sub_date : '',
                day : '',
                segments : [],
                selectedStartTime : null,
                myTime : null,
                myEvents : 'creating events',
                eventLists : [],
                config : {
                    defaultDate: '2019-01-24',
                    defaultView: 'month'
                },
            }
        },
        methods: {
            refreshEvents() {
                this.$refs.calendar.$emit('refetch-events');
            },
            daySelected(date,jsEvent,view){
                $('#mol').modal('show');
                 this.selectedStartTime = date.format("YYYY-MM-DD HH:mm:ss");

                // $(this).css('background-color', 'red');
            },
            saveSegmentData(title){
                let self = this;
                let formData = new FormData();
                store.dispatch('getSegmentTitle', title);

                formData.append('selDate',self.selectedStartTime);
                formData.append('title',self.segTitle);
                formData.append('events',self.myEvents);
                axios.post('test-post',formData).then(function (response) {
                    self.$refs.calendar.$emit('refetch-events');
                });
                $('#mol').modal('hide');
            },
            next() {
                this.$refs.calendar.fireMethod('next')
            },
            changeView(view) {
                this.$refs.calendar.fireMethod('changeView', view)
            },



            getSelDay(date){
                let days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday" ];
                // let selDay =  $('.sub_date').val();
                //segment date
                store.dispatch('getSegmentDate',date);
                // this.sub_date = dat.split("/").join("-");
                let d = new Date(date);
                this.day = days[d.getDay() - 1];
                console.log(this.day);
                //selected segment day
                store.dispatch('getSelSegmentDay', this.day);
            },
            test(){
                axios.get('test-api').then(response => {
                    console.log(response.data);
                  //  callback(response.data.data)
                });
            }

        },

        computed:{
            segTitle(){
                return store.getters.segTitle;
            },
            eventSources(){
                return[
                    {
                        events(start,end,timezone,callback) {
                            axios.get('test-api').then(function (res) {
                                callback(res.data);
                            });
                        },
                        color: 'blue',
                        textColor : 'white',
                    }
                ]
            },
            eventRender: function(event, element) {
                element.qtip({
                    content: event.events
                });
            }

        },

    }

</script>

