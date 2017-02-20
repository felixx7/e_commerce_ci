        </div>

    </div>
    <!-- /.container -->
    <div style="background:#f0f0f0;margin:15px 0 0 0;">
        <div class="container">
            <!-- Footer -->
            <footer>
                <div class="row">
                    <div class="col-lg-12">
                        <p>Copyright &copy; <a href="http://larfess.com">Larfess</a> 2015 - <?=date("Y");?>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Jl. Bangun Nusa No.27, Rt. 06 RW. 02, Kec. Cengkareng, Kelurahan Cengkareng Timur, Jakarta Barat.</p>  
                    </div>
                </div>
            </footer>

        </div>
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="<?=base_url();?>assets/e/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url();?>assets/e/js/bootstrap.min.js"></script>

    <script src ="<?=base_url();?>assets/datatables/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.datatable').DataTable();
        } );
    </script>

    <script>
    // Only enable if the document has a long scroll bar
    // Note the window height + offset
    if ( ($(window).height() + 100) < $(document).height() ) {
        $('#top-link-block').removeClass('hidden').affix({
            // how far to scroll down before link "slides" into view
            offset: {top:100}
        });
    }
    </script>

</body>

</html>