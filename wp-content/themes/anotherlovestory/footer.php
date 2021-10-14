            </main>
        </section>

        <footer class="site-footer">
            <div class="grid grid--no-gutters">
                <div class="row space-between">
                    <div class="col col--md-8 col--md-first text--xs-center text--md-left">
                        <?php dynamic_sidebar('footer-one-sidebar'); ?>
                    </div>
                    <div class="col col--md-4 text--xs-center text--md-right">
                        <?php dynamic_sidebar('footer-two-sidebar'); ?>
                    </div>
                </div>
            </div>
        </footer>
        <!-- The Modal -->
        <div id="newsletterModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>
                <p>Some text in the Modal..</p>
            </div>
        </div>
        <?php wp_footer(); ?>
    </div>
</body>
</html>