        </main>

        <footer id="footer" class="footer">
            <div class="footer__container container">
                <div class="col">
                    <?php wp_nav_menu(array(
                        'menu' => 'footer-menu',
                        'menu_class' => 'footer-menu',
                        'container' => false
                    )); ?>
                </div>
            </div>
        </footer>
    </div>


    <script>
        const ajaxUrl = '<?= base64_encode(admin_url('admin-ajax.php')); ?>';
    </script>

    <?php wp_footer(); ?>
</body>
</html>
