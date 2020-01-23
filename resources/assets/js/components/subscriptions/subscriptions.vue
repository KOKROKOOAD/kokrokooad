<template>
    <div class="page-wrapper full-calender animated fadeIn">
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

                            <router-link :to="{name:selectMedia}" class=" btn btn-primary text-white" type="button">Create Subscription </router-link>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page-header end -->
        <div class="page-body">
            <div class="card">
                <div class="card-header">
                    <h5>Segment Calender <small>Click to view subscription details.</small></h5>
                       <div class="row">
                           <div class="col-md-5"></div>
                           <div class="col-md-">
                               <p class="text-danger" v-show="del"><img src="/images/loading.gif" style="height: 20px;width: 20px;"><strong>Deleting please wait.....</strong></p>


                           </div>
                           <div class="col-md-5"></div>

                       </div>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <!--<li><i class="feather icon-maximize full-card"></i></li>-->
                            <!--<li><i class="feather icon-minus minimize-card"></i></li>-->
                            <!--<li><i class="feather icon-trash-2 close-card"></i></li>-->
                        </ul>
                    </div>
                </div>
                <div class="card-block">
                    <div class="row">

                        <div class="col-xl-12 col-md-12">
                            <full-calendar ref="calendar" :config="config" :event-sources="eventSources" @event-render="eventRender" @event-drop="eventDrop"></full-calendar>
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


<!--show subscription details-->
        <div  class="modal fade" id="show_details" tabindex="-1" role="dialog" style="margin-left: 220px;">
            <div class="modal-dialog modal-lg" role="document">
<!--                <form  id="segment-form">-->
                    <div class="modal-content">
                        <div class="modal-header">


                            <h4 class="modal-title"><b class="text-danger">Subscription details</b></h4>
                            <!--                            <span>Your file : <b class="text-info">{{fileName}}</b><i style="margin-left: 20px;">File size :</i> <b>{{fileSize}}bytes</b></span>-->
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <!-- display loader-->
                        <div class="row">
                            <div class="col-md-5"></div>
                            <div class="col-md-">
                                <p class="" v-show="update"><img src="/images/loading.gif" style="height: 20px;width: 20px;"><strong>Processing please wait.....</strong></p>

                            </div>
                            <div class="col-md-5"></div>

                        </div>




                        <div class="modal-body">

                            <div class="form-group">
<!--                                <input class="form-control" required="required" name="title" type="text" v-model="title"  placeholder="Enter segment title  eg:short video  on  history of gold coast">-->

                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" v-show="details">
                                    <thead>
                                    <tr  style="background: #36475F;color: #ffffff;">
<!--                                        <th>#</th>-->
<!--                                        <th>Start date</th>-->
<!--                                        <th>End date</th>-->
                                        <th>Subscription Title</th>
                                        <th>Rate</th>
<!--                                        <th>Selected ratecard</th>-->
                                        <th>Spots</th>
<!--                                        <th>Spots used</th>-->
                                        <th>Duration</th>
                                        <th>Media house</th>
                                        <th>Rate card</th>
                                        <th>Date Created</th>
<!--                                        <th>Date Updated</th>-->

                                        <th>Action</th>


                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
<!--                                       <td>{{config.subs.start}}</td>-->
<!--                                        <td>{{config.subs.end}}</td>-->
                                        <td>{{config.subs.title}}</td>
                                        <td>{{'GHS' + config.subs.rate}}</td>
                                        <td>{{config.subs.spots}}</td>
<!--                                        <td>{{config.subs.spots_used}}</td>-->
                                        <td>{{config.subs.durations}}</td>
                                        <td>{{media_h}}</td>
                                        <td>{{media_ratecard}}</td>
                                        <td>{{config.subs.created_at}}</td>
<!--                                        <td>{{config.subs.updated_at}}</td>-->

                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <button @click="closeSubDetails(config.subs.subscription_id)" data-toggle="tooltip" v-show="config.subs.status == 'in cart'"   class="edit btn btn-success btn-sm"><i class="fa fa-edit"></i></button>
                                                <button  @click="confirmPayment(config.subs.subscription_id)" data-toggle="tooltip" v-show="config.subs.status == 'in cart'"   class="edit btn btn-default btn-sm"><i class="fa fa-paypal"></i></button>
                                            <button data-toggle="tooltip" @click="deleteSub(config.subs.subscription_id)" :disabled="config.subs.status == 'processing_payment' || config.subs.status == 'pending' || config.subs.status == 'active' || config.subs.status == 'live'"  data-id="'.$row->admin_id.'" data-original-title="Delete" class="btn btn-danger btn-sm block-admin"><i class="fa fa-trash"></i> </button>
                                             </div>
                                        </td>

                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
