<div id="createTreviaModal" class="modal modal-fixed-footer">

    <form action="/SaveLifeCard" method="POST" id="insertTreeViaForm">
        <div class="modal-content">
            <div class="form-group">
                <label for="lifeCardQuestion">Question</label>
                <textarea class="materialize-textarea" id="TreeViaQuestion"  placeholder="Enter the TreeVia question"></textarea>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <select id="CategoryDropDown">
                        <option value="" disabled selected>Choose your option</option>
                        @foreach($allCategory as $cat)
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                    </select>
                    <label>Category Select</label>
                </div>
                <div class="input-field col s6">
                        <label for="lifeCardQuestion">A</label>
                        <input type="text" placeholder="Enter Option A" id="TreeViaA" >
                </div>
                <div class="input-field col s6">
                        <label for="lifeCardQuestion">B</label>
                        <input type="text" placeholder="Enter Option B" id="TreeViaB">
                </div>
                <div class="input-field col s6">
                        <label for="lifeCardQuestion">C</label>
                        <input type="text" placeholder="Enter Option C" id="TreeViaC">
                </div>
                <div class="input-field col s6">
                        <label for="lifeCardQuestion">D</label>
                        <input type="text" placeholder="Enter Option D" id="TreeViaD">
                </div>
                <div class="input-field col s6">
                    <label for="lifeCardQuestion">Correct Option</label>
                    <input type="text" placeholder="Enter correct option" id="TreeViaCorrectOption">
                </div>
            </div>

        </div>
        <div class="modal-footer">
            <div class="form-group">
                <button type="submit" class="modal-action modal-close waves-effect waves-green btn-flat " id="TreeViaSubmit">Save</button>
                <button type="submit" class="modal-action modal-close waves-effect waves-green btn-flat " id="TreeViaupdate">Update</button>
                <a  href = "/DeleteTreeVia" class="modal-action modal-close waves-effect waves-green btn-flat " id="TreeViaDelete">Delete</a>
            </div>
        </div>
    </form>
</div>