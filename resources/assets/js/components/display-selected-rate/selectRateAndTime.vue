<template>
  <div class="modal fade" data-backdrop="static" data-keyboard="false" id="radio_tv" tabindex="-1" role="dialog" style="margin-left: 220px;">
    <div class="modal-dialog modal-lg" role="document">
      <!--                    <form  @submit.prevent="" id="segment-form">-->
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" style="font-size: 14px;font-weight:Arial,'Helvetica Neue', Helvetica, sans-serif">
            <b class="text-danger">{{getMediaHouse}}</b>
            -
            <span>{{card_title}} rate card</span>
          </h5>
          <h5 v-show="add_to_cart">
            <small><show-processing class="float-right"></show-processing></small>
          </h5>
          <h5 class="pull-right text-dark" style="font-size: 14px;">
              {{startDate + ' ' +segmentDay}}
              <span
                v-show="getFileDurations !=  0"
              >  |  {{'File duration : ' + mediaFileDuration}}
              </span>
              <span> | Total amount : <strong style="color:rgb(246, 139, 30);font-weight: bolder;font-size: 20px;">GHS{{amountBilled.toFixed(2)}}</strong></span>

          </h5>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <input
              v-show="segment_avail"
              class="form-control "
              v-bind:class="{ 'is-invalid':  isTitleError ==  true }"
              required="required"
              name="title"
              type="text"
              v-model="title"
              placeholder="Enter segment title  eg:short video  on  history of gold coast"
            />
            <span class="text-danger" style="font-size: 12px;">{{error_title}}</span>

          </div>
          <div class="table-responsive" v-show="checkDays(weekdays)">
            <table class="table table-bordered">
              <thead>
              <table-head :segmentDay="segmentDay" :getFileDurations="getFileDurations" :segment="segment" :rateCardContainsFileDuration="rateCardContainsFileDuration"></table-head>
              </thead>
              <tbody>
                <tr v-for="(seg,index) in segments" :key="index">
                  <th scope="row">{{index + 1}}</th>

                  <!--segments for days of the week-->
<!--                  <days-of-week-segments :segmentDay="segmentDay" :seg="seg" :getFileDurations="getFileDurations" :segment="segment"></days-of-week-segments>-->
                  <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.mon">{{seg.mon_duration + ':' + seg.mon_b_duration }}-{{seg.mon_c_duration + ':' + seg.mon_d_duration}}
                    <am-pm :time="seg.mon_c_duration.substr(0,2) "></am-pm>
                  </td>
                  <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.tue">{{seg.tue_duration + ':' + seg.tue_b_duration }}-{{seg.tue_c_duration + ':' + seg.tue_d_duration}}
                    <am-pm :time="seg.tue_c_duration.substr(0,2) "></am-pm>
                  </td>
                  <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.wed">{{seg.wed_duration + ':' + seg.wed_b_duration }}-{{seg.wed_c_duration + ':' + seg.wed_d_duration}}
                    <am-pm :time="seg.wed_c_duration.substr(0,2) "></am-pm>
                  </td>
                  <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.thu">{{seg.thu_duration + ':' + seg.thu_b_duration }}-{{seg.thu_c_duration + ':' + seg.thu_d_duration }}
                    <am-pm :time="seg.thu_c_duration.substr(0,2) "></am-pm>
                  </td>
                  <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.fri">{{seg.fri_duration + ':' + seg.fri_b_duration }}-{{seg.fri_c_duration + ':' + seg.fri_d_duration}}
                    <am-pm :time="seg.fri_c_duration.substr(0,2) "></am-pm>
                  </td>

                  <!--spots for rate card-->
