<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#productModal">
    Add Product
</button><br/>

<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Products Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <product-form></product-form>
                </div>
            </div>
        </div>
    </div>
</div>