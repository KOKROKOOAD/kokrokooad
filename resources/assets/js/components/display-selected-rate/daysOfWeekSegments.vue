<template>
    <span>
        <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.mon">{{seg.mon_duration + ':' + seg.mon_b_duration }}-{{seg.mon_c_duration + ':' + seg.mon_d_duration}}</td>
        <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.tue">{{seg.tue_duration + ':' + seg.tue_b_duration }}-{{seg.tue_c_duration + ':' + seg.tue_d_duration}}</td>
        <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.wed">{{seg.wed_duration + ':' + seg.wed_b_duration }}-{{seg.wed_c_duration + ':' + seg.wed_d_duration}}</td>
        <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.thu">{{seg.thu_duration + ':' + seg.thu_b_duration }}-{{seg.thu_c_duration + ':' + seg.thu_d_duration }}</td>
        <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.fri">{{seg.fri_duration + ':' + seg.fri_b_duration }}-{{seg.fri_c_duration + ':' + seg.fri_d_duration}}</td>
    </span>
</template>

<script>
    export default {
        props : ['segment','getFileDurations','segmentDay','seg'],
        name: "daysOfWeekSegments"
    }
</script>

<style scoped>

</style>