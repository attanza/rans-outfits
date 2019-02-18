<form @submit="submit">
    <div class="row">
        <div class="form-group col-md-6">
            <label for="code">Code</label>
            <input v-validate="'required|max:20'" type="text" :class="{'form-control': true, 'is-invalid': !!errors.first('code')}" v-model="formData.code"
                name="code" data-vv-name="code" data-vv-as="Code">
            <div class="invalid-feedback" v-if="errors.first('code')">
                @{{ errors.first('code') }}
            </div>
        </div>

        <div class="form-group col-md-6">
            <label for="name">Name</label>
            <input v-validate="'required|max:150'" type="text" :class="{'form-control': true, 'is-invalid': !!errors.first('name')}"
                v-model="formData.name" name="name" data-vv-name="name" data-vv-as="name">
            <div class="invalid-feedback" v-if="errors.first('name')">
                @{{ errors.first('name') }}
            </div>
        </div>

        <div class="form-group col-md-6">
            <label for="product_category_id">Category</label>
            <select v-validate="'required|integer'" name="product_category_id" :class="{'form-control': true, 'is-invalid': !!errors.first('product_category_id')}"
                v-model="formData.product_category_id" data-vv-name="product_category_id" data-vv-as="Category">
                <option value="">Select product category ... </option>
                <option v-for="cat in categories" :value="cat.id" :key="cat.id">@{{ cat.name }}</option>
            </select>
            <div class="invalid-feedback" v-if="errors.first('product_category_id')">
                @{{ errors.first('product_category_id') }}
            </div>
        </div>

        <div class="form-group col-md-6">
            <label for="regular_price">Regular Price</label>
            <input type="number" v-validate="'required|integer'" type="text" :class="{'form-control': true, 'is-invalid': !!errors.first('regular_price')}"
                v-model="formData.regular_price" name="regular_price" data-vv-name="regular_price" data-vv-as="Regular Price">
            <div class="invalid-feedback" v-if="errors.first('regular_price')">
                @{{ errors.first('regular_price') }}
            </div>
        </div>

        <div class="form-group col-md-6">
            <label for="sell_price">Sell Price</label>
            <input type="number" v-validate="'integer'" type="text" :class="{'form-control': true, 'is-invalid': !!errors.first('sell_price')}"
                v-model="formData.sell_price" name="sell_price" data-vv-name="sell_price" data-vv-as="Sell Price">
            <div class="invalid-feedback" v-if="errors.first('sell_price')">
                @{{ errors.first('sell_price') }}
            </div>
        </div>

        <div class="form-group col-md-6">
            <label for="discount">Discount</label>
            <input type="number" v-validate="'integer'" type="text" :class="{'form-control': true, 'is-invalid': !!errors.first('discount')}"
                v-model="formData.discount" name="discount" data-vv-name="Discount" data-vv-as="Discount">
            <div class="invalid-feedback" v-if="errors.first('discount')">
                @{{ errors.first('discount') }}
            </div>
        </div>

        <div class="form-group col-md-6">
            <label for="tax">Tax</label>
            <input type="number" v-validate="'integer'" type="text" :class="{'form-control': true, 'is-invalid': !!errors.first('tax')}"
                v-model="formData.tax" name="tax" data-vv-name="tax" data-vv-as="Tax">
            <div class="invalid-feedback" v-if="errors.first('tax')">
                @{{ errors.first('tax') }}
            </div>
        </div>

        <div class="form-group col-md-6">
            <label for="stock">Stock</label>
            <input type="number" v-validate="'integer'" type="text" :class="{'form-control': true, 'is-invalid': !!errors.first('stock')}"
                v-model="formData.stock" name="stock" data-vv-name="stock" data-vv-as="Stock">
            <div class="invalid-feedback" v-if="errors.first('stock')">
                @{{ errors.first('stock') }}
            </div>
        </div>

        <div class="form-group col-md-6">
            <label for="stock_status_id">Stock Status</label>
            <select v-validate="'required|integer'" name="stock_status_id" :class="{'form-control': true, 'is-invalid': !!errors.first('stock_status_id')}"
                v-model="formData.stock_status_id" data-vv-name="stock_status_id" data-vv-as="Stock Status">
                <option value="">Select stock status ... </option>
                <option v-for="cat in stockStatus" :value="cat.id" :key="cat.id">@{{ cat.name }}</option>
            </select>
            <div class="invalid-feedback" v-if="errors.first('stock_status_id')">
                @{{ errors.first('stock_status_id') }}
            </div>
        </div>

        <div class="form-group col-md-6">
            <label for="ordering">Ordering</label>
            <input type="number" v-validate="'integer'" type="text" :class="{'form-control': true, 'is-invalid': !!errors.first('ordering')}"
                v-model="formData.ordering" name="ordering" data-vv-name="ordering" data-vv-as="Ordering">
            <div class="invalid-feedback" v-if="errors.first('ordering')">
                @{{ errors.first('ordering') }}
            </div>
        </div>

        <div class="form-group col-md-6">
            <label for="material">Material</label>
            <input v-validate="'max:250'" type="text" :class="{'form-control': true, 'is-invalid': !!errors.first('material')}" v-model="formData.material"
                name="material" data-vv-name="material" data-vv-as="Material">
            <div class="invalid-feedback" v-if="errors.first('material')">
                @{{ errors.first('material') }}
            </div>
        </div>

        <div class="form-group col-md-6">
            <label for="tags">Tags</label>
            <input v-validate="'max:250'" type="text" :class="{'form-control': true, 'is-invalid': !!errors.first('tags')}" v-model="formData.tags"
                name="tags" data-vv-name="tags" data-vv-as="Tags">
            <div class="invalid-feedback" v-if="errors.first('tags')">
                @{{ errors.first('tags') }}
            </div>
        </div>

        <div class="form-group col-md-6">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" v-model="formData.is_publish">
                <label class="form-check-label" for="is_publish">Publish</label>
            </div>
        </div>

        <div class="form-group col-md-6">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" v-model="formData.is_featured">
                <label class="form-check-label" for="is_featured">Make Featured ?</label>
            </div>
        </div>
    </div>
    <div class="row justify-content-between mt-4">
        <div class="col">
            <a href="/admin/products" class="btn btn-secondary">Cancel</a>
        </div>

        <div class="col text-right">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</form>
