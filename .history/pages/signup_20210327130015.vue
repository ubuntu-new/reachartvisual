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
import { useField } from 'useField';

const SomeComponent = {
  template: `
    <input v-model="value" type="text">
    <span>{{ errorMessage }}</span>
  `,
  setup() {
    const { value, errorMessage } = useField('name', value => {
      return value ? true : 'field is required';
    });

    return {
      value,
      errorMessage,
    };
  },
};

test('it validates', async () => {
  // assuming you have a mounting helper
  mount(SomeComponent);
  const input = document.querySelector('input');
  input.value = '';
  input.dispatchEvent(new Event('change'));

  // ❌ Fails
  expect(document.querySelector('span').textContent).toBe('Field is required');
});
</script>