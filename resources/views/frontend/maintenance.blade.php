@include('frontend.layout.header')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mt-5">

                <div class="alert alert-danger">
                    {{setting()->message_maintenance}}
                </div>
            </div>
        </div>
    </div>
@include('frontend.layout.footer')
