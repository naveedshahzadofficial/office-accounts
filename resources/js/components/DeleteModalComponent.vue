<template>
  <div class="modal overflow-y-auto show" tabindex="-1" aria-hidden="false" style="margin-top: 0px; margin-left: 0px; padding-left: 0px; z-index: 10000;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <feather type="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></feather>
                        <div class="text-3xl mt-5">Are you sure?</div>
                        <div class="text-gray-600 mt-2">
                            Do you really want to delete this record?
                            <br>
                            This process cannot be undone.
                        </div>
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <button type="button" data-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1" @click.prevent="$emit('confirm-modal', 'Cancel')">Cancel</button>
                        <button type="button" class="btn btn-danger w-24" @click.prevent="$emit('confirm-modal', 'Delete')">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Alert modal -->
</template>

<script>
export default {
    name: "DeleteModalComponent"
}
</script>

<style scoped>

</style>
