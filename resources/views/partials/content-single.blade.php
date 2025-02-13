<article @php(post_class('h-entry'))>
    @include('partials.page-header')

    <section class="section content-single content">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                    @php(the_content())
                </div>
            </div>
        </div>
    </section>
</article>