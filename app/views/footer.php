    </div>
	<!--Footer-part-->
	<div class="row-fluid">
	  <div id="footer" class="span12"> 2016 &copy; Rigen </div>
	</div>
	<!--end-Footer-part-->
	<script src="<?=base_url()?>asset/js/excanvas.min.js"></script> 
	<script src="<?=base_url()?>asset/js/jquery.min.js"></script> 
	<script src="<?=base_url()?>asset/js/jquery.ui.custom.js"></script> 
	<script src="<?=base_url()?>asset/js/bootstrap.min.js"></script> 
	<script src="<?=base_url()?>asset/js/jquery.flot.min.js"></script> 
	<script src="<?=base_url()?>asset/js/jquery.flot.resize.min.js"></script> 
	<script src="<?=base_url()?>asset/js/jquery.peity.min.js"></script> 
	<script src="<?=base_url()?>asset/js/matrix.js"></script> 
	<script src="<?=base_url()?>asset/js/fullcalendar.min.js"></script> 
	<script src="<?=base_url()?>asset/js/matrix.calendar.js"></script> 
	<script src="<?=base_url()?>asset/js/matrix.chat.js"></script> 
	<script src="<?=base_url()?>asset/js/jquery.validate.js"></script> 
	<script src="<?=base_url()?>asset/js/matrix.form_validation.js"></script> 
	<script src="<?=base_url()?>asset/js/jquery.wizard.js"></script> 
	<script src="<?=base_url()?>asset/js/jquery.uniform.js"></script> 
	<script src="<?=base_url()?>asset/js/select2.min.js"></script> 
	<script src="<?=base_url()?>asset/js/matrix.popover.js"></script> 
	<script src="<?=base_url()?>asset/js/jquery.dataTables.min.js"></script> 
	<script src="<?=base_url()?>asset/js/matrix.tables.js"></script> 
	<script src="<?=base_url()?>asset/js/matrix.interface.js"></script> 
	<script type="text/javascript">
	  function goPage (newURL) {
	      if (newURL != "") {
	          if (newURL == "-" ) {
	              resetMenu();            
	          }
	          else {  
	            document.location.href = newURL;
	          }
	      }
	  }
	function resetMenu() {
	   document.gomenu.selector.selectedIndex = 2;
	}
	</script>

<link href="<?=base_url()?>asset/jquery/development-bundle/themes/base/jquery.ui.all.css" rel="stylesheet" type="text/css" />
<script src="<?=base_url()?>asset/jquery/jquery-2.0.3.min.js"></script>
<script src="<?=base_url()?>asset/jquery/development-bundle/ui/jquery.ui.core.js"></script>
<script src="<?=base_url()?>asset/jquery/development-bundle/ui/jquery.ui.widget.js"></script>
<script src="<?=base_url()?>asset/jquery/development-bundle/ui/jquery.ui.position.js"></script>
<script src="<?=base_url()?>asset/jquery/development-bundle/ui/jquery.ui.mouse.js"></script>
<script src="<?=base_url()?>asset/jquery/development-bundle/ui/jquery.ui.button.js"></script>
<script src="<?=base_url()?>asset/jquery/development-bundle/ui/jquery.ui.dialog.js"></script>
<script src="<?=base_url()?>asset/jquery/development-bundle/ui/jquery.ui.datepicker.js"></script>
<script>

$(function() {
   $(".del").click(function(){
      var request = $(this).attr("href"); // alamat URL dari request
      var record = $(this).parents("tr"); 
      $("#dialog-confirm").dialog({
         resizable: false,
         modal: true,
         draggable: false,
         buttons: {
            "Ya, Hapus" : function(){
                $.ajax({
                       url: request, // diambil dari atribut HREF pada tag A, lihat var request di atas
                       success: function(){
                          $(record).remove(); // update tampilan baris yang telah dihapus
                          $("#dialog-confirm").dialog("close"); // tutup kotak dialog
							location.reload();
                       }
                    });
            },
            "Tidak, Batalkan": function(){
               $(this).dialog("close");
            }
         }
      });
      return false;
   });
});
</script>
<style>
 .ui-widget{
  font-size:11px;
 }
</style>
<div id="dialog-confirm" title="Konfirmasi" style="display:none;">
 <p>Anda yakin mau menghapus data ini?</p>
</div>
<style type="text/css">
.ui-front{
  z-index: 9999 !important;
}
</body>
</html>