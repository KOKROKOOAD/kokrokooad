<template>

            <div  class="modal fade" id="radio_tv" tabindex="-1" role="dialog" style="margin-left: 220px;">
                <div class="modal-dialog modal-lg" role="document">
                    <form  @submit.prevent="" id="segment-form">
                    <div class="modal-content" >
                        <div class="modal-header">
                            <h4 class="modal-title"><b class="text-danger">{{getMediaHouse}}</b>- {{card_title}} rate card</h4>
                            <h4 class="pull-right text-dark"><small class="text-mute">{{startDate + ' ' +segmentDay}} <b v-show="getFileDurations !=  0"> | {{'File duration : ' + getFileDurations + ' seconds'}}</b></small></h4>
<!--                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--                                <span aria-hidden="true">&times;</span>-->
<!--                            </button>-->
                        </div>

                        <div class="modal-body">

                            <div class="form-group">
                                <input class="form-control" required="required" name="title" type="text" v-model="title"  placeholder="Enter segment title  eg:short video  on  history of gold coast">

                            </div>
                            <div class="table-responsive" v-show="checkDays(weekdays)">
                            <table class="table table-bordered">
                            <thead>
                            <tr style="background: #36475F;color: #ffffff;">
                            <th>#</th>
                                <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.mon">{{segment.mon}}</th>
                                <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.tue">{{segment.tue}}</th>
                                <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.wed">{{segment.wed}}</th>
                                <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.thu">{{segment.thu}}</th>
                                <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.fri">{{segment.fri}}</th>
                                 <th >Spots</th>
                                <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.mon" v-if="segment.sec1 > 0 || segment.sec1 > getFileDurations || segment.sec1 == getFileDurations && segment.sec1 != 0">{{segment.sec1 + segment.time1}}</th>
                                <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.mon" v-if="segment.sec2 > 0 || segment.sec2 > getFileDurations || segment.sec2 == getFileDurations && segment.sec2 != 0">{{segment.sec2 + segment.time2}}</th>
                                <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.mon" v-if="segment.sec3 > 0 || segment.sec3 > getFileDurations || segment.sec3 == getFileDurations && segment.sec3 != 0">{{segment.sec3 + segment.time3}}</th>
                                <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.mon" v-if="segment.sec4 > 0 || segment.sec4 > getFileDurations || segment.sec4 == getFileDurations && segment.sec4 != 0">{{segment.sec4 + segment.time4}}</th>
                                <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.mon" v-if="segment.sec5 > 0 || segment.sec5 > getFileDurations || segment.sec5 == getFileDurations && segment.sec5 != 0">{{segment.sec5 + segment.time5}}</th>

                                <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.tue" v-if="segment.sec1 > 0 && segment.sec1 > getFileDurations || segment.sec1 == getFileDurations && segment.sec1 != 0">  {{segment.sec1 + segment.time1}}</th>
                                <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.tue" v-if="segment.sec2 > 0 && segment.sec2 > getFileDurations || segment.sec2 == getFileDurations && segment.sec2 != 0">{{segment.sec2 + segment.time2}}</th>
                                <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.tue" v-if="segment.sec3 > 0 && segment.sec3 > getFileDurations || segment.sec3 == getFileDurations && segment.sec3 != 0">{{segment.sec3 + segment.time3}}</th>
                                <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.tue" v-if="segment.sec4 > 0 && segment.sec4 > getFileDurations || segment.sec4 == getFileDurations && segment.sec4 != 0">{{segment.sec4 + segment.time4}}</th>
                                <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.tue" v-if="segment.sec5 > 0 && segment.sec5 > getFileDurations || segment.sec5 == getFileDurations && segment.sec5 != 0">{{segment.sec5 + segment.time5}}</th>

                                <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.wed" v-if="segment.sec1 > 0 && segment.sec1 > getFileDurations || segment.sec1 == getFileDurations && segment.sec1 != 0">  {{segment.sec1 + segment.time1}}</th>
                                <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.wed" v-if="segment.sec2 > 0 && segment.sec2 > getFileDurations || segment.sec2 == getFileDurations && segment.sec2 != 0">{{segment.sec2 + segment.time2}}</th>
                                <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.wed" v-if="segment.sec3 > 0 && segment.sec3 > getFileDurations || segment.sec3 == getFileDurations && segment.sec3 != 0">{{segment.sec3 + segment.time3}}</th>
                                <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.wed" v-if="segment.sec4 > 0 && segment.sec4 > getFileDurations || segment.sec4 == getFileDurations && segment.sec4 != 0">{{segment.sec4 + segment.time4}}</th>
                                <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.wed" v-if="segment.sec5 > 0 && segment.sec5 > getFileDurations || segment.sec5 == getFileDurations && segment.sec5 != 0">{{segment.sec5 + segment.time5}}</th>

                                <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.thu" v-if="segment.sec1 > 0 && segment.sec1 > getFileDurations || segment.sec1 == getFileDurations && segment.sec1 != 0">  {{segment.sec1 + segment.time1}}</th>
                                <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.thu" v-if="segment.sec2 > 0 && segment.sec2 > getFileDurations || segment.sec2 == getFileDurations && segment.sec2 != 0">{{segment.sec2 + segment.time2}}</th>
                                <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.thu" v-if="segment.sec3 > 0 && segment.sec3 > getFileDurations || segment.sec3 == getFileDurations && segment.sec3 != 0">{{segment.sec3 + segment.time3}}</th>
                                <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.thu" v-if="segment.sec4 > 0 && segment.sec4 > getFileDurations || segment.sec4 == getFileDurations && segment.sec4 != 0">{{segment.sec4 + segment.time4}}</th>
                                <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.thu" v-if="segment.sec5 > 0 && segment.sec5 > getFileDurations || segment.sec5 == getFileDurations && segment.sec5 != 0">{{segment.sec5 + segment.time5}}</th>

                                <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.fri" v-if="segment.sec1 > 0 && segment.sec1 > getFileDurations || segment.sec1 == getFileDurations && segment.sec1 != 0">  {{segment.sec1 + segment.time1}}</th>
                                <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.fri" v-if="segment.sec2 > 0 && segment.sec2 > getFileDurations || segment.sec2 == getFileDurations && segment.sec2 != 0">{{segment.sec2 + segment.time2}}</th>
                                <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.fri" v-if="segment.sec3 > 0 && segment.sec3 > getFileDurations || segment.sec3 == getFileDurations && segment.sec3 != 0">{{segment.sec3 + segment.time3}}</th>
                                <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.fri" v-if="segment.sec4 > 0 && segment.sec4 > getFileDurations || segment.sec4 == getFileDurations && segment.sec4 != 0">{{segment.sec4 + segment.time4}}</th>
                                <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.fri" v-if="segment.sec5 > 0 && segment.sec5 > getFileDurations || segment.sec5 == getFileDurations && segment.sec5 != 0">{{segment.sec5 + segment.time5}}</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(seg,index) in  segments" :key="index">
                            <th scope="row">{{index + 1}}</th>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.mon" >{{seg.mon_duration.substr(0,2) + ':' + seg.mon_b_duration }}-{{seg.mon_c_duration.substr(0,2) + ':' + seg.mon_d_duration + '' + seg.mon_c_duration.substr(2,3) }}</td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.tue">{{seg.tue_duration.substr(0,2) + ':' + seg.tue_b_duration }}-{{seg.tue_c_duration.substr(0,2) + ':' + seg.tue_d_duration + '' + seg.tue_c_duration.substr(2,3) }}</td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.wed">{{seg.wed_duration.substr(0,2) + ':' + seg.wed_b_duration }}-{{seg.wed_c_duration.substr(0,2) + ':' + seg.wed_d_duration + '' + seg.wed_c_duration.substr(2,3) }}</td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.thu">{{seg.thu_duration.substr(0,2) + ':' + seg.thu_b_duration }}-{{seg.thu_c_duration.substr(0,2) + ':' + seg.thu_d_duration + '' + seg.thu_c_duration.substr(2,3) }}</td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.fri">{{seg.fri_duration.substr(0,2) + ':' + seg.fri_b_duration }}-{{seg.fri_c_duration.substr(0,2) + ':' + seg.fri_d_duration + '' + seg.fri_c_duration.substr(2,3) }}</td>

                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.mon" > <select name="select" v-model="spots[index]">
                                    <option disabled value="" selected>spots</option>
                                    <option v-for=" (s,index) in spot_avail(seg.mon_spots)" :key="index" :name="'seA' + (index)"   :value="s" >{{s}}</option>

                                </select></td>
                                <td  v-show="segmentDay.substr(0,3).toUpperCase() == segment.tue">
                                    <select  name="select" v-model="spots[index]">
                                    <option value="" disabled  selected>spots</option>
