<template>
    <div>
        <span class="text-danger" v-show="checkIfSegmentExist(seg.sun_duration + ':' + seg.sun_b_duration + '-' + seg.sun_c_duration + ':' + seg.sun_d_duration,seg.sun_spots) == 0 ">{{booked}}</span>
        <select class="form-control" name="select" v-model="selected_item"   @click="selectSpots()"

                v-show="checkIfSegmentExist(seg.sun_duration + ':' + seg.sun_b_duration + '-' + seg.sun_c_duration + ':' + seg.sun_d_duration,seg.sun_spots) != 0">
            <option
                    v-for=" (s,sun) in checkIfSegmentExist(seg.sun_duration + ':' + seg.sun_b_duration + '-' + seg.sun_c_duration + ':' + seg.sun_d_duration,seg.sun_spots)"
                    v-show="segment_exist"
                    :key="sun"
                    :value="s"
            >{{s}}</option>
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
        ],        name: "sundaySpotsAvailable",
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