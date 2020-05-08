<template>
    <div>
        <span class="text-danger" style="font-weight: 900" v-show="checkIfSegmentExist(print.sizeAndPosition,print.spots) === 0 ">{{booked}}</span>
        <select class="form-control" style="width:50%" v-show="checkIfSegmentExist(print.sizeAndPosition,print.spots)"  v-model="selected_item" @click="selectSpots()">
            <option v-show="segment_exist" v-for="(sp1,opt1) in checkIfSegmentExist(print.sizeAndPosition,print.spots)" :key="opt1"  :value="sp1">{{sp1}}</option>
        </select>
    </div>
</template>

<script>
    export default {
        props:['print','checkIfSegmentExist','index','booked','segment_exist','totalBill','spots'],
        name: "printSpotsAvailable",
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