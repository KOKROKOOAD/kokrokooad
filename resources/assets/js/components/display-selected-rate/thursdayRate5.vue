<template>
    <div class="form-radio" v-show="checkIfSegmentExist(seg.thu_duration + ':' + seg.thu_b_duration + '-' + seg.thu_c_duration + ':' + seg.thu_d_duration,seg.thu_spots) != 0">
        <div class="radio radio-inline">
            <label>
                <input
                        v-show="checkIfSegmentExist(seg.thu_duration + ':' + seg.thu_b_duration + '-' + seg.thu_c_duration + ':' + seg.thu_d_duration,seg.thu_spots) != 0"
                        type="radio"
                        :name="'thu' + (index)"
                        v-model="seg_data[index]"
                        @change="this.totalBill"
                        :value="{'index' : index,'startDate': startDate + '' + seg.thu_duration + ':' + seg.thu_b_duration  ,'endDate':endDate + '' + seg.thu_c_duration + ':' + seg.thu_d_duration  ,'endTime' :seg.thu_b_duration,durations : segment.sec5 + segment.time5,'rate': seg.sec5_rate,'rate_card':getTitle}"
                />
                <i class="helper"></i>
                {{checkIfSegmentExist(seg.thu_duration + ':' + seg.thu_b_duration + '-' + seg.thu_c_duration + ':' + seg.thu_d_duration,seg.thu_spots) === 0 ? 'Booked' :'GHS'+ seg.sec5_rate}}
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
        name: "thursdayRate5",
        data(){
            return{
                total : 0
            }
        }
    }
</script>

<style scoped>

</style>