<template>
    <!-- Content -->
    <div class="container">
        <!--Grid row-->
        <div class="row mt-5">
            <!--Grid column-->
            <div class="col-md-6 mb-5 mt-md-0 mt-5 white-text text-center text-md-left">
                <h1 class="h1-responsive font-weight-bold wow fadeInLeft" data-wow-delay="0.3s">Admin Sign In! </h1>
                <hr class="hr-light wow fadeInLeft" data-wow-delay="0.3s">
                <h6 class="mb-3 wow fadeInLeft" data-wow-delay="0.3s">Admin please sign in with the email and password given, you are
                    advised to change the password afterwards.</h6>
            </div>
            <!--Grid column-->
            <!--Grid column-->
            <div class="col-md-6 col-xl-5 mb-4">
                <!--Form-->
                <div class="card wow fadeInRight" data-wow-delay="0.3s">
                    <div class="card-body">
                       <form @submit.prevent="login" method="post">
                           <!--Header-->
                           <div class="text-center">
                               <h3 class="white-text">
                                   <i class="fa fa-user white-text"></i> Sign In:</h3>
                               <hr class="hr-light">
                           </div>
                           <!--Body-->
                           <div class="md-form">
                               <i class="fa fa-envelope prefix white-text active"></i>
                               <input type="email" v-model="email" id="form2" class="white-text form-control" :class="{ 'is-invalid': submitted && !username }" required>
                               <label for="form2" class="active">Your email</label>
                               <div v-show="submitted && !username" class="invalid-feedback">Username is required</div>
                           </div>
                           <div class="md-form">
                               <i class="fa fa-lock prefix white-text active"></i>
                               <input type="password" v-model="password" id="form4" class="white-text form-control" :class="{ 'is-invalid': submitted && !password }">
                               <label for="form4">Your password</label>
                               <div v-show="submitted && !password" class="invalid-feedback">Password is required</div>

                               <p class="font-small blue-text d-flex justify-content-end">Forgot
                                   <a href="#" class="blue-text ml-1"> Password?</a>
                               </p>
                           </div>
                           <div class="text-center mt-4">
                               <button class="btn btn-indigo" :disabled="status.loggingIn">Sign In</button>
                               <img v-show="status.loggingIn" src="data:image/gif;base64,R0lGODlhEAAQAPIAAP///wAAAMLCwkJCQgAAAGJiYoKCgpKSkiH/C05FVFNDQVBFMi4wAwEAAAAh/hpDcmVhdGVkIHdpdGggYWpheGxvYWQuaW5mbwAh+QQJCgAAACwAAAAAEAAQAAADMwi63P4wyklrE2MIOggZnAdOmGYJRbExwroUmcG2LmDEwnHQLVsYOd2mBzkYDAdKa+dIAAAh+QQJCgAAACwAAAAAEAAQAAADNAi63P5OjCEgG4QMu7DmikRxQlFUYDEZIGBMRVsaqHwctXXf7WEYB4Ag1xjihkMZsiUkKhIAIfkECQoAAAAsAAAAABAAEAAAAzYIujIjK8pByJDMlFYvBoVjHA70GU7xSUJhmKtwHPAKzLO9HMaoKwJZ7Rf8AYPDDzKpZBqfvwQAIfkECQoAAAAsAAAAABAAEAAAAzMIumIlK8oyhpHsnFZfhYumCYUhDAQxRIdhHBGqRoKw0R8DYlJd8z0fMDgsGo/IpHI5TAAAIfkECQoAAAAsAAAAABAAEAAAAzIIunInK0rnZBTwGPNMgQwmdsNgXGJUlIWEuR5oWUIpz8pAEAMe6TwfwyYsGo/IpFKSAAAh+QQJCgAAACwAAAAAEAAQAAADMwi6IMKQORfjdOe82p4wGccc4CEuQradylesojEMBgsUc2G7sDX3lQGBMLAJibufbSlKAAAh+QQJCgAAACwAAAAAEAAQAAADMgi63P7wCRHZnFVdmgHu2nFwlWCI3WGc3TSWhUFGxTAUkGCbtgENBMJAEJsxgMLWzpEAACH5BAkKAAAALAAAAAAQABAAAAMyCLrc/jDKSatlQtScKdceCAjDII7HcQ4EMTCpyrCuUBjCYRgHVtqlAiB1YhiCnlsRkAAAOwAAAAAAAAAAAA==" />
                               <hr class="hr-light mb-3 mt-4">
                               <div class="inline-ul text-center d-flex justify-content-center">
                                   <a class="p-2 m-2 tw-ic">
                                       <i class="fa fa-twitter white-text"></i>
                                   </a>
                                   <a class="p-2 m-2 li-ic">
                                       <i class="fa fa-linkedin white-text"> </i>
                                   </a>
                                   <a class="p-2 m-2 ins-ic">
                                       <i class="fa fa-instagram white-text"> </i>
                                   </a>
                               </div>
                           </div>
                       </form>
                    </div>
                </div>
                <!--/.Form-->
            </div>
            <!--Grid column-->
        </div>
        <!--Grid row-->
    </div>
    <!-- Content -->
</template>

<script>
    export default {
        data (){

        },

        methods:{
            login(e){

            }
        }
    }
</script>

<style scoped>

</style>
