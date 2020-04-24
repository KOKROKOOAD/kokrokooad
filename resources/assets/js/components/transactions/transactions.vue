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
        <div class="card-block">
          <div class="dt-responsive table-responsive">
   <vue-bootstrap4-table :rows="rows" :classes="classes"  :columns="columns" :config="config">
          
    <template slot="selected-rows-info" slot-scope="props">
        Total Number of rows selected : {{props.selectedItemsCount}}
    </template>
           </vue-bootstrap4-table>
            <!-- <table id="laravel_datatable" class="table table-striped table-bordered nowrap">
              <thead>
                <tr class="table-primary">
                  <th>#</th>
                  <th>Transaction ID</th>
                  <th>Transaction Date</th>
                  <th>Service</th>
                  <th>Amount</th>
                  <th>Channel</th>
                  <th>Phone</th>
                  <th>Status</th>
                </tr>
              </thead>
              <!-- <tbody>
                <tr v-for="(trans,index) in transactions" :key="index">
                  <th scope="row">{{index + 1}}.</th>
                  <td>{{trans.updated_at}}</td>
                  <td>{{trans.transaction_id}}</td>
                  <td>{{trans.service}}</td>
                  <td>{{trans.payment_source}}</td>
                  <td>{{trans.amount}}</td>
                  <td>{{trans.phone}}</td>
                  <td>{{ trans.transaction_status }}</td>
                </tr>
              </tbody>
            </table> -->
    </div>
  </div>
  </div>
  </div>
  </div>
   <!-- <div id="app">
         <vue-bootstrap4-table :rows="rows" :columns="columns" :config="config">
        </vue-bootstrap4-table>
        </div> -->
</template>

<script>
  import VueBootstrap4Table from 'vue-bootstrap4-table';

export default {

  name: "transactions",
  components : {VueBootstrap4Table},
  data() {
    return {
      counter : 0,
      rows: [],
            columns: [
                {
                    label: "Transactioin ID",
                    name: "transaction_id",
                   // sort: true,
                },
                {
                    label: "Transaction Date",
                    name: "updated_at",
                    //sort: true,
                },
                {
                    label: "Service",
                    name: "service",
                },
                {
                    label: "Amount(GHS)",
                    name: "amount",
                },
                {
                    label: "Channel",
                    name: "payment_source",
                },
                {
                    label: "Phone",
                    name: "phone",
                },
                {
                    label: "Status",
                    name: "transaction_status",
                },
                
                ],
                
                 classes: {
                    tableWrapper: "outer-table-div-class wrapper-class-two",
                    table : {
                        "table table-striped table-bordered nowrap" : true,
                        "table-bordered" : function(rows) {
                            return true
                        }
                    },
                   
                 },
            config: {
                checkbox_rows: true,
                rows_selectable: true,
                checkbox_rows: false, 
                card_mode : false,

               // card_title: "Transactions",
                 global_search: {
                        placeholder: "Search item",
                        visibility: true,
                        case_sensitive: false,
                        showClearButton: false,
                     //   searchOnPressEnter: false,
                      //  searchDebounceRate: 1000,
                        
                    },
                
                    per_page: 10, // default 10
                    per_page_options:  [10,  20,  30],
                    show_refresh_button: false, // default is also true
                    show_reset_button : false,
                   // per_page_options : false,

                   

            }
    }
  },
  mounted() {
   this.fetchTransactions();
  },
  methods: {
     fetchTransactions(){
            let self = this;
            axios.get('fetch-transac-api').then(function (res) {
              res.data.forEach(function(obj) {
              self.rows.push(obj);
          });
                });
            }

  },
  computed: {}
};
</script>

<style scoped>
.vbt-per-page-dropdown{
     margin-left: 2px !important;

}
</style>