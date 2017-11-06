<div id="createJobsModal" class="modal modal-fixed-footer">

    <form action="/SaveLifeCard" method="POST" id="insertJobsForm">
        <div class="modal-content">
            <div class="form-group">
                <label for="JobTitle">Title</label>
                <input  type="text" class="form-control" id="JobTitle" placeholder="Enter the title of the job"/>
            </div>
            <div class="form-group">
                <label for="JobDescription">Description</label>
                <textarea   class="materialize-textarea" id="JobDescription" placeholder="Enter the description of the job"></textarea>
            </div>

        </div>
        <div class="modal-footer">
            <div class="form-group">
                <button type="submit" class="modal-action modal-close waves-effect waves-green btn-flat " id="JobsSubmit">Save</button>
                <button type="submit" class="modal-action modal-close waves-effect waves-green btn-flat " id="Jobsupdate">Update</button>
                <a  href = "/DeleteLifeCard" class="modal-action modal-close waves-effect waves-green btn-flat " id="JobsDelete">Delete</a>
            </div>
        </div>
    </form>
</div>