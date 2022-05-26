<template>
    <div class="input-form mb-5 mt-5">
        <label class="form-label w-full flex flex-col sm:flex-row">
          {{ date_label }} <span class="text-primary-3">*</span>
        </label>
        <input placeholder="Date" type="text" class="form-control"  v-model="date_field" >
    </div>
</template>

<script>
import moment from "moment";

export default {
    name: "FormDateComponent",
    props: ['date_label','date_value'],
    data: ()=> ({
        date_field: ''
    }),
    mounted() {
        this.date_field = this.date_value;
    }
}
</script>

<style scoped>

</style>
