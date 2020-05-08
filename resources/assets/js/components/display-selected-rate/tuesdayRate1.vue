<template>
    <div class="form-radio" v-show="checkIfSegmentExist(seg.mon_duration + ':' + seg.mon_b_duration + '-' + seg.mon_c_duration + ':' + seg.mon_d_duration,seg.mon_spots) != 0">
        <div class="radio radio-inline">
            <label>
                <input
                        v-show="checkIfSegmentExist(seg.tue_duration + ':' + seg.tue_b_duration + '-' + seg.tue_c_duration + ':' + seg.tue_d_duration,seg.tue_spots) != 0"
                        type="radio"
                        :name="'tue' + (index)"
                        v-model="seg_data[index]"
                        @change="this.totalBill"
                        :value="{'index' : index,'startDate': startDate + '' + seg.tue_duration + ':' + seg.tue_b_duration  ,'endDate':endDate + '' + seg.tue_c_duration + ':' + seg.tue_d_duration  ,'endTime' :seg.tue_b_duration,durations : segment.sec1 + segment.time1,'rate': seg.sec1_rate,'rate_card':getTitle}"

                />
                <i class="helper"></i>
                {{checkIfSegmentExist(seg.tue_duration + ':' + seg.tue_b_duration + '-' + seg.tue_c_duration + ':' + seg.tue_d_duration,seg.tue_spots) === 0 ? 'Booked' :'GHS'+ seg.sec1_rate }}
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
            "totalBill"
        ],
        name: "tuesdayRates1",
        data(){
            return{
                total : 0
            }
        }
    }
</script>

<style scoped>

</style>