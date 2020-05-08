<template>
    <thead>
    <tr style="background: #36475F;color: #ffffff;">
        <th>#</th>
        <th v-show="segmentDay.substr(0,3).toUpperCase()  === days.sat">{{days.sat}}</th>
        <th v-show="segmentDay.substr(0,3).toUpperCase()  === days.sun">{{days.sun}}</th>
        <th>Spots</th>
        <th>Spots available</th>
        <th
                v-show="segmentDay.substr(0,3).toUpperCase()  === days.sat"
                v-if="days.wsec1 > 0 && days.wsec1 > getFileDurations || days.wsec1 == getFileDurations && days.wsec1 != 0"
        >{{days.wsec1 + days.time1}}</th>
        <th
                v-show="segmentDay.substr(0,3).toUpperCase()  === days.sat"
                v-if="days.wsec2 > 0 && days.wsec2 > getFileDurations || days.wsec2 == getFileDurations && days.wsec2 != 0"
        >{{days.wsec2 + days.time2}}</th>
        <th
                v-show="segmentDay.substr(0,3).toUpperCase()  === days.sat"
                v-if="days.wsec1 > 0 && days.wsec3 > getFileDurations || days.wsec3 == getFileDurations && days.wsec3 != 0"
        >{{days.wsec3 + days.time3}}</th>
        <th
                v-show="segmentDay.substr(0,3).toUpperCase()  === days.sat"
                v-if="days.wsec4 > 0 && days.wsec4 > getFileDurations || days.wsec4 == getFileDurations && days.wsec4 != 0"
        >{{days.wsec4 + days.time4}}</th>
        <th
                v-show="segmentDay.substr(0,3).toUpperCase()  === days.sat"
                v-if="days.wsec1 > 0 && days.wsec5 > getFileDurations || days.wsec5 == getFileDurations && days.wsec5 != 0"
        >{{days.wsec5 + days.time5}}</th>

        <th
                v-show="segmentDay.substr(0,3).toUpperCase()  === days.sun"
                v-if="days.wsec1> 0 && days.wsec1 > getFileDurations || days.wsec1 == getFileDurations && days.wsec1 != 0"
        >{{days.wsec1 + days.time1}}</th>
        <th
                v-show="segmentDay.substr(0,3).toUpperCase()  === days.sun"
                v-if="days.wsec2 > 0 && days.wsec2 > getFileDurations || days.wsec2 == getFileDurations && days.wsec2 != 0"
        >{{days.wsec2 + days.time2}}</th>
        <th
                v-show="segmentDay.substr(0,3).toUpperCase()  === days.sun"
                v-if="days.wsec3 > 0 && days.wsec3 > getFileDurations || days.wsec3 == getFileDurations && days.wsec3 != 0"
        >{{days.wsec3 + days.time3}}</th>
        <th
                v-show="segmentDay.substr(0,3).toUpperCase()  === days.sun"
                v-if="days.wsec4 > 0 && days.wsec4 > getFileDurations || days.wsec4 == getFileDurations && days.wsec4 != 0"
        >{{days.wsec4 + days.time4}}</th>
        <th
                v-show="segmentDay.substr(0,3).toUpperCase()  === days.sun"
                v-if="days.wsec5 > 0 && days.wsec5 > getFileDurations || days.wsec5 == getFileDurations && days.wsec5 != 0"
        >{{days.wsec5 + days.time5}}</th>
        <th>Reset row</th>

    </tr>
    </thead>
</template>

<script>
    export default {
        props : ['segmentDay','days','getFileDurations'],
        name: "wTableHead"
    }
</script>

<style scoped>

</style>