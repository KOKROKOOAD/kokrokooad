<template>
  <div class="row animated fadeIn">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <pre-loader v-show="getProcessStatus"></pre-loader>

      <div class="card" v-show="loading">
        <div class="card-header">
          <input v-show="submit_btn"
                  type="button"
                  role="button"
                  class="btn btn-danger btn-sm pull-right"
                  value="Cancel Payment" @click="cancelPayment"

          />
          <h4 class="card-title">Select payment channel.</h4>



          <hr />

        </div>
        <div class="card-body text-center">
          <!--          displays loader before payment channels are displayed-->
          <p class="animated fadeOut" v-show="loader" ><img src="/images/loading.gif"  style="height: 20px;width: 20px;">Please wait....</p>

          <fieldset class="payment animated fadeIn" style="padding-left: 10px;" v-show="hide_channels">
            <label @click="showPayForm(network.airtel)">
              <input type="radio" name="payment" :value="network.airtel" v-model="selNetworks" />
              <img src="/images/airt-money.png" style="width:100px;height: 60px;" />
            </label>
            <label @click="showPayForm(network.mtn)">
              <input type="radio" name="payment" :value="network.mtn" v-model="selNetworks" />
              <img src="/images/mtn-mo.jpeg" style="width:100px;height: 60px;" />
            </label>

            <label @click="showPayForm(network.vodafone)">
              <input type="radio" name="payment" :value="network.vodafone" v-model="selNetworks" />
              <img src="/images/vod-mo.png" style="width:100px;height: 60px;" />
            </label>

          </fieldset><br>


        </div>
      </div>

      <div v-show="payType" class="card" :class="anim_d" v-if="loading">
        <div class="card-header animated slideInDown">
          <h4 class="card-title text-muted text-small" :class="fColor">{{selPaymentType}}<small class="text-danger pull-right animated fadeIn" style="font-size:13px !important;font-weight:bold;">{{prefix_error}}</small>

          </h4>
          <hr />

        </div>
        <div class="card-body">
          <label v-show="momo" style="color: #0c0c0c">Amount(GHS)</label>
          <div v-show="momo" class="form-group" :class="momo_anim_faIn">
            <input
                    type="text"
                    disabled
                    class="form-control"
                    v-model="amounts"
                    style="background:transparent;font-weight:bolder;color:black"
            />
          </div>
          <div v-show="voda" class="form-group" :class="momo_anim_faIn">
            <input
                    type="text"
                    class="form-control"  :style="border_color"
                    placeholder="Enter voucher code"
                    v-model="network.code"
            />
          </div>
          <div v-show="momo" class="form-group" :class="momo_anim_faIn">
            <input
                    type="text"
                    class="form-control"  :style="border_color"
                    placeholder="Enter mobile number"
                    v-model="network.mobileNumber"
            />
          </div>
          <div v-show="visa" :class="visa_anim_faIn">
            <div class="form-group col-md-7">
              <input type="text" class="form-control" placeholder="Enter card number" />
            </div>

            <div class="form-group col-md-5">
              <input type="date" class="form-control" placeholder="Expires" />
            </div>

            <div class="form-group col-md-7">
              <input type="text" class="form-control" placeholder="Name on card" />
            </div>
            <div class="form-group col-md-5">
              <input type="text" class="form-control" placeholder="CVV Code" />
            </div>
          </div>

          <div class="form-group">
            <!--<input type="button" role="button" :disabled="dis" class="btn btn-default" value="Cancel" @click="cancel()" />-->

            <input
                    type="button"
                    role="button"
                    class="btn btn-primary"
                    value="Submit"
                    @click="payments(network.mobileNumber)" v-show="submit_btn"
            />
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-2"></div>
    <confirm-payment></confirm-payment>
  </div>
</template>


