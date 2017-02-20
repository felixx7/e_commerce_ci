    </div>
    <!-- /#wrapper -->
    
    <!-- jQuery -->
    <script src="<?=base_url();?>assets/adm/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url();?>assets/adm/js/bootstrap.min.js"></script>

    <!-- Datatable -->
    <script src ="<?=base_url();?>assets/datatables/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.datatable').DataTable();
        } );
    </script>

    <script type="text/javascript" src="<?=base_url();?>assets/summernote/summernote.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#summernote').summernote({
                height: "400px",
                styleWithSpan: false
            });
            $(".summernote").summernote("code", $('#edittext').text());
        });
        function postForm() {
            $('textarea[name="ket"]').html($('#summernote').code());
        }
    </script>

    <script src="<?=base_url();?>assets/bootstrap/bootstrap-datepicker.js"></script>
    <script>
        $(".datepicker").datepicker();
    </script> 
    <!-- Morris Charts JavaScript -
    <script src="<?=base_url();?>assets/adm/js/plugins/morris/raphael.min.js"></script>
    <script src="<?=base_url();?>assets/adm/js/plugins/morris/morris.min.js"></script>
    <script src="<?=base_url();?>assets/adm/js/plugins/morris/morris-data.js"></script>
    -->

</body>

</html>