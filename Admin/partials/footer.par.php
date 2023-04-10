
        <!-- .animated -->
            </div>
        <!-- /.content -->
        <div class="clearfix"></div>

        <!-- ck editor -->
<script>
    ClassicEditor
        .create( document.querySelector( '#post_desc' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

<!-- select all function -->
<script>
    $('#select_all').click(function(event) {
        if(this.checked) {
            // Iterate each checkbox
            $('.select_one').each(function() {
                this.checked = true;
            });
        } else {
            $('.select_one').each(function() {
                this.checked = false;
            });
        }
    });
</script>



    </div>
        <!-- Footer -->
        <footer class="site-footer" style="bottom:0px; width:100%; ">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-12">
                        Copyright &copy; 2020  Designed by <a href="https://awashtechno.com">AwashTech</a>
                    </div>
                    <div class="col-sm-6 text-right">
                        <!-- Designed by <a href="https://awashtechno.com">AwashTech</a> -->
                    </div>
                </div>
            </div>
        </footer>
        <!-- /.site-footer -->