<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-xm-12 col-sm-6 col-md-3">
                <?php
                if (is_active_sidebar('footer-wedgit-1')) :
                    dynamic_sidebar('footer-wedgit-1');
                endif;
                ?>
            </div>
            <div class="col-xm-12 col-sm-6 col-md-3">
                <?php
                if (is_active_sidebar('footer-wedgit-2')) :
                    dynamic_sidebar('footer-wedgit-2');
                endif;
                ?>
            </div>
            <div class="col-xm-12 col-sm-6 col-md-3">
                <?php
                if (is_active_sidebar('footer-wedgit-3')) :
                    dynamic_sidebar('footer-wedgit-3');
                endif;
                ?>
            </div>
            <div class="col-xm-12 col-sm-6 col-md-3 pt-0">
                <?php
                if (is_active_sidebar('footer-wedgit-4')) :
                    dynamic_sidebar('footer-wedgit-4');
                endif;
                ?>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>