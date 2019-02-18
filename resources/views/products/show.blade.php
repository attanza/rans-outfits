@extends('layouts.app')
@section('content')
<h2 class="mb-4">Product Detail</h2>
<div class="card">
    <div class="card-body">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#">Detail</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Description</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Attributes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Shipping</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Media</a>
            </li>
        </ul>
        <div class="mt-4">
    @include('products.detailForm')
        </div>

    </div>
</div>
@endsection

@section('scripts')
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
<script>
    setTimeout(function () {
        $('#article-ckeditor').ckeditor({
            toolbar: [
                { name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates' ] },
	{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
	{ name: 'editing', groups: [ 'spellchecker' ], items: [ 'Scayt' ] },
	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
	{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] }
            ]
        })
    }, 100);

</script>
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
