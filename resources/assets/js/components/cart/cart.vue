<template>
  <div class="page-wrapper">
    <!-- Page-header start -->
    <div class="page-header">
      <div class="row align-items-end">
        <div class="col-lg-8">
          <div class="page-header-title">
            <div class="d-inline">
              <h4>Subscription Cart</h4>
            </div>
          </div>
        </div>
        <!-- <span class="pull-right" v-show="show_cart">
          Items :
          <b class="text-danger">{{ totalItems}}</b>
        </span>-->
      </div>
    </div>
    <!-- Page-header end -->

    <div class="row" v-show="show_process">
      <div class="col-md-4"></div>
      <div class="col-md-3">
        <show-processing class="float-right"></show-processing>
      </div>
      <div class="col-md-4"></div>
    </div>

    <!-- Page body start -->
    <div class="page-body">
      <div class="row" v-show="show_cart">
        <div class="col-sm-12">
          <!-- Shopping cart start -->
          <div class="card animated fadeIn">
            <div class="card-header">
              <!-- <h5>Subscription Cart</h5> -->
              <div class="row">
                <div class="col-md-offset-6 col-md-3">
                  <input
                    type="text"
                    class="form-control"
                    v-model="filter"
                    placeholder="search item"
                    @keyup="search()"
                  />
                </div>
                <div class="col-md-9" v-show="searching">
                  <p>Searching...</p>

                </div>
              </div>
              <div class="row">
                <div class="col-md-5"></div>
                <div class="col-md-4"></div>
              </div>
            </div>
            <div class="card-block">
              <div class="row">
                <div class="col-md-12">
                  <div id="wizard animated fadeIn">
                    <section>
                      <form class="wizard-form" id="basic-forms" action="#">
                        <!-- Shopping cart field et start -->
                        <!--                                                <h3> Your Shopping Cart </h3>-->
                        <fieldset>
                          <table
                            id="e-product-list"
                            class="table table-responsive table-striped dt-responsive nowrap dataTable no-footer dtr-inline cart-page"
                            role="grid"
                            style="width: 100%;"
                          >
                            <thead>
                              <tr>
                                <th
                                  class="sorting_disabled"
                                  rowspan="1"
                                  colspan="1"
                                  style="width: 125px;"
                                >#</th>
                                <th
                                  class="sorting_disabled"
                                  rowspan="1"
                                  colspan="1"
                                  style="width: 125px;"
                                >
                                  <input
                                    type="checkbox"
                                    @click="selectAll(subs.data)"
                                    v-model="allSelected"
                                  />
                                </th>
                                <th
                                  class="sorting_disabled"
                                  rowspan="1"
                                  colspan="1"
                                  style="width: 125px;"
                                >Date</th>
                                <th
                                  class="sorting_disabled"
                                  rowspan="1"
                                  colspan="1"
                                  style="width: 125px;"
                                >Segment</th>
                                <th
                                  class="sorting_disabled"
                                  rowspan="1"
                                  colspan="1"
                                  style="width: 125px;"
                                >Title</th>
                                <th
                                  class="sorting_disabled"
                                  rowspan="1"
                                  colspan="1"
                                  style="width: 125px;"
                                >Media house</th>
                                <th
                                  class="sorting_disabled"
                                  rowspan="1"
                                  colspan="1"
                                  style="width: 125px;"
                                >Rate card</th>
                                <th
                                  class="sorting_disabled"
                                  rowspan="1"
                                  colspan="1"
                                  style="width: 153px;"
                                >Rate</th>
                                <th
                                  class="sorting_disabled"
                                  rowspan="1"
                                  colspan="1"
                                  style="width: 153px;"
                                >Spots</th>
                                <th
                                  class="sorting_disabled"
                                  rowspan="1"
                                  colspan="1"
                                  style="width: 100px;"
                                >Duration</th>
                                <th
                                  class="sorting_disabled"
                                  rowspan="1"
                                  colspan="1"
                                  style="width: 100px;"
                                >Amount</th>
                                <th
                                  class="sorting_disabled"
                                  rowspan="1"
                                  colspan="1"
                                  style="width: 134px;text-align:center"
                                >Action</th>
                              </tr>
                            </thead>
                            <tbody v-if="subs.data != ''">
                              <tr class="odd" v-for="(sub,index) in subs.data" :key="index">
                                <td>{{index + 1}}</td>
                                <td>
                                  <input
                                    type="checkbox"
                                    v-model="selected"
                                    :value="{id : sub.subscription_id, amount :  parseInt(sub.spots) * parseFloat(sub.rate)}"

                                    @change="select()"
                                  />

                                </td>
                                <td
                                  style="font-weight: bolder"
                                >{{sub.start.substr(0,10) + ' - ' + sub.end.substr(0,10)}}</td>
                                <td class="pro-list-img" tabindex="0" v-if="sub.start.substr(11,16) !== ''">
                                  {{sub.start.substr(11,16) }}