<!--                            <router-link :to="{name : 'invoice'}" v-if="title" v-show="validateRateCardSelection(this.seg_data)"   class="btn btn-primary waves-effect waves-light " @click.native="submit(title)" >Schedule</router-link>-->
                        </div>
                    </div>
<!--                </form>-->
            </div>
        </div>



    </div>

    <!-- Main-body end -->
</template>

<script>
    import  store from  '../../vuex/store';

    export default {
        name : 'subscriptions',

        mounted(){
         let self = this;
        },
        created(){

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
                media_ratecard : [],
                media_h : [],
                details : false,
                process : true,
                sub_id : '',
                del : false,
                update : false,

                sub : '/user-account/subscriptions',
                config: {
                    defaultDate: new Date(),
                    defaultView: 'month',
                    droppable : false,
                    clickable : true,
                    editable : false,
                    // displayEventTIme : true,
                     displayEventEnd : true,
                    eventLimit : 2,
                    eventLimitText : 'click to view more ads',
                    timezone : 'local',
                    timeFormat: 'h:mm t',
                  //  displayEventTime : true,
                    eventClick : (event)=>{
                        let self  = this;
                        self.process  = true;
                        axios.get('fetch/media/ratecard/'+ event.media_house_id + '/'+ event.rate_card_id).then(function (res) {
                            if (res.data){
                              self.media_ratecard = res.data.title;
                                self.media_h = res.data.media_house;
                                self.process = false;
                                self.details   = true;
                            }
                        });
                        self.config.subs = event;
                        $("#show_details").modal('show');
                    },
                    header: {
                        right: 'month,agendaWeek,agendaDay,listMonth',
                    },
                    subs : [],
                },
                subs : [],
                selectMedia: 'selectMedia',
                sub_title : 'testing',
            }
        },
        methods: {
            closeSubDetails(id){
                let self = this;
                self.update = true;
                axios.get('fetch/sub-details/' + id).then(function (res) {
                    if (res.data){
                        store.dispatch('getSubId', id);
                        store.dispatch('getSelectedMedia',res.data);
                        $("#show_details").modal('hide');
                        self.update = false;

                        self.$router.push({
                             name : 'update-subs'
                         });

                    }
                });



            },
            deleteSub(id){
                $("#show_details").modal('hide');
                setInterval(this.deleteSubModal(id),100);
                clearInterval(this.deleteSubModal(id));
            },
            deleteSubModal(id){
                let self = this;
                let formData  = new FormData();
                formData.append('id',id);
                sweetAlert({
                    title: 'Warning',
                    text: 'Do you want to delete this ad?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Delete',
                    confirmButtonColor: '#FFB800',
                    closeOnConfirm: true,
                },function(isConfirm){
                    if(isConfirm){
                        self.del = true;

                        axios.post('delete/sub',formData).then(function (res) {
                            if (res.data == 'success'){
                               self.del = false;
                               window.location.reload();
                            }

                        });
                    }
                    else{

                    }

                });
            },
            updateSub(){
                alert('updating subs');
            },
           confirmPayment(sub_id){
               let self = this;
               $("#show_details").modal('hide');
               sweetAlert({
                   title: 'Warning',
                   text: 'Make payment for this subscription?',
                   type: 'warning',
                   showCancelButton: true,
                   confirmButtonText: 'Yes, Continue',
                   confirmButtonColor: '#FFB800',
                   closeOnConfirm: true,
               },function(isConfirm){
                 //  self.sub_id =  sub_id;
                   store.dispatch('getSubId', sub_id);

                   if(isConfirm){
                       self.$router.push({
                           name : 'payment'
                       });
                   }
                   else{

                   }

               });

               },
            drop : function(){
                alert('testing drop');
            },
            eventDrop: function(event, delta, revertFunc) {
                console.log(event.id);

                sweetAlert({
                    title: 'Warning',
                    text: 'Are you sure about this change?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Continue',
                    confirmButtonColor: '#FFB800',
                    closeOnConfirm: true,

                    showLoaderOnConfirm: true,
                },function(isConfirm){

                    let  s = event.start.format("YYYY-MM-DD ") + event.start.format('h:mm');
                    let  id = event.id;


                    if(isConfirm){

                        let formData = new FormData();
                        formData.append('startDate', event.start.format("YYYY-MM-DD ") + event.start.format('h:mm'));
                        formData.append('endDate', event.start.format("YYYY-MM-DD ") + event.end.format('h:mm'));
                        formData.append('event_id', event.id);


                        axios.post('sub-update-api', formData).then(function (response) {
                                    //self.$refs.calendar.$emit('refetch-events');
                                    if(response === 'success'){
                                        // PNotify.desktop.permission();
                                        (new PNotify( {
                                                title:'Update Desktop Notice', type:'info', text:'Subscription date updated successfully.', desktop: {
                                                    desktop: true, icon: 'assets/images/pnotify/success.png'
                                                }
                                            }
                                        ));
                                    }
                                    else if(response.data === 'booked'){
                                        revertFunc();
                                        (new PNotify( {
                                                title:'Info Desktop Notice', type:'info', text:'Please this segment is fully booked', desktop: {
                                                    desktop: true, icon: 'assets/images/pnotify/info.png'
                                                }
                                            }
                                        ));
                                    }
                                    else{
                                        revertFunc();
                                        (new PNotify( {
                                                title:'Failure Desktop Notice', type:'error', text:'Please this segment is already booked.Try another segment', desktop: {
                                                    desktop: true, icon: 'assets/images/pnotify/success.png'
                                                }
                                            }
                                        ));
                                    }

                                });
                    }
                    else{
                        revertFunc();
                    }

                });
            },
            eventRender: function( event, element, view ) {
                 element.find('.fc-time').after('<span class="glyphicon glyphicon-time"></span><br> ');
                if(event.status === 'pending'){
                    element.find('.fc-title').after("<br><span class='text-info fa fa-comment' style='font-weight: bolder'> " +event.status+"</span>");

                }
                else if(event.status === 'in cart'){
                    element.find('.fc-title').after("<br><span class='fa fa-shopping-cart' style='font-weight: bolder;color: darkred'> "+event.status+"</span>");

                }
                else if(event.status === 'processing_payment'){
                    element.find('.fc-title').after("<br><span class=' fa fa-comment' style='font-weight: bolder;color: darkred'> "+event.status+"</span>");

                }
                else if(event.status === 'accepted'){
                    element.find('.fc-title').after("<br><span class=' fa fa-comment' style='font-weight: bolder;color: #ffffff '> "+event.status+"</span>");

                }
                else if(event.status === 'Live'){
                    element.find('.fc-title').after("<br><span class=' fa fa-comment' style='font-weight: bolder;color: #7b0c32;'> "+event.status+"</span>");

                }
                else if(event.status === 'active'){
                    element.find('.fc-title').after("<br><span class='text-success fa fa-comment' style='font-weight: bolder'> "+event.status+"</span>");

                }
                else if(event.status === 'completed'){
                    element.find('.fc-title').after("<br><span class='text-success fa fa-comment' style='font-weight: bolder'> "+event.status+"</span>");

                }
                else if(event.status === 'rejected'){
                    element.find('.fc-title').after("<br><span class='text-danger fa fa-comment' style='font-weight: bolder'> "+event.status+"</span>");

                }
                else if(event.status === 'approved'){
                    element.find('.fc-title').after("<br><span class=' fa fa-comment' style='font-weight: bolder;color: #0f3e68'> "+event.status+"</span>");

                }

            },

        },

        computed:{
            eventSources() {
                let self = this;
                return [
                    {
                        events(start,end, timezone, callback) {
                            axios.get('fetch-ads/api').then(function (res) {
                                console.log(res.data);
                               // self.sub = res.data;
                                callback(res.data);
                            });

                        },
                        color: '#6f6fbf',
                        textColor: 'white',
                    }
                ]
            },
            subId(){
                return store.getters.subId;
            },


        },


    }

</script>

