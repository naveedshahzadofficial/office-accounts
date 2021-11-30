<template>
    <div class="input-form mb-5">
        <label class="form-label w-full flex flex-col sm:flex-row">
            Date <span class="text-primary-3">*</span>
        </label>
        <input placeholder="Date" type="text" readonly class="form-control"  v-model="date_field" >
    </div>
</template>

<script>
import moment from "moment";

export default {
    name: "FormDateComponent",
    props: ['created_at'],
    data: ()=> ({
        date_field: ''
    }),
    mounted() {
        this.date_field = this.created_at;
    }
}
</script>

<style scoped>

</style>
