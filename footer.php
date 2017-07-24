
<!-- Footer -->
<footer class="footer" role="contentinfo">
  <div class="container">
    <div class="row">
      <!-- Homepage sidebar -->
      <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar( 'Footer widgets' ) ) : ?>
      <?php endif; ?>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
<!-- Footer Script -->
 <script>
    var navigation = responsiveNav("#nav");
  </script>
</body>
</html>