<!--                                    <option v-for="s in checkSpots(seg.tue_spots,spc.spots_used)"   v-if="seg.tue_duration.substr(0,2) + ':' + seg.tue_b_duration + '-' +-->
<!--                                    seg.tue_c_duration.substr(0,2) + ':' + seg.tue_d_duration + '' + seg.tue_c_duration.substr(2,3)  == '06:30-08:30 AM'"-->
<!--                                            :name="'seB' + (index)"   :value="s">{{s}}</option>-->
                                    <option v-for=" (s,index) in spot_avail(seg.tue_spots)"  :key="index"   :name="'seA' + (index)"   :value="s" >{{s}}</option>

                                </select></td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.wed"> <select name="select" v-model="spots[index]">
                                    <option disabled value="" selected>spots</option>
<!--                                    <option   v-if=" checkSpots(seg.wed_spots) == seg.wed_duration.substr(0,2) + ':' + seg.wed_b_duration +'-'+ seg.wed_c_duration.substr(0,2) + ':' + seg.wed_d_duration + '' + seg.wed_c_duration.substr(2,3)" :key="index" :name="'seA' + (index)"   :value="8" >{{'7'}}</option>-->

                                    <option v-for=" (s,index) in spot_avail(seg.wed_spots)"   :key="index" :name="'seA' + (index)"   :value="s" >{{s}}</option>

                                </select></td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.thu"> <select name="select" v-model="spots[index]">
                                    <option disabled value="" selected>spots</option>
                                    <option v-for=" (s,index) in spot_avail(seg.thu_spots)" :key="index" :name="'seA' + (index)"   :value="s" >{{s}}</option>

                                </select></td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.fri"> <select name="select" v-model="spots[index]">
                                    <option disabled value="" selected>spots</option>
                                    <option v-for=" (s,index) in spot_avail(seg.fri_spots)" :key="index" :name="'seA' + (index)"   :value="s" >{{s}}</option>

                                </select></td>
