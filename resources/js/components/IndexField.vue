<template>
    <span>{{ fieldValue }}</span>
</template>

<script>
export default {
    props: ["resourceName", "field"],

    computed: {
        fieldValue() {
            return Object.keys(this.field.values)[
                Object.values(this.field.values).indexOf(
                    parseInt(this.field.value)
                )
            ];
        },
    },
};
</script>
