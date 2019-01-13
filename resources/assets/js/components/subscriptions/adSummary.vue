<template>
    <!--<div class="content" style="margin: 30px;">-->
        <!--<payment-type v-show="getShowPayment"></payment-type>-->
    <!--<div class="row">-->
        <!--<div class="col-md-12" v-if="shows_sched"  v-show="getSelMedia.toLowerCase() !== 'print' ">-->
            <!--<div  class="card " >-->
                <!--&lt;!&ndash;<button type="button" @click="hideSched()" class="close btn btn-default"   aria-label="Close"><span class="badge badge-danger" style="color:#ffffff;background:#9e1317 !important;"><b>&times;</b></span></button>&ndash;&gt;-->


                <!--<div class="card-header">-->
                <!--<h4 class="card-title"> Ad schedule summary</h4>-->
                <!--</div>-->
                <!--<div class="card-body animated slideInUp">-->
                    <!--<div class="content table-responsive table-full-width ">-->
                        <!--<table class="table table-striped">-->
                            <!--<thead class=" text-primary">-->
                            <!--<th class="sch-ad-th">Media House</th>-->
                            <!--<th class="sch-ad-th">Schd. Date</th>-->
                            <!--<th class="sch-ad-th">File</th>-->
                            <!--<th class="sch-ad-th">Segments</th>-->
                            <!--<th class="sch-ad-th">Durations</th>-->
                            <!--<th class="sch-ad-th">Spots</th>-->
                            <!--<th class="sch-ad-th">Rate</th>-->
                            <!--<th class="sch-ad-th">Total</th>-->
                            <!--<th class="sch-ad-th">Action</th>-->
                            <!--</thead>-->
                            <!--<tbody>-->

                            <!--<tr v-for="(seg,index) in getCreatedAd" :key="index" style="text-align: center;">-->
                                <!--<td>{{seg.media}}</td>-->
                                <!--<td>-->

                                    <!--<span>{{seg.date}}</span>-->
                                <!--</td>-->
                                <!--<td>{{seg.file}}</td>-->
                                <!--<td>{{seg.segment}}</td>-->
                                <!--<td>{{seg.sec}} sec</td>-->
                                <!--<td>{{parseInt(seg.spot)}}</td>-->
                                <!--<td>GHC{{seg.rate}}</td>-->
                                <!--<td>GHC{{ parseInt(seg.spot) * parseInt(seg.rate)}}</td>-->
                                <!--<td> <button @click="remSchedule(index)" style="border: none;" class="btn btn-default btn-xs text-danger">x</button></td>-->

                            <!--</tr>-->
                            <!--</tbody>-->
                        <!--</table>-->
                        <!--<div class="text-center">-->
                            <!--<span class="text-center" v-show="getCreatedAd.length === 0">No scheduled ads</span>-->

                        <!--</div>-->
                        <!--<button class="btn btn-primary" @click="backToAdCreate()">back</button>-->
                        <!--<button :disabled="getCreatedAd.length === 0" class="btn btn-primary" @click="upload()">Schedule</button>-->

                    <!--</div>-->
                <!--</div>-->
            <!--</div>-->
             <!--&lt;!&ndash;<input type="file"   v-on:change=" onFileChange($event)"/>&ndash;&gt;-->

        <!--</div>-->
    <!--</div>-->
    <!--</div>-->

    <div class="page-wrapper">

        <!-- Page body start -->
        <div class="page-body">
            <!-- Container-fluid starts -->
            <div class="container">
                <!-- Main content starts -->
                <div>
                    <!-- Invoice card start -->
                    <div class="card">
                        <div class="row invoice-contact">
                            <div class="col-md-8">
                                <div class="invoice-box row">
                                    <div class="col-sm-12">
                                        <table class="table table-responsive invoice-table table-borderless">
                                            <tbody>
                                            <tr>
                                                <td><img src="https://colorlib.com//polygon/adminty/files/assets/images/logo-blue.png" class="m-b-10" alt=""></td>
                                            </tr>
                                            <tr>
                                                <td>Compney Name</td>
                                            </tr>
                                            <tr>
                                                <td>123 6th St. Melbourne, FL 32904 West Chicago, IL 60185</td>
                                            </tr>
                                            <tr>
                                                <td><a href="https://colorlib.com/cdn-cgi/l/email-protection#fe9a9b9391be99939f9792d09d9193" target="_top"><span class="__cf_email__" data-cfemail="3256575f5d72555f535b5e1c515d5f">[email&#160;protected]</span></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>+91 919-91-91-919</td>
                                            </tr>
                                            <!-- <tr>
                            <td><a href="#" target="_blank">www.demo.com</a>
                            </td>
                        </tr> -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                            </div>
                        </div>
                        <div class="card-block">
                            <div class="row invoive-info">
                                <div class="col-md-4 col-xs-12 invoice-client-info">
                                    <h6>Client Information :</h6>
                                    <h6 class="m-0">Josephin Villa</h6>
                                    <p class="m-0 m-t-10">123 6th St. Melbourne, FL 32904 West Chicago, IL 60185</p>
                                    <p class="m-0">(1234) - 567891</p>
                                    <p><a href="https://colorlib.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="f397969e9cb38b8a89dd909c9e">[email&#160;protected]</a></p>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <h6>Order Information :</h6>
                                    <table class="table table-responsive invoice-table invoice-order table-borderless">
                                        <tbody>
                                        <tr>
                                            <th>Date :</th>
                                            <td>November 14</td>
                                        </tr>
                                        <tr>
                                            <th>Status :</th>
                                            <td>
                                                <span class="label label-warning">Pending</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Id :</th>
                                            <td>
                                                #145698
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <h6 class="m-b-20">Invoice Number <span>#12398521473</span></h6>
                                    <h6 class="text-uppercase text-primary">Total Due :
                                        <span>$900.00</span>
                                    </h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table class="table  invoice-detail-table">
                                            <thead>
                                            <tr class="thead-default">
                                                <th>Description</th>
                                                <th>Quantity</th>
                                                <th>Amount</th>
                                                <th>Total</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <h6>Logo Design</h6>
                                                    <p>lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt </p>
                                                </td>
                                                <td>6</td>
                                                <td>$200.00</td>
                                                <td>$1200.00</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h6>Logo Design</h6>
                                                    <p>lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt </p>
                                                </td>
                                                <td>7</td>
                                                <td>$100.00</td>
                                                <td>$700.00</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h6>Logo Design</h6>
                                                    <p>lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt </p>
                                                </td>
                                                <td>5</td>
                                                <td>$150.00</td>
                                                <td>$750.00</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-responsive invoice-table invoice-total">
                                        <tbody>
                                        <tr>
                                            <th>Sub Total :</th>
                                            <td>$4725.00</td>
                                        </tr>
                                        <tr>
                                            <th>Taxes (10%) :</th>
                                            <td>$57.00</td>
                                        </tr>
                                        <tr>
                                            <th>Discount (5%) :</th>
                                            <td>$45.00</td>
                                        </tr>
                                        <tr class="text-info">
                                            <td>
                                                <hr/>
                                                <h5 class="text-primary">Total :</h5>
                                            </td>
                                            <td>
                                                <hr/>
                                                <h5 class="text-primary">$4827.00</h5>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <h6>Terms And Condition :</h6>
                                    <p>lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Invoice card end -->
                    <div class="row text-center">
                        <div class="col-sm-12 invoice-btn-group text-center">
                            <button type="button" class="btn btn-primary btn-print-invoice m-b-10 btn-sm waves-effect waves-light m-r-20">Print</button>
                            <button type="button" class="btn btn-danger waves-effect m-b-10 btn-sm waves-light">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container ends -->
        </div>
        <!-- Page body end -->
    </div>


</template>


<script>
    import  store from  '../../vuex/store';
    import PaymentType from "../payment/paymentType.vue";
    export default {
        components: {PaymentType},
        name: "adSummary",

        data(){
            return {
                sche : true,
                name : '',
                fileName : '',
                formData : new FormData(),
                image : '',
            }

        },
        mounted(){

        },
        methods: {
            remSchedule(index){
                let self = this;
                sweetAlert({
                    title: 'Warning',
                    text: 'You are about to remove this ad.Do you want to continue',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Remove',
                    confirmButtonColor: '#FFB800',
                    closeOnConfirm: true,
                    showLoaderOnConfirm: true,
                },function(){
                    self.getCreatedAd.splice(index,1);

                });
            },
            hideSched(){
                this.show_sched = false;
            },
            backToAdCreate(){

                store.dispatch('getWizard',true);
                $('#mol').modal('show');
                store.dispatch('getShowSched',false);
            },
            handleFileUpload() {
                this.fileName =  this.$refs.file.files[0];
               // console.log(this.fileName);
            },

            storeCreatedAds(){

                let self = this;
                self.name = 'Joojo Arthur';
              //  console.log(self.getFileName);

//                formData.append('adData', self.getCreatedAd);
//                formData.append('media_house_id', self.getSelMediaId);
                //formData.append('fileName', this.getFileName.name);
                self.formData.append('data', self.fileName);
                self.formData.append('name', self.name);

                console.log(self.formData);



                axios.post('ads-api/store',self.formData,{headers:{'content-type': 'multipart/form-data'}}).then(function (res) {
                    console.log(res.data);

//                    if (res.data.success === true) {
//                        window.location.replace("http://localhost:8000/user-account/subscriptions");
//                        //  window.location.protocol+"//"+loc.hostname+"/user-account/subscriptions";
//                    }
                }).catch(function (error) {
                    self.allErrors = error.response.data.errors;
                    console.log(self.allErrors);
                    //   self.allerros = error.response.data.errors;
                    //self.success = false;
                });

            },
            onFileChange(e) {
               let files = e.target.files || e.dataTransfer.files;
//                if (!files.length)
//                    return;
//                this.createImage(files[0]);
                this.image = files[0];
            },
            createImage(file) {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    vm.image = e.target.result;
                }
               // reader.rea;
            },
            upload(){
                let self = this;
                store.dispatch('getShowSched',false);
                store.dispatch('getShowPayment', true);
//                self.formData.append('uploadedFile',self.getFile);
//                self.formData.append('created_ad_data',JSON.stringify(self.getCreatedAd));
//                self.formData.append('media_house_id', self.getSelMediaId);
//                axios.post('ads-api/store',self.formData).then(response => {
//                    console.log(response.data);
//                   // window.location.replace("http://localhost:8000/user-account/subscriptions");
//                });
            }
        },
        computed:{

            getCreatedAd() {
                return store.state.schedule_ad_data;
            },
            getSelMedia(){
                return  store.state.media;
            },
            show_scheds(){
                return store.state.show_sched;
            },
            getSelMediaId(){
                return store.state.selMediaId;
            },
            getFile(){
                return store.state.file;
            },
            getShowPayment(){
               return  store.state.showPayment;
            },
            shows_sched(){
                return store.state.show_sched;
            }
        },

    }

</script>