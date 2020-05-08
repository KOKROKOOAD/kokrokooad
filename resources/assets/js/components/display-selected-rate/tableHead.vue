<template>
    <tr style="background: #36475F;color: #ffffff;">
        <th>#</th>
        <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.mon">{{segment.mon}}</th>
        <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.tue">{{segment.tue}}</th>
        <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.wed">{{segment.wed}}</th>
        <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.thu">{{segment.thu}}</th>
        <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.fri">{{segment.fri}}</th>
        <th>Spots</th>
        <th>Spots available</th>
        <!--monday time durations-->
        <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.mon" v-if="rateCardContainsFileDuration(segment.sec1,segment.time1,getFileDurations)">{{segment.sec1 + segment.time1}}</th>
        <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.mon" v-if="rateCardContainsFileDuration(segment.sec2,segment.time2,getFileDurations)">{{segment.sec2 + segment.time2}}</th>
        <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.mon" v-if="rateCardContainsFileDuration(segment.sec3,segment.time3,getFileDurations)">{{segment.sec3 + segment.time3}}</th>
        <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.mon" v-if="rateCardContainsFileDuration(segment.sec4,segment.time4,getFileDurations)">{{segment.sec4 + segment.time4}}</th>
        <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.mon" v-if="rateCardContainsFileDuration(segment.sec5,segment.time5,getFileDurations)">{{segment.sec5 + segment.time5}}</th>

        <!--tuesday time durations-->
        <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.tue" v-if="rateCardContainsFileDuration(segment.sec1,segment.time1,getFileDurations)">{{segment.sec1 + segment.time1}}</th>
        <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.tue" v-if="rateCardContainsFileDuration(segment.sec2,segment.time2,getFileDurations)">{{segment.sec2 + segment.time2}}</th>
        <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.tue" v-if="rateCardContainsFileDuration(segment.sec3,segment.time3,getFileDurations)">{{segment.sec3 + segment.time3}}</th>
        <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.tue" v-if="rateCardContainsFileDuration(segment.sec4,segment.time4,getFileDurations)">{{segment.sec4 + segment.time4}}</th>
        <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.tue" v-if="rateCardContainsFileDuration(segment.sec5,segment.time5,getFileDurations)">{{segment.sec5 + segment.time5}}</th>

        <!--wednesday time durations-->
        <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.wed" v-if="rateCardContainsFileDuration(segment.sec1,segment.time1,getFileDurations)">{{segment.sec1 + segment.time1}}</th>
        <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.wed" v-if="rateCardContainsFileDuration(segment.sec2,segment.time2,getFileDurations)">{{segment.sec2 + segment.time2}}</th>
        <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.wed" v-if="rateCardContainsFileDuration(segment.sec3,segment.time3,getFileDurations)">{{segment.sec3 + segment.time3}}</th>
        <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.wed" v-if="rateCardContainsFileDuration(segment.sec4,segment.time4,getFileDurations)">{{segment.sec4 + segment.time4}}</th>
        <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.wed" v-if="rateCardContainsFileDuration(segment.sec5,segment.time5,getFileDurations)">{{segment.sec5 + segment.time5}}</th>

        <!--thursday time durations-->
        <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.thu" v-if="rateCardContainsFileDuration(segment.sec1,segment.time1,getFileDurations)">{{segment.sec1 + segment.time1}}</th>
        <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.thu" v-if="rateCardContainsFileDuration(segment.sec2,segment.time2,getFileDurations)">{{segment.sec2 + segment.time2}}</th>
        <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.thu" v-if="rateCardContainsFileDuration(segment.sec3,segment.time3,getFileDurations)">{{segment.sec3 + segment.time3}}</th>
        <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.thu" v-if="rateCardContainsFileDuration(segment.sec4,segment.time4,getFileDurations)">{{segment.sec4 + segment.time4}}</th>
        <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.thu" v-if="rateCardContainsFileDuration(segment.sec5,segment.time5,getFileDurations)">{{segment.sec5 + segment.time5}}</th>

        <!--friday time durations-->
        <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.fri" v-if="rateCardContainsFileDuration(segment.sec1,segment.time1,getFileDurations)">{{segment.sec1 + segment.time1}}</th>
        <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.fri" v-if="rateCardContainsFileDuration(segment.sec2,segment.time2,getFileDurations)">{{segment.sec2 + segment.time2}}</th>
        <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.fri" v-if="rateCardContainsFileDuration(segment.sec3,segment.time3,getFileDurations)">{{segment.sec3 + segment.time3}}</th>
        <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.fri" v-if="rateCardContainsFileDuration(segment.sec4,segment.time4,getFileDurations)">{{segment.sec4 + segment.time4}}</th>
        <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.fri" v-if="rateCardContainsFileDuration(segment.sec5,segment.time5,getFileDurations)">{{segment.sec5 + segment.time5}}</th>
        <th>Reset row</th>
    </tr>
</template>

<script>
    export default {
        props : ['segment','getFileDurations','segmentDay','rateCardContainsFileDuration'],
        name: "tableHead"
    }
</script>

<style scoped>

</style>