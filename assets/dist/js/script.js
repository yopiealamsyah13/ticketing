$(document).ready(function(){
  $(".preloader").hide('5000');

  $(".tanggal").datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
  });

  $(".bulan").datepicker({
    format: 'yyyy-mm',
    autoclose: true,
    minViewMode: 1
  });

  $(".select2").select2({
    width: '100%',
    placeholder: 'Choose',
    allowClear: true
  });

  $('.textarea').wysihtml5();

  $(document).on("keypress", ".numb-only", function(evt){
	      var charCode = (evt.which) ? evt.which : event.keyCode
	      if(charCode > 31 && (charCode < 48 || charCode > 57))
	        return false;
	    });
});