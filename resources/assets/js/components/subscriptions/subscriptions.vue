<template>
    <div class="page-wrapper full-calender">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h4>Subscriptions</h4>
                            <!--<span style="color: #9e1317 ">Click a date to create your ad.</span>-->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-header-breadcrumb">
                        <ul class="breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="index.html"> <i class="feather icon-home"></i> </a>
                            </li>
                            <router-link :to="sub" class="breadcrumb-item"><a href="#!">Create Subscription</a> </router-link>
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
                                <h6 class="m-b-30 m-t-20">Subscriptions</h6>
                                <div class="fc-event ui-draggable ui-draggable-handle">My Event 1</div>
                                <div class="fc-event ui-draggable ui-draggable-handle">My Event 2</div>
                                <div class="fc-event ui-draggable ui-draggable-handle">My Event 3</div>
                                <div class="fc-event ui-draggable ui-draggable-handle">My Event 4</div>
                                <div class="fc-event ui-draggable ui-draggable-handle">My Event 5</div>
                                <div class="checkbox-fade fade-in-primary m-t-10">
                                    <label>
                                        <input type="checkbox" value="">
                                        <span class="cr">
                                                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                    </span>
                                        <span>Remove After Drop</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-10 col-md-12">
                            <div id='calendar'></div>
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
        <!--<div style="padding-top: 20px;">-->
            <!--<router-link :to="selSegment_url"  class="btn btn-mat btn-info" >Back</router-link>-->
            <!--<router-link :to="invoice" class="btn btn-mat btn-inverse ">Next</router-link>-->
            <!--&lt;!&ndash;<button @click="fetchSegments()">click me</button>&ndash;&gt;-->
        <!--</div>-->
    </div>

    <!-- Main-body end -->
</template>

<script>
    import  store from  '../../vuex/store';

    export default {
        name : 'subscriptions',

        mounted(){

        },
        created(){
            this.calender();
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
                title : '',
                start : '',
                end : '',
                sub : '/user-account/subscriptions'
            }
        },
        methods: {

            calender(){
                $(document).ready(function() {
                    $('#external-events .fc-event').each(function() {

                        // store data so the calendar knows to render an event upon drop
                        $(this).data('event', {
                            title: $.trim($(this).text()), // use the element's text as the event title
                            stick: true // maintain when user navigates (see docs on the renderEvent method)
                        });

                        // make the event draggable using jQuery UI
                        $(this).draggable({
                            zIndex: 999,
                            revert: true, // will cause the event to go back to its
                            revertDuration: 0 //  original position after the drag
                        });

                    });

                    let calender =  $('#calendar').fullCalendar({
                        header: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'month,listMonth'
                        },
                        defaultDate: $('#calendar').fullCalendar('today'),
                        navLinks: true, // can click day/week names to navigate views
                        businessHours: true, // display business hours
                        editable: true,
//                        droppable: true, // this allows things to be dropped onto the calendar
//                        drop: function() {
//
//                            // is the "remove after drop" checkbox checked?
//                            if ($('#checkbox2').is(':checked')) {
//                                // if so, remove the element from the "Draggable Events" list
//                                $(this).remove();
//                            }
//                        },
                        selectable : true,
                        selectHelper : true,
                        select : function (start,end,allDay) {
                            start  = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                            end  = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                            let title = prompt("Enter Event Title");

                            let formData = new FormData();
                            formData.append('title',title);
                            formData.append('start',start);
                            formData.append('end',end);
                            let self = this;

                            axios.get('test-api',formData).then(function (res) {
                                self.title = res.data.title;
                                calender.fullCalendar('refetchEvents');
                            });
                        },
                        events: [{
                            title:  this.title,
                            start: '2016-09-03T13:00:00',
                            constraint: 'businessHours',
                            borderColor: '#FC6180',
                            backgroundColor: '#FC6180',
                            textColor: '#fff'
                        }, {
                            title: 'Meeting',
                            start: '2016-09-13T11:00:00',
                            constraint: 'availableForMeeting',
                            editable: true,
                            borderColor: '#4680ff',
                            backgroundColor: '#4680ff',
                            textColor: '#fff'
                        }, {
                            title: 'Conference',
                            start: '2016-09-18',
                            end: '2016-09-20',
                            borderColor: '#93BE52',
                            backgroundColor: '#93BE52',
                            textColor: '#fff'
                        }, {
                            title: 'Party',
                            start: '2016-09-29T20:00:00',
                            borderColor: '#FFB64D',
                            backgroundColor: '#FFB64D',
                            textColor: '#fff'
                        },

                            // areas where "Meeting" must be dropped
                            {
                                id: 'availableForMeeting',
                                start: '2016-09-11T10:00:00',
                                end: '2016-09-11T16:00:00',
                                rendering: 'background',
                                borderColor: '#ab7967',
                                backgroundColor: '#ab7967',
                                textColor: '#fff'
                            }, {
                                id: 'availableForMeeting',
                                start: '2016-09-13T10:00:00',
                                end: '2016-09-13T16:00:00',
                                rendering: 'background',
                                borderColor: '#39ADB5',
                                backgroundColor: '#39ADB5',
                                textColor: '#fff'
                            },

                            // red areas where no events can be dropped
                            {
                                start: '2016-09-24',
                                end: '2016-09-28',
                                overlap: false,
                                rendering: 'background',
                                borderColor: '#FFB64D',
                                backgroundColor: '#FFB64D',
                                color: '#d8d6d6'
                            }, {
                                start: '2016-09-06',
                                end: '2016-09-08',
                                overlap: false,
                                rendering: 'background',
                                borderColor: '#ab7967',
                                backgroundColor: '#ab7967',
                                color: '#d8d6d6'
                            }
                        ]
                    });
                });

            }


        },

        computed:{

        },

    }

</script>

