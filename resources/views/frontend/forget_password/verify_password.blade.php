<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Verify Your Email Address</div>
                <div class="card-body">
                    <a href="{{ url('/reset-password/' . $token) }}">Click Here</a>
                </div>
            </div>
        </div>
    </div>
</div>
