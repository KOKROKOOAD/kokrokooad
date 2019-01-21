<template>
    <!--<div class="page-wrapper">-->
        <!-- Page-header start -->
        <!--<div class="page-header">-->
            <!--<div class="row align-items-end">-->
                <!--<div class="col-lg-8">-->
                    <!--<div class="page-header-title">-->
                        <!--<div class="d-inline">-->
                            <!--<h4>Rate selection form</h4>-->
                            <!--<span>Which segments do you want to <code>Publish  </code>, Select rate  to get continue.</span>-->
                        <!--</div>-->
                    <!--</div>-->
                <!--</div>-->
                <!--<div class="col-lg-4">-->
                    <!--<div class="page-header-breadcrumb">-->
                        <!--<ul class="breadcrumb-title">-->
                            <!--<li class="breadcrumb-item">-->
                                <!--{{getSelectMedia}}-->
                            <!--</li>-->
                            <!--<li class="breadcrumb-item" style="color: #9e1317">-->
                                <!--{{getRateCardTitle}}-->
                            <!--</li>-->
                            <!--<li class="breadcrumb-item">-->
                                <!--{{segmentDay}} - {{segDate}}-->
                            <!--</li>-->
                            <!--<li class="breadcrumb-item" style="color: #9e1317">-->
                                <!--{{selSegments}}-->
                            <!--</li>-->
                        <!--</ul>-->
                    <!--</div>-->
                <!--</div>-->
            <!--</div>-->
        <!--</div>-->
        <!-- Page-header end -->

        <!--<button class="btn btn-inverse waves-effect" data-type="inverse" data-from="top" data-align="right" data-icon="fa fa-check">Inverse</button>-->
        <!--<div v-show="getProcessStatus" class="default-grid row">-->
            <!--<show-processing></show-processing>-->
        <!--</div>-->

        <!-- Page body start -->
        <!--<div class="page-body">-->
            <!--<div class="row">-->

                <!--<div class=" col-md-12 col-sm-12">-->
                    <!--&lt;!&ndash; Default select start &ndash;&gt;-->
                    <!--<div class="card">-->
                        <!--<div class="card-header">-->
                            <!--&lt;!&ndash;<h5>Default Select</h5>&ndash;&gt;-->
                            <!--&lt;!&ndash;<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>&ndash;&gt;-->

                        <!--</div>-->
                        <!--<div class="card-block">-->
                            <!--<div class="row">-->
                                <!--&lt;!&ndash;segments goes here&ndash;&gt;-->
                                <!--&lt;!&ndash;<div class="col-md-2"></div>&ndash;&gt;-->

                                <!--<div class=" col-md-12 col-sm-12">-->
                                    <!--<h4 class="sub-title">Select Rate</h4>-->
                                    <!--<div class="card-block table-border-style">-->
                                        <!--<div class="table-responsive">-->
                                            <!--<table class="table table-bordered">-->
                                                <!--<thead>-->
                                                <!--<tr style="background: #36475F;color: #ffffff;">-->
                                                    <!--<th>#</th>-->
                                                    <!--<th>Day</th>-->
                                                    <!--<th>Segment</th>-->
                                                    <!--<th>Spots</th>-->
                                                    <!--<th>15sec</th>-->
                                                    <!--<th>25sec</th>-->
                                                    <!--<th>30sec</th>-->
                                                    <!--<th>35sec</th>-->
                                                    <!--<th>40sec</th>-->
                                                <!--</tr>-->
                                                <!--</thead>-->
                                                <!--<tbody>-->
                                                <!--<tr>-->
                                                    <!--<th scope="row">1</th>-->
                                                    <!--<td>{{segmentDay}}</td>-->
                                                    <!--<td>{{selSegments}}</td>-->
                                                   <!--<td> <select name="select" class="form-control form-control-primary" v-model="selSegment">-->
                                                        <!--<option disabled value="" selected>1</option>-->
                                                        <!--<option>2</option>-->
                                                   <!--</select></td>-->
                                                    <!--<td><input type="radio" name="rate"> GHC 400 </td>-->
                                                    <!--<td><input type="radio" name="rate"> GHC 700 </td>-->
                                                    <!--<td><input type="radio" name="rate"> GHC 1200 </td>-->
                                                    <!--<td><input type="radio" name="rate"> GHC 1400 </td>-->
                                                    <!--<td><input type="radio" name="rate"> GHC 1700 </td>-->



                                                <!--</tr>-->
                                                <!--</tbody>-->
                                            <!--</table>-->
                                        <!--</div>-->
                                    <!--</div>-->
                                    <!--<div style="padding-top: 20px;">-->
                                        <!--&lt;!&ndash;<router-link :to="selSegment_url"  class="btn btn-mat btn-info" >Back</router-link>&ndash;&gt;-->
                                        <!--&lt;!&ndash;<router-link :to="invoice" class="btn btn-mat btn-inverse ">Next</router-link>&ndash;&gt;-->
                                        <!--<button class="btn btn-primary">Create subscription</button>-->
                                        <!--&lt;!&ndash;<button @click="fetchSegments()">click me</button>&ndash;&gt;-->
                                    <!--</div>-->
                                <!--</div>-->

                            <!--</div>-->

                        <!--</div>-->
                    <!--</div>-->
                    <!--&lt;!&ndash; Default select end &ndash;&gt;-->
                <!--</div>-->
                <!--&lt;!&ndash;<div class="col-md-2"></div>&ndash;&gt;-->

            <!--</div>-->
        <!--</div>-->
    <!--</div>-->
    <!--<div v-show="selMedia.toLowerCase() !== 'print' " class="modal fade"  id="mol" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">-->
        <!-- Modal large-->
        <!--<button type="button" class="btn btn-danger waves-effect" data-toggle="modal" data-target="#Modal-overflow">Overflow</button>-->
        <!-- Modal -->
        <!--<div v-show="selMedia.toLowerCase() !== 'print' " class="modal fade modal-flex" id="mol" tabindex="-1" role="dialog" style="margin-left: 220px;">-->
            <div  class="modal fade" id="mol" tabindex="-1" role="dialog" style="margin-left: 220px;">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><b class="text-danger">{{segData[1]}}</b>- {{segData[3].rate_card_title}} rate card</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!--{{segments}}-->
                        <div class="modal-body">
                            <div class="table-responsive">
                            <table class="table table-bordered">
                            <thead>
                            <tr style="background: #36475F;color: #ffffff;">
                            <th>#</th>
                            <th>Segment</th>
                            <th>Spots</th>
                            <th>15sec</th>
                            <th>25sec</th>
                            <th>30sec</th>
                            <th>35sec</th>
                            <th>40sec</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(seg,index) in segments">
                            <th scope="row">{{index + 1}}</th>
                                <td>{{seg.seg}}</td>
                                <td> <select name="select" class="form-control form-control-primary" v-model="selSegment">
                                    <option disabled value="" selected>1</option>
                                    <option>2</option>
                                </select></td>
                                <td>{{seg.rt1}}</td>
                                <td>{{seg.rt2}}</td>
                                <td>{{seg.rt3}}</td>
                                <td>{{seg.rt4}}</td>
                                <td>{{seg.rt5}}</td>
                            </tr>
                            </tbody>
                            </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary waves-effect waves-light ">Save</button>
                        </div>
                    </div>
                </div>
            </div>
