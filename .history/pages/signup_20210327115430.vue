<template>
<div class="row">
    <div class="col-12">
        
        <div class="formInner">
            <span class="signupFormTitle">Create an Account</span>
        <v-form ref="form" v-model="valid" lazy-validation class="mt-3">
            <v-text-field v-model="fullName" :counter="10" :rules="fullNameRules" label="Full Name" outlined required></v-text-field>

            <v-text-field v-model="customerEmail" :rules="emailRules" label="E-mail" outlined required></v-text-field>

            <v-text-field v-model="customerPhone" :counter="10" :rules="nameRules" label="Phone Number" outlined required></v-text-field>

            <v-text-field
        ref="password"
        type="password"
        v-model="pass"
        v-validate="'required'"
        :error-messages="errors.collect('pass')"
        label="Pass"
        data-vv-name="pass"
        required
      ></v-text-field>
      <v-text-field
        v-model="pass2"
        type="password"
        v-validate="'required|confirmed:password'"
        :error-messages="errors.collect('pass2')"
        label="Pass 2"
        data-vv-name="pass"
        required
      ></v-text-field>

            <v-select v-model="select" :items="items" :rules="[v => !!v || 'Item is required']" label="Item" required></v-select>

            <v-checkbox v-model="checkbox" :rules="[v => !!v || 'You must agree to continue!']" label="Do you agree?" required></v-checkbox>

            <v-btn :disabled="!valid" color="success" class="mr-4" @click="validate">
                Validate
            </v-btn>

            <v-btn color="error" class="mr-4" @click="reset">
                Reset Form
            </v-btn>

            <v-btn color="warning" @click="resetValidation">
                Reset Validation
            </v-btn>
        </v-form>
        </div>
    </div>
</div>
</template>

<style scoped>
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

.formInner {
    width: 388px;
    height: 729px;
    margin: 66.3px 51px 14px 175px;
    padding: 25px 45px 39px;
    border-radius: 10px;
    background-color: #ffffff;
    position: relative;
    margin: 20px auto;
}
</style>

<script>
export default {
    data: () => ({
        valid: true,
        fullNameRules: '',
        fullNameRules: [
            v => !!v || 'Full Name',
            v => (v && v.length <= 10) || 'Full Name must be less than 10 characters',
        ],
        email: '',
        emailRules: [
            v => !!v || 'E-mail is required',
            v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
        ],
        select: null,
        items: [
            'Item 1',
            'Item 2',
            'Item 3',
            'Item 4',
        ],
        checkbox: false,
        pass: '',
        pass2: "",
    }),

    methods: {
        validate() {
            this.$refs.form.validate()
        },
        reset() {
            this.$refs.form.reset()
        },
        resetValidation() {
            this.$refs.form.resetValidation()
        },
    },
}
</script>
