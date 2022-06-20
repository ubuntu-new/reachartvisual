<template>
  <Form @submit="submit" :validation-schema="simpleSchema">
    <Field name="email" >
    <ErrorMessage name="email" />

    <Field name="password" type="password" />
    <ErrorMessage name="password" />

    <button>Submit</button>
  </Form>
</template>

<script>
import { Form, Field, ErrorMessage } from 'vee-validate';

export default {
  components: {
    Form,
    Field,
    ErrorMessage,
  },
  data() {
    const simpleSchema = {
      email(value) {
        // validate email value...
      },
      name(value) {
        // validate name value...
      },
      // If you defined global rules you can also use them
      password: 'required|min:8',
      // ...
    };

    return {
      simpleSchema,
    };
  },
};
</script>