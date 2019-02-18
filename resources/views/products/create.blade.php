@extends('layouts.app')
@section('content')
<h2 class="mb-3">Create New Product</h2>
<div class="card">
    <div class="card-body">
    @include('products.detailForm')
    </div>
</div>
@endsection

@section('scripts')
<script>
    new Vue({
        el: '#app',
        data: {
            formData: {
                code: '',
                name: '',
                product_category_id: '',
                regular_price: '',
                sell_price: '',
                discount: '',
                tax: '',
                stock: '',
                stock_status_id: '',
                ordering: '',
                material: '',
                tags: '',
                is_featured: '',
                is_publish: '',
            },
            categories: [],
            stockStatus: [],

        },
        mounted() {
            this.initData()
        },
        methods: {
            initData() {
                axios.get('/api/combo-data?model=ProductCategory')
                    .then(res => {
                        if (res.status === 200) {
                            this.categories = res.data
                        }
                    }).catch(e => console.log(e))
                axios.get('/api/combo-data?model=StockStatus')
                    .then(res => {
                        if (res.status === 200) {
                            this.stockStatus = res.data
                        }
                    }).catch(e => console.log(e))
            },
            submit(e) {
                e.preventDefault()
                this.$validator.validate().then(result => {
                    if (result) {
                        this.saveProduct()
                        return;

                    }
                });
            },
            saveProduct() {
                axios.post('/api/products', this.formData)
                    .then(res => {
                        if(res.status === 201) {
                            window.location.replace('/admin/products')
                        }
                    })
                    .catch(e => {
                        const {
                            errors
                        } = e.response.data
                        _.forEach(errors, (value, key) => {
                            this.showNoty(_.trim(value), 'error');
                        });
                    })
            },
            showNoty(text, type) {
                return new Noty({
                    layout: "topRight",
                    text,
                    theme: "metroui",
                    timeout: 5000,
                    progressBar: true,
                    type
                }).show();
            }
        }
    })

</script>
@endsection
