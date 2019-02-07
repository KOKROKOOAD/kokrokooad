<template>
    <div class="page-wrapper">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h4>Transaction history</h4>
                            <!--<span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>-->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-header-breadcrumb">
                        <!--<ul class="breadcrumb-title">-->
                            <!--<li class="breadcrumb-item">-->
                                <!--<a href="index.html"> <i class="feather icon-home"></i> </a>-->
                            <!--</li>-->
                            <!--<li class="breadcrumb-item"><a href="#!">Bootstrap Table</a>-->
                            <!--</li>-->
                            <!--<li class="breadcrumb-item"><a href="#!">Styling Table</a>-->
                            <!--</li>-->
                        <!--</ul>-->
                    </div>
                </div>
            </div>
        </div>
        <!-- Page-header end -->

        <!-- Page-body start -->
        <div class="page-body">
            <!-- Default Styling table start -->
            <div class="card">
                <div class="card-header">
                    <!--<h5>Default Styling</h5>-->
                    <!--<span>use class <code>table table-styling</code> inside table element</span>-->

                </div>
                <div class="card-block table-border-style">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr class="table-primary">
                                <th>#</th>
                                <th>Date</th>
                                <th>Ref.#</th>
                                <th>Service</th>
                                <th>Payment source</th>
                                <th>Delivered Amount(GHC)</th>
                                <th>Total charge(GHC)</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(trans,index) in transactions">
                                <th scope="row">{{index + 1}}.</th>
                                <td>{{trans.created_at}}</td>
                                <td>{{trans.transaction_id}}</td>
                                <td>{{trans.service}}</td>
                                <td>{{trans.payment_source}}</td>
                                <td>{{trans.amount}}</td>
                                <td>{{trans.total_charge}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



</template>

<script>
    export default {
        name: "transactions",
        data(){
            return{
                transactions : [],
            }
        },
        mounted(){
            this.fetchTransactions();
        },
        methods:{
            fetchTransactions(){
                let self = this;

                axios.get('fetch-transac/api').then(function (res) {
                       console.log(res.data);
                        self.transactions = res.data;
                });
            }
        },
        computed:{

        }
    }
</script>

<style scoped>

</style>