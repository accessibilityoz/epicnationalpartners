<form role="search" method="get" action="<?php echo home_url('/'); ?>">
    <div class="input searchform">
        <label class="input__label" for="s">
          <span class="input__content hidden">Search site</span>
          <input required type="text" value="" name="s" id="s" class="input__control" placeholder="<?php esc_attr_e('Search Site ', 'reverie'); ?>">
        </label>
        <button type="submit" class="button-primary search__button">Search</button>
    </div>
</form>