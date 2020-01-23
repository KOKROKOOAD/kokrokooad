<template>
    
</template>

<script>
    export default {
        props : ['message'],
        name: "paymentSuccessFeedback",
        data(){

        },
        mounted() {
            this.success(this.message);
        },
        methods :{
            successMessage(message){
                    console.log('hello Jooojo');
                    new PNotify({
                        title: "Payment successful",
                        type: "info",
                        text:  message,
                        desktop: {
                            desktop: true,
                            icon: "assets/images/pnotify/info.png"
                        }
                    });


            }
        }
    }
</script>

<style scoped>

</style>