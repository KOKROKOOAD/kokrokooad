<template>
    <div class="page-wrapper">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h4>Media house</h4>
                            <span>What type of rate card do you want to <code>View</code>, Select a media house.</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                </div>
            </div>
        </div>
        <!-- Page-header end -->
        <div v-show="process" class="default-grid row">
            <show-processing></show-processing>
        </div>

        <!-- Page body start -->
        <div class="page-body" v-show="view">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Default select start -->
                    <div class="card">

                        <div class="card-block animated fadeIn">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xl-12 m-b-30">
                                    <h4 class="sub-title"> Select media  house</h4>
                                    <p class="text-danger" v-show="mediaTypes.length == 0">No rate cards found for selected media house</p>
                                    <select v-show="mediaTypes.length > 0 " name="select" class="form-control form-control-primary"  v-model="mediaHouse" @click="getSelectedMedia">
                                        <option disabled value="" selected>Select a media house</option>
                                        <option v-for="(mTypes,index) in mediaTypes" :value="mTypes.client_id" :key="index">{{mTypes.media_house}}</option>

                                    </select>
                                </div>
                                <div class="animated fadeIn" style="padding-left: 16px;">
                                    <router-link :to="{name : 'select-mtype'}" class="btn btn-mat btn-info">Back</router-link>
                                </div>
                                <div class="animated fadeIn" style="padding-left: 16px;" v-show="  getSelectMedia !== ''">
                                    <router-link :to="{name : 'view-ratecards'}"  role="button" type="button" class="btn btn-mat btn-inverse">Next</router-link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import  store from '../../vuex/store';

    export default {
        name: "selectMediaHouse",
        data(){
            return{
                mediaHouse   : '',
                mediaTypes : [],
                process : true,
                view : false,
                test : 'test'
            }
        },
        mounted(){
            this.fetchMediaHouses();
            store.dispatch('getMediaHouseId','');

            if (this.media == ''){
                this.$router.push({
                    name : 'select-mtype'
                });
            }

        },
        methods: {
            fetchMediaHouses(){
                let self = this;
                axios.get('fetchmediahouses/api/'+ self.media).then(function (res) {
                    self.process = false;
                    self.view = true;
                    self.mediaTypes = res.data;

                }).catch(function (error) {

                });
            },
            getSelectedMedia(){
                store.dispatch('getMediaHouseId',this.mediaHouse);
            },


        },
        computed:{

            getSelectMedia(){
                return store.getters.mediaHouseId;
            },
            media() {
                return store.state.selMedia;
            },

        },

    }



</script>

<style scoped>



</style>