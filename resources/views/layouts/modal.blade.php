<script type="text/javascript">
    function confirm_modal_hard_reload(action)
    {
    	jQuery('#hard_reload_modal').modal('show', {backdrop: 'static'});
        document.getElementById('hard_delete_form').setAttribute('action', action);
    }
</script>

<!-- (Normal Modal)-->
<div class="modal fade" id="hard_reload_modal">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top:100px;">
            
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" style="text-align:center;">Are you sure to delete this information ?</h4>
            </div>
            
            
            <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
            	<form id="hard_delete_form" action="" method="POST">
				    @method('DELETE')
				    @csrf
				    <input type="submit" name="submit" class="btn btn-danger" value="Delete">
				    <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
				</form>
            </div>
        </div>
    </div>
</div>