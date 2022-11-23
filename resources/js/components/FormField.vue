<template>
  <DefaultField
    :field="field"
    :errors="errors"
    :show-help-text="showHelpText"
    :full-width-content="fullWidthContent"
  >
    <template #field>
      <input
        type="range"
        id="temp"
        name="temp"
        list="range_list"
        class="w-full"
        v-model="value"
        :min="min()"
        :max="max()"
        :step="this.field.step ?? 1"
      />

      <datalist id="range_list" class="w-full">
        <option
          v-for="(value, key) in this.field.values"
          :key="value"
          :value="value"
          :label="
            this.field.showLabels === undefined
              ? key
              : this.field.showLabels == true
              ? key
              : ''
          "
        ></option>
      </datalist>

      <!-- <datalist id="range_list" class="w-full">
        <option value="0">0</option>
        <option value="2">2</option>
        <option selected value="4">5</option>
      </datalist> -->
    </template>
  </DefaultField>
</template>

<script>
import { FormField, HandlesValidationErrors } from "laravel-nova";

export default {
  mixins: [FormField, HandlesValidationErrors],

  props: ["resourceName", "resourceId", "field"],

  data() {
    return {
      label: "",
    };
  },

  methods: {
    /*
     * Set the initial, internal value for the field.
     */
    setInitialValue() {
      if (this.field.value == null && this.field.initialValue !== undefined) {
        this.value = this.field.initialValue;
      } else {
        this.value = this.field.value || "";
      }
    },

    /**
     * Fill the given FormData object with the field's internal value.
     */
    fill(formData) {
      formData.append(this.field.attribute, this.value || "");
    },

    /**
     * Resolve range minimum.
     */
    min() {
      return this.field.min ?? Object.values(this.field.values)[0];
    },

    /**
     * Resolve range maximum.
     */
    max() {
      return (
        this.field.max ??
        Object.values(this.field.values)[
          Object.values(this.field.values).length - 1
        ]
      );
    },

    /**
     * Set label from value.
     */
    setLabel(value) {
      this.label = Object.keys(this.field.values)[
        Object.values(this.field.values).indexOf(parseInt(value))
      ];
    },
  },
  watch: {
    // whenever range changes, this function will run
    value(newRange, oldRange) {
      this.setLabel(newRange);
    },
  },
};
</script>
<style scoped>
datalist {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  writing-mode: vertical-lr;
  margin-top: -20px;
}

option {
  padding: 0;
  text-align: center;
  transform: rotate(-90deg);
}
</style>
