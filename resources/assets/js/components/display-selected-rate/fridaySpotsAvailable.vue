<template>
    <div>
        <span class="text-danger" v-show="checkIfSegmentExist(seg.fri_duration + ':' + seg.fri_b_duration + '-' + seg.fri_c_duration + ':' + seg.fri_d_duration,seg.fri_spots) == 0 ">{{booked}}</span>
        <select style="width:100px;" class="form-control" v-model="selected_item" @click="selectSpots()"  v-show="checkIfSegmentExist(seg.fri_duration + ':' + seg.fri_b_duration + '-' + seg.fri_c_duration + ':' + seg.fri_d_duration,seg.fri_spots) != 0">
            <option v-show="segment_exist" v-for=" (sp1,opt1) in checkIfSegmentExist(seg.fri_duration + ':' + seg.fri_b_duration + '-'
                 + seg.fri_c_duration + ':' + seg.fri_d_duration,seg.fri_spots)" :key="opt1" :selected="opt1 == 0"  :value="sp1">{{sp1}}</option>

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
            'totalBill'
        ],
        name: "fridaySpotsAvailable",
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
            }
        },
        computed:{

        }

    }
</script>

<style scoped>

</style>