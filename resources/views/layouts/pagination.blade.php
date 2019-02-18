<div class="row mt-4">
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
                <li :class="{'page-item': true, 'active': n == pagination.current_page}" v-for="n in pagination.last_page"><a class="page-link" href="javascript:void(0)" @click="toPage(n)">@{{ n }}</a></li>
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
