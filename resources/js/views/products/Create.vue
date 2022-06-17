<template>
    <div>

        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Add Product
            </h2>
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <button type="button" class="btn box text-gray-700 dark:text-gray-300 mr-2 flex items-center ml-auto sm:ml-0"  @click.prevent="$router.push({name: 'admin.products.index'})"> Cancel </button>
                <button class="btn btn-success shadow-md flex items-center" @click.prevent="saveForm"> Save <i v-if="processing" data-loading-icon="spinning-circles" data-color="white" class="w-4 h-4 ml-2"></i></button>
            </div>
        </div>

        <div v-if="message" class="alert alert-danger-soft show flex items-center mb-2" role="alert">
            <feather type="alert-octagon" class="w-6 h-6 mr-2"></feather>
            {{ message }} </div>

        <div class="pos intro-y grid grid-cols-12 gap-5 mt-5 validate-form">
            <!-- BEGIN: Left Content -->
            <div class="intro-y col-span-12 lg:col-span-8">
                <div class="input-form" :class="{'has-error':(errors && errors.product_name)}">
                <input v-model="form.product_name" required  type="text" class="intro-y form-control py-3 px-4 box pr-10 placeholder-theme-13" placeholder="Product Name">
                <div class="pristine-error text-primary-3 mt-2" v-if="errors && errors.product_name">
                    {{  errors.product_name[0] }}</div>
                </div>

                <div class="post intro-y overflow-hidden box mt-5">
                    <div class="post__tabs nav nav-tabs flex-col sm:flex-row bg-gray-300 dark:bg-dark-2 text-gray-600" role="tablist">
                        <a title="Product Attributes" data-toggle="tab" data-target="#content" href="javascript:;" class="tooltip w-full sm:w-40 py-4 text-center flex justify-center items-center active" id="content-tab" role="tab" aria-controls="content" aria-selected="true"> <feather type="file-text" class="w-4 h-4 mr-2"></feather> Content </a>
                        <a title="Product Variation" data-toggle="tab" data-target="#variation" href="javascript:;" class="tooltip w-full sm:w-40 py-4 text-center flex justify-center items-center" id="variation-tab" role="tab" aria-selected="false"> <feather type="code" class="w-4 h-4 mr-2"></feather> Product Variation</a>
                        <a title="Use search keywords" data-toggle="tab" data-target="#keywords" href="javascript:;" class="tooltip w-full sm:w-40 py-4 text-center flex justify-center items-center" id="keywords-tab" role="tab" aria-selected="false"> <feather type="align-left" class="w-4 h-4 mr-2"></feather> Keywords </a>
                    </div>

                    <div class="post__content tab-content">
                        <div id="content" class="tab-pane p-5 active" role="tabpanel" aria-labelledby="content-tab">

                            <div class="border border-gray-200 dark:border-dark-5 rounded-md p-5">
                                <div class="font-medium flex items-center border-b border-gray-200 dark:border-dark-5 pb-5"> <feather type="chevron-down" class="w-4 h-4 mr-2"></feather> Product Attributes </div>

                                <div class="input-form mt-5" :class="{'has-error':(errors && errors.color_ids)}">
                                    <label class="form-label w-full flex flex-col sm:flex-row">
                                        Colors <span class="text-primary-3">*</span>
                                        <input v-model="form.has_colors" name="has_colors"  class="ml-3 form-check-switch"  type="checkbox" value="1" >
                                    </label>
                                    <Select2 :disabled="!form.has_colors" v-model="form.color_ids" :options="loadColors" placeholder="Select Colors" :settings="{ multiple: true, selectOnClose:false, allowClear:true, closeOnSelect: false  }" />

                                    <div class="pristine-error text-primary-3 mt-2" v-if="errors && errors.color_ids">
                                        {{  errors.color_ids[0] }}</div>
                                </div>

                                <div class="input-form mt-5" :class="{'has-error':(errors && errors.attribute_ids)}">
                                    <label class="form-label w-full flex flex-col sm:flex-row">
                                        Attributes <span class="text-primary-3">*</span>
                                    </label>
                                    <Select2  v-model="form.attribute_ids" :options="loadAttributes" placeholder="Select Attributes" :settings="{ multiple: true, selectOnClose:false, allowClear:true, closeOnSelect: false  }" />
                                    <div class="pristine-error text-primary-3 mt-2" v-if="errors && errors.attribute_ids">
                                        {{  errors.attribute_ids[0] }}</div>
                                </div>

                                <div class="mt-3">
                                    <p>Choose the attributes of this product and then input values of each attribute</p>
                                    <br>
                                </div>

                                <div v-for="attribute_value in makeAttributeValues" class="input-form mt-5">
                                    <label class="form-label w-full flex flex-col sm:flex-row">
                                        {{ findAttributeName(attribute_value.attribute_id) }} <span class="text-primary-3">*</span>
                                    </label>
                                    <Select2 v-model="attribute_value.values" :options="findAttributeValues(attribute_value.attribute_id)" :placeholder="`Select ${findAttributeName(attribute_value.attribute_id)}`" :settings="{ multiple: true, selectOnClose:false, allowClear:true, closeOnSelect: false  }" />
                                </div>

                            </div>

                            <div class="border border-gray-200 dark:border-dark-5 rounded-md p-5 mt-5">
                                <div class="font-medium flex items-center border-b border-gray-200 dark:border-dark-5 pb-5"> <feather type="chevron-down" class="w-4 h-4 mr-2"></feather> Caption & Images </div>
                                <div class="mt-5">
                                    <div>
                                        <label for="post-form-7" class="form-label">Caption</label>
                                        <input id="post-form-7" type="text" class="form-control" placeholder="Write caption">
                                    </div>
                                 </div>
                            </div>

                        </div>

                        <div id="variation" class="tab-pane p-5" role="tabpanel" aria-labelledby="variation-tab">

                            <div class="border border-gray-200 dark:border-dark-5 rounded-md p-5">
                                <div class="font-medium flex items-center border-b border-gray-200 dark:border-dark-5 pb-5"> <feather type="chevron-down" class="w-4 h-4 mr-2"></feather> Product Attributes </div>

                                <table class="table table-bordered aiz-table mt-5">
                                    <thead>
                                    <tr>
                                        <td class="text-center">
                                            Variant
                                        </td>
                                        <td class="text-center">
                                            Variant Price
                                        </td>
                                        <td class="text-center" data-breakpoints="lg">
                                            SKU
                                        </td>
                                        <td class="text-center" data-breakpoints="lg">
                                            Quantity
                                        </td>
                                        <td class="text-center" data-breakpoints="lg">
                                            Photo
                                        </td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="stock in makeStocks" class="variant">
                                        <td class="input-form mt-5">
                                            <label class="form-label w-full flex flex-col sm:flex-row">{{ stock.variant }}</label>
                                        </td>
                                        <td class="input-form mt-5">
                                            <vue-numeric placeholder="Price"  separator="," class="form-control" v-model="stock.price" required></vue-numeric>
                                        </td>
                                        <td class="input-form mt-5">
                                            <input v-model="stock.sku" class="form-control" type="text" >
                                        </td>
                                        <td class="input-form mt-5">
                                            <vue-numeric placeholder="Qty"  separator="," class="form-control" v-model="stock.qty" required></vue-numeric>
                                        </td>
                                        <td class="input-form mt-5">&nbsp;</td>
                                    </tr>
                                    </tbody>
                                </table>
                             </div>
                        </div>

                    </div>

                </div>
            </div>
            <!-- End: Left Content -->

            <!-- BEGIN: Right Content -->
            <div class="col-span-12 lg:col-span-4">
                <div class="intro-y box p-5">
                    <div class="input-form" :class="{'has-error':(errors && errors.category_id)}">
                        <label class="form-label w-full flex flex-col sm:flex-row">
                            Category<span class="text-primary-3">*</span>
                        </label>
                        <Select2 v-model="form.category_id" :options="loadCategories" placeholder="Select Category" />
                        <div class="pristine-error text-primary-3 mt-2" v-if="errors && errors.category_id">
                            {{  errors.category_id[0] }}</div>
                    </div>

                    <div class="input-form mt-3" :class="{'has-error':(errors && errors.sub_category_id)}">
                        <label class="form-label w-full flex flex-col sm:flex-row">
                            SubCategory<span class="text-primary-3">*</span>
                        </label>
                        <Select2 v-model="form.sub_category_id" :options="loadSubCategories" placeholder="Select SubCategory" />
                        <div class="pristine-error text-primary-3 mt-2" v-if="errors && errors.sub_category_id">
                            {{  errors.sub_category_id[0] }}</div>
                    </div>

                    <div class="input-form mt-3" :class="{'has-error':(errors && errors.unit_id)}">
                        <label class="form-label w-full flex flex-col sm:flex-row">
                            Unit<span class="text-primary-3"></span>
                        </label>
                        <Select2 v-model="form.unit_id" :options="loadUnits" placeholder="Select Unit" />
                        <div class="pristine-error text-primary-3 mt-2" v-if="errors && errors.unit_id">
                            {{  errors.unit_id[0] }}</div>
                    </div>

                    <div  class="input-form mt-3" :class="{'has-error':(errors && errors.unit_price)}">
                        <label class="form-label w-full flex flex-col sm:flex-row">
                            Unit Price<span class="text-primary-3">*</span>
                        </label>
                        <vue-numeric placeholder="Unit Price"  separator="," class="form-control" v-model="form.unit_price" required></vue-numeric>
                        <div class="pristine-error text-primary-3 mt-2" v-if="errors && errors.unit_price">
                            {{  errors.unit_price[0] }}</div>
                    </div>

                    <div  class="input-form mt-3" :class="{'has-error':(errors && errors.shipping_type)}">
                        <label class="form-label w-full flex flex-col sm:flex-row">
                            Free Shipping<span class="text-primary-3"></span>
                        </label>
                        <input v-model="form.shipping_type" name="shipping_type" class="form-check-switch"  type="radio" value="free" checked="checked">
                        <div class="pristine-error text-primary-3 mt-2" v-if="errors && errors.shipping_type">
                            {{  errors.shipping_type[0] }}</div>
                    </div>

                    <div  class="input-form mt-3" :class="{'has-error':(errors && errors.shipping_type)}">
                        <label class="form-label w-full flex flex-col sm:flex-row">
                            Flat Rate<span class="text-primary-3"></span>
                        </label>
                        <input v-model="form.shipping_type" name="shipping_type" class="form-check-switch" type="radio" value="flat_rate">
                        <div class="pristine-error text-primary-3 mt-2" v-if="errors && errors.shipping_type">
                            {{  errors.shipping_type[0] }}</div>
                    </div>

                    <div v-show="form.shipping_type==='flat_rate'" class="input-form mt-3" :class="{'has-error':(errors && errors.shipping_cost)}">
                        <label class="form-label w-full flex flex-col sm:flex-row">
                            Shipping Cost<span class="text-primary-3">*</span>
                        </label>
                        <vue-numeric placeholder="Shipping Cost"  separator="," class="form-control" v-model="form.shipping_cost" required></vue-numeric>
                        <div class="pristine-error text-primary-3 mt-2" v-if="errors && errors.shipping_cost">
                            {{  errors.shipping_cost[0] }}</div>
                    </div>


                    <div class="input-form mt-3" :class="{'has-error':(errors && errors.product_status)}">
                        <label class="form-label w-full flex flex-col sm:flex-row">
                            Product Status<span class="text-primary-3">*</span>
                        </label>
                        <div class="flex flex-col sm:flex-row mt-2">
                            <div class="form-check mr-2">
                                <input v-model="form.product_status" id="radio-switch-4" class="form-check-input" type="radio" name="status" value="1">
                                <label class="form-check-label" for="radio-switch-4">Active</label>
                            </div>
                            <div class="form-check mr-2 mt-2 sm:mt-0">
                                <input v-model="form.product_status" id="radio-switch-5" class="form-check-input" type="radio" name="status" value="0">
                                <label class="form-check-label" for="radio-switch-5">Inactive</label>
                            </div>
                        </div>
                        <div class="pristine-error text-primary-3 mt-2" v-if="errors && errors.product_status">
                            {{  errors.product_status[0] }}</div>
                    </div>

                </div>
            </div>
            <!-- End: Right Content -->


         </div>

    </div>
