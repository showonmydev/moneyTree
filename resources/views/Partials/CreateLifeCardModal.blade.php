<div id="createlifeCardModal" class="modal modal-fixed-footer">

    <form action="/SaveLifeCard" method="POST" id="insertLifeCardForm">
        <div class="modal-content">
            <div class="form-group">
                <label for="lifeCardQuestion">Question</label>
                <textarea class="materialize-textarea" id="lifeCardQuestion" style="width: 700px; height: 150px;" placeholder="Enter the life card question"></textarea>
            </div>

        </div>
        <div class="modal-footer">
            <div class="form-group">
                <button type="submit" class="modal-action modal-close waves-effect waves-green btn-flat " id="lifecardSubmit">Save</button>
                <button type="submit" class="modal-action modal-close waves-effect waves-green btn-flat " id="lifecardupdate">Update</button>
                <a  href = "/DeleteLifeCard" class="modal-action modal-close waves-effect waves-green btn-flat " id="lifecardDelete">Delete</a>
            </div>
        </div>
    </form>
</div>