</template>

<script>
    import  store from  '../../vuex/store';

    export default {
        name : 'selectSegments',

        mounted(){

        },
        created(){
            this.fetchSegments();
        },
        data(){
            return {
                invoice: '/user-account/create-sub-invoice',
                segment_date: '/user-account/create-sub-date',
                selSegment_url: '/user-account/select-segment',
                segments_data: [],
                selSegment: '',
                selMedia: '',
                print_segments: [],
                segments: [{
                    'seg': '08:00am-09:930am',
                    'rt1': 'GHC400',
                    'rt2': 'GHC800',
                    'rt3': 'GHC900',
                    'rt4': 'GHC200',
                    'rt5' : 'GHC500,'
                },
                    {
                        'seg': '10:00am-11:00am',
                        'rt1': 'GHC700',
                        'rt2': 'GHC900',
                        'rt3': 'GHC1200',
                        'rt4': 'GH1400',
                        'rt5' : 'GHC700'
                    }
                ],
                day: 'Monday',
            }
        },
        methods: {
            fetchSegments(){
                let self = this;
                store.dispatch('getProcessing', true);
                // console.log(self.segData[1]);
                setTimeout(function () {
                    axios.get('fetch-segments/' +  self.getSelectMedia + '/' + self.getRateCardTitle + '/' + self.segmentDay).then(function (res) {
                        console.log(res.data[0].segments);
                        self.segments_data  = res.data[0].segments;
                        store.dispatch('getProcessing', false);

                        self.selMedia = res.data[1];
                        let dat = res.data[0];
                        for (let key in dat) {
                            if (dat.hasOwnProperty(key)) {
                                //  console.log(dat[key].segments);
                                //console.log(self.segments_data);
                            }
                        }

                    }).catch(function (error) {
                        console.log(error);
                    });
                },3000);

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
            }
        },

        computed:{
            notification(){
                return store.getters.checkAvailableDate;
            },
            segmentDay(){
                return store.getters.segmentDay;
            },
            getSelectMedia(){
                return store.state.selMedia;
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
            }
        },

    }

</script>