<!--                                  <span-->
<!--                                    v-show="sub.start.substr(11,16) != ''"-->
<!--                                  >-</span>-->
                                  {{ sub.end.substr(11,16)}}

                                  <am-pm :time="sub.end.substr(0,1)"></am-pm>
                                </td>
                                <td class="pro-list-img" tabindex="0"  v-else>
                                  {{sub.segments.advert_size}}

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

                                <td>
                                  <input
                                    type="text"
                                    class="form-control"
                                    :value="sub.spots"
                                    disabled="disabled"
                                    style="border:none;background:transparent"
                                  />
                                </td>
                                <td>{{sub.durations}}</td>

                                <td>
                                  <b class="text-primary">{{'GHS' + subBill(sub.rate,sub.spots)}}</b>
                                </td>
                                <td class="action-icon text-center">
                                  <router-link
                                    role="button"
                                    :to="{name:'payment'}"
                                    class="text-muted"
                                    data-toggle="tooltip"
                                    @click.native="getSubId(sub.subscription_id)"
                                  >
                                    <i class="fa fa-edit"></i>
                                  </router-link>
                                  <a href="#!" class="text-danger" data-toggle="tooltip">
                                    <i class="fa fa-trash" @click="deleteSub(sub.subscription_id)"></i>
                                  </a>
                                </td>
                              </tr>
                            </tbody>
                            <tbody v-show="subs.length == 0" class="text-center">
                              <tr class="odd text-center">
                                <td class="pro-name"></td>
                                <td class="pro-name"></td>
                                <td class="pro-name"></td>
                                <td class="pro-name"></td>
                                <td class="pro-name"></td>
                                <td class="pro-name">{{ msg }}</td>
                                <td class="pro-name"></td>
                                <td class="pro-name"></td>
                                <td class="pro-name"></td>
                                <td class="pro-name"></td>
                                <td class="pro-name"></td>
                                <td class="pro-name"></td>
                              </tr>
                            </tbody>
                          </table>
                          <!-- pagination starts here -->
                          <!-- <div class="row">
                          <div class="text-center col-md-12">-->
                          <pagination :subs="subs" @clicked="fetchSubs" :mid-size="9"></pagination>
                          <!-- </div>
                          </div>-->
                        </fieldset>
                        <!-- Shopping cart fieldset end -->
                      </form>
                      <div class="row" style="margin-top: 10px;">
                        <div class="col-md-9">
                          <div class="btn-group">
