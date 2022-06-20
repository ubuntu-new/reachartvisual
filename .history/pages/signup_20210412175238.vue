<template>
<div class="formiza">
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
    
   
    <v-btn class="mr-4" @click="submit">
        submit
    </v-btn>
    <v-btn @click="clear">
        clear
    </v-btn>
</form>
</div>
</template>
<style scoped>
.signupFormTitle
{
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
.formiza{
  width: 388px;
  margin: 66px 0 0 0;
  padding: 25px 45px 39px;
  border-radius: 10px;
  background-color: #ffffff;
  position: relative;
  margin: 20px auto;
}
</style>
<script>
  import { validationMixin } from 'vuelidate'
  import { required, maxLength, email, sameAs } from 'vuelidate/lib/validators'

  export default {
    mixins: [validationMixin],

    validations: {
      fullName: { required, maxLength: maxLength(10) },
      phone: {required   },
      
      email: { required, email },
      checkbox: {
        checked (val) {
          return val
        },
      },
    },

    data: () => ({
        
      fullName: '',
      email: '',
      phone: '',
      checkbox: false
    }),
    data () {
        return {
            show1: false,
            show2: true,
            show3: false,
            show4: false,
            password: '',
            rules: {
            required: value => !!value || 'Required.',
            min: v => v.length >= 8 || 'Min 8 characters',
            emailMatch: () => (`The email and password you entered don't match`),
            },
            confirmPassword: '',
            confirmPasswordRules: [
        (value) => !!value || 'type confirm password',
        (value) =>
          value === this.password || 'The password confirmation does not match.',
      ],
        }
        },
    computed: {
      checkboxErrors () {
        const errors = []
        if (!this.$v.checkbox.$dirty) return errors
        !this.$v.checkbox.checked && errors.push('You must agree to continue!')
        return errors
      },
      selectErrors () {
        const errors = []
        if (!this.$v.select.$dirty) return errors
        !this.$v.select.required && errors.push('Item is required')
        return errors
      },
      fullNameErrors () {
        const errors = []
        if (!this.$v.fullName.$dirty) return errors
        // !this.$v.fullName.maxLength && errors.push('Full Name must be at most 10 characters long')
        !this.$v.fullName.required && errors.push('Full Name is required.')
        return errors
      },
      phoneErrors () {
        const errors = []
        if (!this.$v.phone.$dirty) return errors
        !this.$v.phone.maxLength && errors.push('Phone must be at most 10 characters long')
        !this.$v.phone.required && errors.push('Phone Name is required.')
        return errors
      },
     
      emailErrors () {
        const errors = []
        if (!this.$v.email.$dirty) return errors
        !this.$v.email.email && errors.push('Must be valid e-mail')
        !this.$v.email.required && errors.push('E-mail is required')
        return errors
      },
    },

    methods: {
      submit () {
        this.$v.$touch()
      },
      clear () {
        this.$v.$reset()
        this.name = ''
        this.email = ''
        this.phone = ''
        this.select = null
        this.checkbox = false
      },
    },
  }
</script>