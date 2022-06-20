<template>
<div class="formiza">
<form>
    <span class="signupFormTitle">Create an Account</span>
    <v-text-field v-model="fullName" :error-messages="fullNameErrors" :counter="10" label="Full Name" required @input="$v.fullName.$touch()" @blur="$v.fullName.$touch()"></v-text-field>
    <v-text-field v-model="email" :error-messages="emailErrors" label="E-mail" required @input="$v.email.$touch()" @blur="$v.email.$touch()"></v-text-field>
    <v-select v-model="select" :items="items" :error-messages="selectErrors" label="Item" required @change="$v.select.$touch()" @blur="$v.select.$touch()"></v-select>
    <v-checkbox v-model="checkbox" :error-messages="checkboxErrors" label="Do you agree?" required @change="$v.checkbox.$touch()" @blur="$v.checkbox.$touch()"></v-checkbox>

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
  import { required, maxLength, email } from 'vuelidate/lib/validators'

  export default {
    mixins: [validationMixin],

    validations: {
      fullName: { required, maxLength: maxLength(10) },
      email: { required, email },
      select: { required },
      checkbox: {
        checked (val) {
          return val
        },
      },
    },

    data: () => ({
      fullName: '',
      email: '',
      select: null,
      items: [
        'Item 1',
        'Item 2',
        'Item 3',
        'Item 4',
      ],
      checkbox: false,
    }),

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
        if (!this.$v.name.$dirty) return errors
        !this.$v.fullName.maxLength && errors.push('Full Name must be at most 10 characters long')
        !this.$v.fullName.required && errors.push('Full Name is required.')
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
        this.select = null
        this.checkbox = false
      },
    },
  }
</script>