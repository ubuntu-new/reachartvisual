<template>
<v-app>
    <v-row justify="center">
        <v-dialog v-model="dialog" width="388px">
            <template v-slot:activator="{ on, attrs }">
                
                <span v-bind="attrs" v-on="on" class="forgot-password">Lost your password?</span>
            </template>
            <v-card>
                <v-card-title>
                    <span class="headline">Create New Password</span>
                </v-card-title>
                <v-card-text>
                    <form>
                        <div class="new-customer-content">
                            <div class="section-title">
                                <h2><span class="dot"></span> New Customer</h2>
                            </div>

                            <span>Create a Account</span>
                            <p> New password should be different from the previous password
    </span></p>
                           
                        </div>
    <span class="signupFormTitle">
       
 
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
 
</form>
                </v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <div class="buttoni">
                  <span>Reset Password</span>
                </div>
                    
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
import { validationMixin } from 'vuelidate'
  import { required, maxLength, email, sameAs } from 'vuelidate/lib/validators'

  export default {
    mixins: [validationMixin],
data() {
        return {
            dialog: false,
        }
    },
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
