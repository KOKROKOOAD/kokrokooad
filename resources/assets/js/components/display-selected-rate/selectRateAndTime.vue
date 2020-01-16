<template>

            <div  class="modal fade" id="radio_tv" tabindex="-1" role="dialog" style="margin-left: 220px;">
                <div class="modal-dialog modal-lg" role="document">
<!--                    <form  @submit.prevent="" id="segment-form">-->
                    <div class="modal-content" >
                        <div class="modal-header">
                            <h4 class="modal-title"><b class="text-danger">{{getMediaHouse}}</b>- {{card_title}} rate card</h4>
                            <h4 class="pull-right text-dark"><small class="text-mute">{{startDate + ' ' +segmentDay}} <b v-show="getFileDurations !=  0"> | {{'File duration : ' + getFileDurations + ' seconds'}}</b></small></h4>
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
                                <th >Spots available</th>
                                <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.mon" v-if="segment.sec1 > 0 && segment.sec1 > getFileDurations || segment.sec1 == getFileDurations && segment.sec1 != 0">{{segment.sec1 + segment.time1}}</th>
                                <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.mon" v-if="segment.sec2 > 0 && segment.sec2 > getFileDurations || segment.sec2 == getFileDurations && segment.sec2 != 0">{{segment.sec2 + segment.time2}}</th>
                                <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.mon" v-if="segment.sec3 > 0 && segment.sec3 > getFileDurations || segment.sec3 == getFileDurations && segment.sec3 != 0">{{segment.sec3 + segment.time3}}</th>
                                <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.mon" v-if="segment.sec4 > 0 && segment.sec4 > getFileDurations || segment.sec4 == getFileDurations && segment.sec4 != 0">{{segment.sec4 + segment.time4}}</th>
                                <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.mon" v-if="segment.sec5 > 0 && segment.sec5 > getFileDurations || segment.sec5 == getFileDurations && segment.sec5 != 0">{{segment.sec5 + segment.time5}}</th>

                                <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.tue" v-if="segment.sec1 > 0 && segment.sec1 > getFileDurations || segment.sec1 == getFileDurations && segment.sec1 != 0"> {{segment.sec1 + segment.time1}}</th>
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
                                <th>Reset</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(seg,index) in segments" :key="index">
                            <th scope="row">{{index + 1}}</th>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.mon">{{seg.mon_duration + ':' + seg.mon_b_duration }}-{{seg.mon_c_duration + ':' + seg.mon_d_duration}}</td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.tue">{{seg.tue_duration + ':' + seg.tue_b_duration }}-{{seg.tue_c_duration + ':' + seg.tue_d_duration}}</td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.wed">{{seg.wed_duration + ':' + seg.wed_b_duration }}-{{seg.wed_c_duration + ':' + seg.wed_d_duration}}</td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.thu">{{seg.thu_duration + ':' + seg.thu_b_duration }}-{{seg.thu_c_duration + ':' + seg.thu_d_duration }}</td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.fri">{{seg.fri_duration + ':' + seg.fri_b_duration }}-{{seg.fri_c_duration + ':' + seg.fri_d_duration}}</td>

                                   <!--spots for rate card-->
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.mon" >
                                  {{seg.mon_spots}}
                                </td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.tue" >
                                    {{seg.tue_spots}}
                                </td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.wed" >
                                    {{seg.wed_spots}}
                                </td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.thu" >
                                    {{seg.thu_spots}}
                                </td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.fri" >
                                    {{seg.fri_spots}}
                                </td>
                                     <!-- end of spots for rate cards -->


                                      <!-- spots available -->
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.mon" >
                                    <span v-show="checkIfSegmentExist(seg.mon_duration + ':' + seg.mon_b_duration + '-' + seg.mon_c_duration + ':' + seg.mon_d_duration,seg.mon_spots) == 0">{{booked}}</span>
                                    <select name="select"  v-model="spots[index]" v-show="checkIfSegmentExist(seg.mon_duration + ':' + seg.mon_b_duration + '-' + seg.mon_c_duration + ':' + seg.mon_d_duration,seg.mon_spots) != 0">
                                     <option>--choose--</option>
                                        <option v-for=" s in checkIfSegmentExist(seg.mon_duration + ':' + seg.mon_b_duration + '-' + seg.mon_c_duration + ':' + seg.mon_d_duration,seg.mon_spots)"  v-if="segment_exist"  :name="'seB' + (index)"   :value="s">{{s}}</option>
                                    <option  v-show="segment_exist == false"   v-for=" s in  spot_avail(seg.mon_spots)"       :name="'seB' + (index)"   :value="s"  >{{s}}</option>
                                    </select>
                                </td>

                                <td  v-show="segmentDay.substr(0,3).toUpperCase() == segment.tue">
                                    <span v-show="checkIfSegmentExist(seg.tue_duration + ':' + seg.tue_b_duration + '-' + seg.tue_c_duration + ':' + seg.tue_d_duration,seg.tue_spots) == 0">{{booked}}</span>
                                    <select   name="select" v-model="spots[index]"  v-show="checkIfSegmentExist(seg.tue_duration + ':' + seg.tue_b_duration + '-' + seg.tue_c_duration + ':' + seg.tue_d_duration,seg.tue_spots) != 0">
                                        <option>--choose--</option>
                                        <option    v-for=" s in checkIfSegmentExist(seg.tue_duration + ':' + seg.tue_b_duration + '-' + seg.tue_c_duration + ':' + seg.tue_d_duration,seg.tue_spots) "  v-if="segment_exist"  :name="'seB' + (index)"   :value="s">{{s}}</option>
                                             <option  v-show="segment_exist == false"   v-for=" s in  spot_avail(seg.tue_spots)"       :name="'seB' + (index)"   :value="s"  >{{s}}</option>
                                         </select>
                                   </td>


                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.wed">
                                    <span v-show="checkIfSegmentExist(seg.wed_duration + ':' + seg.wed_b_duration + '-' + seg.wed_c_duration + ':' + seg.wed_d_duration,seg.wed_spots) == 0">{{booked}}</span>
                                    <select name="select" v-model="spots[index]" v-show="checkIfSegmentExist(seg.wed_duration + ':' + seg.wed_b_duration + '-' + seg.wed_c_duration + ':' + seg.wed_d_duration,seg.wed_spots) != 0">
                                        <option>--choose--</option>
                                        <option v-for=" s in checkIfSegmentExist(seg.wed_duration + ':' + seg.wed_b_duration + '-' + seg.wed_c_duration + ':' + seg.wed_d_duration,seg.wed_spots)"  v-if="segment_exist"  :name="'seB' + (index)"   :value="s">{{s}}</option>
                                    <option  v-show="segment_exist == false"   v-for=" s in  spot_avail(seg.wed_spots)"        :name="'seB' + (index)"   :value="s"  >{{s}}</option>
                                </select>

                                </td>

                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.thu">
                                    <span v-show="checkIfSegmentExist(seg.thu_duration + ':' + seg.thu_b_duration + '-' + seg.thu_c_duration + ':' + seg.thu_d_duration,seg.thu_spots) == 0">{{booked}}</span>
                                    <select name="select" v-model="spots[index]" v-show="checkIfSegmentExist(seg.thu_duration + ':' + seg.thu_b_duration + '-' + seg.thu_c_duration + ':' + seg.thu_d_duration,seg.thu_spots) != 0">
                                        <option>--choose--</option>
                                        <option v-for=" s in checkIfSegmentExist(seg.thu_duration + ':' + seg.thu_b_duration + '-' + seg.thu_c_duration + ':' + seg.thu_d_duration,seg.thu_spots)"  v-if="segment_exist"  :name="'seB' + (index)"   :value="s">{{s}}</option>
                                    <option  v-show="segment_exist == false"   v-for=" s in  spot_avail(seg.thu_spots)"       :name="'seB' + (index)"   :value="s"  >{{s}}</option>
                                </select>
                                </td>

                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.fri">
                                    <span v-show="checkIfSegmentExist(seg.fri_duration + ':' + seg.fri_b_duration + '-' + seg.fri_c_duration + ':' + seg.fri_d_duration,seg.fri_spots) == 0">{{booked}}</span>
                                    <select name="select" v-model="spots[index]"  v-show="checkIfSegmentExist(seg.fri_duration + ':' + seg.fri_b_duration + '-' + seg.fri_c_duration + ':' + seg.fri_d_duration,seg.fri_spots) != 0">
                                        <option>--choose--</option>
                                        <option v-for=" s in checkIfSegmentExist(seg.wed_duration + ':' + seg.wed_b_duration + '-' + seg.wed_c_duration + ':' + seg.wed_d_duration,seg.wed_spots)"  v-if="segment_exist"  :name="'seB' + (index)"   :value="s">{{s}}</option>
                                       <option  v-show="segment_exist == false"   v-for=" s in  spot_avail(seg.fri_spots)"       :name="'seB' + (index)"   :value="s"  >{{s}}</option>
                                   </select>
                                </td>

                                   <!--spots available ends here-->
                                 <!--Rates-->
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.mon" v-if="segment.sec1 > 0 && segment.sec1 > getFileDurations || segment.sec1 == getFileDurations && segment.sec1 != 0"><input  v-show="checkIfSegmentExist(seg.mon_duration + ':' + seg.mon_b_duration + '-' + seg.mon_c_duration + ':' + seg.mon_d_duration,seg.mon_spots) != 0" type="radio"  :checked="reset_disabled == true"  :name="'seB' + (index)"  :value="{'startDate': startDate + '' + seg.mon_duration + ':' + seg.mon_b_duration  ,'endDate':endDate + '' + seg.mon_c_duration + ':' + seg.mon_d_duration  ,'endTime' :seg.mon_b_duration,durations : segment.sec1 + segment.time1,'rate': seg.sec1_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{checkIfSegmentExist(seg.mon_duration + ':' + seg.mon_b_duration + '-' + seg.mon_c_duration + ':' + seg.mon_d_duration,seg.mon_spots) === 0  ? 'Booked' :'GHC'+ seg.sec1_rate }}</td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.mon" v-if="segment.sec2 > 0 && segment.sec2 > getFileDurations || segment.sec2 == getFileDurations && segment.sec2 != 0"><input  v-show="checkIfSegmentExist(seg.mon_duration + ':' + seg.mon_b_duration + '-' + seg.mon_c_duration + ':' + seg.mon_d_duration,seg.mon_spots) != 0" type="radio"  :checked="reset_disabled == true"   :name="'seB' + (index)"  :value="{'startDate': startDate + '' + seg.mon_duration + ':' + seg.mon_b_duration  ,'endDate':endDate + '' + seg.mon_c_duration + ':' + seg.mon_d_duration  ,'endTime' :seg.mon_b_duration,durations : segment.sec2 + segment.time2,'rate': seg.sec2_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{checkIfSegmentExist(seg.mon_duration + ':' + seg.mon_b_duration + '-' + seg.mon_c_duration + ':' + seg.mon_d_duration,seg.mon_spots) === 0  ? 'Booked' :'GHC'+ seg.sec2_rate}}</td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.mon" v-if="segment.sec3 > 0 && segment.sec3 > getFileDurations || segment.sec3 == getFileDurations && segment.sec3 != 0"><input  v-show="checkIfSegmentExist(seg.mon_duration + ':' + seg.mon_b_duration + '-' + seg.mon_c_duration + ':' + seg.mon_d_duration,seg.mon_spots) != 0" type="radio"  :checked="reset_disabled == true"    :name="'seB' + (index)"  :value="{'startDate': startDate + '' + seg.mon_duration + ':' + seg.mon_b_duration  ,'endDate':endDate + '' + seg.mon_c_duration + ':' + seg.mon_d_duration  ,'endTime' :seg.mon_b_duration,durations : segment.sec3 + segment.time3,'rate': seg.sec3_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{checkIfSegmentExist(seg.mon_duration + ':' + seg.mon_b_duration + '-' + seg.mon_c_duration + ':' + seg.mon_d_duration,seg.mon_spots) === 0  ? 'Booked' :'GHC'+ seg.sec3_rate}}</td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.mon" v-if="segment.sec4 > 0 && segment.sec4 > getFileDurations || segment.sec4 == getFileDurations && segment.sec4 != 0"><input  v-show="checkIfSegmentExist(seg.mon_duration + ':' + seg.mon_b_duration + '-' + seg.mon_c_duration + ':' + seg.mon_d_duration,seg.mon_spots) != 0" type="radio"  :checked="reset_disabled == true"   :name="'seB' + (index)"  :value="{'startDate': startDate + '' + seg.mon_duration + ':' + seg.mon_b_duration  ,'endDate':endDate + '' + seg.mon_c_duration + ':' + seg.mon_d_duration  ,'endTime' :seg.mon_b_duration,durations : segment.sec4 + segment.time4,'rate': seg.sec4_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{checkIfSegmentExist(seg.mon_duration + ':' + seg.mon_b_duration + '-' + seg.mon_c_duration + ':' + seg.mon_d_duration,seg.mon_spots) === 0  ? 'Booked' :'GHC'+ seg.sec4_rate}}</td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.mon" v-if="segment.sec5 > 0 && segment.sec5 > getFileDurations || segment.sec5 == getFileDurations && segment.sec5 != 0"><input  v-show="checkIfSegmentExist(seg.mon_duration + ':' + seg.mon_b_duration + '-' + seg.mon_c_duration + ':' + seg.mon_d_duration,seg.mon_spots) != 0" type="radio"  :checked="reset_disabled == true"   :name="'seB' + (index)"  :value="{'startDate': startDate + '' + seg.mon_duration + ':' + seg.mon_b_duration  ,'endDate':endDate + '' + seg.mon_c_duration + ':' + seg.mon_d_duration  ,'endTime' :seg.mon_b_duration,durations : segment.sec5 + segment.time5,'rate': seg.sec5_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{checkIfSegmentExist(seg.mon_duration + ':' + seg.mon_b_duration + '-' + seg.mon_c_duration + ':' + seg.mon_d_duration,seg.mon_spots) === 0  ? 'Booked' :'GHC'+ seg.sec5_rate}}</td>


                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.tue" v-if="segment.sec1 > 0 && segment.sec1 > getFileDurations || segment.sec1 == getFileDurations && segment.sec1 != 0"><input  v-show="checkIfSegmentExist(seg.tue_duration + ':' + seg.tue_b_duration + '-' + seg.tue_c_duration + ':' + seg.tue_d_duration,seg.tue_spots) != 0" type="radio"  @click="enableResetButton(index)"    :name="'seB' + (index)"  :value="{'startDate': startDate + '' + seg.tue_duration + ':' + seg.tue_b_duration  ,'endDate':endDate + '' + seg.tue_c_duration + ':' + seg.tue_d_duration  ,'endTime' :seg.tue_b_duration,durations : segment.sec1 + segment.time1,'rate': seg.sec1_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{checkIfSegmentExist(seg.tue_duration + ':' + seg.tue_b_duration + '-' + seg.tue_c_duration + ':' + seg.tue_d_duration,seg.tue_spots) === 0  ? 'Booked' :'GHC'+ seg.sec1_rate}}</td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.tue" v-if="segment.sec2 > 0 && segment.sec2 > getFileDurations || segment.sec2 == getFileDurations && segment.sec2 != 0"><input v-show="checkIfSegmentExist(seg.tue_duration + ':' + seg.tue_b_duration + '-' + seg.tue_c_duration + ':' + seg.tue_d_duration,seg.tue_spots) != 0" type="radio"   @click="enableResetButton(index)"  :name="'seB' + (index)"  :value="{'startDate': startDate + '' + seg.tue_duration + ':' + seg.tue_b_duration  ,'endDate':endDate + '' + seg.tue_c_duration + ':' + seg.tue_d_duration  ,'endTime' :seg.tue_b_duration,durations : segment.sec2 + segment.time2,'rate': seg.sec2_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{checkIfSegmentExist(seg.tue_duration + ':' + seg.tue_b_duration + '-' + seg.tue_c_duration + ':' + seg.tue_d_duration,seg.tue_spots) === 0  ? 'Booked' :'GHC'+ seg.sec2_rate}}</td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.tue" v-if="segment.sec3 > 0 && segment.sec3 > getFileDurations || segment.sec3 == getFileDurations && segment.sec3 != 0"><input v-show="checkIfSegmentExist(seg.tue_duration + ':' + seg.tue_b_duration + '-' + seg.tue_c_duration + ':' + seg.tue_d_duration,seg.tue_spots) != 0" type="radio"   @click="enableResetButton(index)"  :name="'seB' + (index)"  :value="{'startDate': startDate + '' + seg.tue_duration + ':' + seg.tue_b_duration  ,'endDate':endDate + '' + seg.tue_c_duration + ':' + seg.tue_d_duration  ,'endTime' :seg.tue_b_duration,durations : segment.sec3 + segment.time3,'rate': seg.sec3_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{checkIfSegmentExist(seg.tue_duration + ':' + seg.tue_b_duration + '-' + seg.tue_c_duration + ':' + seg.tue_d_duration,seg.tue_spots) === 0  ? 'Booked' :'GHC'+ seg.sec3_rate}}</td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.tue" v-if="segment.sec4 > 0 && segment.sec4 > getFileDurations || segment.sec4 == getFileDurations && segment.sec4 != 0"><input v-show="checkIfSegmentExist(seg.tue_duration + ':' + seg.tue_b_duration + '-' + seg.tue_c_duration + ':' + seg.tue_d_duration,seg.tue_spots) != 0" type="radio"   @click="enableResetButton(index)"  :name="'seB' + (index)"  :value="{'startDate': startDate + '' + seg.tue_duration + ':' + seg.tue_b_duration  ,'endDate':endDate + '' + seg.tue_c_duration + ':' + seg.tue_d_duration  ,'endTime' :seg.tue_b_duration,durations : segment.sec4 + segment.time4,'rate': seg.sec4_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{checkIfSegmentExist(seg.tue_duration + ':' + seg.tue_b_duration + '-' + seg.tue_c_duration + ':' + seg.tue_d_duration,seg.tue_spots) === 0  ? 'Booked' :'GHC'+ seg.sec4_rate}}</td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.tue" v-if="segment.sec5 > 0 && segment.sec5 > getFileDurations || segment.sec5 == getFileDurations && segment.sec5 != 0"><input v-show="checkIfSegmentExist(seg.tue_duration + ':' + seg.tue_b_duration + '-' + seg.tue_c_duration + ':' + seg.tue_d_duration,seg.tue_spots) != 0" type="radio"   @click="enableResetButton(index)"  :name="'seB' + (index)"  :value="{'startDate': startDate + '' + seg.tue_duration + ':' + seg.tue_b_duration  ,'endDate':endDate + '' + seg.tue_c_duration + ':' + seg.tue_d_duration  ,'endTime' :seg.tue_b_duration,durations : segment.sec5 + segment.time5,'rate': seg.sec5_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{checkIfSegmentExist(seg.tue_duration + ':' + seg.tue_b_duration + '-' + seg.tue_c_duration + ':' + seg.tue_d_duration,seg.tue_spots) === 0  ? 'Booked' :'GHC'+ seg.sec5_rate}}</td>


                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.wed" v-if="segment.sec1 > 0 && segment.sec1 > getFileDurations || segment.sec1 == getFileDurations && segment.sec1 != 0"><input v-show="checkIfSegmentExist(seg.wed_duration + ':' + seg.tue_b_duration + '-' + seg.wed_c_duration + ':' + seg.wed_d_duration,seg.wed_spots) != 0" type="radio"   :name="'seC' + (index)"  :value="{'startDate': startDate + '' + seg.wed_duration + ':' + seg.wed_b_duration  ,'endDate':endDate + '' + seg.wed_c_duration + ':' + seg.wed_d_duration  ,'endTime' :seg.wed_b_duration,durations : segment.sec1 + segment.time1,'rate': seg.sec1_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{checkIfSegmentExist(seg.mon_duration + ':' + seg.wed_b_duration + '-' + seg.wed_c_duration + ':' + seg.wed_d_duration,seg.wed_spots) === 0  ? 'Booked' :'GHC'+ seg.sec1_rate}}</td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.wed" v-if="segment.sec2 > 0 && segment.sec2 > getFileDurations || segment.sec2 == getFileDurations && segment.sec2 != 0"><input v-show="checkIfSegmentExist(seg.wed_duration + ':' + seg.wed_b_duration + '-' + seg.wed_c_duration + ':' + seg.wed_d_duration,seg.wed_spots) != 0" type="radio"   :name="'seC' + (index)"  :value="{'startDate': startDate + '' + seg.wed_duration + ':' + seg.wed_b_duration  ,'endDate':endDate + '' + seg.wed_c_duration + ':' + seg.wed_d_duration  ,'endTime' :seg.wed_b_duration,durations : segment.sec2 + segment.time2,'rate': seg.sec2_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{checkIfSegmentExist(seg.mon_duration + ':' + seg.wed_b_duration + '-' + seg.wed_c_duration + ':' + seg.wed_d_duration,seg.wed_spots) === 0  ? 'Booked' :'GHC'+ seg.sec2_rate}}</td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.wed" v-if="segment.sec3 > 0 && segment.sec3 > getFileDurations || segment.sec3 == getFileDurations && segment.sec3 != 0"><input v-show="checkIfSegmentExist(seg.wed_duration + ':' + seg.wed_b_duration + '-' + seg.wed_c_duration + ':' + seg.wed_d_duration,seg.wed_spots) != 0" type="radio"   :name="'seC' + (index)"  :value="{'startDate': startDate + '' + seg.wed_duration + ':' + seg.wed_b_duration  ,'endDate':endDate + '' + seg.wed_c_duration + ':' + seg.wed_d_duration  ,'endTime' :seg.wed_b_duration,durations : segment.sec3 + segment.time3,'rate': seg.sec3_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{checkIfSegmentExist(seg.mon_duration + ':' + seg.wed_b_duration + '-' + seg.wed_c_duration + ':' + seg.wed_d_duration,seg.wed_spots) === 0  ? 'Booked' :'GHC'+ seg.sec3_rate}}</td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.wed" v-if="segment.sec4 > 0 && segment.sec4 > getFileDurations || segment.sec4 == getFileDurations && segment.sec4 != 0"><input v-show="checkIfSegmentExist(seg.wed_duration + ':' + seg.wed_b_duration + '-' + seg.wed_c_duration + ':' + seg.wed_d_duration,seg.wed_spots) != 0" type="radio"   :name="'seC' + (index)"  :value="{'startDate': startDate + '' + seg.wed_duration + ':' + seg.wed_b_duration  ,'endDate':endDate + '' + seg.wed_c_duration + ':' + seg.wed_d_duration  ,'endTime' :seg.wed_b_duration,durations : segment.sec4 + segment.time4,'rate': seg.sec4_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{checkIfSegmentExist(seg.mon_duration + ':' + seg.wed_b_duration + '-' + seg.wed_c_duration + ':' + seg.wed_d_duration,seg.wed_spots) === 0  ? 'Booked' :'GHC'+ seg.sec4_rate}}</td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.wed" v-if="segment.sec5 > 0 && segment.sec5 > getFileDurations || segment.sec5 == getFileDurations && segment.sec5 != 0"><input v-show="checkIfSegmentExist(seg.tue_duration + ':' + seg.wed_b_duration + '-' + seg.wed_c_duration + ':' + seg.wed_d_duration,seg.wed_spots) != 0" type="radio"   :name="'seC' + (index)"  :value="{'startDate': startDate + '' + seg.wed_duration + ':' + seg.wed_b_duration  ,'endDate':endDate + '' + seg.wed_c_duration + ':' + seg.wed_d_duration  ,'endTime' :seg.wed_b_duration,durations : segment.sec5 + segment.time5,'rate': seg.sec5_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{checkIfSegmentExist(seg.mon_duration + ':' + seg.wed_b_duration + '-' + seg.wed_c_duration + ':' + seg.wed_d_duration,seg.wed_spots) === 0  ? 'Booked' :'GHC'+ seg.sec5_rate}}</td>

                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.thu" v-if="segment.sec1 > 0 && segment.sec1 > getFileDurations || segment.sec1 == getFileDurations && segment.sec1 != 0"><input v-show="checkIfSegmentExist(seg.thu_duration + ':' + seg.thu_b_duration + '-' + seg.thu_c_duration + ':' + seg.thu_d_duration,seg.thu_spots) != 0" type="radio"   :name="'seD' + (index)"  :value="{'startDate': startDate + '' + seg.thu_duration + ':' + seg.thu_b_duration  ,'endDate':endDate + '' + seg.thu_c_duration + ':' + seg.thu_d_duration  ,'endTime' :seg.thu_b_duration,durations : segment.sec1 + segment.time1,'rate': seg.sec1_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{checkIfSegmentExist(seg.thu_duration + ':' + seg.thu_b_duration + '-' + seg.thu_c_duration + ':' + seg.thu_d_duration,seg.thu_spots) === 0  ? 'Booked' :'GHC'+ seg.sec1_rate}}</td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.thu" v-if="segment.sec2 > 0 && segment.sec2 > getFileDurations || segment.sec2 == getFileDurations && segment.sec2 != 0"><input v-show="checkIfSegmentExist(seg.thu_duration + ':' + seg.thu_b_duration + '-' + seg.thu_c_duration + ':' + seg.thu_d_duration,seg.thu_spots) != 0" type="radio"   :name="'seD' + (index)"  :value="{'startDate': startDate + '' + seg.thu_duration + ':' + seg.thu_b_duration  ,'endDate':endDate + '' + seg.thu_c_duration + ':' + seg.thu_d_duration  ,'endTime' :seg.thu_b_duration,durations : segment.sec2 + segment.time2,'rate': seg.sec2_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{checkIfSegmentExist(seg.thu_duration + ':' + seg.thu_b_duration + '-' + seg.thu_c_duration + ':' + seg.thu_d_duration,seg.thu_spots) === 0  ? 'Booked' :'GHC'+ seg.sec2_rate}}</td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.thu" v-if="segment.sec3 > 0 && segment.sec3 > getFileDurations || segment.sec3 == getFileDurations && segment.sec3 != 0"><input v-show="checkIfSegmentExist(seg.thu_duration + ':' + seg.thu_b_duration + '-' + seg.thu_c_duration + ':' + seg.thu_d_duration,seg.thu_spots) != 0" type="radio"   :name="'seD' + (index)"  :value="{'startDate': startDate + '' + seg.thu_duration + ':' + seg.thu_b_duration  ,'endDate':endDate + '' + seg.thu_c_duration + ':' + seg.thu_d_duration  ,'endTime' :seg.thu_b_duration,durations : segment.sec3 + segment.time3,'rate': seg.sec3_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{checkIfSegmentExist(seg.thu_duration + ':' + seg.thu_b_duration + '-' + seg.thu_c_duration + ':' + seg.thu_d_duration,seg.thu_spots) === 0  ? 'Booked' :'GHC'+ seg.sec3_rate}}</td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.thu" v-if="segment.sec4 > 0 && segment.sec4 > getFileDurations || segment.sec4 == getFileDurations && segment.sec4 != 0"><input v-show="checkIfSegmentExist(seg.thu_duration + ':' + seg.thu_b_duration + '-' + seg.thu_c_duration + ':' + seg.thu_d_duration,seg.thu_spots) != 0" type="radio"   :name="'seD' + (index)"  :value="{'startDate': startDate + '' + seg.thu_duration + ':' + seg.thu_b_duration  ,'endDate':endDate + '' + seg.thu_c_duration + ':' + seg.thu_d_duration  ,'endTime' :seg.thu_b_duration,durations : segment.sec4 + segment.time4,'rate': seg.sec4_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{checkIfSegmentExist(seg.thu_duration + ':' + seg.thub_duration + '-' + seg.thu_c_duration + ':' +  seg.thu_d_duration,seg.thu_spots) === 0  ? 'Booked' :'GHC'+ seg.sec4_rate}}</td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.thu" v-if="segment.sec5 > 0 && segment.sec5 > getFileDurations || segment.sec5 == getFileDurations && segment.sec5 != 0"><input v-show="checkIfSegmentExist(seg.thu_duration + ':' + seg.thu_b_duration + '-' + seg.thu_c_duration + ':' + seg.thu_d_duration,seg.thu_spots) != 0" type="radio"   :name="'seD' + (index)"  :value="{'startDate': startDate + '' + seg.thu_duration + ':' + seg.thu_b_duration  ,'endDate':endDate + '' + seg.thu_c_duration + ':' + seg.thu_d_duration  ,'endTime' :seg.thu_b_duration,durations : segment.sec5 + segment.time5,'rate': seg.sec5_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{checkIfSegmentExist(seg.thu_duration + ':' + seg.thu_b_duration + '-' + seg.thu_c_duration + ':' + seg.thu_d_duration,seg.thu_spots) === 0  ? 'Booked' :'GHC'+ seg.sec5_rate}}</td>

                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.fri" v-if="segment.sec1 > 0 && segment.sec1 > getFileDurations || segment.sec1 == getFileDurations && segment.sec1 != 0"><input v-show="checkIfSegmentExist(seg.fri_duration + ':' + seg.fir_b_duration + '-' + seg.fri_c_duration + ':' + seg.fri_d_duration,seg.fri_spots) != 0" type="radio"   :name="'seE' + (index)"  :value="{'startDate': startDate + '' + seg.fri_duration + ':' + seg.fri_b_duration  ,'endDate':endDate + '' + seg.fri_c_duration + ':' + seg.fri_d_duration  ,'endTime' :seg.fri_b_duration,durations : segment.sec1 + segment.time1,'rate': seg.sec1_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{checkIfSegmentExist(seg.fri_duration + ':' + seg.fri_b_duration + '-' + seg.fri_c_duration + ':' + seg.fri_d_duration,seg.fri_spots) === 0  ? 'Booked' :'GHC'+ seg.sec1_rate}}</td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.fri" v-if="segment.sec2 > 0 && segment.sec2 > getFileDurations || segment.sec2 == getFileDurations && segment.sec2 != 0"><input v-show="checkIfSegmentExist(seg.fri_duration + ':' + seg.fri_b_duration + '-' + seg.fri_c_duration + ':' + seg.fri_d_duration,seg.fri_spots) != 0" type="radio"   :name="'seE' + (index)"  :value="{'startDate': startDate + '' + seg.fri_duration + ':' + seg.fri_b_duration  ,'endDate':endDate + '' + seg.fri_c_duration + ':' + seg.fri_d_duration  ,'endTime' :seg.fri_b_duration,durations : segment.sec2 + segment.time2,'rate': seg.sec2_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{checkIfSegmentExist(seg.fri_duration + ':' + seg.fri_b_duration + '-' + seg.fri_c_duration + ':' + seg.fri_d_duration,seg.fri_spots) === 0  ? 'Booked' :'GHC'+ seg.sec2_rate}}</td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.fri" v-if="segment.sec3 > 0 && segment.sec3 > getFileDurations || segment.sec3 == getFileDurations && segment.sec3 != 0"><input v-show="checkIfSegmentExist(seg.fri_duration + ':' + seg.fri_b_duration + '-' + seg.fri_c_duration + ':' + seg.fri_d_duration,seg.fri_spots) != 0" type="radio"   :name="'seE' + (index)"  :value="{'startDate': startDate + '' + seg.fri_duration + ':' + seg.fri_b_duration  ,'endDate':endDate + '' + seg.fri_c_duration + ':' + seg.fri_d_duration  ,'endTime' :seg.fri_b_duration,durations : segment.sec3 + segment.time3,'rate': seg.sec3_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{checkIfSegmentExist(seg.fri_duration + ':' + seg.fri_b_duration + '-' + seg.fri_c_duration + ':' + seg.fri_d_duration,seg.fri_spots) === 0  ? 'Booked' :'GHC'+ seg.sec3_rate}}</td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.fri" v-if="segment.sec4 > 0 && segment.sec4 > getFileDurations || segment.sec4 == getFileDurations && segment.sec4 != 0"><input v-show="checkIfSegmentExist(seg.fri_duration + ':' + seg.fri_b_duration + '-' + seg.fri_c_duration + ':' + seg.fri_d_duration,seg.fri_spots) != 0" type="radio"   :name="'seE' + (index)"  :value="{'startDate': startDate + '' + seg.fri_duration + ':' + seg.fri_b_duration  ,'endDate':endDate + '' + seg.fri_c_duration + ':' + seg.fri_d_duration  ,'endTime' :seg.fri_b_duration,durations : segment.sec4 + segment.time4,'rate': seg.sec4_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{checkIfSegmentExist(seg.fri_duration + ':' + seg.fri_b_duration + '-' + seg.fri_c_duration + ':' + seg.fri_d_duration,seg.fri_spots) === 0  ? 'Booked' :'GHC'+ seg.sec4_rate}}</td>
                                <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.fri" v-if="segment.sec5 > 0 && segment.sec5 > getFileDurations || segment.sec5 == getFileDurations && segment.sec5 != 0"><input v-show="checkIfSegmentExist(seg.fri_duration + ':' + seg.fri_b_duration + '-' + seg.fri_c_duration + ':' + seg.fri_d_duration,seg.fri_spots) != 0" type="radio"   :name="'seE' + (index)"  :value="{'startDate': startDate + '' + seg.fri_duration + ':' + seg.fri_b_duration  ,'endDate':endDate + '' + seg.fri_c_duration + ':' + seg.fri_d_duration  ,'endTime' :seg.fri_b_duration,durations : segment.sec5 + segment.time5,'rate': seg.sec5_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{checkIfSegmentExist(seg.fri_duration + ':' + seg.fri_b_duration + '-' + seg.fri_c_duration + ':' + seg.fri_d_duration,seg.fri_spots) === 0  ? 'Booked' :'GHC'+ seg.sec5_rate}}</td>
                                <td><button :disabled="index != reset_disabled" class="btn btn-secondary btn-sm reset_btn"  data-index="index"  @click="resetSegment(seg_data,index)"><i class="fa fa-undo"></i> </button></td>
                                <!--ratecard rates ends here-->
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
                                               <th >Spots available</th>
                                               <th >Spots</th>
                                               <th v-show="segmentDay.substr(0,3).toUpperCase()  === days.sat" v-if="days.wsec1 > 0 && days.wsec1 > getFileDurations || days.wsec1 == getFileDurations && days.wsec1 != 0">{{days.wsec1 + days.time1}}</th>
                                               <th v-show="segmentDay.substr(0,3).toUpperCase()  === days.sat" v-if="days.wsec2 > 0 && days.wsec2 > getFileDurations || days.wsec2 == getFileDurations && days.wsec2 != 0">{{days.wsec2 + days.time2}}</th>
                                               <th v-show="segmentDay.substr(0,3).toUpperCase()  === days.sat" v-if="days.wsec1 > 0 && days.wsec3 > getFileDurations || days.wsec3 == getFileDurations && days.wsec3 != 0">{{days.wsec3 + days.time3}}</th>
                                               <th v-show="segmentDay.substr(0,3).toUpperCase()  === days.sat" v-if="days.wsec4 > 0 && days.wsec4 > getFileDurations || days.wsec4 == getFileDurations && days.wsec4 != 0">{{days.wsec4 + days.time4}}</th>
                                               <th v-show="segmentDay.substr(0,3).toUpperCase()  === days.sat" v-if="days.wsec1 > 0 && days.wsec5 > getFileDurations || days.wsec5 == getFileDurations && days.wsec5 != 0">{{days.wsec5 + days.time5}}</th>

                                               <th v-show="segmentDay.substr(0,3).toUpperCase()  === days.sun"  v-if="days.wsec1> 0 && days.wsec1 > getFileDurations || days.wsec1 == getFileDurations && days.wsec1 != 0">{{days.wsec1 + days.time1}}</th>
                                               <th v-show="segmentDay.substr(0,3).toUpperCase()  === days.sun"  v-if="days.wsec2 > 0 && days.wsec2 > getFileDurations || days.wsec2 == getFileDurations && days.wsec2 != 0">{{days.wsec2 + days.time2}}</th>
                                               <th v-show="segmentDay.substr(0,3).toUpperCase()  === days.sun"  v-if="days.wsec3 > 0 && days.wsec3 > getFileDurations || days.wsec3 == getFileDurations && days.wsec3 != 0">{{days.wsec3 + days.time3}}</th>
                                               <th v-show="segmentDay.substr(0,3).toUpperCase()  === days.sun"  v-if="days.wsec4 > 0 && days.wsec4 > getFileDurations || days.wsec4 == getFileDurations && days.wsec4 != 0">{{days.wsec4 + days.time4}}</th>
                                               <th v-show="segmentDay.substr(0,3).toUpperCase()  === days.sun"  v-if="days.wsec5 > 0 && days.wsec5 > getFileDurations || days.wsec5 == getFileDurations && days.wsec5 != 0">{{days.wsec5 + days.time5}}</th>

                                           </tr>
                                           </thead>
                                           <tbody>
                                           <tr v-for="(seg,index) in wsegments" :key="index">
                                               <th scope="row">{{index + 1}}</th>
                                               <td v-show="segmentDay.substr(0,3).toUpperCase() == days.sat">{{seg.sat_duration + ':' + seg.sat_b_duration }}-{{seg.sat_c_duration + ':' + seg.sat_d_duration }}</td>
                                               <td v-show="segmentDay.substr(0,3).toUpperCase() == days.sun">{{seg.sun_duration + ':' + seg.sun_b_duration }}-{{seg.sun_c_duration + ':' + seg.sun_d_duration  }}</td>

                                               <!--spots for rate card-->
                                               <td v-show="segmentDay.substr(0,3).toUpperCase() == days.sat" >
                                                   {{seg.sat_spots}}
                                               </td>
                                               <td v-show="segmentDay.substr(0,3).toUpperCase() == days.sun" >
                                                   {{seg.sun_spots}}
                                               </td>

                                               <td v-show="segmentDay.substr(0,3).toUpperCase() == days.sat">
                                                   <select name="select" v-model="spots[index]">
                                                   <option disabled value="" selected>spots</option>
                                                   <option v-for=" s in checkIfSegmentExist(seg.sat_duration + ':' + seg.sat_b_duration + '-' + seg.sat_c_duration + ':' + seg.sat_d_duration,seg.sat_spots)"  v-if="segment_exist"  :name="'seB' + (index)"   :value="s">{{s}}</option>

                                                   <option  v-show="segment_exist == false"   v-for=" s in  spot_avail(seg.sat_spots)"       :name="'seB' + (index)"   :value="s"  >{{s}}</option>
                                               </select>
                                               </td>

                                               <td v-show="segmentDay.substr(0,3).toUpperCase() == days.sun">
                                                   <select name="select" v-model="spots[index]">
                                                   <option disabled value="" selected>spots</option>
                                                   <option v-for=" s in checkIfSegmentExist(seg.sun_duration + ':' + seg.sun_b_duration + '-' + seg.sun_c_duration + ':' + seg.sun_d_duration,seg.sun_spots)"  v-if="segment_exist"  :name="'seB' + (index)"   :value="s">{{s}}</option>

                                                   <option  v-show="segment_exist == false"   v-for=" s in  spot_avail(seg.sun_spots)"       :name="'seB' + (index)"   :value="s"  >{{s}}</option>

                                               </select>
                                               </td>


                                               <td v-show="segmentDay.substr(0,3).toUpperCase() == days.sat" v-if="days.wsec1 > 0 && days.wsec1 > getFileDurations || days.wsec1 == getFileDurations && days.wsec1 != 0"><input type="radio"   :name="'seA' + (index)"  :value="{'startDate': startDate + '' + seg.sat_duration + ':' + seg.sat_b_duration  ,'endDate':endDate + '' + seg.sat_c_duration + ':' + seg.sat_d_duration  ,'endTime' :seg.sat_b_duration,durations : days.wsec1 + days.time1,'rate': seg.wsec1_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.wsec1_rate}}</td>
                                               <td v-show="segmentDay.substr(0,3).toUpperCase() == days.sat" v-if="days.wsec2 > 0 && days.wsec2 > getFileDurations || days.wsec2 == getFileDurations && days.wsec2 != 0"><input type="radio"   :name="'seA' + (index)"  :value="{'startDate': startDate + '' + seg.sat_duration + ':' + seg.sat_b_duration  ,'endDate':endDate + '' + seg.sat_c_duration + ':' + seg.sat_d_duration  ,'endTime' :seg.sat_b_duration,durations : days.wsec2 + days.time2,'rate': seg.wsec2_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.wsec2_rate}}</td>
                                               <td v-show="segmentDay.substr(0,3).toUpperCase() == days.sat" v-if="days.wsec3 > 0 && days.wsec3 > getFileDurations || days.wsec3 == getFileDurations && days.wsec3 != 0"><input type="radio"   :name="'seA' + (index)"  :value="{'startDate': startDate + '' + seg.sat_duration + ':' + seg.sat_b_duration  ,'endDate':endDate + '' + seg.sat_c_duration + ':' + seg.sat_d_duration  ,'endTime' :seg.sat_b_duration,durations : days.wsec3 + days.time3,'rate': seg.wsec3_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.wsec3_rate}}</td>
                                               <td v-show="segmentDay.substr(0,3).toUpperCase() == days.sat" v-if="days.wsec4 > 0 && days.wsec4 > getFileDurations || days.wsec4 == getFileDurations && days.wsec4 != 0"><input type="radio"   :name="'seA' + (index)"  :value="{'startDate': startDate + '' + seg.sat_duration + ':' + seg.sat_b_duration  ,'endDate':endDate + '' + seg.sat_c_duration + ':' + seg.sat_d_duration  ,'endTime' :seg.sat_b_duration,durations : days.wsec4 + days.time4,'rate': seg.wsec4_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.wsec4_rate}}</td>
                                               <td v-show="segmentDay.substr(0,3).toUpperCase() == days.sat" v-if="days.wsec5 > 0 && days.wsec5 > getFileDurations || days.wsec5 == getFileDurations && days.wsec5 != 0"><input type="radio"   :name="'seA' + (index)"  :value="{'startDate': startDate + '' + seg.sat_duration + ':' + seg.sat_b_duration  ,'endDate':endDate + '' + seg.sat_c_duration + ':' + seg.sat_d_duration  ,'endTime' :seg.sat_b_duration,durations : days.wsec5 + days.time5,'rate': seg.wsec5_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.wsec5_rate}}</td>

                                               <td v-show="segmentDay.substr(0,3).toUpperCase() == days.sun" v-if="days.wsec1 > 0 && days.wsec1 > getFileDurations || days.wsec1 == getFileDurations && days.wsec1 != 0"><input type="radio"   :name="'seA' + (index)"  :value="{'startDate': startDate + '' + seg.sun_duration + ':' + seg.sun_b_duration  ,'endDate':endDate + '' + seg.sun_c_duration + ':' + seg.sun_d_duration  ,'endTime' :seg.sun_b_duration,durations : days.wsec1 + days.time1,'rate': seg.wsec1_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.wsec1_rate}}</td>
                                               <td v-show="segmentDay.substr(0,3).toUpperCase() == days.sun" v-if="days.wsec2 > 0 && days.wsec2 > getFileDurations || days.wsec2 == getFileDurations && days.wsec2 != 0"><input type="radio"   :name="'seA' + (index)"  :value="{'startDate': startDate + '' + seg.sun_duration + ':' + seg.sun_b_duration  ,'endDate':endDate + '' + seg.sun_c_duration + ':' + seg.sun_d_duration  ,'endTime' :seg.sun_b_duration,durations : days.wsec2 + days.time2,'rate': seg.wsec2_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.wsec2_rate}}</td>
                                               <td v-show="segmentDay.substr(0,3).toUpperCase() == days.sun" v-if="days.wsec3 > 0 && days.wsec3 > getFileDurations || days.wsec3 == getFileDurations && days.wsec3 != 0"><input type="radio"   :name="'seA' + (index)"  :value="{'startDate': startDate + '' + seg.sun_duration + ':' + seg.sun_b_duration  ,'endDate':endDate + '' + seg.sun_c_duration + ':' + seg.sun_d_duration  ,'endTime' :seg.sun_b_duration,durations : days.wsec3 + days.time3,'rate': seg.wsec3_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.wsec3_rate}}</td>
                                               <td v-show="segmentDay.substr(0,3).toUpperCase() == days.sun" v-if="days.wsec4 > 0 && days.wsec4 > getFileDurations || days.wsec4 == getFileDurations && days.wsec4 != 0"><input type="radio"   :name="'seA' + (index)"  :value="{'startDate': startDate + '' + seg.sun_duration + ':' + seg.sun_b_duration  ,'endDate':endDate + '' + seg.sun_c_duration + ':' + seg.sun_d_duration  ,'endTime' :seg.sun_b_duration,durations : days.wsec4 + days.time4,'rate': seg.wsec4_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.wsec4_rate}}</td>
                                               <td v-show="segmentDay.substr(0,3).toUpperCase() == days.sun" v-if="days.wsec5 > 0 && days.wsec5 > getFileDurations || days.wsec5 == getFileDurations && days.wsec5 != 0"><input type="radio"   :name="'seA' + (index)"  :value="{'startDate': startDate + '' + seg.sun_duration + ':' + seg.sun_b_duration  ,'endDate':endDate + '' + seg.sun_c_duration + ':' + seg.sun_d_duration  ,'endTime' :seg.sun_b_duration,durations : days.wsec5 + days.time5,'rate': seg.wsec5_rate,'rate_card':getTitle,'spot':spots[index]}" v-model="seg_data[index]"/>{{'GHC'+ seg.wsec5_rate}}</td>

                                           </tr>
                                           </tbody>
                                       </table>
                                   </div>

                               </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                            <!--<button class="btn btn-mat btn-secondary ">save</button>-->
                            <router-link :to="{name : 'invoice'}" v-if="title" v-show="validateRateCardSelection(this.seg_data)"   class="btn btn-primary waves-effect waves-light animated fadeIn " @click.native="submit(title)" >Schedule</router-link>
                        </div>
                    </div>
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
                invoice: [],
                segment_date: '/user-account/create-sub-date',
                selSegment_url: '/user-account/select-segment',

               // segments_data : [],
               // segments_headings : {"sec1": 15, "sec2": 20, "sec3": 25, "sec4": 30, "sec5": null},
              //  spots_available : 10,
                selSegment: '',
                selMedia: '',
                seg_data : [],
                spots : [],
                print_segments: [{

                }],
                title : '',
                rate : '',
               // day: 'Monday',
               // invoice : 'invoice',
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
               //   su : [1,2,3,4],
               //   ba : 0,
                segment_exist :  false,
                booked : 'Booked',
                addSegment : true,
                reset_disabled : null,
                reset_button_index : [],

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

             let data  = this.seg_data.filter(el => el === 0 || Boolean(el));

                    store.dispatch('getSubData',data);
            },
            spot_avail(spot){
                let s = parseInt(spot);
                let results = [];
                for (let i = 1; i < s + 1; i++){
                        results.push(i);

                }
                return results;

            },
            checkIfSegmentExist(segment,spots){
              let  z = 0;
              let  n = 0;
                this.spot_check.forEach(function (item,index) {
                      if (segment == item.segments) {
                          z = item.spots_used;
                          n = segment[index];
                      }
                });
                    if (n == 0 || n > 0){
                        let spots_left =  parseInt(spots) - parseInt(z);
                        this.segment_exist = true;

                        return parseInt(spots_left);

                    }

            },
             removeSegment(addSegment){
                 this.seg_data = this.seg_data.filter(name => name !== this.addSegment);
                    console.log(name);

             },
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
            },
            onChange(event) {
                var optionText = event.target.value;
                console.log(optionText);
            },
            resetSegment(arr,ind){
                    // $("input[type=radio]").prop('checked', false);
                console.log('before filter ' + this.seg_data);
                this.seg_data =   this.seg_data.filter((item,index,arr_items)=> index !== ind );
               console.log('after filter ' + ' ' +  ind + this.seg_data);

          },
            enableResetButton(index){
                  this.reset_button_index.push(index);
                  for (let i = 0; i < this.reset_button_index.length; i++){
                      if(this.reset_button_index[i] === index){
                          return  this.reset_disabled = index;
                      }

                  }

            }
        },
        resetButtonDisabled(){

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
            },


        },

    }

</script>

