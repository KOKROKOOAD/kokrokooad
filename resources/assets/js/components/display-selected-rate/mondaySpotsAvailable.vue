<template>
    <div>
            <span class="text-danger" v-show="checkIfSegmentExist(seg.mon_duration + ':' + seg.mon_b_duration + '-' + seg.mon_c_duration + ':' + seg.mon_d_duration,seg.mon_spots) == 0 ">{{booked}}</span>
            <select style="width:100px;" class="form-control" v-model="selected_item"  @click="selectSpots" v-show="checkIfSegmentExist(seg.mon_duration + ':' + seg.mon_b_duration + '-' + seg.mon_c_duration + ':' + seg.mon_d_duration,seg.mon_spots) != 0">
                <option v-show="segment_exist" v-for=" (sp1,ind) in checkIfSegmentExist(seg.mon_duration + ':' + seg.mon_b_duration + '-'
                 + seg.mon_c_duration + ':' + seg.mon_d_duration,seg.mon_spots)" :key="ind"   :value="sp1">{{sp1}}</option>

            </select>
    </div>
</template>

<script>
    export default {
        props : ['segment',
            'getFileDurations',
            'segmentDay','seg',
            'checkIfSegmentExist',
            'booked',
            'segment_exist',
            'index',
            'spots',
            'seg',
            'totalBill',
            'spots_booked',
            'filterBill'
        ],
        name: "mondaySpotsAvailable",
        mounted() {
            this.spots[this.index] = this.selected_item;
        },
        data(){
            return{
               selected : true,
                spot : '',
                selected_item : 1,
                total : 0
            }
        },
        methods:{
         checkSelect(a){
             alert(a);
         },
            selectSpots(){
             this.spots[this.index] = this.selected_item;
             this.totalBill();
            },
            testState(index){
             if(index == 0){
                 console.log('its true '+ index);
                 return true;
             }
             return false;
            }
        },
        computed:{

        }

    }
</script>

<style scoped>

</style>