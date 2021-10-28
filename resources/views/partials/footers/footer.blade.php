 <!-- footer -->
 <footer class="main-footer">
  <div class="container max-width-lg border-top border-2 border-contrast-lower padding-top-xs padding-bottom-md margin-top-xxl">
    <div class="flex flex-column items-center gap-xxs flex-row@sm justify-between@sm">
      <div>
        <div class="text-sm text-xs@md color-contrast-medium flex flex-wrap gap-xs">
          <span>&copy; {{ !empty($settings_data['logo_title']) ? $settings_data['logo_title'] : '' }} - </span>
          <?php 
            $shortcode = app('shortcode');
            echo $shortcode->compile('[menu name="Footer Menu" location="footer"]');
          ?>
        </div>
      </div>

      <div>
        <?php 
          echo $shortcode->compile('[socialicons]');

          if (isset($disable_shortcode) && $disable_shortcode)
            $shortcode->disable();
        ?>
      </div>
    </div>
  </div>
</footer>