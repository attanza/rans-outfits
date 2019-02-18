<form @submit="submit">
    <div class="row mb-3">
        <div class="col">
            <label for="short_description">Short Description</label>
            <ckeditor :editor="editor" v-model="formData.short_description" :config="editorConfig"></ckeditor>

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


@section('scripts')
<script>
    new Vue({
        el: '#app',
        data: {
            id: '{{ $product->description->id }}',
            formData: {
                product_id: '{{ $product->id }}',
                short_description: '{{{ $product->description->short_description  }}}',
                long_description: '{{{ $product->description->long_description }}}',
            },
            editor: ClassicEditor,
            editorConfig: {
                toolbar: [
                    "heading",
                    "|",
                    "bold",
                    "italic",
                    "bulletedList",
                    "numberedList",
                    "blockQuote"
                ]
            },
        },
        watch: {
            short_description() {
                console.log(this.formData.short_description)
            }
        },
        methods: {
            submit(e) {
                e.preventDefault();
                console.log('id', this.id)
                console.log('formData', this.formData)
                // if (!this.id || this.data == '') {
                //     axios.post('/api/product-descriptions', formData)
                //         .then(res => {
                //             console.log(res)

                //             if (res.status === 201) {
                //                 // window.location.replace('/admin/products/{{ $product->id }}?activeTab=description')
                //             }
                //         })
                //         .catch(e => this.parseError(e))
                // } else {
                //     axios.put('/api/product-descriptions/' + this.id, formData)
                //         .then(res => {
                //             console.log(res)
                //             if (res.status === 200) {
                //                 // window.location.replace('/admin/products/{{ $product->id }}?activeTab=description')
                //             }
                //         })
                //         .catch(e => this.parseError(e))
                // }
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
                    const {
                        data
                    } = e.response
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