<!--                  <spots-for-segment-for-days-of-week :segmentDay="segmentDay" :seg="seg" :getFileDurations="getFileDurations" :segment="segment"></spots-for-segment-for-days-of-week>-->
                  <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.mon">{{seg.mon_spots}}</td>
                  <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.tue">{{seg.tue_spots}}</td>
                  <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.wed">{{seg.wed_spots}}</td>
                  <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.thu">{{seg.thu_spots}}</td>
                  <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.fri">{{seg.fri_spots}}</td>
                  <!-- spots available -->

                  <!--monday-->
                  <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.mon">
                  <monday-spots-available :segmentDay="segmentDay" :seg_data="seg_data" :filterBill="filterBill" :spots_booked="spots_booked" :totalBill="totalBill" :seg="seg" :getFileDurations="getFileDurations" :segment="segment" :spots="spots" :checkIfSegmentExist="checkIfSegmentExist" :booked="booked" :index="index" :segment_exist="segment_exist"></monday-spots-available>

                  </td>
                  <!--tuesday-->
                  <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.tue">
                  <tuesday-spots-available :segmentDay="segmentDay" :spots_booked="spots_booked" :totalBill="totalBill"  :seg="seg" :getFileDurations="getFileDurations" :segment="segment" :spots="spots" :checkIfSegmentExist="checkIfSegmentExist" :booked="booked" :index="index" :segment_exist="segment_exist"></tuesday-spots-available>
                  </td>
                  <!--wednesday-->
                  <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.wed">
                    <wednesday-spots-available :segmentDay="segmentDay" :spots_booked="spots_booked" :totalBill="totalBill"  :seg="seg" :getFileDurations="getFileDurations" :segment="segment" :spots="spots" :checkIfSegmentExist="checkIfSegmentExist" :booked="booked" :index="index" :segment_exist="segment_exist"></wednesday-spots-available>
                  </td>
                  <!--thursday-->
                  <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.thu">
                    <thursday-spots-available :segmentDay="segmentDay" :spots_booked="spots_booked" :totalBill="totalBill"  :seg="seg" :getFileDurations="getFileDurations" :segment="segment" :spots="spots" :checkIfSegmentExist="checkIfSegmentExist" :booked="booked" :index="index" :segment_exist="segment_exist"></thursday-spots-available>
                  </td>
                  <!--friday-->
                  <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.fri">
                    <friday-spots-available :segmentDay="segmentDay" :spots_booked="spots_booked" :totalBill="totalBill"  :seg="seg" :getFileDurations="getFileDurations" :segment="segment" :spots="spots" :checkIfSegmentExist="checkIfSegmentExist" :booked="booked" :index="index" :segment_exist="segment_exist"></friday-spots-available>
                  </td>
                  <!--spots available ends here-->


                  <!--Rates-->
                  <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.mon" v-if="rateCardContainsFileDuration(segment.sec1,segment.time1,getFileDurations)">
                    <monday-rate-1 :resetSegmentRow="resetSegmentRow"  :segmentDay="segmentDay" :uncheck="uncheck"  :totalBill="totalBill" :seg="seg" :getFileDurations="getFileDurations" :segment="segment"  :checkIfSegmentExist="checkIfSegmentExist"  :index="index" :seg_data="seg_data" :startDate="startDate" :endDate="endDate" :getTitle="getTitle" :spots="spots"></monday-rate-1>
                  </td>
                  <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.mon" v-if="rateCardContainsFileDuration(segment.sec2,segment.time2,getFileDurations)">
                    <monday-rate-2 :segmentDay="segmentDay" :totalBill="totalBill" :seg="seg" :getFileDurations="getFileDurations" :segment="segment"  :checkIfSegmentExist="checkIfSegmentExist"  :index="index" :seg_data="seg_data" :startDate="startDate" :endDate="endDate" :getTitle="getTitle" :spots="spots"></monday-rate-2>
                  </td>
                  <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.mon" v-if="rateCardContainsFileDuration(segment.sec3,segment.time3,getFileDurations)">
                    <monday-rate-3 :segmentDay="segmentDay" :totalBill="totalBill" :seg="seg" :getFileDurations="getFileDurations" :segment="segment"  :checkIfSegmentExist="checkIfSegmentExist"  :index="index" :seg_data="seg_data" :startDate="startDate" :endDate="endDate" :getTitle="getTitle" :spots="spots"></monday-rate-3>
                  </td>
                  <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.mon" v-if="rateCardContainsFileDuration(segment.sec4,segment.time4,getFileDurations)">
                    <monday-rate-4 :segmentDay="segmentDay" :totalBill="totalBill" :seg="seg" :getFileDurations="getFileDurations" :segment="segment"  :checkIfSegmentExist="checkIfSegmentExist"  :index="index" :seg_data="seg_data" :startDate="startDate" :endDate="endDate" :getTitle="getTitle" :spots="spots"></monday-rate-4>
                  </td>
                  <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.mon" v-if="rateCardContainsFileDuration(segment.sec5,segment.time5,getFileDurations)">
                    <monday-rate-5 :segmentDay="segmentDay" :totalBill="totalBill" :seg="seg" :getFileDurations="getFileDurations" :segment="segment"  :checkIfSegmentExist="checkIfSegmentExist"  :index="index" :seg_data="seg_data" :startDate="startDate" :endDate="endDate" :getTitle="getTitle" :spots="spots"></monday-rate-5>
                  </td>


                  <!--tuesday-->
                  <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.tue" v-if="rateCardContainsFileDuration(segment.sec1,segment.time1,getFileDurations)">
                    <tuesday-rate-1 :segmentDay="segmentDay" :totalBill="totalBill" :seg="seg" :getFileDurations="getFileDurations" :segment="segment"  :checkIfSegmentExist="checkIfSegmentExist"  :index="index" :seg_data="seg_data" :startDate="startDate" :endDate="endDate" :getTitle="getTitle" :spots="spots"></tuesday-rate-1>
                  </td>
                  <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.tue" v-if="rateCardContainsFileDuration(segment.sec2,segment.time2,getFileDurations)">
                    <tuesday-rate-2 :segmentDay="segmentDay" :totalBill="totalBill" :seg="seg" :getFileDurations="getFileDurations" :segment="segment"  :checkIfSegmentExist="checkIfSegmentExist"  :index="index" :seg_data="seg_data" :startDate="startDate" :endDate="endDate" :getTitle="getTitle" :spots="spots"></tuesday-rate-2>
                  </td>
                  <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.tue" v-if="rateCardContainsFileDuration(segment.sec3,segment.time3,getFileDurations)">
                    <tuesday-rate-3 :segmentDay="segmentDay" :totalBill="totalBill" :seg="seg" :getFileDurations="getFileDurations" :segment="segment"  :checkIfSegmentExist="checkIfSegmentExist"  :index="index" :seg_data="seg_data" :startDate="startDate" :endDate="endDate" :getTitle="getTitle" :spots="spots"></tuesday-rate-3>
                  </td>
                  <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.tue" v-if="rateCardContainsFileDuration(segment.sec4,segment.time4,getFileDurations)">
                    <tuesday-rate-4 :segmentDay="segmentDay" :totalBill="totalBill" :seg="seg" :getFileDurations="getFileDurations" :segment="segment"  :checkIfSegmentExist="checkIfSegmentExist"  :index="index" :seg_data="seg_data" :startDate="startDate" :endDate="endDate" :getTitle="getTitle" :spots="spots"></tuesday-rate-4>
                  </td>
                  <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.tue" v-if="rateCardContainsFileDuration(segment.sec5,segment.time5,getFileDurations)">
                    <tuesday-rate-5 :segmentDay="segmentDay" :totalBill="totalBill" :seg="seg" :getFileDurations="getFileDurations" :segment="segment"  :checkIfSegmentExist="checkIfSegmentExist"  :index="index" :seg_data="seg_data" :startDate="startDate" :endDate="endDate" :getTitle="getTitle" :spots="spots"></tuesday-rate-5>
                  </td>

                  <!--wednesday-->
                  <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.wed" v-if="rateCardContainsFileDuration(segment.sec1,segment.time1,getFileDurations)">
                    <wednesday-rate-1 :segmentDay="segmentDay" :totalBill="totalBill" :seg="seg" :getFileDurations="getFileDurations" :segment="segment"  :checkIfSegmentExist="checkIfSegmentExist"  :index="index" :seg_data="seg_data" :startDate="startDate" :endDate="endDate" :getTitle="getTitle" :spots="spots"></wednesday-rate-1>
                  </td>
                  <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.wed" v-if="rateCardContainsFileDuration(segment.sec2,segment.time2,getFileDurations)">
                    <wednesday-rate-2 :segmentDay="segmentDay" :totalBill="totalBill" :seg="seg" :getFileDurations="getFileDurations" :segment="segment"  :checkIfSegmentExist="checkIfSegmentExist"  :index="index" :seg_data="seg_data" :startDate="startDate" :endDate="endDate" :getTitle="getTitle" :spots="spots"></wednesday-rate-2>
                  </td>
                  <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.wed" v-if="rateCardContainsFileDuration(segment.sec3,segment.time3,getFileDurations)">
                    <wednesday-rate-3 :segmentDay="segmentDay" :totalBill="totalBill" :seg="seg" :getFileDurations="getFileDurations" :segment="segment"  :checkIfSegmentExist="checkIfSegmentExist"  :index="index" :seg_data="seg_data" :startDate="startDate" :endDate="endDate" :getTitle="getTitle" :spots="spots"></wednesday-rate-3>
                  </td>
                  <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.wed" v-if="rateCardContainsFileDuration(segment.sec4,segment.time4,getFileDurations)">
                    <wednesday-rate-4 :segmentDay="segmentDay" :totalBill="totalBill" :seg="seg" :getFileDurations="getFileDurations" :segment="segment"  :checkIfSegmentExist="checkIfSegmentExist"  :index="index" :seg_data="seg_data" :startDate="startDate" :endDate="endDate" :getTitle="getTitle" :spots="spots"></wednesday-rate-4>
                  </td>
                  <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.wed" v-if="rateCardContainsFileDuration(segment.sec5,segment.time5,getFileDurations)">
                    <wednesday-rate-5 :segmentDay="segmentDay" :totalBill="totalBill" :seg="seg" :getFileDurations="getFileDurations" :segment="segment"  :checkIfSegmentExist="checkIfSegmentExist"  :index="index" :seg_data="seg_data" :startDate="startDate" :endDate="endDate" :getTitle="getTitle" :spots="spots"></wednesday-rate-5>
                  </td>

                  <!--thursday-->
                  <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.thu" v-if="rateCardContainsFileDuration(segment.sec1,segment.time1,getFileDurations)">
                    <thursday-rate-1 :segmentDay="segmentDay" :totalBill="totalBill" :seg="seg" :getFileDurations="getFileDurations" :segment="segment"  :checkIfSegmentExist="checkIfSegmentExist"  :index="index" :seg_data="seg_data" :startDate="startDate" :endDate="endDate" :getTitle="getTitle" :spots="spots"></thursday-rate-1>
                  </td>
                  <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.thu" v-if="rateCardContainsFileDuration(segment.sec2,segment.time2,getFileDurations)">
                    <thursday-rate-2 :segmentDay="segmentDay" :totalBill="totalBill" :seg="seg" :getFileDurations="getFileDurations" :segment="segment"  :checkIfSegmentExist="checkIfSegmentExist"  :index="index" :seg_data="seg_data" :startDate="startDate" :endDate="endDate" :getTitle="getTitle" :spots="spots"></thursday-rate-2>
                  </td>
                  <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.thu" v-if="rateCardContainsFileDuration(segment.sec3,segment.time3,getFileDurations)">
                    <thursday-rate-3 :segmentDay="segmentDay" :totalBill="totalBill" :seg="seg" :getFileDurations="getFileDurations" :segment="segment"  :checkIfSegmentExist="checkIfSegmentExist"  :index="index" :seg_data="seg_data" :startDate="startDate" :endDate="endDate" :getTitle="getTitle" :spots="spots"></thursday-rate-3>
                  </td>
                  <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.thu" v-if="rateCardContainsFileDuration(segment.sec4,segment.time4,getFileDurations)">
                    <thursday-rate-4 :segmentDay="segmentDay" :totalBill="totalBill" :seg="seg" :getFileDurations="getFileDurations" :segment="segment"  :checkIfSegmentExist="checkIfSegmentExist"  :index="index" :seg_data="seg_data" :startDate="startDate" :endDate="endDate" :getTitle="getTitle" :spots="spots"></thursday-rate-4>
                  </td>
                  <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.thu" v-if="rateCardContainsFileDuration(segment.sec5,segment.time5,getFileDurations)">
                    <thursday-rate-5 :segmentDay="segmentDay" :totalBill="totalBill" :seg="seg" :getFileDurations="getFileDurations" :segment="segment"  :checkIfSegmentExist="checkIfSegmentExist"  :index="index" :seg_data="seg_data" :startDate="startDate" :endDate="endDate" :getTitle="getTitle" :spots="spots"></thursday-rate-5>
                  </td>

                  <!--friday-->
                  <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.fri" v-if="rateCardContainsFileDuration(segment.sec1,segment.time1,getFileDurations)">
                    <friday-rate-1 :segmentDay="segmentDay" :totalBill="totalBill" :seg="seg" :getFileDurations="getFileDurations" :segment="segment"  :checkIfSegmentExist="checkIfSegmentExist"  :index="index" :seg_data="seg_data" :startDate="startDate" :endDate="endDate" :getTitle="getTitle" :spots="spots"></friday-rate-1>
                  </td>
                  <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.fri" v-if="rateCardContainsFileDuration(segment.sec2,segment.time2,getFileDurations)">
                    <friday-rate-2 :segmentDay="segmentDay" :totalBill="totalBill" :seg="seg" :getFileDurations="getFileDurations" :segment="segment"  :checkIfSegmentExist="checkIfSegmentExist"  :index="index" :seg_data="seg_data" :startDate="startDate" :endDate="endDate" :getTitle="getTitle" :spots="spots"></friday-rate-2>
                  </td>
                  <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.fri" v-if="rateCardContainsFileDuration(segment.sec3,segment.time3,getFileDurations)">
                    <friday-rate-3 :segmentDay="segmentDay" :totalBill="totalBill" :seg="seg" :getFileDurations="getFileDurations" :segment="segment"  :checkIfSegmentExist="checkIfSegmentExist"  :index="index" :seg_data="seg_data" :startDate="startDate" :endDate="endDate" :getTitle="getTitle" :spots="spots"></friday-rate-3>
                  </td>
                  <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.fri" v-if="rateCardContainsFileDuration(segment.sec4,segment.time4,getFileDurations)">
                    <friday-rate-4 :segmentDay="segmentDay" :totalBill="totalBill" :seg="seg" :getFileDurations="getFileDurations" :segment="segment"  :checkIfSegmentExist="checkIfSegmentExist"  :index="index" :seg_data="seg_data" :startDate="startDate" :endDate="endDate" :getTitle="getTitle" :spots="spots"></friday-rate-4>
                  </td>
                  <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.fri" v-if="rateCardContainsFileDuration(segment.sec5,segment.time5,getFileDurations)">
                    <friday-rate-5 :segmentDay="segmentDay" :totalBill="totalBill" :seg="seg" :getFileDurations="getFileDurations" :segment="segment"  :checkIfSegmentExist="checkIfSegmentExist"  :index="index" :seg_data="seg_data" :startDate="startDate" :endDate="endDate" :getTitle="getTitle" :spots="spots"></friday-rate-5>
                  </td>
                  <td class="text-center">
                    <i class="fa fa-refresh text-danger"   @click="resetSegmentRow(index,seg_data)" style="cursor:pointer;"></i>
                  </td>
