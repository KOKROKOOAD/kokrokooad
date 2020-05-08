<template>
    <div class="form-radio" v-show="checkIfSegmentExist(seg.mon_duration + ':' + seg.mon_b_duration + '-' + seg.mon_c_duration + ':' + seg.mon_d_duration,seg.mon_spots) != 0">
        <div class="radio radio-inline">
            <label>
                <input
                        v-show="checkIfSegmentExist(seg.mon_duration + ':' + seg.mon_b_duration + '-' + seg.mon_c_duration + ':' + seg.mon_d_duration,seg.mon_spots) != 0"
                        type="radio"
                        :name="'mon' + (index)"
                        :id="index"
                        v-model="seg_data[index]"
                        @change="this.totalBill"
                        :value="{'index' : index,'startDate': startDate + '' + seg.mon_duration + ':' + seg.mon_b_duration  ,'endDate':endDate + '' + seg.mon_c_duration + ':' + seg.mon_d_duration  ,'endTime' :seg.mon_b_duration,durations : segment.sec3 + segment.time3,'rate': seg.sec3_rate,'rate_card':getTitle}"
                />
                <i class="helper"></i>
                {{checkIfSegmentExist(seg.mon_duration + ':' + seg.mon_b_duration + '-' + seg.mon_c_duration + ':' + seg.mon_d_duration,seg.mon_spots) === 0 ? 'Booked' :'GHS'+ seg.sec3_rate}}
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
            'totalBill'

        ],
        name: "mondayRates3",
        data(){
            return{
                total : 0,
                mon_rate : []
            }
        }
    }
</script>

<style scoped>

</style>