<script>
  import store from "../../vuex/store";
  import confirmPayment from "../payment/confirmPayment";

  export default {
    name: "paymentType",
    components: { confirmPayment },
    data() {
      return {
        payType: false,
        momo: false,
        visa: false,
        anim_d: "animated slideInDown",
        momo_anim_faIn: "animated fadeIn",
        visa_anim_faIn: "animated fadeIn",

        network: {
          mtn: "MTN",
          vodafone: "VODAFONE",
          airtel: "AIRTEL",
          visa: "Credit Card",
          mobileNumber: "",
          code : '',
        },
        selPaymentType: "",
        fColor: "",
        dis: false,
        amount: "",
        formData: new FormData(),
        loading: true,
        amounts: "",
        sub_id: "",
        selNetworks: "",
        process_payment : false,
        disable_payment_btn : false,
        mtn_prefix : ['24','54','55'],
        airt_prefix : ['26','56','27','57'],
        voda_prefix : ['20','50'],
        prefix_error : '',
        border_color : '',
        submit_btn : true,
        voda : false,
        error_msg : '',
        process :  false,
        trans_num : '',
        process_payment : true,
        hide_channels : false,
        loader : false,
      };
    },
    mounted() {
     if(Object.keys(this.checkoutIds).length > 0){
       this.checkout();
     }
     else{
       this.getAmount();
     }
    },
    methods: {
      showPayForm(value) {
        let self = this;
        if (value === 'VODAFONE') {
          this.voda = true;
        } else if (value === 'MTN' || value === 'AIRTEL') {
          this.voda = false;
        }
        this.payType = true;
        if (value === "AIRTEL" || value === "VODAFONE" || value === "MTN") {
          this.selPaymentType = value;
          this.momo = true;
          // this.visa_anim_faIn = 'animated fadeOut';
          this.visa = false;
          this.checkSel();
        } else {
          this.selPaymentType = value;

          this.visa = true;
          //  this.momo_anim_faIn = 'animated fadeOut';
          this.momo = false;

        }

      },
      checkSel() {
        if (this.selPaymentType === "MTN") {
          this.fColor = "mtn";
        } else if (this.selPaymentType === "AIRTEL") {
          this.fColor = "airtel";
        } else if (this.selPaymentType === "VODAFONE") {
          this.fColor = "voda";
        }
        //                if(this.selPaymentType === 'Credit Card'){
        //                    this.fColor = 'dash-credit';
        //                }
        else {
          this.fColor = "";
        }
      },

      makePayment(number) {
        let self = this;
        self.loader = true;
        let formData = new FormData();
        formData.append("phone", self.network.mobileNumber);
        formData.append("voucher_code", self.network.code);
        formData.append("amount", self.amounts);
        formData.append("payby", self.selNetworks);
        formData.append("subscription_id", self.subId);

        axios
                .post("api-purchasesubs", formData)
                .then(function(res) {

                  if (res.data.success === "success") {
                    self.process_payment = false;
                    store.dispatch('getSubId', '');
                    store.dispatch('getSelMediaHouse', '');
                    store.dispatch('getInvoiceId', '');
                    store.dispatch(' getMediaHouseId', '');

                    self.submit_btn = true;
                    self.loader = false;

                    self.$router.push("payment-success");
                  }
                    else if(res.data.errors){
                      console.log(res.data.errors);
                    }
                   else {

                    new PNotify({
                      title: "Payment Error Notice",
                      type: "error",
                      text: "Transaction failed please try again.",
                      desktop: {
                        desktop: true,
                        icon: "assets/images/pnotify/error.png"
                      }
                    });
                    self.process_payment = false;
                    self.disable_payment_btn = false;
                    self.submit_btn = true;

                  }
                })
                .catch(function(error) {
                  if (error) {
                    console.log(error);
                  }
                });
      },
      getAmount(){

        let self = this;
        axios.get('api-payment/amount',{params : { 'id': self.subId}}).then(function (res) {
          if (res.data.status == 'success'){
            self.loader = false;
            self.amounts =  parseInt(res.data.spots) * parseInt(res.data.rate);
            self.hide_channels =  true;
          }
          else{
            self.$router.push({
             // name : "cart"
            });

          }
        });
      },

      checkout(){
        let self = this;
        axios.get('api-payment/amount',{params : { 'id': self.checkoutIds}}).then(function (res) {
          if (res.data.status == 'success'){
            console.log(res.data.payment);
            self.loader = false;
           self.amounts =  self.total(res.data.payment);
            self.hide_channels =  true;
          }
          else{
            self.$router.push({
              // name : "cart"
            });

          }
        });
      },
      total(subs){
        let total = [];
        let t = 0;
        for (let i =0; i < subs.length; i++){

          total.push(parseInt(subs[i].rate) *  parseInt(subs[i].spots));
        }

        for(let j = 0; j < total.length; j++){
          t = total[j] + t;
        }
        return   t;
      },
      payments(number) {
        let self = this;
        self.validatePaymentNumber(number);
      },

      cancel() {
        sweetAlert(
                {
                  title: "Warning",
                  text: "Do you want to cancel this transaction?",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonText: "Yes, Remove",
                  confirmButtonColor: "#E44032",
                  closeOnConfirm: true,
                  showLoaderOnConfirm: true
                },
                function() {
                  //  self.makePayment();
                  //  window.location.replace("http://localhost:8000/user-account/create-subscription");
                }
        );
      },
      cancelPayment(){
        let self = this;
        sweetAlert(
                {
                  title: "Warning",
                  text: "Your subscription will not be approved",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonText: "Yes, Got it",
                  confirmButtonColor: "#E80000",
                  closeOnConfirm: true,
                  showLoaderOnConfirm: true
                },
                function(isConfirm) {
                  if (isConfirm){
                    self.$router.go(-1);
                  }else {

                  }
                }
        );
      },

      // validate phone number
      validatePaymentNumber(number) {
        let self = this;
        if (this.validateNumber(number)) {
          this.trans_num = self.validateprefix(number);
          // if (this.network.vodafone === 'VODAFONE' &&  self.validateVoucherCode(self.network.code) === true) {
             this.process = true;
          // }

        }

        if(this.process){
          self.prefix_error = '';
          sweetAlert(
                  {
                     title: "Confirm Payment.",
                     text: 'A message will be sent to transaction phone. kindly follow the instructions to complete transaction',
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                    confirmButtonColor: "#E44032",
                    closeOnConfirm: true,
                    showLoaderOnConfirm: true
                  },
                  function () {
                    self.submit_btn = false;
                    self.process_payment = true;
                    self.disable_payment_btn = true;
                    self.makePayment(self.trans_num);
                    // window.location.replace("http://localhost:8000/user-account/create-subscription");
                  }
          );
        }

      },
      validateprefix(number){
        if(number.substr(0,1) == '0' && number.length == '10'){
          let t_number  = number.replace('0','233');
          return t_number;
        }
      },
      validateNumber(number){
        if (number == "") {
          this.error_msg = 'Please enter a valid phone number.';
          this.invalidNumberMessage();
        }
        if(number.substr(0,1) == '0' && number.length == '10'){
          return true;
        }else if(number.substr(0,3) == '233' && number.length == '12'){
          return true;
        }else{
          // this.error_msg = 'Please enter a valid phone number.';
          // this.invalidNumberMessage();
          return false;
        }
      },
      invalidNumberMessage() {
        new PNotify({
          title: "Error",
          type: "error",
          text:  this.error_msg,
          desktop: {
            desktop: true,
            icon: "assets/images/pnotify/error.png"
          }
        });
      },

      validateVoucherCode(voucherCode) {
        if (voucherCode === ''){
          this.error_msg = 'Please enter a valid voucher code.';
          this.invalidNumberMessage();
          return false;
        }
        if (isNaN(voucherCode) ) {
          return false;
        } else {
          return true;
        }
      }
    },
    computed: {
      getCreatedAd() {
        return store.state.schedule_ad_data;
      },
      getSelMedia() {
        return store.state.media;
      },
      show_scheds() {
        return store.state.show_sched;
      },
      getSelMediaId() {
        return store.state.selMediaId;
      },
      getFile() {
        return store.state.file;
      },
      getShowPayment() {
        return store.state.showPayment;
      },
      shows_sched() {
        return store.state.show_sched;
      },
      getProcessStatus() {
        return store.state.processing;
      },
      mediaHouseId() {
        return store.state.mediaHouseId;
      },
      subId() {
        return store.getters.subId;
      },
      invoiceId() {
        return store.getters.invoiceId;
      },
      segTitle() {
        return store.getters.segTitle;
      },
      checkoutIds(){
        return store.getters.checkoutIds;
      }
      // totalBill() {
      //   return store.getters.totalBill;
      // }
    }
  };
</script>