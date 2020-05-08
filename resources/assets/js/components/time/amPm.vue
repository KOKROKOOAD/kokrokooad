<template>
    <span>
        <span v-show="time>= 12 ? true : false"> PM </span>
        <span v-show=" time < 12 ?  true : false">AM </span>
    </span>
</template>

<script>
    export default {
        props:['time'],
        name: "ampm",

    }
</script>

<style scoped>

</style>