<!--                            <button-->
<!--                              class="btn btn-secondary"-->
<!--                              type="button"-->
<!--                              :disabled="item_selected == false"-->
<!--                              @click="getSubsIds(subs.data,selected)"-->
<!--                            >Checkout</button>-->
                            <button
                              v-show="selected.length > 1"
                              class="btn btn-danger animated fadeIn"
                              type="button"
                              @click="deleteSubs(selected)"
                            >
                              <i class="fa fa-trash"></i>
                            </button>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <h5 style="margin-top:20px;">
                            <strong>Total:</strong>
                            <span
                              style="color:rgb(246, 139, 30);font-weight: bolder;font-size: 20px;"
                            >GHS{{ ' ' + total_amount.toFixed(2)}}</span>
                          </h5>
                        </div>
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
import store from "../../vuex/store";
import pagination from "../../components/partials/pagination";
import amPm from "../time/amPm";
export default {
  name: "cart",
  components: {
    pagination,amPm
  },
  data() {
    return {
      subs: [],
      media_h: [],
      process: true,
      details: false,
      media_ratecard: "",
      totals: [],
      id: [],
      table: false,
      msg: "",
      total_items: 0,
      show_cart: false,
      show_process: true,
      filter: "",
      selected: [],
      allSelected: false,
      singleSelected:false,
      subIds: [],
      getAmount: [],
      total_amount: 0.0,
      item_selected : false,
      searching : false
    };
  },
  mounted() {
    this.fetchSubs(1);
    store.dispatch("getCheckoutIds", []);
    store.dispatch("getSubId", "");
  },
  methods: {
    fetchSubs(pageNo, filter) {
      let self = this;
      self.process = true;
      if (pageNo) {
        pageNo = pageNo;
      } else {
        pageNo = self.subs.current_page;
      }

      if (filter) {
        this.searching = true
        filter = filter;
      } else {
        filter = "";
        this.searching = false;
      }

      axios
        .get("fetch-subs/api?page=" + pageNo + "&filter=" + filter)
        .then(function(res) {
          if (res.data.subs) {
            self.subs = res.data.subs;
            self.media_h = res.data.media_house;
            self.process = false;
            self.table = true;
            self.show_process = false;
            self.show_cart = true;
            self.searching = false;

          } else {
            self.subs = [];
            self.msg = res.data.msg;
            self.searching = false;
            self.show_process = false;
            self.show_cart = true;

          }
        });
    },
    search() {
      this.fetchSubs(1, this.filter);
    },
    total() {
      let total = [];
      let t = 0;
      for (let i = 0; i < this.subs.length; i++) {
        total.push(
          parseFloat(this.subs.data[i].rate) *
            parseFloat(this.subs.data[i].spots)
        );
      }

      for (let j = 0; j < total.length; j++) {
        t = total[j] + t;
      }
      return t.toFixed(2);
    },
    getSubId(id) {
      store.dispatch("getSubId", id);
    },
    getSubsIds(subs, selected_items) {
      if (selected_items.length > 0) {
        for(let items in selected_items){
          this.subIds.push(selected_items[items].id);
        }
        store.dispatch("getCheckoutIds", this.subIds);
        this.$router.push({
          name: "payment"
        });
       }
        // else {
      //   subs.forEach(function(arrayItem) {
      //     let x = arrayItem.subscription_id;
      //     id.push(x);
      //     store.dispatch("getCheckoutIds", id);
      //   });
      //   this.$router.push({
      //     name: "payment"
      //   });
      // }
    },
    selectAll(subs) {
      this.allSelected = !this.allSelected;
      this.selected = [];
      let amt = 0;

      if (this.allSelected) {
        this.item_selected = true;
        for (let sub in subs) {
          this.selected.push({id : subs[sub].subscription_id,amount :  parseInt(subs[sub].spots) * parseFloat(subs[sub].rate)});
          amt += parseFloat(subs[sub].rate) * parseInt(subs[sub].spots);
        }
        this.total_amount = amt;
      }
      else{
        this.selected = [];
        this.total_amount = 0.00;

      }
    },
    select: function() {
      let t = 0.00;
      this.item_selected = true;

      this.singleSelected = !this.singleSelected
      if (this.selected.length == this.allSelected.length) {
        this.allSelected = true;
      } else {
        this.allSelected = false;
        for (let i = 0; i < this.selected.length; i++) {
          t = t + parseFloat(this.selected[i].amount);
        }
      }

      this.total_amount = t;
    },

    amounts() {
      for (let i = 0; i < this.getAmount.length; i++) {
        this.total_amount = this.total_amount + parseInt(this.getAmount[i]);
      }
      return this.total_amount.toFixed(2);
    },
    subBill(rate, spot) {
      let total = 0;
      total = parseFloat(rate) * parseFloat(spot);
      return total.toFixed(2);
    },
    deleteSub(id) {
      setInterval(this.deleteSubModal(id), 100);
      clearInterval(this.deleteSubModal(id));
    },
    deleteSubs(selected_items) {
     this.subIds = [];
      for(let items in selected_items){
        this.subIds.push(selected_items[items].id);
      }
      setInterval(this.deleteSubModal(this.subIds), 100);
      clearInterval(this.deleteSubModal(this.subIds));
    },
    deleteSubModal(id) {
      let self = this;
      let formData = new FormData();
      formData.append("id", id);
      sweetAlert(
        {
          title: "Warning",
          text: "Do you want to remove subscription?",
          type: "warning",
          showCancelButton: true,
          confirmButtonText: "Yes, Remove",
          confirmButtonColor: "#FFB800",
          closeOnConfirm: true
        },
        function(isConfirm) {
          if (isConfirm) {
            self.del = true;

            axios.post("delete/sub", formData).then(function(res) {
              if (res.data == "success") {
                self.del = false;
                window.location.reload();
              }
            });
          } else {
          }
        }
      );
    }
  },
  computed: {
    checkoutIds() {
      return store.getters.checkoutIds;
    },
    totalItems() {
      return this.subs.length;
    }
  }
};
</script>

<style scoped>
</style>
