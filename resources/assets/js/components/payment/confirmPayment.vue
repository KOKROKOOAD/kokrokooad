<template>
      <div class="modal fade bs-examplemodal-lg" id="confirmPayment" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >

        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                
                <div class="modal-header" style=" background: #0f3e68 !important;color: #ffffff !important;">
                    <h4 class="modal-title">Confirm Payment</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row text-center">
                                <p>
                        <strong>{{'GHC ' + totalBill.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,')}}</strong> will be deducted from your wallet. Ensure you have enough balance in your account before proceeding with payment.'

                                </p>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="ussd_close_modal" type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button  id="ussd_submit" class="btn btn-primary">Confirm </button>
                </div>
            </div>
        </div>
    </div>


 
</template>


<script>
    import  store from  '../../vuex/store';
    export default {
        name: "confirmPayment",
        data(){
            return {
         
            }
        },
        mounted(){
           
        },
        methods: {
           
        
        },
        computed:{
            
            totalBill(){
                return store.getters.totalBill;
            },

        },

    }




</script>