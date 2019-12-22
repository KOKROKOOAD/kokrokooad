<template>
    <div class="page-wrapper">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h4>Change Password</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">

                </div>
            </div>
        </div>
        <!-- Page-header end -->

        <!-- Page body start -->
        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Basic Inputs Validation start -->
                    <div class="card">
                        <div class="card-header">
                        </div>

                        <div class="card-block">
<!--                            <form id="main">-->
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Old Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" v-bind:class="{ 'is-invalid':  old_password ==  true }" name="old_password" id="name" v-model="password.old_pass">
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">New Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="email" v-bind:class="{ 'is-invalid':  new_password ==  true }" name="new_password" v-model="password.new_pass">
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" >Confirm New Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" v-bind:class="{ 'is-invalid':  confirm_password ==  true }" id="title" name="confirm_new_password" v-model="password.confirm_new_pass">
                                        <span class="messages"></span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2"></label>
                                    <div class="col-sm-10">
                                        <button  class="btn btn-primary m-b-0" :disabled="disabled" @click="updatePassword"><img src="/images/loading.gif" v-show="loader" style="height: 20px;width: 20px;"> {{label1}}</button>
                                    </div>
                                </div>
<!--                            </form>-->
                        </div>
                    </div>



                </div>
            </div>
        </div>
        <!-- Page body end -->
    </div>
</template>

<script>
    export default {
        name: "change_password",
        data(){
            return{
                password:{
                    old_pass :'',
                    new_pass : '',
                    confirm_new_pass : "",
                },
                process : false,
                label1 : 'Update Password',
                label2 : 'Updating password...',
                disabled : false,
                loader : false,
                test : false,
                info : '',
                process_payment : false,
                show_profile : false,
                test : true,
                old_password :  false,
                confirm_password : false,
                new_password : false,
            }
        },
        methods :{
            updatePassword(){
                if (!this.validateForm()){
                    let self = this;
                    this.label1 = 'Updating password...';
                    let formData = new FormData();
                    formData.append('old_pass',self.password.old_pass);
                    formData.append('new_pass',self.password.new_pass);
                    formData.append('confirm_new_pass',self.password.confirm_new_pass);
                    axios.post('change/password',formData).then(function (res) {
                        if(res.data == 'success'){
                            self.label1 = 'Update Password';
                            self.old_password = false;
                            self.new_password = false;
                            self.confirm_password = false;

                            //self.password = {};
                            new PNotify({
                                title: "Password change",
                                type: "success",
                                text:  'Password successfully updated',
                                desktop: {
                                    desktop: true,
                                    icon: "assets/images/pnotify/success.png"
                                }
                            });
                        }
                        else if (res.data.errors.old_pass){
                            self.old_password = true;
                            self.label1 = 'Update Password';
                            new PNotify({
                                title: "Password change",
                                type: "error",
                                text:  res.data.errors.old_pass,
                                desktop: {
                                    desktop: true,
                                    icon: "assets/images/pnotify/error.png"
                                }
                            });
                        }
                        else if (res.data.errors.confirm_new_pass){
                            self.confirm_password = true;

                            self.label1 = 'Update Password';
                            new PNotify({
                                title: "Password change",
                                type: "error",
                                text:  res.data.errors.confirm_new_pass,
                                desktop: {
                                    desktop: true,
                                    icon: "assets/images/pnotify/error.png"
                                }
                            });
                        }
                        else if (res.data.errors.new_pass){
                            self.new_password = true;

                            self.label1 = 'Update Password';
                            new PNotify({
                                title: "Password change Error",
                                type: "error",
                                text:  res.data.errors.new_pass,
                                desktop: {
                                    desktop: true,
                                    icon: "assets/images/pnotify/error.png"
                                }
                            });
                        }
                    });
                }


            },
            validateForm(){
               if(this.password.old_pass == ''){
                   this.old_password = true;
                   new PNotify({
                       title: "Password change error",
                       type: "error",
                       text:   'The old password field is required',
                       desktop: {
                           desktop: true,
                           icon: "assets/images/pnotify/error.png"
                       }
                   });
                   return true;
               }
               else if(this.password.new_pass == ''){
                   this.new_password = true;
                   new PNotify({
                       title: "Password change error",
                       type: "error",
                       text:   'The new password field is required',
                       desktop: {
                           desktop: true,
                           icon: "assets/images/pnotify/error.png"
                       }
                   });
                   return true;
               }
               else  if(this.password.new_pass !=  this.password.confirm_new_pass){
                   this.confirm_password = true;
                   new PNotify({
                       title: "Password change error",
                       type: "error",
                       text:   'The  new password and  confirm password field does not match',
                       desktop: {
                           desktop: true,
                           icon: "assets/images/pnotify/error.png"
                       }
                   });
                   return true;
               }
               else {
                   if(this.password.new_pass.length < 6){
                       this.new_password = true;
                       new PNotify({
                           title: "Password change error",
                           type: "error",
                           text:   'Password length should be at least 6 characters long',
                           desktop: {
                               desktop: true,
                               icon: "assets/images/pnotify/error.png"
                           }
                       });
                       return true;
                   }
               }
            }
        }
    }
</script>

<style scoped>

</style>