<template>
    <div class="form-radio" v-show="checkIfSegmentExist(seg.sun_duration + ':' + seg.sun_b_duration + '-' + seg.sun_c_duration + ':' + seg.sun_d_duration,seg.sun_spots) != 0">
        <div class="radio radio-inline">
            <label>
                <input
                        type="radio"
                        :name="'sun' + (index)"
                        class="form-control"
                        @change="totalBill"
                        :value="{'index':index,'startDate': startDate + '' + seg.sun_duration + ':' + seg.sun_b_duration  ,'endDate':endDate + '' + seg.sun_c_duration + ':' + seg.sun_d_duration  ,'endTime' :seg.sun_b_duration,durations : days.wsec4 + days.time4,'rate': seg.wsec4_rate,'rate_card':getTitle}"
                        v-model="seg_data[index]"
                />
                <i class="helper"></i>
                {{checkIfSegmentExist(seg.sun_duration + ':' + seg.sun_b_duration + '-' + seg.sun_c_duration + ':' + seg.sun_d_duration,seg.sun_spots) === 0 ? 'Booked' :'GHS'+ seg.wsec4_rate }}

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
        name: "sundayRate4"
    }
</script>

<style scoped>

</style>