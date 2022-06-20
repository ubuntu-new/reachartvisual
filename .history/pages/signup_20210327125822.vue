<template>
  <Form>
    <Field name="field" :rules="isRequired" />
    <ErrorMessage name="field" />
  </Form>
</template>

<script>
import { Field, Form, ErrorMessage } from 'vee-validate';

export default {
  components: {
    Field,
    Form,
    ErrorMessage,
  },
  methods: {
    isRequired(value) {
      if (value && value.trim()) {
        return true;
      }

      return 'This is required';
    },
  },
};
</script>