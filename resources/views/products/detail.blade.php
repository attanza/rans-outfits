@include('products.createForm')
@section('scripts')
<script>
    new Vue({
        el: '#app',
        data: {
            formData: {
                code: '{{ $product->code }}',
                name: '{{ $product->name }}',
                product_category_id: '{{ $product->product_category_id }}',
                regular_price: '{{ $product->regular_price }}',
                sell_price: '{{ $product->sell_price }}',
                discount: '{{ $product->discount }}',
                tax: '{{ $product->tax }}',
                stock: '{{ $product->stock }}',
                stock_status_id: '{{ $product->stock_status_id }}',
                ordering: '{{ $product->ordering }}',
                material: '{{ $product->material }}',
                tags: '{{ $product->tags }}',
                is_featured: '{{ $product->is_featured }}',
                is_publish: '{{ $product->is_publish }}',
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
                axios.put('/api/products/{{ $product->id }}', this.formData)
                    .then(res => {
                        if (res.status === 201) {
                            window.location.replace('/admin/products/{{ $product->id }}')
                        }
                    })
                    .catch(e => this.parseError(e))
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
            },
            parseError(e) {
                const {
                    status
                } = e.response
                if (status === 400) {
                    const {data} = e.response
                    this.showNoty(_.trim(data.msg), 'error');
                } else if (status === 422) {
                    const {
                        errors
                    } = e.response.data
                    _.forEach(errors, (value, key) => {
                        this.showNoty(_.trim(value), 'error');
                    });
                }
            }
        }
    })

</script>
@endsection