<!--                                                  <td><button :disabled="index != reset_disabled" class="btn btn-secondary btn-sm reset_btn"  data-index="index"  @click="resetSegment(seg_data,index)"><i class="fa fa-undo"></i> </button></td>-->
                  <!--ratecard rates ends here-->
                </tr>
              </tbody>
            </table>
          </div>


          <div v-show="checkDays(weekends)">
            <!--                                   <display-weekend-segments :spots="spots" :seg_data="seg_data" :wsegments="wsegments" :card_title="card_title" :segDay="segmentDay" :days="daysOfWeekend" :wsegemtns="weekendSegments"></display-weekend-segments>-->
            <table class="table table-bordered">
             <w-table-head :segmentDay="segmentDay" :days="days" :getFileDurations="getFileDurations"></w-table-head>
              <tbody>
              <tr v-for="(seg,index) in wsegments" :key="index">
                <th scope="row">{{index + 1}}</th>
                <td v-show="segmentDay.substr(0,3).toUpperCase() == days.sat">{{seg.sat_duration + ':' + seg.sat_b_duration }}-{{seg.sat_c_duration + ':' + seg.sat_d_duration }}</td>
                <td v-show="segmentDay.substr(0,3).toUpperCase() == days.sun">{{seg.sun_duration + ':' + seg.sun_b_duration }}-{{seg.sun_c_duration + ':' + seg.sun_d_duration }}</td>
                <td v-show="segmentDay.substr(0,3).toUpperCase() == days.sat">{{seg.sat_spots}}</td>
                <td v-show="segmentDay.substr(0,3).toUpperCase() == days.sun">{{seg.sun_spots}}</td>
                <td v-show="segmentDay.substr(0,3).toUpperCase() == days.sat">

                  <!--spots available-->
                  <saturday-spots-available  :segmentDay="segmentDay" :days="days" :spots_booked="spots_booked" :totalBill="totalBill"  :seg="seg" :getFileDurations="getFileDurations" :segment="segment" :spots="spots" :checkIfSegmentExist="checkIfSegmentExist" :booked="booked" :index="index" :segment_exist="segment_exist"></saturday-spots-available>
                </td>
                <td v-show="segmentDay.substr(0,3).toUpperCase() == days.sun">
                  <sunday-spots-available  :segmentDay="segmentDay" :days="days" :spots_booked="spots_booked" :totalBill="totalBill"  :seg="seg" :getFileDurations="getFileDurations" :segment="segment" :spots="spots" :checkIfSegmentExist="checkIfSegmentExist" :booked="booked" :index="index" :segment_exist="segment_exist"></sunday-spots-available>
                </td>

                <!--saturday rates-->
                <td v-show="segmentDay.substr(0,3).toUpperCase() == days.sat" v-if="days.wsec1 > 0 && days.wsec1 > getFileDurations || days.wsec1 == getFileDurations && days.wsec1 != 0">
                 <saturday-rate1 :segmentDay="segmentDay" :totalBill="totalBill" :days="days" :seg="seg" :getFileDurations="getFileDurations" :segment="segment"  :checkIfSegmentExist="checkIfSegmentExist"  :index="index" :seg_data="seg_data" :startDate="startDate" :endDate="endDate" :getTitle="getTitle" :spots="spots"></saturday-rate1>
                </td>
                <td v-show="segmentDay.substr(0,3).toUpperCase() == days.sat" v-if="days.wsec2 > 0 && days.wsec2 > getFileDurations || days.wsec2 == getFileDurations && days.wsec2 != 0">
                 <saturday-rate2 :segmentDay="segmentDay" :totalBill="totalBill" :days="days"  :seg="seg" :getFileDurations="getFileDurations" :segment="segment"  :checkIfSegmentExist="checkIfSegmentExist"  :index="index" :seg_data="seg_data" :startDate="startDate" :endDate="endDate" :getTitle="getTitle" :spots="spots"></saturday-rate2>
                </td>
                <td v-show="segmentDay.substr(0,3).toUpperCase() == days.sat" v-if="days.wsec3 > 0 && days.wsec3 > getFileDurations || days.wsec3 == getFileDurations && days.wsec3 != 0">
                 <saturday-rate3 :segmentDay="segmentDay" :totalBill="totalBill" :days="days"  :seg="seg" :getFileDurations="getFileDurations" :segment="segment"  :checkIfSegmentExist="checkIfSegmentExist"  :index="index" :seg_data="seg_data" :startDate="startDate" :endDate="endDate" :getTitle="getTitle" :spots="spots"></saturday-rate3>
                </td>
                <td v-show="segmentDay.substr(0,3).toUpperCase() == days.sat" v-if="days.wsec4 > 0 && days.wsec4 > getFileDurations || days.wsec4 == getFileDurations && days.wsec4 != 0">
                 <saturday-rate4 :segmentDay="segmentDay" :totalBill="totalBill" :days="days"  :seg="seg" :getFileDurations="getFileDurations" :segment="segment"  :checkIfSegmentExist="checkIfSegmentExist"  :index="index" :seg_data="seg_data" :startDate="startDate" :endDate="endDate" :getTitle="getTitle" :spots="spots"></saturday-rate4>
                </td>
                <td v-show="segmentDay.substr(0,3).toUpperCase() == days.sat" v-if="days.wsec5 > 0 && days.wsec5 > getFileDurations || days.wsec5 == getFileDurations && days.wsec5 != 0">
                 <saturday-rate5 :segmentDay="segmentDay" :totalBill="totalBill" :days="days"  :seg="seg" :getFileDurations="getFileDurations" :segment="segment"  :checkIfSegmentExist="checkIfSegmentExist"  :index="index" :seg_data="seg_data" :startDate="startDate" :endDate="endDate" :getTitle="getTitle" :spots="spots"></saturday-rate5>
                </td>

                <!--sunday rates-->

                <td v-show="segmentDay.substr(0,3).toUpperCase() == days.sun" v-if="days.wsec1 > 0 && days.wsec1 > getFileDurations || days.wsec1 == getFileDurations && days.wsec1 != 0">
                  <sunday-rate1 :segmentDay="segmentDay"  :totalBill="totalBill" :days="days"  :seg="seg" :getFileDurations="getFileDurations" :segment="segment"  :checkIfSegmentExist="checkIfSegmentExist"  :index="index" :seg_data="seg_data" :startDate="startDate" :endDate="endDate" :getTitle="getTitle" :spots="spots"></sunday-rate1>
                </td>
                <td v-show="segmentDay.substr(0,3).toUpperCase() == days.sun" v-if="days.wsec2 > 0 && days.wsec2 > getFileDurations || days.wsec2 == getFileDurations && days.wsec2 != 0">
                  <sunday-rate2 :segmentDay="segmentDay"  :totalBill="totalBill" :days="days"  :seg="seg" :getFileDurations="getFileDurations" :segment="segment"  :checkIfSegmentExist="checkIfSegmentExist"  :index="index" :seg_data="seg_data" :startDate="startDate" :endDate="endDate" :getTitle="getTitle" :spots="spots"></sunday-rate2>
                </td>
                <td v-show="segmentDay.substr(0,3).toUpperCase() == days.sun" v-if="days.wsec3 > 0 && days.wsec3 > getFileDurations || days.wsec3 == getFileDurations && days.wsec3 != 0">
                 <sunday-rate3 :segmentDay="segmentDay"  :totalBill="totalBill" :days="days"  :seg="seg" :getFileDurations="getFileDurations" :segment="segment"  :checkIfSegmentExist="checkIfSegmentExist"  :index="index" :seg_data="seg_data" :startDate="startDate" :endDate="endDate" :getTitle="getTitle" :spots="spots"></sunday-rate3>
                </td>
                <td v-show="segmentDay.substr(0,3).toUpperCase() == days.sun" v-if="days.wsec4 > 0 && days.wsec4 > getFileDurations || days.wsec4 == getFileDurations && days.wsec4 != 0">
                  <sunday-rate4 :segmentDay="segmentDay"  :totalBill="totalBill" :days="days"  :seg="seg" :getFileDurations="getFileDurations" :segment="segment"  :checkIfSegmentExist="checkIfSegmentExist"  :index="index" :seg_data="seg_data" :startDate="startDate" :endDate="endDate" :getTitle="getTitle" :spots="spots"></sunday-rate4>
                </td>
                <td v-show="segmentDay.substr(0,3).toUpperCase() == days.sun" v-if="days.wsec5 > 0 && days.wsec5 > getFileDurations || days.wsec5 == getFileDurations && days.wsec5 != 0">
                 <sunday-rate5 :segmentDay="segmentDay"  :totalBill="totalBill" :days="days"  :seg="seg" :getFileDurations="getFileDurations" :segment="segment"  :checkIfSegmentExist="checkIfSegmentExist"  :index="index" :seg_data="seg_data" :startDate="startDate" :endDate="endDate" :getTitle="getTitle" :spots="spots"></sunday-rate5>
                </td>
                <td class="text-center">
                  <i class="fa fa-refresh text-danger"   @click="resetSegmentRow(index,wsegments)" style="cursor:pointer;"></i>
                </td>
              </tr>

              </tbody>
            </table>
            <div class="table-responsive">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button v-show="switch_buttons_off" type="button" class="btn btn-default waves-effect" data-dismiss="modal" @click="unsetArrays()">Close</button>
          <!--<button class="btn btn-mat btn-secondary ">save</button>-->
