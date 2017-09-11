<form method="post" action="<?php echo base_url('action/createNote/'.$note['target']."/".$note['value']) ?>">
	<div class="input-group">
     <textarea class="form-control form-control-sm" name="content" rows="1" placeholder="Skriv en kommentar"></textarea>
      <span class="input-group-btn">
        <button class="btn btn-sm btn-primary confirm-form-submit">Gem</button>
      </span>
    </div>
    <input type="hidden" name="referer" value="<?php echo current_url() ?>">
</form>