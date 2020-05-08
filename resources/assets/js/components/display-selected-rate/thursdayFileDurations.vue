<template>
    <div>
        <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.thu" v-if="segment.sec1 > 0 && segment.sec1 > getFileDurations || segment.sec1 === getFileDurations && segment.sec1 !== 0">{{segment.sec1 + segment.time1}}</th>
        <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.thu" v-if="segment.sec2 > 0 && segment.sec2 > getFileDurations || segment.sec2 === getFileDurations && segment.sec2 !== 0">{{segment.sec2 + segment.time2}}</th>
        <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.thu" v-if="segment.sec3 > 0 && segment.sec3 > getFileDurations || segment.sec3 === getFileDurations && segment.sec3 !== 0">{{segment.sec3 + segment.time3}}</th>
        <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.thu" v-if="segment.sec4 > 0 && segment.sec4 > getFileDurations || segment.sec4 === getFileDurations && segment.sec4 !== 0">{{segment.sec4 + segment.time4}}</th>
        <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.thu" v-if="segment.sec5 > 0 && segment.sec5 > getFileDurations || segment.sec5 === getFileDurations && segment.sec5 !== 0">{{segment.sec5 + segment.time5}}</th>
    </div>
</template>

<script>
    export default {
        props : ['segment','getFileDurations','segmentDay'],
        name: "thursdayFileDurations"
    }
</script>

<style scoped>

</style>