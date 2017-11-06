<div id="createTreeViaCategoryModal" class="modal modal-fixed-footer">

    <form action="/SaveTreeViaCategory" method="POST" id="insertTreeViaCategoryForm">
        <div class="modal-content">
            <div class="form-group">
                <div class="row">
                    <div class="input-field col s6">
                        <div class="form-group">
                            <input class="form-control" type="text" id="TreeViaCategoryTxt" placeholder="Enter the category Name"/>
                            <label for="TreeViaCategoryTxt">Category Name</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <div class="form-group">
                <button type="submit" class="modal-action modal-close waves-effect waves-green btn-flat " id="TreeViaCategorySubmit">Save</button>
                <button type="submit" class="modal-action modal-close waves-effect waves-green btn-flat " id="TreeViaCategoryupdate">Update</button>
                <a  href = "/DeleteLifeCard" class="modal-action modal-close waves-effect waves-green btn-flat " id="TreeViaCategoryDelete">Delete</a>
            </div>
        </div>
    </form>
</div>