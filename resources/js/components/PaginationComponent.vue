<template>
    <div v-if="pagination && pagination.total"  class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
        <div class="hidden md:block text-gray-600 mt-3 sm:mt-0">Showing {{ pagination.from | numFormat }} to {{ pagination.to | numFormat }} of {{ pagination.total | numFormat }} entries</div>
        <div class="hidden md:block mx-auto text-gray-600"></div>
        <div class="w-full sm:w-auto mt-3 sm:mt-0">

            <nav v-if="pagination.total > pagination.per_page" class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">

                <a v-if="links.prev" @click="$emit('page-change',links.prev);" class="cursor-pointer relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                    <span class="sr-only">Previous</span>
                    <!-- Heroicon name: solid/chevron-left -->
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                </a>

                <!-- Current: "z-10 bg-indigo-50 border-indigo-500 text-indigo-600", Default: "bg-white border-gray-300 text-gray-500 hover:bg-gray-50" -->
                <a  v-for="page in pagination.links" :aria-current="page.active?'page':''" v-if="page.label !== '&laquo; Previous' && page.label !== 'Next &raquo;'" @click="$emit('page-change', page.url)" class="cursor-pointer z-10 bg-indigo-50 border-indigo-500 text-indigo-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                    {{  page.label }}
                </a>

                <a v-if="links.next" @click="$emit('page-change',links.next);" class="cursor-pointer relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                    <span class="sr-only">Next</span>
                    <!-- Heroicon name: solid/chevron-right -->
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </a>

            </nav>

        </div>

    </div>
</template>

<script>
export default {
    name: "PaginationComponent",
    props: ['pagination', 'links']
}
</script>

<style scoped>

</style>
