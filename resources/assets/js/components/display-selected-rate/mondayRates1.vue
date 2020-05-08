<template>
    <div class="form-radio">
        <div class="radio radio-inline">
            <label>
                <input
                        v-show="checkIfSegmentExist(seg.mon_duration + ':' + seg.mon_b_duration + '-' + seg.mon_c_duration + ':' + seg.mon_d_duration,seg.mon_spots) != 0"
                        type="radio"
                        :id="index"
                        :name="'mon' + (index)"
                        @change="totalBill"
                        v-model="seg_data[index]"
                        :value="{'index' : index,'startDate': startDate + '' + seg.mon_duration + ':' + seg.mon_b_duration  ,'endDate':endDate + '' + seg.mon_c_duration + ':' + seg.mon_d_duration  ,'endTime' :seg.mon_b_duration,durations : segment.sec1 + segment.time1,'rate': seg.sec1_rate,'rate_card':getTitle}"

                />
                <i class="helper"></i>
                {{checkIfSegmentExist(seg.mon_duration + ':' + seg.mon_b_duration + '-' + seg.mon_c_duration + ':' + seg.mon_d_duration,seg.mon_spots) === 0 ? 'Booked' :'GHS'+ seg.sec1_rate }}
            </label>
        </div>
    </div>
</template>

<script>
    import store from "../../vuex/store";

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
        name: "mondayRates1",
        data(){
            return{
                total : 0,

            }
        },
        methods:{

        },
        computed:{

        }
    }
</script>

<style scoped>

</style>