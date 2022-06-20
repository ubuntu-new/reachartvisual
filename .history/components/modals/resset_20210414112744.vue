<template>
<v-app>
    <v-row justify="center">
        <v-dialog v-model="dialog" width="600px">
            <template v-slot:activator="{ on, attrs }">
                
                <span v-bind="attrs" v-on="on" class="forgot-password">Lost your password?</span>
            </template>
            <v-card>
                <v-card-title>
                    <span class="headline">Use Google's location service?</span>
                </v-card-title>
                <v-card-text>
                    <form>
    <span class="signupFormTitle">Create an Account</span>
    <v-text-field v-model="fullName" :error-messages="fullNameErrors"  label="Full Name" required @input="$v.fullName.$touch()" @blur="$v.fullName.$touch()"></v-text-field>
    <v-text-field v-model="email" :error-messages="emailErrors" label="E-mail" required @input="$v.email.$touch()" @blur="$v.email.$touch()"></v-text-field>
    <v-text-field v-model="phone" :error-messages="phoneErrors" label="Phone"  required @input="$v.phone.$touch()" @blur="$v.phone.$touch()"></v-text-field>
    <v-text-field
            v-model="password"
            :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
            :rules="[rules.required, rules.min]"
            :type="show1 ? 'text' : 'password'"
            name="password"
            label="Password"
            hint="At least 8 characters"
            counter
            @click:append="show1 = !show1"
          ></v-text-field>

          <v-text-field
            v-model="confirmPassword"
            :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
            :rules="[rules.required, rules.min, confirmPasswordRules]"
            :type="show1 ? 'text' : 'confirmPassword'"
            name="confirmPassword"
            label="confirmPassword"
            hint="At least 8 characters"
            counter
            @click:append="show1 = !show1"
          ></v-text-field>
    <div class="row mt-10 mb-10">
            <div class="col-md-12">
                <div class="buttoni">
                  <span>Create an Account</span>
                </div>
            </div>
        </div>
    <div class="row mt-10 mb-10">
            <div class="col-md-12">
                <div class="or">
                  <span class="hrza">  </span> <span class="textzi">Or</span> <span class="hrza">  </span>
                </div>
            </div>
        </div>
        <div class="row mt-10 mb-10">
            <div class="col-md-12">
                <div class="buttoniFb">
                  <span>Authorization</span>
                </div>
            </div>
        </div>
</form>
                </v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="green darken-1" text @click="dialog = false">
                        Disagree
                    </v-btn>
                    <v-btn color="green darken-1" text @click="dialog = false">
                        Agree
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </v-row>
</v-app>
</template>

<style scoped>
.hrza {
    width: 127px;
    height: 2px;
    margin: 28px 0px 26px 0;
    border: solid 1px #d5d5d5;
    float: left;
}

.textzi {
    width: 16px;
    height: 17px;
    margin: 20px 14px 19px;
    font-family: FiraGO;
    font-size: 14px;
    font-weight: normal;
    font-stretch: normal;
    font-style: normal;
    line-height: normal;
    letter-spacing: normal;
    color: #d5d5d5;
    float: left;
}

.signupFormTitle {
    margin: 0 8px 26px 0;
    font-family: 'FiraGO', serif;
    font-size: 20px;
    font-weight: normal;
    font-stretch: normal;
    font-style: normal;
    line-height: normal;
    letter-spacing: normal;
    color: #161e17;

}

.formiza {
    width: 388px;
    margin: 66px 0 0 0;
    padding: 25px 45px 39px;
    border-radius: 10px;
    background-color: #ffffff;
    position: relative;
    margin: 20px auto;
}

.buttoni {
    width: 297px;
    height: 50px;
    margin: 0px 1px 0px 0;
    padding: 17px 91px 16px 92px;
    border-radius: 4px;
    background-color: #161e17;
}

.buttoni span {
    font-family: FiraGO;
    font-size: 14px;
    font-weight: normal;
    font-stretch: normal;
    font-style: normal;
    line-height: normal;
    letter-spacing: normal;
    color: #ffffff;
}

.buttoniFb {
    width: 297px;
    height: 50px;
    margin: 0px 1px 0px 0;
    padding: 17px 91px 16px 92px;
    border-radius: 4px;
    background-color: #4065b4;
}

.buttoniFb span {
    font-family: FiraGO;
    font-size: 14px;
    font-weight: normal;
    font-stretch: normal;
    font-style: normal;
    line-height: normal;
    letter-spacing: normal;
    color: #ffffff;
}
</style>

<script>
export default {
    data() {
        return {
            dialog: false,
        }
    },
}
</script>
