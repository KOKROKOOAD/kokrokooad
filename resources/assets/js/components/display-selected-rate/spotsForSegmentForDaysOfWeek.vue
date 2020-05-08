<template>
    <span>
        <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.mon">{{seg.mon_spots}}</td>
        <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.tue">{{seg.tue_spots}}</td>
        <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.wed">{{seg.wed_spots}}</td>
        <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.thu">{{seg.thu_spots}}</td>
        <td v-show="segmentDay.substr(0,3).toUpperCase() == segment.fri">{{seg.fri_spots}}</td>
        <!-- end of spots for rate cards -->
    </span>
</template>

<script>
    export default {
        props : ['segment','getFileDurations','segmentDay','seg'],
        name: "spotsForSegmentForDaysOfWeek"
    }
</script>

<style scoped>

</style>