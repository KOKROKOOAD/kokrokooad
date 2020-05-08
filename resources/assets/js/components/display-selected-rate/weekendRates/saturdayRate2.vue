<template>
    <div class="form-radio" v-show="checkIfSegmentExist(seg.sat_duration + ':' + seg.sat_b_duration + '-' + seg.sat_c_duration + ':' + seg.sat_d_duration,seg.sat_spots) != 0">
        <div class="radio radio-inline">
            <label>
                <input
                        type="radio"
                        :name="'sat' + (index)"
                        class="form-control"
                        @change="totalBill"
                        :value="{'index':index,'startDate': startDate + '' + seg.sat_duration + ':' + seg.sat_b_duration  ,'endDate':endDate + '' + seg.sat_c_duration + ':' + seg.sat_d_duration  ,'endTime' :seg.sat_b_duration,durations : days.wsec2 + days.time2,'rate': seg.wsec2_rate,'rate_card':getTitle}"
                        v-model="seg_data[index]"
                />
                <i class="helper"></i>
                {{checkIfSegmentExist(seg.sat_duration + ':' + seg.sat_b_duration + '-' + seg.sat_c_duration + ':' + seg.sat_d_duration,seg.sat_spots) === 0 ? 'Booked' :'GHS'+ seg.wsec2_rate }}
            </label>
        </div>
    </div>
</template>

<script>
    export default {
        props : ['segment',
            'getFileDurations',
            'segmentDay','seg',
            'checkIfSegmentExist',
            'seg_data',
            'segment_exist',
            'index',
            'spots',
            'getTitle',
            'startDate',
            'endDate',
            'totalBill',
            'days'
        ],
        name: "saturdayRate2"
    }
</script>

<style scoped>

</style>