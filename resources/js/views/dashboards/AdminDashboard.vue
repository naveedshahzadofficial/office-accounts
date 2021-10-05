<template>
<div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex">
                        <i data-feather="radio" class="report-box__icon text-theme-10"></i>
                    </div>
                    <div class="text-3xl font-medium leading-8 mt-6">0</div>
                    <div class="text-base text-gray-600 mt-1">&nbsp</div>
                </div>
            </div>
        </div>


      <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
        <div class="report-box zoom-in">
          <div class="box p-5">
            <div class="flex">
              <i data-feather="radio" class="report-box__icon text-theme-11"></i>
            </div>
            <div class="text-3xl font-medium leading-8 mt-6">0</div>
            <div class="text-base text-gray-600 mt-1">&nbsp</div>
          </div>
        </div>
      </div>



    </div>
</div>
</template>

<script>

export default {
    name: "AdminDashboard",
    mounted(){
        document.body.classList.remove('login');
        document.body.classList.add('main');
    },
}
</script>

<style scoped>

</style>
