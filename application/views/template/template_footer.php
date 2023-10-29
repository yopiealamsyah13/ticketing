<footer class="main-footer">
    <strong>&copy; 2022 <a href="http://www.sefasgroup.com" class="bg-sefas">SEFAS Group</a>.</strong> All rights
    reserved.
</footer>


<style type="text/css">
	.fts {
		position: fixed;
		right: 20px;
		bottom: 20px;
	}
	.plus {
  display:inline-block;
  width:50px;
  height:50px;
  
  background:
    linear-gradient(#fff 0 0),
    linear-gradient(#fff 0 0),
    #000;
  background-position:center;
  background-size: 50% 2px,2px 50%; /*thickness = 2px, length = 50% (25px)*/
  background-repeat:no-repeat;
}

.radius {
  border-radius:50%;
}
</style>
<a data-toggle="modal" data-target="#modal-add" class="fts"><div class="plus radius"></div></a>

<!-- START MODAL EXPORT -->
<div class="modal fade" id="modal-add">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <form method="post" id="formRequest" enctype="multipart/form-data" action="<?php echo site_url(); ?>request/add_ticket">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><strong>Create New Ticket</strong></h4>
      </div>
      <div class="modal-body box-sfs">
        <div class="row">
        
        <div class="col-md-3">
          <div class="form-group">
            <label for="level" class="control-label">Assign To</label>
            <select class="form-control select2" id="id_departemen" name="request_to" style="width:100%; display:block;" required>
            </select>
          </div>
        </div>
        
        
        <div class="col-md-3">
          <div class="form-group">
            <label for="id_request_category" class="control-label">Category</label>
            <select class="form-control select2" id="id_category" name="id_request_category" style="width:100%; display:block;" disabled required>
            </select>
          </div>
        </div>

        <div class="col-md-3">
          <div class="form-group">
            <label for="id_request_level" class="control-label">Level</label>
            <select class="form-control select2" id="id_level" name="id_request_level" style="width:100%; display:block;" required>
            </select>
          </div>
        </div>

        <div class="col-md-3">
          <div class="form-group">
            <label for="id_location" class="control-label">Location</label>
            <select class="form-control select2" id="id_location" name="id_location" style="width:100%; display:block;" required>
            </select>
          </div>
        </div>

        <div class="col-md-12">
          <div class="form-group">
            <label for="level" class="control-label">Subject</label>
            <input type="text" class="form-control" name="request_subject" required>
          </div>
        </div>

        <div class="col-md-12">
          <div class="form-group">
            <label for="level" class="control-label">Description</label>
            <textarea class="form-control textarea" name="request_description" rows="5" required></textarea>
          </div>
        </div>
        
        <div class="col-md-12">
          <div class="form-group">
            <label for="request_attachment" class="control-label">Attachment</label>
              <input type="file" name="request_attachment[]"><br>
              <div class="instructions__append-inputs">
              </div>
              <p>* Only allow .JPG/.JPEG/.PNG/.PDF/.XLSX/.DOCX</p>
          </div>
        </div>
        
        <div class="col-md-12">
          <div class="form-group">
        <input type="button" style="margin-top:10px;" class="btn btn-sm btn-sfs" id="btn-add" value="Add More" data-toggle="tooltip" title="More Attachment">
        </div>
        </div>

        </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-sfs" id="save">Submit</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      <!-- /.modal-content -->
      </form>
    </div>
    <!-- /.modal-dialog -->
  </div>
</div>
<!-- /.modal -->
<!-- END MODAL ADD -->
<script>
$(function() {
get_category();
get_level();
get_departemen();
get_location();



function get_departemen() {
  $.ajax({
    method   :'GET',
    url      : '<?php echo site_url('request/get_departemen')?>',
    async    : false,
    dataType : 'json',
    success:function(data){
      var html = '';
      var j=1;
      html += '<option value="">- Select -</option>';
      for(i=0; i< data.length; i++){
          html +=  '<option value='+data[i].id_departemen+'>'+data[i].name_departemen+'</option>';
      }
      $('#id_departemen').html(html);
    }
  });
}

function get_category() {
  $("#id_departemen").change(function()
  {
    $("#id_category").prop('disabled', false);
  var id_departemen = {id_departemen:$("#id_departemen :selected").val()};
    $.ajax({
      method   :'POST',
      url      : '<?php echo site_url('request/get_category')?>',
      async    : false,
      data:id_departemen,
      dataType : 'json',
      success:function(data){
        var html = '';
        var j=1;
        html += '<option value="">- Select -</option>';
        for(i=0; i< data.length; i++){
            html +=  '<option value='+data[i].id_request_category+'>'+data[i].name_request_category+'</option>';
        }
        $('#id_category').html(html);
      }
    });
  });
}


function get_level() {
  $.ajax({
    method   :'GET',
    url      : '<?php echo site_url('request/get_level')?>',
    async    : false,
    dataType : 'json',
    success:function(data){
      var html = '';
      var j=1;
      html += '<option value="">- Select -</option>';
      for(i=0; i< data.length; i++){
          html +=  '<option value='+data[i].id_request_level+'>'+data[i].name_request_level+'</option>';
      }
      $('#id_level').html(html);
    }
  });
}


function get_location() {
  $.ajax({
    method   :'GET',
    url      : '<?php echo site_url('request/get_location')?>',
    async    : false,
    dataType : 'json',
    success:function(data){
      var html = '';
      var j=1;
      html += '<option value="">- Select -</option>';
      for(i=0; i< data.length; i++){
          html +=  '<option value='+data[i].id_area+'>'+data[i].name_area+' ('+data[i].code_area+')</option>';
      }
      $('#id_location').html(html);
    }
  });
}

$('.textarea').wysihtml5();
$('.select2').select2();

  $('#formRequest').submit(function(){
      $("#save").prop('disabled',true);
      $("#save").text('Sending, please wait...');
    });

    
  $('#btn-add').on('click', function() {
    $('.instructions__append-inputs').append('<input type="file" name="request_attachment[]"><br>');
  });
});
</script>