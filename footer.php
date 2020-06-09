    </main>

    <footer id="footer-wrapper" class="cs__footer" role="contentinfo">
        <div class="row">
            <div class="column">
                <?php wp_nav_menu(array(
                    'menu' => 'main-manu',
                    'menu_class' => 'footer-menu',
                    'container' => false
                )); ?>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>
