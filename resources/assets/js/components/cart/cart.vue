<template>
    <div class="page-wrapper">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                             <h4> Subscription Cart</h4>
                        </div>

                    </div>
                </div>
                <span class="pull-right">Items : <b class="text-danger">{{ totalItems}} </b></span>

            </div>
        </div>
        <!-- Page-header end -->

        <!-- Page body start -->
        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Shopping cart start -->
                    <div class="card animated fadeIn">
                        <div class="card-header">
<!--                            <h5>Subscription Cart</h5>-->
                            <div class="row">
                                <div class="col-md-5"></div>
                                <div class="col-md-3">
                                    <router-link :to="{name : 'selectMedia'}" class="btn btn-danger" role="button" v-show="msg != ''"><i class="fa fa-shopping-cart"> </i> {{msg}}</router-link>
                                </div>
                                <div class="col-md-4"></div>

                            </div>
                        </div>
                        <div class="card-block">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="wizard animated fadeIn" v-show="table">
                                        <section>
                                            <form class="wizard-form" id="basic-forms" action="#">
                                                <!-- Shopping cart field et start -->
<!--                                                <h3> Your Shopping Cart </h3>-->
                                                <fieldset>
                                                    <table id="e-product-list" class="table table-responsive table-striped dt-responsive nowrap dataTable no-footer dtr-inline cart-page" role="grid" style="width: 100%;">
                                                        <thead>
                                                        <tr>
                                                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 125px;">#</th>
                                                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 125px;">Date</th>
                                                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 125px;">Segment</th>
                                                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 125px;">Title</th>
                                                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 125px;">Media house</th>
                                                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 125px;">Rate card</th>
                                                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 153px;">Rate</th>
                                                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 153px;">Spots</th>
                                                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 100px;">Duration</th>
                                                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 100px;">Amount</th>
                                                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 134px;text-align:center">Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr class="odd" v-for="(sub,index) in subs">
                                                            <td>
                                                                <input type="checkbox">
                                                            </td>
                                                            <td style="font-weight: bolder">
                                                                {{sub.start.substr(0,10) + ' - ' + sub.end.substr(0,10)}}
                                                            </td>
                                                            <td class="pro-list-img" tabindex="0" >
                                                                {{sub.start.substr(11,16) }} <span v-show="sub.start.substr(11,16) != ''">- </span>{{ sub.end.substr(11,16)}}
                                                            </td>
                                                            <td class="pro-name">
                                                                <span>{{sub.title}}</span>
                                                            </td>
                                                            <td class="pro-name">
                                                                <span>{{sub.media_house}}</span>
                                                            </td>
                                                            <td class="pro-name">
                                                                <span>{{sub.rate_card_title}}</span>
                                                            </td>
                                                            <td>{{'GHS' + sub.rate}}</td>

                                                            <td> <input type="text" class="form-control" :value="sub.spots" disabled="disabled"  style="border:none;background:transparent">

                                                               </td>
                                                            <td>
                                                                 {{sub.durations}}
                                                            </td>

                                                            <td> <b class="text-primary">{{'GHS' + sub.spots * sub.rate}}</b></td>
                                                            <td class="action-icon text-center">
                                                                <router-link role="button"  :to="{name:'payment'}"  class="text-muted " data-toggle="tooltip" @click.native="getSubId(sub.subscription_id)"><i class="fa fa-edit"></i></router-link>
                                                                <a href="#!"  class="text-danger" data-toggle="tooltip"><i class="fa fa-trash" @click="deleteSub(sub.subscription_id)"></i></a>

                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </fieldset>
                                                <!-- Shopping cart fieldset end -->
                                            </form>
                                            <div>
                                             <p><strong>Total:</strong>  <span style="padding-left:20px;color:rgb(246, 139, 30);font-weight: bolder;font-size: 20px;">GHS{{ ' ' + total()}}</span></p>
                                                <button  class="btn btn-danger" type="button" @click="getSubsIds(subs)">Checkout</button>

                                            </div>

                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Shopping cart start -->
                </div>
            </div>
        </div>
        <!-- Page body end -->
    </div>
</template>

<script>
    import  store from '../../vuex/store';

    export default {
        name: "cart",
        data(){
            return{
            subs : [],
            media_h : [],
            process : false,
            details : false,
            media_ratecard : '',
                totals : [],
                id : [],
                table : false,
                msg : '',
                total_items : 0,

            }
        },
        mounted(){
          this.fetchSubs();
            store.dispatch('getCheckoutIds',[]);
            store.dispatch('getSubId', '');


        },
        methods: {
            fetchSubs(){
                let self  = this;
                self.process  = true;
                axios.get('fetch-subs/api').then(function (res) {
                    if (res.data.status == 'success'){
                        self.subs  = res.data.subs;
                        //self.media_ratecard = res.data.card_title;
                        self.media_h = res.data.media_house;
                        self.process = false;
                        self.table   = true;
                    }
                    else{
                        self.msg = res.data.status;
                    }
                });
            },
            total(){
                let total = [];
                let t = 0;
                for (let i =0; i < this.subs.length; i++){

                    total.push(parseInt(this.subs[i].rate) *  parseInt(this.subs[i].spots));
                }

                for(let j = 0; j < total.length; j++){
                    t = total[j] + t;
                }
                return   t;
            },
            getSubId(id){
                  store.dispatch('getSubId', id);

            },
            getSubsIds(subs){
                let id = [];
                subs.forEach(function (arrayItem) {
                   let x = arrayItem.subscription_id;
                     id.push(x);
                     store.dispatch('getCheckoutIds',id);
               });
                this.$router.push({
                    name : 'payment'
                });

            },
            deleteSub(id){
                setInterval(this.deleteSubModal(id),100);
                clearInterval(this.deleteSubModal(id));
            },
            deleteSubModal(id){
                let self = this;
                let formData  = new FormData();
                formData.append('id',id);
                sweetAlert({
                    title: 'Warning',
                    text: 'Do you want to remove subscription?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Remove',
                    confirmButtonColor: '#FFB800',
                    closeOnConfirm: true,
                },function(isConfirm){
                    if(isConfirm){
                        self.del = true;

                        axios.post('delete/sub',formData).then(function (res) {
                            if (res.data == 'success'){
                                self.del = false;
                                window.location.reload();
                            }
                        });
                    }
                    else{

                    }

                });
            },

        },
        computed:{
            checkoutIds(){
                return store.getters.checkoutIds;
            },
            totalItems(){
                return this.subs.length;
            }
        },


    }

</script>

<style scoped>



</style>