<!--                                   Rates-->
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.mon" v-if="segment.sec1 > 0 && segment.sec1 > getFileDurations || segment.sec1 == getFileDurations && segment.sec1 != 0"><input type="radio"   :name="'seA' + (index)"  :value="{'startDate': startDate + '' + seg.mon_duration.substr(0,2) + ':' + seg.mon_b_duration  + '' +seg.mon_duration.substr(2,3),'endDate':endDate + '' + seg.mon_c_duration.substr(0,2) + ':' + seg.mon_d_duration  + '' +seg.mon_c_duration.substr(2,3),'endTime' :seg.mon_b_duration,durations : segment.sec1 + segment.time1,'rate': seg.sec1_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.sec1_rate}}</td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.mon" v-if="segment.sec2 > 0 && segment.sec2 > getFileDurations || segment.sec2 == getFileDurations && segment.sec2 != 0"><input type="radio"   :name="'seA' + (index)"  :value="{'startDate': startDate + '' + seg.mon_duration.substr(0,2) + ':' + seg.mon_b_duration  + '' +seg.mon_duration.substr(2,3),'endDate':endDate + '' + seg.mon_c_duration.substr(0,2) + ':' + seg.mon_d_duration  + '' +seg.mon_c_duration.substr(2,3),'endTime' :seg.mon_b_duration,durations : segment.sec2 + segment.time2,'rate': seg.sec2_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.sec2_rate}}</td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.mon" v-if="segment.sec3 > 0 && segment.sec3 > getFileDurations || segment.sec3 == getFileDurations && segment.sec3 != 0"><input type="radio"   :name="'seA' + (index)"  :value="{'startDate': startDate + '' + seg.mon_duration.substr(0,2) + ':' + seg.mon_b_duration  + '' +seg.mon_duration.substr(2,3),'endDate':endDate + '' + seg.mon_c_duration.substr(0,2) + ':' + seg.mon_d_duration  + '' +seg.mon_c_duration.substr(2,3),'endTime' :seg.mon_b_duration,durations : segment.sec2 + segment.time3,'rate': seg.sec3_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.sec3_rate}}</td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.mon" v-if="segment.sec4 > 0 && segment.sec4 > getFileDurations || segment.sec4 == getFileDurations && segment.sec4 != 0"><input type="radio"   :name="'seA' + (index)"  :value="{'startDate': startDate + '' + seg.mon_duration.substr(0,2) + ':' + seg.mon_b_duration  + '' +seg.mon_duration.substr(2,3),'endDate':endDate + '' + seg.mon_c_duration.substr(0,2) + ':' + seg.mon_d_duration  + '' +seg.mon_c_duration.substr(2,3),'endTime' :seg.mon_b_duration,durations : segment.sec3 + segment.time4,'rate': seg.sec4_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.sec4_rate}}</td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.mon" v-if="segment.sec5 > 0 && segment.sec5 > getFileDurations || segment.sec5 == getFileDurations && segment.sec5 != 0"><input type="radio"   :name="'seA' + (index)"  :value="{'startDate': startDate + '' + seg.mon_duration.substr(0,2) + ':' + seg.mon_b_duration  + '' +seg.mon_duration.substr(2,3),'endDate':endDate + '' + seg.mon_c_duration.substr(0,2) + ':' + seg.mon_d_duration  + '' +seg.mon_c_duration.substr(2,3),'endTime' :seg.mon_b_duration,durations : segment.sec4 + segment.time5,'rate': seg.sec5_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.sec5_rate}}</td>

                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.tue" v-if="segment.sec1 > 0 && segment.sec1 > getFileDurations || segment.sec1 == getFileDurations && segment.sec1 != 0"><input type="radio"   :name="'seB' + (index)"  :value="{'startDate': startDate + '' + seg.tue_duration.substr(0,2) + ':' + seg.tue_b_duration  + '' +seg.tue_duration.substr(2,3),'endDate':endDate + '' + seg.tue_c_duration.substr(0,2) + ':' + seg.tue_d_duration  + '' +seg.tue_c_duration.substr(2,3),'endTime' :seg.tue_b_duration,durations : segment.sec1 + segment.time1,'rate': seg.sec1_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.sec1_rate}}</td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.tue" v-if="segment.sec2 > 0 && segment.sec2 > getFileDurations || segment.sec2 == getFileDurations && segment.sec2 != 0"><input type="radio"   :name="'seB' + (index)"  :value="{'startDate': startDate + '' + seg.tue_duration.substr(0,2) + ':' + seg.tue_b_duration  + '' +seg.tue_duration.substr(2,3),'endDate':endDate + '' + seg.tue_c_duration.substr(0,2) + ':' + seg.tue_d_duration  + '' +seg.tue_c_duration.substr(2,3),'endTime' :seg.tue_b_duration,durations : segment.sec2 + segment.time2,'rate': seg.sec2_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.sec2_rate}}</td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.tue" v-if="segment.sec3 > 0 && segment.sec3 > getFileDurations || segment.sec3 == getFileDurations && segment.sec3 != 0"><input type="radio"   :name="'seB' + (index)"  :value="{'startDate': startDate + '' + seg.tue_duration.substr(0,2) + ':' + seg.tue_b_duration  + '' +seg.tue_duration.substr(2,3),'endDate':endDate + '' + seg.tue_c_duration.substr(0,2) + ':' + seg.tue_d_duration  + '' +seg.tue_c_duration.substr(2,3),'endTime' :seg.tue_b_duration,durations : segment.sec3 + segment.time3,'rate': seg.sec3_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.sec3_rate}}</td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.tue" v-if="segment.sec4 > 0 && segment.sec4 > getFileDurations || segment.sec4 == getFileDurations && segment.sec4 != 0"><input type="radio"   :name="'seB' + (index)"  :value="{'startDate': startDate + '' + seg.tue_duration.substr(0,2) + ':' + seg.tue_b_duration  + '' +seg.tue_duration.substr(2,3),'endDate':endDate + '' + seg.tue_c_duration.substr(0,2) + ':' + seg.tue_d_duration  + '' +seg.tue_c_duration.substr(2,3),'endTime' :seg.tue_b_duration,durations : segment.sec4 + segment.time4,'rate': seg.sec4_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.sec4_rate}}</td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.tue" v-if="segment.sec5 > 0 && segment.sec5 > getFileDurations || segment.sec5 == getFileDurations && segment.sec5 != 0"><input type="radio"   :name="'seB' + (index)"  :value="{'startDate': startDate + '' + seg.tue_duration.substr(0,2) + ':' + seg.tue_b_duration  + '' +seg.tue_duration.substr(2,3),'endDate':endDate + '' + seg.tue_c_duration.substr(0,2) + ':' + seg.tue_d_duration  + '' +seg.tue_c_duration.substr(2,3),'endTime' :seg.tue_b_duration,durations : segment.sec5 + segment.time5,'rate': seg.sec5_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.sec5_rate}}</td>

                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.wed" v-if="segment.sec1 > 0 && segment.sec1 > getFileDurations || segment.sec1 == getFileDurations && segment.sec1 != 0"><input type="radio"   :name="'seC' + (index)"  :value="{'startDate': startDate + '' + seg.wed_duration.substr(0,2) + ':' + seg.wed_b_duration  + '' +seg.wed_duration.substr(2,3),'endDate':endDate + '' + seg.wed_c_duration.substr(0,2) + ':' + seg.wed_d_duration  + '' +seg.wed_c_duration.substr(2,3),'endTime' :seg.wed_b_duration,durations : segment.sec1 + segment.time1,'rate': seg.sec1_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.sec1_rate}}</td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.wed" v-if="segment.sec2 > 0 && segment.sec2 > getFileDurations || segment.sec2 == getFileDurations && segment.sec2 != 0"><input type="radio"   :name="'seC' + (index)"  :value="{'startDate': startDate + '' + seg.wed_duration.substr(0,2) + ':' + seg.wed_b_duration  + '' +seg.wed_duration.substr(2,3),'endDate':endDate + '' + seg.wed_c_duration.substr(0,2) + ':' + seg.wed_d_duration  + '' +seg.wed_c_duration.substr(2,3),'endTime' :seg.wed_b_duration,durations : segment.sec2 + segment.time2,'rate': seg.sec2_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.sec2_rate}}</td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.wed" v-if="segment.sec3 > 0 && segment.sec3 > getFileDurations || segment.sec3 == getFileDurations && segment.sec3 != 0"><input type="radio"   :name="'seC' + (index)"  :value="{'startDate': startDate + '' + seg.wed_duration.substr(0,2) + ':' + seg.wed_b_duration  + '' +seg.wed_duration.substr(2,3),'endDate':endDate + '' + seg.wed_c_duration.substr(0,2) + ':' + seg.wed_d_duration  + '' +seg.wed_c_duration.substr(2,3),'endTime' :seg.wed_b_duration,durations : segment.sec3 + segment.time3,'rate': seg.sec3_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.sec3_rate}}</td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.wed" v-if="segment.sec4 > 0 && segment.sec4 > getFileDurations || segment.sec4 == getFileDurations && segment.sec4 != 0"><input type="radio"   :name="'seC' + (index)"  :value="{'startDate': startDate + '' + seg.wed_duration.substr(0,2) + ':' + seg.wed_b_duration  + '' +seg.wed_duration.substr(2,3),'endDate':endDate + '' + seg.wed_c_duration.substr(0,2) + ':' + seg.wed_d_duration  + '' +seg.wed_c_duration.substr(2,3),'endTime' :seg.wed_b_duration,durations : segment.sec4 + segment.time4,'rate': seg.sec4_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.sec4_rate}}</td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.wed" v-if="segment.sec5 > 0 && segment.sec5 > getFileDurations || segment.sec5 == getFileDurations && segment.sec5 != 0"><input type="radio"   :name="'seC' + (index)"  :value="{'startDate': startDate + '' + seg.wed_duration.substr(0,2) + ':' + seg.wed_b_duration  + '' +seg.wed_duration.substr(2,3),'endDate':endDate + '' + seg.wed_c_duration.substr(0,2) + ':' + seg.wed_d_duration  + '' +seg.wed_c_duration.substr(2,3),'endTime' :seg.wed_b_duration,durations : segment.sec5 + segment.time5,'rate': seg.sec5_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.sec5_rate}}</td>

                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.thu" v-if="segment.sec1 > 0 && segment.sec1 > getFileDurations || segment.sec1 == getFileDurations && segment.sec1 != 0"><input type="radio"   :name="'seD' + (index)"  :value="{'startDate': startDate + '' + seg.thu_duration.substr(0,2) + ':' + seg.thu_b_duration  + '' +seg.thu_duration.substr(2,3),'endDate':endDate + '' + seg.thu_c_duration.substr(0,2) + ':' + seg.thu_d_duration  + '' +seg.thu_c_duration.substr(2,3),'endTime' :seg.thu_b_duration,durations : segment.sec1 + segment.time1,'rate': seg.sec1_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.sec1_rate}}</td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.thu" v-if="segment.sec2 > 0 && segment.sec2 > getFileDurations || segment.sec2 == getFileDurations && segment.sec2 != 0"><input type="radio"   :name="'seD' + (index)"  :value="{'startDate': startDate + '' + seg.thu_duration.substr(0,2) + ':' + seg.thu_b_duration  + '' +seg.thu_duration.substr(2,3),'endDate':endDate + '' + seg.thu_c_duration.substr(0,2) + ':' + seg.thu_d_duration  + '' +seg.thu_c_duration.substr(2,3),'endTime' :seg.thu_b_duration,durations : segment.sec2 + segment.time2,'rate': seg.sec2_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.sec2_rate}}</td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.thu" v-if="segment.sec3 > 0 && segment.sec3 > getFileDurations || segment.sec3 == getFileDurations && segment.sec3 != 0"><input type="radio"   :name="'seD' + (index)"  :value="{'startDate': startDate + '' + seg.thu_duration.substr(0,2) + ':' + seg.thu_b_duration  + '' +seg.thu_duration.substr(2,3),'endDate':endDate + '' + seg.thu_c_duration.substr(0,2) + ':' + seg.thu_d_duration  + '' +seg.thu_c_duration.substr(2,3),'endTime' :seg.thu_b_duration,durations : segment.sec3 + segment.time3,'rate': seg.sec3_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.sec3_rate}}</td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.thu" v-if="segment.sec4 > 0 && segment.sec4 > getFileDurations || segment.sec4 == getFileDurations && segment.sec4 != 0"><input type="radio"   :name="'seD' + (index)"  :value="{'startDate': startDate + '' + seg.thu_duration.substr(0,2) + ':' + seg.thu_b_duration  + '' +seg.thu_duration.substr(2,3),'endDate':endDate + '' + seg.thu_c_duration.substr(0,2) + ':' + seg.thu_d_duration  + '' +seg.thu_c_duration.substr(2,3),'endTime' :seg.thu_b_duration,durations : segment.sec4 + segment.time4,'rate': seg.sec4_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.sec4_rate}}</td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.thu" v-if="segment.sec5 > 0 && segment.sec5 > getFileDurations || segment.sec5 == getFileDurations && segment.sec5 != 0"><input type="radio"   :name="'seD' + (index)"  :value="{'startDate': startDate + '' + seg.thu_duration.substr(0,2) + ':' + seg.thu_b_duration  + '' +seg.thu_duration.substr(2,3),'endDate':endDate + '' + seg.thu_c_duration.substr(0,2) + ':' + seg.thu_d_duration  + '' +seg.thu_c_duration.substr(2,3),'endTime' :seg.thu_b_duration,durations : segment.sec5 + segment.time5,'rate': seg.sec5_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.sec5_rate}}</td>

                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.fri" v-if="segment.sec1 > 0 && segment.sec1 > getFileDurations || segment.sec1 == getFileDurations && segment.sec1 != 0"><input type="radio"   :name="'seE' + (index)"  :value="{'startDate': startDate + '' + seg.fri_duration.substr(0,2) + ':' + seg.fri_b_duration  + '' +seg.fri_duration.substr(2,3),'endDate':endDate + '' + seg.fri_c_duration.substr(0,2) + ':' + seg.fri_d_duration  + '' +seg.fri_c_duration.substr(2,3),'endTime' :seg.fri_b_duration,durations : segment.sec1 + segment.time1,'rate': seg.sec1_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.sec1_rate}}</td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.fri" v-if="segment.sec2 > 0 && segment.sec2 > getFileDurations || segment.sec2 == getFileDurations && segment.sec2 != 0"><input type="radio"   :name="'seE' + (index)"  :value="{'startDate': startDate + '' + seg.fri_duration.substr(0,2) + ':' + seg.fri_b_duration  + '' +seg.fri_duration.substr(2,3),'endDate':endDate + '' + seg.fri_c_duration.substr(0,2) + ':' + seg.fri_d_duration  + '' +seg.fri_c_duration.substr(2,3),'endTime' :seg.fri_b_duration,durations : segment.sec2 + segment.time2,'rate': seg.sec2_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.sec2_rate}}</td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.fri" v-if="segment.sec3 > 0 && segment.sec3 > getFileDurations || segment.sec3 == getFileDurations && segment.sec3 != 0"><input type="radio"   :name="'seE' + (index)"  :value="{'startDate': startDate + '' + seg.fri_duration.substr(0,2) + ':' + seg.fri_b_duration  + '' +seg.fri_duration.substr(2,3),'endDate':endDate + '' + seg.fri_c_duration.substr(0,2) + ':' + seg.fri_d_duration  + '' +seg.fri_c_duration.substr(2,3),'endTime' :seg.fri_b_duration,durations : segment.sec3 + segment.time3,'rate': seg.sec3_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.sec3_rate}}</td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.fri" v-if="segment.sec4 > 0 && segment.sec4 > getFileDurations || segment.sec4 == getFileDurations && segment.sec4 != 0"><input type="radio"   :name="'seE' + (index)"  :value="{'startDate': startDate + '' + seg.fri_duration.substr(0,2) + ':' + seg.fri_b_duration  + '' +seg.fri_duration.substr(2,3),'endDate':endDate + '' + seg.fri_c_duration.substr(0,2) + ':' + seg.fri_d_duration  + '' +seg.fri_c_duration.substr(2,3),'endTime' :seg.fri_b_duration,durations : segment.sec4 + segment.time4,'rate': seg.sec4_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.sec4_rate}}</td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.fri" v-if="segment.sec5 > 0 && segment.sec5 > getFileDurations || segment.sec5 == getFileDurations && segment.sec5 != 0"><input type="radio"   :name="'seE' + (index)"  :value="{'startDate': startDate + '' + seg.fri_duration.substr(0,2) + ':' + seg.fri_b_duration  + '' +seg.fri_duration.substr(2,3),'endDate':endDate + '' + seg.fri_c_duration.substr(0,2) + ':' + seg.fri_d_duration  + '' +seg.fri_c_duration.substr(2,3),'endTime' :seg.fri_b_duration,durations : segment.sec5 + segment.time5,'rate': seg.sec5_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.sec5_rate}}</td>
                            </tr>
                            </tbody>
                            </table>
                            </div>
                               <div  v-show="checkDays(weekends)">
