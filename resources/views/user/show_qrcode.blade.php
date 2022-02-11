<div class="container text-center mt-5">
        <div class="row">
            <div class="col-md-12">
                    {!!DNS2D::getBarcodeHTML(Auth::user()->id_for_qrcode, 'QRCODE')!!}
            </div>
        </div>
    </div>