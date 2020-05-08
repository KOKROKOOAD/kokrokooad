<template>
    <div>
<!--        <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.mon">{{segment.mon}}</th>-->
<!--        <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.tue">{{segment.tue}}</th>-->
        <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.wed">{{segment.wed}}</th>
<!--        <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.thu">{{segment.thu}}</th>-->
<!--        <th v-show="segmentDay.substr(0,3).toUpperCase()  === segment.fri">{{segment.fri}}</th>-->
    </div>

</template>

<script>
    export default {
        props : ['segmentDay','segment'],
        name: "daysOfWeek"
    }
</script>

<style scoped>

</style>