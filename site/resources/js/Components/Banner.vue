<script setup lang="ts">
    import { ref } from 'vue'

    const props = defineProps({
        image: String,
    })

    const style = ref({
        backgroundImage: `url('${props.image}')` ,
    })
</script>

<template>
    <div class="banner" :style="style">
        <div class="background-filter">
            <div class="text"><slot /></div>
        </div>
    </div>
</template>

<style scoped>
    .banner {
        min-height: 160px;
        max-height: 300px;
        border-radius: 10px;
        overflow: hidden;
    }

    .background-filter {
        background: rgba(0, 0, 0, .4);
        height: 100%;
        width: 100%;
    }

    .text {
        color: #fff;
        font-size: 22px;
        font-weight: 900;

        display: flex;
        justify-content: center;
        align-items: center;

        width: 100%;
        height: 100%;
    }
</style>
