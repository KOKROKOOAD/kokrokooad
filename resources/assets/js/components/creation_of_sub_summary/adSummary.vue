<template>
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
                  <p
                    class
                    v-show="process"
                    style="padding-left:460px !important;position: absolute;z-index: 10"
                  >
                    <img src="/images/loading.gif" style="height: 20px;width: 20px;" />Processing please wait...
                  </p>

                  <div class="col-sm-12">
                    <table class="table table-responsive invoice-table table-borderless">
                      <tbody>
                        <tr>
                          <td>
                            <img src="/images/kokro-yellow.png" alt="Kokrokoo" class="m-b-10" />
                          </td>
                        </tr>
                        <tr>
                          <td>Kokrokoo</td>
                        </tr>
                        <tr>
                          <td>123 6th St. Dansoman SNIIT Flat,Accra Ghana.</td>
                        </tr>
                        <tr>
                          <td>
                            <a href target="_top">
                              <span
                                class="__cf_email__"
                                data-cfemail="3256575f5d72555f535b5e1c515d5f"
                              >suport@kokrokoo.com</span>
                            </a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="col-md-4"></div>
            </div>
            <div class="card-block">
              <div class="row invoive-info">
                <div class="col-md-4 col-xs-12 invoice-client-info">
                  <h6>Subscription Information :</h6>
                  <h6 class="m-0">
                    <b>Media:</b>
                    <span class="text-muted" style="padding-left: 90px;">{{getSelectMedia}}</span>
                  </h6>
                  <p class="m-0 m-t-10">
                    <b>Media House:</b>
                    <span class="text-muted" style="padding-left: 45px;">{{getMediaHouse}}</span>
                  </p>
                  <p class="m-0">
                    <b>Subscription title:</b>
                    <span class="text-muted" style="padding-left: 20px;">{{title}}</span>
                  </p>

                  <!--<p><a href="https://colorlib.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="f397969e9cb38b8a89dd909c9e"><b>File name:</b><span class="text-muted" style="padding-left: 20px;"> {{fileName}}</span></a></p>-->
                </div>
                <div class="col-md-4 col-sm-6">
                  <h6>Order Information :</h6>
                  <table
                    class="table table-responsive invoice-table invoice-order table-borderless"
                  >
                    <tbody>
                      <tr>
                        <th>Date :</th>
                        <td>{{getDate}}</td>
                      </tr>
                      <tr>
                        <th>Status :</th>
                        <td>
                          <span class="label label-warning">Pending</span>
                        </td>
                      </tr>
                      <tr>
                        <!--<th>client id :</th>-->
                        <!--<td>-->
                        <!--#145698-->
                        <!--</td>-->
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="col-md-4 col-sm-6">
                  <!--<h6 class="m-b-20">Invoice Number <span>#12398521473</span></h6>-->
                  <h6 class="text-uppercase text-primary">
                    Total Amount :
                    <span>GHC {{total()}}</span>
                  </h6>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="table-responsive">
                    <table class="table invoice-detail-table">
                      <thead>
                        <tr class="thead-default">
                          <th scope="row">#</th>
                          <th v-show="getSelectMedia !== 'PRINT'">Subscription date&time</th>
                          <th v-show="getSelectMedia !== 'PRINT'">Suscription duration</th>
                          <th v-show="getSelectMedia == 'PRINT'">Date</th>

                          <th>Day</th>

                          <!--                                                <th v-show="getSelectMedia !== 'PRINT'" class="text-center">Segments</th>-->
                          <th v-show="getSelectMedia === 'PRINT'">Size&Position</th>
                          <th>Spots</th>
                          <!--<th v-show="getSelectMedia === 'PRINT'">Quantity</th>-->

                          <th>Amount(GHC)</th>
                          <th>Total(GHC)</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(sched_data,index) in schedAdsData">
                          <th scope="row">{{index + 1}}</th>
                          <td v-show="getSelectMedia == 'PRINT'">{{sched_data.startDate}}</td>
                          <td v-show="getSelectMedia == 'PRINT'">{{segmentDay}}</td>
                          <td v-show="getSelectMedia === 'PRINT'">{{sched_data.advert_size}}</td>
                          <td v-show="getSelectMedia == 'PRINT'">{{sched_data.spot}}</td>

                          <td
                            v-show="getSelectMedia !== 'PRINT'"
                          >{{sched_data.startDate + ' - ' + sched_data.endDate}}</td>
                          <td v-show="getSelectMedia !== 'PRINT'">{{sched_data.durations}}</td>

                          <td v-show="getSelectMedia !== 'PRINT'">{{segmentDay}}</td>

                          <!--                                                <td v-show="getSelectMedia !== 'PRINT'">{{sched_data.startTime}}-{{sched_data.endTime}}</td>-->
                          <!--<td v-show="getSelectMedia !== 'PRINT'"></td>-->
                          <td v-show="getSelectMedia !== 'PRINT'">{{sched_data.spot}}</td>

                          <td>{{sched_data.rate}}</td>
                          <td
                            v-show="getSelectMedia !== 'PRINT'"
                          >{{sched_data.rate * sched_data.spot}}</td>
                          <td
                            v-show="getSelectMedia === 'PRINT'"
                          >{{sched_data.rate * sched_data.spot}}</td>
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
                      <!--                                        <tr>-->
                      <!--                                            <th>Taxes (0%) :</th>-->
                      <!--                                            <td>0.00</td>-->
                      <!--                                        </tr>-->
                      <!--                                        <tr>-->
                      <!--                                            <th>Discount (0%) :</th>-->
                      <!--                                            <td>0.00</td>-->
                      <!--                                        </tr>-->
                      <tr class="text-info">
                        <td>
                          <hr />
                          <h5 class="text-primary">Total :</h5>
                        </td>
                        <td>
                          <hr />
                          <h5 class="text-primary">GHC {{total()}}</h5>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <!--                            <div class="row">-->
              <!--                                <div class="col-sm-12">-->
              <!--                                    <p>By clicking "Continue", you agree to the <a href="" class="text-primary" >Terms</a> and <a href="" class="text-primary"> Privacy Policy</a></p>-->
              <!--                                    <h6><input type="checkbox" v-model="accept"> I understand and have read the disclaimer, please take me to the next step.</h6>-->
              <!--                                    <p> </p>-->
              <!--                                </div>-->
              <!--                            </div>-->
            </div>
          </div>
          <!-- Invoice card end -->
          <div class="row text-center">
            <div class="col-sm-12 invoice-btn-group text-center">
              <router-link
                :to="{name:selectMedia}"
                :disables="back"
                type="button"
                class="btn btn-default waves-effect m-b-10 btn-sm waves-light"
              >Back</router-link>
              <!--                            <button type="button" class="btn btn-primary btn-print-invoice m-b-10 btn-sm waves-effect waves-light m-r-20">Print</button>-->
              <button
                type="button"
                class="btn btn-danger waves-effect m-b-10 btn-sm waves-light animated fadeIn"
                @click="storeSub(title)"
              >Add to cart</button>
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
import store from "../../vuex/store";
import PaymentType from "../payment/paymentType.vue";
export default {
  // props : ['day'],
  components: { PaymentType },
  name: "adSummary",

  data() {
    return {
      sche: true,
      name: "",
      fileNames: "",
      formData: new FormData(),
      image: "",
      selectMedia: "fullcalender",
      accept: "",
      back: false,
      process: false
    };
  },
  mounted() {
    // check if  media type is selected.
    if (this.getSelectMedia == "") {
      this.$router.push({
        name: "selectMedia"
      });
    }
  },
  methods: {
    amount(item) {
      return item.rate;
    },
    sum(prev, next) {
      return prev + next;
    },
    total() {
      let total = [];
      let t = 0;
      for (let i = 0; i < this.schedAdsData.length; i++) {
        total.push(
          parseFloat(this.schedAdsData[i].rate) *
            parseFloat(this.schedAdsData[i].spot)
        );
      }

      for (let j = 0; j < total.length; j++) {
        t = total[j] + t;
      }
      store.dispatch("getTotalBill", t);
      return this.totalBill.toFixed(2);
    },
    storeSub(title) {
      let self = this;
      sweetAlert(
        {
          title: "Warning",
          text: "Do you really want to proceed ?",
          type: "warning",
          showCancelButton: true,
          confirmButtonText: "Yes, Proceed",
          confirmButtonColor: "#FFB800",
          closeOnConfirm: true,

          showLoaderOnConfirm: true
        },
        function(isConfirm) {
          if (isConfirm) {
            self.saveSegmentData(title);
          }
        }
      );
    },
    // create a subscription
    saveSegmentData(title, segments) {
      let self = this;
      let formData = new FormData();
      console.log(self.schedAdsData);
      if (title !== "") {
        formData.append("title", title);
        formData.append("durations", self.schedAdsData[0].durations);
        formData.append(
          "segments",
          JSON.stringify({
            startDate: self.schedAdsData[0].startDate.substr(10, 16),
            endDate: self.schedAdsData[0].endDate.substr(10, 16)
          })
        );
        formData.append("uploadedFile", self.file);
        formData.append("day", self.segmentDay);
        formData.append("card_id", self.rateCardTitleId);
        formData.append("media_house_id", self.mediaHouseIds);
        formData.append("media_house", self.getMediaHouse);
        formData.append("amount", self.total());
        formData.append("scheduledData", JSON.stringify(self.schedAdsData));
        formData.append("startDate", self.schedAdsData[0].startDate);
        formData.append("endDate", self.schedAdsData[0].endDate);

        self.process = true;
        axios.post("ads-store", formData).then(function(response) {
          if (response.data.success === "success") {
            //   store.dispatch('getSubId', response.data.sub_id);
            // store.dispatch('getInvoiceId', response.data.invoice_id);
            self.process = false;
            store.dispatch("getSubData", "");
            store.dispatch("getTotalBill", "");
            store.dispatch("getMediaHouseId", "");
            store.dispatch("getSelSegmentDay", "");
            // store.dispatch('getSegTitle','');
            store.dispatch("getSelectedMedia", "");
            store.dispatch("getFile", "");
            store.dispatch("getRateCardTitle", "");
            store.dispatch("getSelMediaHouse", "");
            store.dispatch("getSegmentTitle", "");

            //self.rateCard = '';
            //  self.mediaHouseIds = '';
            //   self.getDate = null;
            self.$router.push("cart");
          }
          if (response.data === "booked") {
            new PNotify({
              title: "Error Desktop Notice",
              type: "error",
              text: "Segment already booked",
              desktop: {
                desktop: true,
                icon: "assets/images/pnotify/success.png"
              }
            });
          }

          if (response.data === "failed") {
            new PNotify({
              title: "Info Desktop Notice",
              type: "info",
              text: "Kindly select a media type to create your subscription",
              desktop: {
                desktop: true,
                icon: "assets/images/pnotify/success.png"
              }
            });
          }
        });

        $("#mol").modal("hide");
        $("#print").modal("hide");
      }
    }
  },
  computed: {
    getSelectMedia() {
      return store.state.selMedia;
    },
    getMediaHouse() {
      return store.getters.selectedMediaHouse;
    },
    segTitle() {
      return store.getters.segTitle;
    },
    schedAdsData() {
      return store.getters.subData;
    },
    fileName() {
      return store.getters.fileName;
    },
    getDate() {
      let today = new Date().toISOString().slice(0, 10);
      return today;
    },
    title() {
      return store.getters.segTitle;
    },
    // get seleceted media house id
    mediaHouseIds() {
      return store.state.mediaHouseId;
    },
    //get selected rate card title
    rateCard() {
      return store.state.rate_card_title;
    },
    file() {
      return store.getters.file;
    },
    getProcessStatus() {
      return store.state.processing;
    },
    totalBill() {
      return store.getters.totalBill;
    },
    segmentDay() {
      return store.getters.segmentDay;
    },
    rateCardTitleId() {
      return store.state.card_id;
    },
    mediaHouses() {
      return store.state.selMediaHouse;
    }
  }
};
</script>