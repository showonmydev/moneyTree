<div id="createAccountModal" class="modal modal-fixed-footer">

    <form action="/SaveUser" method="POST" id="insertUsersForm">
        <div class="modal-content">
            <div class="form-group">
                <label for="FullName">Full Name</label>
                <input  type="text" class="form-control" id="FullName" placeholder="Enter the Full Name"/>
            </div>
            <div class="form-group">
                <label for="UserName">User Name</label>
                <input  type="text" class="form-control" id="UserName" placeholder="Enter the User Name"/>
            </div>
            <div class="form-group">
                <label for="Password">Password</label>
                <input  type="password" class="form-control" id="Password" placeholder="Enter the title of the job"/>
            </div>
        </div>
        <div class="modal-footer">
            <div class="form-group">
                <button type="submit" class="modal-action modal-close waves-effect waves-green btn-flat " id="UsersSubmit">Save</button>
                <button type="submit" class="modal-action modal-close waves-effect waves-green btn-flat " id="Usersupdate">Update</button>
                <a  href = "/DeleteLifeCard" class="modal-action modal-close waves-effect waves-green btn-flat " id="UsersDelete">Delete</a>
            </div>
        </div>
    </form>
</div>