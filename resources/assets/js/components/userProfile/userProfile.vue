<template>
  <div class="page-wrapper">
    <!-- Page-header start -->
    <div class="page-header">
      <div class="row align-items-end">
        <div class="col-lg-8">
          <div class="page-header-title">
            <div class="d-inline">
              <h4>Edit Profile</h4>

            </div>
          </div>
        </div>
        <div class="col-lg-4"></div>
      </div>
    </div>
    <!-- Page-header end -->
    <div class="row" v-show="process">
      <div class="col-md-4"></div>
      <div class="col-md-3">
                          <show-processing class="float-right"></show-processing>
      </div>
      <div class="col-md-4"></div>
    </div>
    <!-- Page body start -->
    <div class="page-body">
      <div class="row">
        <div class="col-sm-12">
          <!-- Basic Inputs Validation start -->
          <div class="card" v-show="show_profile">
            <div class="card-header"></div>

            <div class="card-block">
              <!--                            <form id="main">-->
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                  <input
                    type="text"
                    class="form-control"
                    v-bind:class="{'is-invalid' : errors.name}"
                    name="name"
                    id="name"
                    v-model="user.name"
                  />
                  <span class="messages"></span>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input
                    type="text"
                    class="form-control"
                    v-bind:class="{'is-invalid' : errors.email}"
                    id="email"
                    name="email"
                    v-model="user.email"
                  />
                  <span
                    v-for="error in errors.email"
                    class="messages text-danger animated fadeIn"
                  >{{error}}</span>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Job Title</label>
                <div class="col-sm-10">
                  <input
                    type="text"
                    class="form-control"
                    id="title"
                    v-bind:class="{'is-invalid' : errors.title}"
                    name="title"
                    v-model="user.title"
                  />
                  <span
                    v-for="error in errors.title"
                    class="messages text-danger animated fadeIn"
                  >{{error}}</span>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Phone1</label>
                <div class="col-sm-10">
                  <input
                    type="text"
                    class="form-control"
                    id="phone1"
                    v-bind:class="{'is-invalid' : errors.phone1}"
                    name="phone1"
                    v-model="user.phone1"
                  />
                  <span
                    v-for="error in errors.phone1"
                    class="messages text-danger animated fadeIn"
                  >{{error}}</span>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Phone2</label>
                <div class="col-sm-10">
                  <input
                    type="text"
                    class="form-control"
                    id="phone2"
                    name="phone2"
                    v-bind:class="{'is-invalid' : errors.phone2}"
                    v-model="user.profile.phone2"
                  />
                  <span
                    v-for="error in errors.phone2"
                    class="messages text-danger animated fadeIn"
                  >{{error}}</span>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                  <textarea
                    type="text"
                    class="form-control"
                    id="address"
                    v-bind:class="{'is-invalid' : errors.address}"
                    name="address"
                    v-model="user.profile.address"
                  ></textarea>
                  <span
                    v-for="error in errors.address"
                    class="messages text-danger animated fadeIn"
                  >{{error}}</span>
                </div>
              </div>
              <!-- <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Industry type</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="industry_type" name="industry_type" v-bind:class="{'is-invalid' : errors.industry_type}" v-model="user.industry_type">
                                    <input type="hidden" class="form-control" id="c_name" name="c_name"   v-model="user.company_name">
                                    <span v-for="error in errors.industry_type" class="messages text-danger animated fadeIn">{{error}}</span>
                                </div>
              </div>-->
              <div class="form-group row" v-if="user.profile.company_name == ''">
                <label class="col-sm-2 col-form-label">Company name</label>
                <div class="col-sm-10">
                  <input
                    type="text"
                    class="form-control"
                    id="comp_name"
                    name="media"
                    v-bind:class="{'is-invalid' : errors.company_name}"
                    v-model="user.company_name"
                  />
                  <span
                    v-for="error in errors.company_name"
                    class="messages text-danger animated fadeIn"
                  >{{error}}</span>
                </div>
              </div>
              <div class="form-group row" v-if="user.profile.website == ''">
                <label class="col-sm-2 col-form-label">Company website</label>
                <div class="col-sm-10">
                  <input
                    type="text"
                    class="form-control"
                    id="website"
                    name="media"
                    v-model="user.profile.website"
                    v-bind:class="{'is-invalid' : errors.website}"
                  />
                  <span
                    v-for="error in errors.website"
                    class="messages text-danger animated fadeIn"
                  >{{error}}</span>
                </div>
              </div>
              <div class="form-group row" v-if="user.profile.company_profile == ''">
                <label class="col-sm-2 col-form-label">Company profile</label>
                <div class="col-sm-10">
                  <textarea
                    type="text"
                    class="form-control"
                    name="c_profile"
                    v-model="user.profile.company_profile"
                    v-bind:class="{'is-invalid' : errors.company_profile}"
                  ></textarea>
                  <span
                    v-for="error in errors.company_profile"
                    class="messages text-danger animated fadeIn"
                  >{{error}}</span>
                </div>
              </div>
              <div class="form-group row" v-if="user.profile.policies == ''">
                <label class="col-sm-2 col-form-label">Policies</label>
                <div class="col-sm-10">
                  <textarea
                    type="text"
                    class="form-control"
                    name="policies"
                    v-model="user.profile.policies"
                    v-bind:class="{'is-invalid' : errors.policies}"
                  ></textarea>
                  <span
                    v-for="error in errors.policies"
                    class="messages text-danger animated fadeIn"
                  >{{error}}</span>
                </div>
              </div>
              <div
                class="form-group row"
                v-if="user.profile.file_name == ''"
                v-bind:class="{'is-invalid' : errors.logo}"
              >
                <label class="col-sm-2 col-form-label">Logo</label>
                <div class="col-sm-10">
                  <input type="file" class="form-control" name="media" accept="image/*" />
                  <span
                    v-for="error in errors.logo"
                    class="messages text-danger animated fadeIn"
                  >{{error}}</span>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2"></label>
                <div class="col-sm-10">
                  <button class="btn btn-primary m-b-0" :disabled="disabled" @click="updateProfile">
                    <img
                      src="/images/loading.gif"
                      v-show="loader"
                      style="height: 20px;width: 20px;"
                    />
                    {{label1}}
                  </button>
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
  name: "userProfile",
  props: ["id"],
  data() {
    return {
      user: [],
      process: false,
      label1: "Update Profile",
      label2: "Updating profile...",
      disabled: false,
      loader: false,
      test: false,
      info: "",
      process_payment: false,
      show_profile: false,
      profile: {
        name: ""
      },
      errors: ""
    };
  },
  mounted() {
    this.showUserProfile();
  },
  methods: {
    updateProfile(id) {
      let self = this;
      self.disabled = true;
      self.loader = true;
    //  if ($("#c_name").val() == "") {

        let formData = new FormData();
        formData.append("name", $("#name").val());
        formData.append("email", $("#email").val());
        formData.append("title", $("#title").val());
        formData.append("phone1", $("#phone1").val());
        formData.append("phone2", $("#phone2").val());
        formData.append("industry_type", $("#industry_type").val());
        formData.append("address", $("#address").val());
        axios
          .post("profile/personal/update", formData)
          .then(function(res) {
            if (res.data == "success") {
              //  location.reload();
              self.showUserProfile();

              new PNotify({
                title: "Success",
                type: "success",
                text: "User profile successfully updated",
                desktop: {
                  desktop: true,
                  icon: "assets/images/pnotify/success.png"
                }
              });
            } else if (res.data.errors) {
              // console.log(res.data.errors);
              self.errors = res.data.errors;
              self.disabled = false;
              self.loader = false;

              new PNotify({
                title: "Validation Error",
                type: "error",
                text: "One or more fields has errors",
                desktop: {
                  desktop: true,
                  icon: "assets/images/pnotify/error.png"
                }
              });
              // console.log(self.errors.email[0]);
            }
          })
          .catch(function(error) {});
    //  }
    },
    showUserProfile() {
    //  this.process_payment = true;
      let self = this;
      self.process = true
      let formData = new FormData();
      axios
        .get("user/profile")
        .then(function(res) {
          if (res.data) {
            self.user = res.data;
            self.process = false;
            self.show_profile = true;
            self.disabled = false;
            self.loader = false;
          }
        })
        .catch(function(error) {});
    },
    checkform(form) {
      // get all the inputs within the submitted form
      let inputs = form.getElementsByTagName("input");
      for (let i = 0; i < inputs.length; i++) {
        // only validate the inputs that have the required attribute
        if (inputs[i].hasAttribute("required")) {
          if (inputs[i].value == "") {
            // found an empty field that is required
            return false;
          }
        }
      }
      return true;
    },
    validateForm() {
      var x = document.forms["main"].value;
      if (x == "") {
        alert("Name must be filled out");
        return false;
      }
    }
  },
  computed: {}
};
</script>

<style scoped>
</style>