<!--                                   <display-weekend-segments :spots="spots" :seg_data="seg_data" :wsegments="wsegments" :card_title="card_title" :segDay="segmentDay" :days="daysOfWeekend" :wsegemtns="weekendSegments"></display-weekend-segments>-->
                                   <div class="table-responsive">
                                       <table class="table table-bordered">
                                           <thead>
                                           <tr  style="background: #36475F;color: #ffffff;">
                                               <th>#</th>
                                               <th v-show="segmentDay.substr(0,3).toUpperCase()  === days.sat">{{days.sat}}</th>
                                               <th v-show="segmentDay.substr(0,3).toUpperCase()  === days.sun">{{days.sun}}</th>
                                               <th >Spots</th>
                                               <th v-show="segmentDay.substr(0,3).toUpperCase()  === days.sat" v-if="days.wsec1 > 0">{{days.wsec1 + days.time1}}</th>
                                               <th v-show="segmentDay.substr(0,3).toUpperCase()  === days.sat" v-if="days.wsec2 > 0">{{days.wsec2 + days.time2}}</th>
                                               <th v-show="segmentDay.substr(0,3).toUpperCase()  === days.sat" v-if="days.wsec3 > 0">{{days.wsec3 + days.time3}}</th>
                                               <th v-show="segmentDay.substr(0,3).toUpperCase()  === days.sat" v-if="days.wsec4 > 0">{{days.wsec4 + days.time4}}</th>
                                               <th v-show="segmentDay.substr(0,3).toUpperCase()  === days.sat" v-if="days.wsec5 > 0">{{days.wsec5 + days.time5}}</th>

                                               <th v-show="segmentDay.substr(0,3).toUpperCase()  === days.sun"  v-if="days.wsec1 > 0">{{days.wsec1 + days.time1}}</th>
                                               <th v-show="segmentDay.substr(0,3).toUpperCase()  === days.sun"  v-if="days.wsec2 > 0">{{days.wsec2 + days.time2}}</th>
                                               <th v-show="segmentDay.substr(0,3).toUpperCase()  === days.sun"  v-if="days.wsec3 > 0">{{days.wsec3 + days.time3}}</th>
                                               <th v-show="segmentDay.substr(0,3).toUpperCase()  === days.sun"  v-if="days.wsec4 > 0">{{days.wsec4 + days.time4}}</th>
                                               <th v-show="segmentDay.substr(0,3).toUpperCase()  === days.sun"  v-if="days.wsec5 > 0">{{days.wsec5 + days.time5}}</th>

                                           </tr>
                                           </thead>
                                           <tbody>
                                           <tr v-for="(seg,index) in wsegments" :key="index">
                                               <th scope="row">{{index + 1}}</th>
                                               <td v-show="segmentDay.substr(0,3).toUpperCase() == days.sat">{{seg.sat_duration.substr(0,2) + ':' + seg.sat_b_duration }}-{{seg.sat_c_duration.substr(0,2) + ':' + seg.sat_d_duration + '' + seg.sat_c_duration.substr(2,3) }}</td>
                                               <td v-show="segmentDay.substr(0,3).toUpperCase() == days.sun">{{seg.sun_duration.substr(0,2) + ':' + seg.sun_b_duration }}-{{seg.sun_c_duration.substr(0,2) + ':' + seg.sun_d_duration + '' + seg.sun_c_duration.substr(2,3) }}</td>

                                               <td v-show="segmentDay.substr(0,3).toUpperCase() == days.sat"> <select name="select" v-model="spots[index]">
                                                   <option disabled value="" selected>spots</option>
                                                   <option v-for=" (s,index) in spot_avail(seg.sat_spots)" :key="index" :name="'seA' + (index)"   :value="s" >{{s}}</option>

                                               </select></td>
                                               <td v-show="segmentDay.substr(0,3).toUpperCase() == days.sun"> <select name="select" v-model="spots[index]">
                                                   <option disabled value="" selected>spots</option>
                                                   <option v-for=" (s,index) in spot_avail(seg.sun_spots)" :key="index" :name="'seA' + (index)"   :value="s" >{{s}}</option>

                                               </select></td>
                                               <td v-show="segmentDay.substr(0,3).toUpperCase() == days.sat" v-if="days.wsec1 > 0"><input type="radio"   :name="'seA' + (index)"  :value="{'startDate': startDate + '' + seg.sat_duration.substr(0,2) + ':' + seg.sat_b_duration  + '' +seg.sat_duration.substr(2,3),'endDate':endDate + '' + seg.sat_c_duration.substr(0,2) + ':' + seg.sat_d_duration  + '' +seg.sat_c_duration.substr(2,3),'endTime' :seg.sat_b_duration,durations : days.wsec1 + days.time1,'rate': seg.wsec1_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.wsec1_rate}}</td>
                                               <td v-show="segmentDay.substr(0,3).toUpperCase() == days.sat" v-if="days.wsec2 > 0"><input type="radio"   :name="'seA' + (index)"  :value="{'startDate': startDate + '' + seg.sat_duration.substr(0,2) + ':' + seg.sat_b_duration  + '' +seg.sat_duration.substr(2,3),'endDate':endDate + '' + seg.sat_c_duration.substr(0,2) + ':' + seg.sat_d_duration  + '' +seg.sat_c_duration.substr(2,3),'endTime' :seg.sat_b_duration,durations : days.wsec2 + days.time2,'rate': seg.wsec2_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.wsec2_rate}}</td>
                                               <td v-show="segmentDay.substr(0,3).toUpperCase() == days.sat" v-if="days.wsec3 > 0"><input type="radio"   :name="'seA' + (index)"  :value="{'startDate': startDate + '' + seg.sat_duration.substr(0,2) + ':' + seg.sat_b_duration  + '' +seg.sat_duration.substr(2,3),'endDate':endDate + '' + seg.sat_c_duration.substr(0,2) + ':' + seg.sat_d_duration  + '' +seg.sat_c_duration.substr(2,3),'endTime' :seg.sat_b_duration,durations : days.wsec3 + days.time3,'rate': seg.wsec3_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.wsec3_rate}}</td>
                                               <td v-show="segmentDay.substr(0,3).toUpperCase() == days.sat" v-if="days.wsec4 > 0"><input type="radio"   :name="'seA' + (index)"  :value="{'startDate': startDate + '' + seg.sat_duration.substr(0,2) + ':' + seg.sat_b_duration  + '' +seg.sat_duration.substr(2,3),'endDate':endDate + '' + seg.sat_c_duration.substr(0,2) + ':' + seg.sat_d_duration  + '' +seg.sat_c_duration.substr(2,3),'endTime' :seg.sat_b_duration,durations : days.wsec4 + days.time4,'rate': seg.wsec4_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.wsec4_rate}}</td>
                                               <td v-show="segmentDay.substr(0,3).toUpperCase() == days.sat" v-if="days.wsec5 > 0"><input type="radio"   :name="'seA' + (index)"  :value="{'startDate': startDate + '' + seg.sat_duration.substr(0,2) + ':' + seg.sat_b_duration  + '' +seg.sat_duration.substr(2,3),'endDate':endDate + '' + seg.sat_c_duration.substr(0,2) + ':' + seg.sat_d_duration  + '' +seg.sat_c_duration.substr(2,3),'endTime' :seg.sat_b_duration,durations : days.wsec5 + days.time5,'rate': seg.wsec5_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.wsec5_rate}}</td>

                                               <td v-show="segmentDay.substr(0,3).toUpperCase() == days.sun" v-if="days.wsec1 > 0"><input type="radio"   :name="'seA' + (index)"  :value="{'startDate': startDate + '' + seg.sun_duration.substr(0,2) + ':' + seg.sun_b_duration  + '' +seg.sun_duration.substr(2,3),'endDate':endDate + '' + seg.sun_c_duration.substr(0,2) + ':' + seg.sun_d_duration  + '' +seg.sun_c_duration.substr(2,3),'endTime' :seg.sun_b_duration,durations : days.wsec1 + days.time1,'rate': seg.wsec1_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.wsec1_rate}}</td>
                                               <td v-show="segmentDay.substr(0,3).toUpperCase() == days.sun" v-if="days.wsec2 > 0"><input type="radio"   :name="'seA' + (index)"  :value="{'startDate': startDate + '' + seg.sun_duration.substr(0,2) + ':' + seg.sun_b_duration  + '' +seg.sun_duration.substr(2,3),'endDate':endDate + '' + seg.sun_c_duration.substr(0,2) + ':' + seg.sun_d_duration  + '' +seg.sun_c_duration.substr(2,3),'endTime' :seg.sun_b_duration,durations : days.wsec2 + days.time2,'rate': seg.wsec2_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.wsec2_rate}}</td>
                                               <td v-show="segmentDay.substr(0,3).toUpperCase() == days.sun" v-if="days.wsec3 > 0"><input type="radio"   :name="'seA' + (index)"  :value="{'startDate': startDate + '' + seg.sun_duration.substr(0,2) + ':' + seg.sun_b_duration  + '' +seg.sun_duration.substr(2,3),'endDate':endDate + '' + seg.sun_c_duration.substr(0,2) + ':' + seg.sun_d_duration  + '' +seg.sun_c_duration.substr(2,3),'endTime' :seg.sun_b_duration,durations : days.wsec3 + days.time3,'rate': seg.wsec3_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.wsec3_rate}}</td>
                                               <td v-show="segmentDay.substr(0,3).toUpperCase() == days.sun" v-if="days.wsec4 > 0"><input type="radio"   :name="'seA' + (index)"  :value="{'startDate': startDate + '' + seg.sun_duration.substr(0,2) + ':' + seg.sun_b_duration  + '' +seg.sun_duration.substr(2,3),'endDate':endDate + '' + seg.sun_c_duration.substr(0,2) + ':' + seg.sun_d_duration  + '' +seg.sun_c_duration.substr(2,3),'endTime' :seg.sun_b_duration,durations : days.wsec4 + days.time4,'rate': seg.wsec4_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.wsec4_rate}}</td>
                                               <td v-show="segmentDay.substr(0,3).toUpperCase() == days.sun" v-if="days.wsec5 > 0"><input type="radio"   :name="'seA' + (index)"  :value="{'startDate': startDate + '' + seg.sun_duration.substr(0,2) + ':' + seg.sun_b_duration  + '' +seg.sun_duration.substr(2,3),'endDate':endDate + '' + seg.sun_c_duration.substr(0,2) + ':' + seg.sun_d_duration  + '' +seg.sun_c_duration.substr(2,3),'endTime' :seg.sun_b_duration,durations : days.wsec5 + days.time5,'rate': seg.wsec5_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.wsec5_rate}}</td>

                                           </tr>
                                           </tbody>
                                       </table>
                                   </div>

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
        props :['saveSegment','startDate','endDate','media_id','segments_data',
            'card_title','segment','segments','weekendSegments','days','wsegments','spot_check'],
        name : 'selectSegments',

        mounted(){
        // this.eventTime();
         // this.validateRateCardSelection(this.seg_data);
            setInterval(function () {
                this.data = true
            },2000);

            if (this.segment_data != ''){
                this.data  = false;
            }


        },
        created(){

        },
        data(){
            return {
                //invoice: '/user-account/create-sub-invoice',
                segment_date: '/user-account/create-sub-date',
                selSegment_url: '/user-account/select-segment',

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
                weekdays :  ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
                weekends : ['Saturday','Sunday'],
                show_ratecard : false,
                data : false,
                  su : [1,2,3,4],

            }
        },
        methods: {
            submit(title){
                store.dispatch('getSegmentTitle', title);
                this.eventTime();

                $('#radio_tv').modal('hide');
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
            checkSpots(card_spots){
                // let s = parseInt(spot);
                // let usp  = parseInt(used_spot);
                // let results = s - usp;
                // let spots = [];
                // for (let i = 1; i < results + 1; i++) {
                //     spots.push(i);
                // }
                // return spots;
                for(let user of this.spot_check){
                    console.log(user.spots_used);
                }



                  //    let sum = 0;
                  //    let x = 0;
                  //
                  //   this.spot_check.forEach(function(spot){
                  //         x = spot.spots_used;
                  //       console.log(x);
                  //   });
                  // //  sum = parseInt(card_spots) - parseInt(x);
                          return '06:30-08:30 AM' ;
            },
            // checkSpots(segment){
            //     let self = this;
            //     store.dispatch('getProcessing', true);
            //     setTimeout(function () {
            //         axios.get('check-spots-api/' +  segment ).then(function (res) {
            //            // console.log(res.data);
            //             store.dispatch('getProcessing', false);
            //         }).catch(function (error) {
            //        //     console.log(error);
            //         });
            //     },3000);
            // },
            save(){
                 store.dispatch('getSegmentTitle', this.title);
                $('#radio_tv').modal('hide');
            },
            validateRateCardSelection(segment){
                // alert(segment.length > 0);

               return segment.length > 0;

            },
            checkDays(days){
                for (let i =0; i< days.length; i++){
                    if (days[i] == this.segmentDay){
                        return true;
                    }
                }
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
                return [this.days];
            },
            getFileDurations(){
                return  store.state.fileDuration;
            }

        },

    }

</script>

