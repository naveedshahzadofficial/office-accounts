<template>
    <table class="table is-bordered data-table">
        <thead>
        <tr v-if="columns && columns.length" class="bg-gray-700 dark:bg-dark-1 text-white">
            <th class="whitespace-nowrap text-center" v-for="(column, index) in columns" :key="`parent_${index}`" @click="$emit('sortBy', (column.name?column.name:''))"
                :class="column.orderable?(sortKey === column.name ? (sortOrders[column.name] > 0 ? 'sorting_asc' : 'sorting_desc') : 'sorting'):''"
                :colspan="column.colspan?column.colspan:1"
                :style="(column.width?('width:'+column.width+';'):'')+'cursor:pointer;'">
                {{column.label}}
            </th>
        </tr>

        <tr v-if="childColumns && childColumns.length" class="bg-gray-700 dark:bg-dark-1 text-white">
            <th class="whitespace-nowrap text-center" v-for="(column, index) in childColumns" :key="`child_${index}`" @click="$emit('sortBy', (column.name?column.name:''))"
                :class="column.orderable?(sortKey === column.name ? (sortOrders[column.name] > 0 ? 'sorting_asc' : 'sorting_desc') : 'sorting'):''"
                :colspan="column.colspan?column.colspan:1"
                :style="(column.width?('width:'+column.width+';'):'')+'cursor:pointer;'">
                {{column.label}}
            </th>
        </tr>
        </thead>
        <slot></slot>
    </table>
</template>

<script>
export default {
    name: "BaseTableComponent",
    props: ['columns','childColumns', 'sortKey', 'sortOrders']
}
</script>

<style scoped>

</style>
