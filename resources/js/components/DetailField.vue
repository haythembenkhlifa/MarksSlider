<template>
    <PanelItem :index="index" :field="field" />
</template>

<script>
export default {
    props: ["index", "resource", "resourceName", "resourceId", "field"],
    mounted() {
        this.field.value = Object.keys(this.field.values)[
            Object.values(this.field.values).indexOf(parseInt(this.field.value))
        ];
    },
};
</script>
