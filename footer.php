        </main>

        <footer id="footer" class="cs__footer">
            <div class="cs__container">
                <div class="cs__col">
                    <?php wp_nav_menu(array(
                        'menu' => 'main-menu',
                        'menu_class' => 'cs__footer-menu',
                        'container' => false
                    )); ?>
                </div>
            </div>
        </footer>
    </div>

    <?php wp_footer(); ?>
</body>
</html>
