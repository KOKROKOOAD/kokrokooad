<template>
    <div class="form-radio" v-show="checkIfSegmentExist(seg.fri_duration + ':' + seg.fri_b_duration + '-' + seg.fri_c_duration + ':' + seg.fri_d_duration,seg.fri_spots) != 0">
        <div class="radio radio-inline">
            <label>
                <input
                        v-show="checkIfSegmentExist(seg.fri_duration + ':' + seg.fri_b_duration + '-' + seg.fri_c_duration + ':' + seg.fri_d_duration,seg.fri_spots) != 0"
                        type="radio"
                        :name="'fri' + (index)"
                        v-model="seg_data[index]"
                        @change="this.totalBill"
                        :value="{'index' : index,'startDate': startDate + '' + seg.fri_duration + ':' + seg.fri_b_duration  ,'endDate':endDate + '' + seg.fri_c_duration + ':' + seg.fri_d_duration  ,'endTime' :seg.fri_b_duration,durations : segment.sec1 + segment.time1,'rate': seg.sec1_rate,'rate_card':getTitle,'spots':spots[index]}"

                />
                <i class="helper"></i>
                {{checkIfSegmentExist(seg.fri_duration + ':' + seg.fri_b_duration + '-' + seg.fri_c_duration + ':' + seg.fri_d_duration,seg.fri_spots) === 0 ? 'Booked' :'GHS'+ seg.sec1_rate }}
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
        name: "fridayRates1",
        data(){
            return{
                total : 0
            }
        }
    }
</script>

<style scoped>

</style>