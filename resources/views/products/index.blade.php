@extends('layouts.app') 
@section('content')
<div class="row justify-content-between mb-2">
    <div class="col">
        <h1>Products</h1>
    </div>
    <div class="col text-right">
        <a href="/admin/products/create" class="btn btn-primary">Create New Product</a>
    </div>
</div>
<div class="row justify-content-between mb-2">
    <div class="col-md-2 mb-1">
        <select class="form-control" v-model="pagination.per_page" @change="getProducts">
            <option v-for="show in shows" :value="show">@{{ show }}</option>
        </select>
    </div>
    <div class="col-md-6"></div>
    <div class="col text-right mb-1">
        <div class="input-group mb-3">
            <input type="text" class="form-control" v-model="search" placeholder="Search ..." aria-describedby="basic-addon2">
            <div class="input-group-append">
                <span class="input-group-text" id="basic-addon2">
                    <i class="material-icons">search</i>
                </span>
            </div>
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Code</th>
                <th scope="col">Name</th>
                <th scope="col">Regular Price</th>
                <th scope="col">Sell Price</th>
                <th scope="col">Stock</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="product in products" :key="product.id">
                <td scope="row"><a :href="`/admin/products/${product.id}`">@{{ product.code }}</a></td>
                <td scope="row">@{{ product.name }}</td>
                <td scope="row">@{{ product.regular_price.toLocaleString() }}</td>
                <td scope="row">@{{ product.sell_price.toLocaleString() }}</td>
                <td scope="row">@{{ product.stock }}</td>
            </tr>
        </tbody>
    </table>
</div>
<div class="row">
    <div class="col">
        <p>
            Showing @{{ pagination.from }} to @{{ pagination.to }} of @{{ pagination.total }}
        </p>
    </div>
    <div class="col text-right">

        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end">
                <li :class="{ 'page-item': true, 'disabled':  !pagination.prev_page_url}">
                    <a class="page-link" aria-label="Previous" href="javascript:void(0)" @click="toPage('prev')">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <li class="page-item" v-for="n in pagination.last_page"><a class="page-link" href="javascript:void(0)" @click="toPage(n)">@{{ n }}</a></li>
                <li :class="{ 'page-item': true, 'disabled':  !pagination.next_page_url}">
                    <a class="page-link" href="javascript:void(0)" @click="toPage('next')" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
@endsection
 
@section('scripts')
<script>
    new Vue({
        el: '#app',
        data: {
            products: [],
            search: '',
            pagination: {
                current_page: 1,
                per_page: 10,
            },
            shows: [10, 25, 50, 100]
        },
        watch: {
            search: {
                handler: _.debounce(function () {
                    this.getProducts();
                }, 500)
            }
        },
        mounted() {
            this.getProducts()
        },
        methods: {
            toPage(action) {
                if (action === parseInt(action, 10)) {
                    this.pagination.current_page = action
                } else if (action === 'prev') {
                    this.pagination.current_page--
                } else {
                    this.pagination.current_page++
                }
                this.getProducts()
            },
            getProducts() {
                const endpoint =
                    `/api/products?page=${this.pagination.current_page}&per_page=${this.pagination.per_page}&search=${this.search}`
                axios.get(endpoint).then(res => {
                    if (res.status === 200) {
                        this.products = res.data.data
                        delete res.data['data']
                        this.pagination = res.data
                    }
                }).catch(e => console.log(e))
            }
        }
    })

</script>
@endsection