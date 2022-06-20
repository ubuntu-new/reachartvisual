<template>
<div>
Form v-slot="{ errors }">
  <Field name="field" :rules="isRequired" />

  <span>{{ errors.field }}</span>
</Form>
</div>
</template>
<script>
import { useField } from 'vee-validate';

export default {
  setup() {
    // Validator function
    const isRequired = value => (value ? true : 'This field is required');
    const { value, errorMessage } = useField('field', isRequired);

    return {
      value,
      errorMessage,
    };
  },
};
</script>