</template>


<script>
import attribute_values from "../../store/modules/attribute_values";

export default {
    name: "CategoryCreate",
    data: () => ({
        form:{
            color_ids: [],
            attribute_ids: [],
            attribute_value_ids: [],
            stocks: [],
            has_colors: false,
            category_id: '',
            sub_category_id: '',
            product_name: '',
            unit_id: '',
            unit_price: '',
            shipping_type: 'free',
            shipping_cost: 0,
            product_status: '',
        },
        errors: [],
        processing: false,
        message: ""
    }),
    watch: {
        'form.shipping_type'(newValue){
            if(newValue==='free'){
                this.form.shipping_cost = 0;
            }
        }
    },
    created() {
        this.$store.dispatch('categories/loadCategories');
        this.$store.dispatch('sub_categories/loadSubCategories');
        this.$store.dispatch('units/loadUnits');
        this.$store.dispatch('colors/loadColors');
        this.$store.dispatch('attributes/loadAttributes');
        this.$store.dispatch('attribute_values/loadAttributeValues');
    },
    computed:{
        loadCategories() {
            return this.$store.state.categories.categories.map(option => ({id: option.id, text: option.category_name}));
        },
        loadSubCategories() {
            return this.$store.state.sub_categories.sub_categories.filter(product => product.category_id === parseInt(this.form.category_id)).map(option => ({id: option.id, text: option.sub_category_name}));
        },
        loadUnits() {
            return this.$store.state.units.units.map(option => ({id: option.id, text: option.short_name}));
        },
        loadColors() {
            return this.$store.state.colors.colors.map(option => ({id: option.id, text: option.color_name}));
        },
        loadAttributes() {
            return this.$store.state.attributes.attributes.map(option => ({id: option.id, text: option.name}));
        },
        loadAttributeValues() {
            return this.$store.state.attribute_values.attribute_values.map(option => ({id: option.id, text: option.value, parent_id: option.attribute_id}));
        },
        makeAttributeValues(){
            this.form.attribute_value_ids = this.form.attribute_value_ids.filter(attribute_value => this.form.attribute_ids.includes(attribute_value.attribute_id));
            if(this.form.attribute_ids.length) {
                this.form.attribute_ids.forEach( attribute_id => {
                    let old_attribute_value = this.form.attribute_value_ids.filter(attribute_value => parseInt(attribute_value.attribute_id) === parseInt(attribute_id));
                    if(!old_attribute_value.length) {
                        let attribute_value = {attribute_id: attribute_id, values: []};
                        this.form.attribute_value_ids.push(attribute_value);
                    }
                });
            }
            return  this.form.attribute_value_ids;
        },
        makeStocks: function(){
            let options = [];

            // colors variations
            if(this.form.has_colors && this.form.color_ids.length){
                let colors = [];
                this.form.color_ids.forEach(_color => {
                    let color = this.loadColors.filter(color => color.id === parseInt(_color))[0];
                    colors.push(color.text);
                });
                if(colors.length)
                    options.push(colors);
            }
            // attribute variations
            if(this.form.attribute_ids.length && this.form.attribute_value_ids.length){
                this.form.attribute_value_ids.forEach( attribute_value_id => {
                    let attribute_values = [];
                    attribute_value_id.values.forEach(_attribute_value => {
                        let attribute_value = this.loadAttributeValues.filter(attribute_value => attribute_value.id === parseInt(_attribute_value))[0];
                        attribute_values.push(attribute_value.text);
                    });
                    if(attribute_values.length)
                        options.push(attribute_values);
                });
            }
            // make combinations
            // [['white'],['s','m']] => [['white','s'], ['white', 'm']]
            let combinations  = this.makeCombinations(options);
            this.form.stocks = [];
            combinations.forEach(combination => {
                let slug = combination.join('-');
                if(slug.length) {
                    let stock = {variant: slug, sku: slug, price: this.form.unit_price || 0, qty: 10, image: ''};
                    this.form.stocks.push(stock);
                }
            });
            return this.form.stocks;
        }
    },
    methods: {
        saveForm: function (){
            this.processing = true;
            axios.post('/api/v1/products', this.form).then((resp) => {
                this.processing = false
                if(resp.data.error){
                    this.message = resp.data.message;
                }else {
                    this.$vToastify.success(resp.data.message);
                    this.$router.push({name: 'admin.products.index'});
                }
                this.errors = [];
            }).catch((error)=>{
                this.processing = false
                this.errors = error.response.data.errors;
            });
        },
        findAttributeName: function (attribute_id){
            return this.loadAttributes.filter(attribute => attribute.id === parseInt(attribute_id))[0].text;
        },
        findAttributeValues: function (attribute_id){
            return this.loadAttributeValues.filter(attribute_value => attribute_value.parent_id === parseInt(attribute_id));
        },
        makeCombinations: function (options){
            let result = [[]];
            options.forEach(property_values => {
                let temp = [];
                result.forEach(result_item => {
                    property_values.forEach(property_value => {
                        temp.push(result_item.concat([property_value]));
                    });
                });
                result = temp;
            });
            return result;
        },
    }

}
</script>

<style scoped>

</style>