<!--          <router-link-->
<!--            :to="{name : 'invoice'}"-->
<!--            v-show="validateRateCardSelection(this.seg_data) && checkIfSpotSelected() && title.length > 0"-->
<!--            class="btn btn-primary waves-effect waves-light animated fadeIn"-->
<!--            @click.native="submit(title)"-->
<!--          >Schedule</router-link>-->
          <button v-show="switch_buttons_off" v-if="validateRateCardSelection(this.seg_data) && checkIfSpotSelected() && title.length > 0"  class="btn btn-primary waves-effect waves-light animated fadeIn" @click="submit(title)">Add to cart</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import store from "../../vuex/store";
import daysOfWeek  from "./daysOfWeek";
import daysOfWeekSegments from "./daysOfWeekSegments";
import spotsForSegmentForDaysOfWeek from "./spotsForSegmentForDaysOfWeek";
import mondaySpotsAvailable from "./mondaySpotsAvailable";
import SaturdayRate1 from "./weekendRates/saturdayRate1";
import SaturdayRate2 from "./weekendRates/saturdayRate2";
import SaturdayRate3 from "./weekendRates/saturdayRate3";
import SaturdayRate4 from "./weekendRates/saturdayRate4";
import SaturdayRate5 from "./weekendRates/saturdayRate5";
import SundayRate1 from "./weekendRates/sundayRate1";
import SundayRate2 from "./weekendRates/sundayRate2";
import SundayRate3 from "./weekendRates/sundayRate3";
import SundayRate5 from "./weekendRates/sundayRate5";
export default {
  props: [
    "saveSegment",
    "startDate",
    "endDate",
    "media_id",
    "segments_data",
    "card_title",
    "segment",
    "segments",
    "weekendSegments",
    "days",
    "wsegments",
    "spot_check"
  ],
  name: "selectSegments",
  components : {
    SundayRate5,
    SundayRate3,
    SundayRate2,
    SundayRate1,
    SaturdayRate5,
    SaturdayRate4,
    SaturdayRate3,
    SaturdayRate2,
    SaturdayRate1,
    daysOfWeek,
    daysOfWeekSegments,
    spotsForSegmentForDaysOfWeek,
    mondaySpotsAvailable
  },
  mounted() {

    if(this.file.name ==  undefined){
      this.$router.push({
        name: "fileupload"
      });
    }

    this.title = '';
    this.resetBoleans();
    setInterval(function() {
      this.data = true;
    }, 2000);

    if (this.segment_data != "") {
      this.data = false;
    }
  },
  created() {

  },
  data() {
    return {
      invoice: [],
      segment_date: "/user-account/create-sub-date",
      selSegment_url: "/user-account/select-segment",
      selSegment: "",
      selMedia: "",
      seg_data: [],
      spots: [],
      print_segments: [{}],
      title: "",
      rate: "",
      // day: 'Monday',
      // invoice : 'invoice',
      start: "",
      end: "",
      event_time: false,
      startDates: [],
      endDates: [],
      days_of_week: true,
      schedule: false,
      weekdays: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
      weekends: ["Saturday", "Sunday"],
      show_ratecard: false,
      data: false,
      //   su : [1,2,3,4],
      //   ba : 0,
      segment_exist: false,
      booked: "Booked",
      addSegment: true,
      reset_disabled: null,
      reset_button_index: [],
      segment_avail: true,
      mycheck: false,
      test : true,
      total_bill : 0,
      total : 0,
      add_to_cart : false,
      switch_buttons_off : true,
      spots_booked : false,
      refresh_button : true,
      calcuData : [],
      final_spots : [],
      previouslySelected : false,
      error_title : "",
      isTitleError : false
    };
  },
  methods: {
    submit(title) {
      store.dispatch("getSegmentTitle", title);
      this.eventTime();
      this.storeSub(title)


    },
    eventTime() {
      let data = this.seg_data.filter(el => el === 0 || Boolean(el));
      store.dispatch("getSubData", data);
      store.dispatch('getTotalSpots', this.spots);


      // store.dispatch("getAmountBilled", 0.00);

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

      if (z > 0 || n == 0) {
        let spots_left = parseInt(spots) - parseInt(z);
        if (spots_left > 0) {
          this.segment_exist = true;
          // this.segment_avail = false;
        } else {
          this.refresh_button = false;
          this.spots_booked = true;
          this.segment_avail = true;
        }

        return parseInt(spots_left);
      } else {
        this.spot_avail(spots);
      }
    },
    resetSegmentRow(index,data) {
      console.log(data);

      for(let i=0; i < data.length; i++) {
        if (data[i] === undefined) {
          continue
        }
        if (data[i].index === index) {
          data.splice(data[index], 1);
          return data;
        }
      }
     // return data;

      // for(let dat in data){
      //   if(data[dat].index === index){
      //     console.log(index + '||' + data[dat].index);
      //     data.splice(data[dat].index,1);
      // //    this.totalBill();
      //     break;
      //   }
      // }
      // return data;

    },
    save() {
      store.dispatch("getSegmentTitle", this.title);
      $("#radio_tv").modal("hide");
    },
    uncheck: function(index) {
      for(let i=0; i < this.seg_data.length; i++){
        if(index === this.seg_data[i].index){
          this.seg_data[index] = false;
          console.log('status is ' + this.seg_data[index]);
          break;


        }
      }

    //  this.previouslySelected = true
    },
    validateRateCardSelection(segment) {
      return segment.length > 0;
    },

    checkIfSpotSelected() {
      return this.spots.length > 0;
    },
    checkDays(days) {
      for (let i = 0; i < days.length; i++) {
        if (days[i] == this.segmentDay) {
          return true;
        }
      }
    },
    onChange(event) {
      var optionText = event.target.value;
    //  console.log(optionText);
    },
    resetSegment(arr, ind) {
      // $("input[type=radio]").prop('checked', false);
     // console.log("before filter " + this.seg_data);
      this.seg_data = this.seg_data.filter(
        (item, index, arr_items) => index !== ind
      );
    //  console.log("after filter " + " " + ind + this.seg_data);
    },
    enableResetButton(index) {
      this.reset_button_index.push(index);
      for (let i = 0; i < this.reset_button_index.length; i++) {
        if (this.reset_button_index[i] === index) {
          return (this.reset_disabled = index);
        }
      }
    },
    resetBoleans(){
      this.refresh_button = true;
      this.spots_booked = false;
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
    filterBill(total){
      for(let i=0; i < this.seg_data.length; i++){
        if(this.seg_data[i] === undefined){
          continue;
        }
        if(this.spots[i] == ''){
          this.spots[i] = 1;
        }
        total  = (parseFloat(this.seg_data[i].rate) * parseInt(this.spots[i])) - total;

      }
      store.dispatch('getAmountBilled',total);
    },
    unsetArrays(){
      this.seg_data = [];
     // this.spots = [];
      this.title = '';
    },
    rateCardContainsFileDuration(durations,time,fileDuration){
      let hours  = 0;
      let minutes = 0;
      let seconds = 0;

      if(time === 'Min'){
        seconds =  durations * 60;
      }
      else if(time === 'Hr'){

        seconds =  durations * (60  * 60);
      }
      else{
        seconds  = durations;
      }

      if(seconds > 0 && seconds > fileDuration || seconds == fileDuration && seconds != 0){
        return true;
      }
      return false;
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

        // check spots and ad data if length is equal
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
            $("#radio_tv").modal("hide");
            $("#print").modal("hide");

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
          else if(response.data.errors.title){
            self.error_title = "Title already used.Kindly choose another title.";
            self.isTitleError = true;
            self.process = false;
            self.add_to_cart = false;
            self.switch_buttons_off  = true;
            self.final_spots = [];
          }

          else {
            self.process = false;
            self.add_to_cart = false;
            self.switch_buttons_off  = true;
            self.final_spots = [];
            $("#radio_tv").modal("hide");
            $("#print").modal("hide");

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
        }).catch(function (error) {
              console.log(error);
        });

      //  $("#mol").modal("hide");
       // $("#print").modal("hide");
      }
    }
  },

  resetButtonDisabled() {},

  computed: {
    notification() {
      return store.getters.checkAvailableDate;
    },
    segmentDay() {
      return store.getters.segmentDay;
    },
    getMediaHouse() {
      return store.getters.selectedMediaHouse;
    },
    getRateCardTitle() {
      return store.getters.segmentTitle;
    },
    segData() {
      return store.getters.segmentsData;
    },
    getProcessStatus() {
      return store.state.processing;
    },
    segDate() {
      return store.getters.segmentDate;
    },
    selSegments() {
      return store.getters.selectedSegment;
    },
    segTitle() {
      return store.getters.segTitle;
    },
    startTimes() {
      return store.getters.startTime;
    },
    endTimes() {
      return store.getters.endTime;
    },
    getTitle() {
      return store.state.rate_card_title;
    },

    fileName() {
      return store.getters.fileName;
    },
    fileSize() {
      return store.getters.fileSize;
    },
    startDat() {
      return this.startDate;
    },
    schedAdsData() {
      return store.getters.subData;
    },
    mediaId() {
      return this.media_id;
    },
    segmentData() {
      return [this.days];
    },
    getFileDurations() {
      return store.state.fileDuration;
    },
    mediaFileDuration(){
      return store.state.media_file_duration;
    },
    amountBilled(){
      return store.state.amountBilled;
    },
    file() {
      return store.getters.file;
    },
    rateCardTitleId() {
      return store.state.card_id;
    },
    getSpots(){
      return store.getters.getSpots;
    },
    mediaHouseIds() {
      return store.state.mediaHouseId;
    },
    getUrl(){
      return store.state.readFile;
    }

  }
};
</script>

