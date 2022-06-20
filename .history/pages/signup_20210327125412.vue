<template>
<div>
import { Field, Form } from 'vee-validate';

export default {
  components: {
    Field,
    Form,
  },
  methods: {
    // Validator function
    isRequired(value) {
      return value ? true : 'This field is required';
    },
  },
};
</div>
</template
<script>
import { Field, Form } from 'vee-validate';

export default {
  components: {
    Field,
    Form,
  },
  methods: {
    // Validator function
    isRequired(value) {
      return value ? true : 'This field is required';
    },
  },
};
</script