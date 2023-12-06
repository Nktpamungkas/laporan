<script type="text/javascript" src="files\bower_components\jquery\js\jquery.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="files\bower_components/jquery_validation/jquery.validate.min.js"></script>
<script type="text/javascript" src="files\bower_components\jquery-ui\js\jquery-ui.min.js"></script>
<script type="text/javascript" src="files\bower_components\popper.js\js\popper.min.js"></script>
<script type="text/javascript" src="files\bower_components\bootstrap\js\bootstrap.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="files\bower_components\jquery-slimscroll\js\jquery.slimscroll.js"></script>
<!-- modernizr js -->
<script type="text/javascript" src="files\bower_components\modernizr\js\modernizr.js"></script>
<script type="text/javascript" src="files\bower_components\modernizr\js\css-scrollbars.js"></script>

<!-- Syntax highlighter prism js -->
<script type="text/javascript" src="files\assets\pages\prism\custom-prism.js"></script>
<!-- i18next.min.js -->
<script type="text/javascript" src="files\bower_components\i18next\js\i18next.min.js"></script>
<script type="text/javascript" src="files\bower_components\i18next-xhr-backend\js\i18nextXHRBackend.min.js"></script>
<script type="text/javascript" src="files\bower_components\i18next-browser-languagedetector\js\i18nextBrowserLanguageDetector.min.js"></script>
<script type="text/javascript" src="files\bower_components\jquery-i18next\js\jquery-i18next.min.js"></script>
<!-- Custom js -->
<script src="files\assets\js\pcoded.min.js"></script>
<script src="files\assets\js\menu\menu-hori-fixed.js"></script>
<script src="files\assets\js\jquery.mCustomScrollbar.concat.min.js"></script>
<!-- <script type="text/javascript" src="files\assets\js\script.js"></script> -->

<!-- data-table js -->
<script src="files\bower_components\datatables.net\js\jquery.dataTables.min.js"></script>
<script src="files\bower_components\datatables.net-buttons\js\dataTables.buttons.min.js"></script>
<script src="files\assets\pages\data-table\js\jszip.min.js"></script>
<script src="files\assets\pages\data-table\js\pdfmake.min.js"></script>
<script src="files\assets\pages\data-table\js\vfs_fonts.js"></script>
<script src="files\bower_components\datatables.net-buttons\js\buttons.print.min.js"></script>
<script src="files\bower_components\datatables.net-buttons\js\buttons.html5.min.js"></script>
<script src="files\bower_components\datatables.net-bs4\js\dataTables.bootstrap4.min.js"></script>
<script src="files\bower_components\datatables.net-responsive\js\dataTables.responsive.min.js"></script>
<script src="files\bower_components\datatables.net-responsive-bs4\js\responsive.bootstrap4.min.js"></script>

<!-- i18next.min.js -->
<script type="text/javascript" src="files\bower_components\i18next\js\i18next.min.js"></script>
<script type="text/javascript" src="files\bower_components\i18next-xhr-backend\js\i18nextXHRBackend.min.js"></script>
<script type="text/javascript" src="files\bower_components\i18next-browser-languagedetector\js\i18nextBrowserLanguageDetector.min.js"></script>
<script type="text/javascript" src="files\bower_components\jquery-i18next\js\jquery-i18next.min.js"></script>
<!-- Custom js -->
<script src="files\assets\pages\data-table\js\data-table-custom.js"></script>

<!-- sweet alert js -->
<script type="text/javascript" src="files\bower_components\sweetalert\js\sweetalert.min.js"></script>
<script type="text/javascript" src="files\assets\js\modal.js"></script>
<!-- sweet alert modal.js intialize js -->
<!-- modalEffects js nifty modal window effects -->
<script type="text/javascript" src="files\assets\js\modalEffects.js"></script>
<script type="text/javascript" src="files\assets\js\classie.js"></script>
<script src="dist/js/select2.min.js"></script>
<script type="text/javascript" src="files\bower_components\select2\js\select2.full.min.js"></script>
<script type="text/javascript" src="files\assets\pages\advance-elements\select2-custom.js"></script>
<script type="text/javascript" src="xeditable/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

<script>
    $.fn.editable.defaults.mode = 'inline';
    $(document).ready(function() {
      $('.note_edit').editable({
          type: 'text',
          showbuttons : false,
          url: 'editable/editable_bukupinjam_note.php',
      });
      $('.kode_edit').editable({
        type: 'select',
        showbuttons : false,
        url: 'editable/editable_bukupinjam_kode.php',
        disabled : false,
        showbuttons : false,
        source:[{value: "", text: ""}, 
                {value: "DL", text: "DL - Dye Lot Card"},
                {value: "RC", text: "RC - Recipe Card"},
                {value: "OR", text: "OR - Original"},
                {value: "LD", text: "LD - Lab Dip"},
                {value: "SL", text: "SL - Sample L/D"},
                {value: "TE", text: "TE - Tempelan Sample Celup"},
                {value: "FL", text: "FL - Frist Lot"}]
      });
      $('.archive_edit').editable({
        type: 'select',
        showbuttons : false,
        url: 'editable/editable_archive.php',
        disabled : false,
        showbuttons : false,
        source:[{value: "", text: ""}, 
                {value: "Diarsipkan", text: "Diarsipkan"},
                {value: "Belum_Diarsipkan", text: "Belum Diarsipkan"}]
      });
      $('.archive_edit_te').editable({
        type: 'select',
        showbuttons : false,
        url: 'editable/editable_archive_te.php',
        disabled : false,
        showbuttons : false,
        source:[{value: "", text: ""}, 
                {value: "Diarsipkan LAB", text: "Diarsipkan LAB"},
                {value: "Diarsipkan", text: "Diarsipkan"},
                {value: "Belum_Diarsipkan", text: "Belum Diarsipkan"}]
      });
    })
</script>
<script>
  window.dataLayer = window.dataLayer || [];

  function gtag() {
    dataLayer.push(arguments);
  }
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');

  $(document).ready(function(){
	// Single Search Select
      $(".js-example-basic-single").select2();
  });
</script>
</body>

</html>