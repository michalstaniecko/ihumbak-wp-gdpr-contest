<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://ihumbak.website
 * @since      1.0.0
 *
 * @package    Ih_Gdpr
 * @subpackage Ih_Gdpr/public/partials
 *
 * @var $types array
 */

$title = get_option('ih_gdpr_title', 'Uzupełnij tytuł');
$description = get_option('ih_gdpr_description', 'Uzupełnij opis');

?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="gdpr__offcanvas ih-gdpr-offcanvas ih-gdpr" data-bs-backdrop="false" tabindex="-1" id="offcanvasGdpr"
     aria-labelledby="offcanvasGdprLabel">
  <div class="ih-gdpr-offcanvas__container">
    <div class="ih-gdpr__title">
      <h5 class="" id="offcanvasBottomLabel"><?php echo $title ?></h5>
    </div>
    <div class="ih-gdpr__body">
      <div class="">
        <div class="">
          <p class="ih-gdpr__description"><?php echo $description ?></p>
          <div class="gdpr">
            <div class="ih-gdpr-accordion">
              <div>
                <div class="gdpr__checkbox-container">
                  <?php foreach ($types as $type): ?>
                    <div class="ih-gdpr-form-check ih-gdpr-form-switch">
                      <input
                        type="checkbox" <?php checked(isset($type->enable) && $type->enable == 1) ?> <?php disabled(isset($type->enable) && $type->enable == 1) ?>
                        class="gdpr__checkbox"
                        name="gdpr-category-<?php echo $type->id ?>"
                        id="gdpr-category-<?php echo $type->id ?>"
                        value="<?php echo $type->id ?>"/>
                      <label class="ih-gdpr__label form-"
                             for="gdpr-category-<?php echo $type->id ?>"><?php echo $type->name ?></label>
                      <p class="small"><?php echo $type->description ?></p>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
            <div class="ih-gdpr__toolbar">
              <div class="">
                <a href="#" class="ih-gdpr__settings-toggler"><i
                    class="fa fa-gear"></i> <span
                    data-show="<?php _e('Pokaż ustawienia cookies', IH_GDPR_PLUGIN_DOMAIN) ?>"
                    data-hide="<?php _e('Schowaj ustawienia cookies', IH_GDPR_PLUGIN_DOMAIN) ?>"></span></a>
              </div>
              <div class="ih-gdpr__buttons">
                <div class="">
                  <button
                    class="ih-gdpr-button ih-gdpr-button--submit-selected gdpr__submit-selected ih-gdpr--d-none"><?php _e('Zatwierdź wybrane',
                                                                                                                          IH_GDPR_PLUGIN_DOMAIN) ?></button>
                </div>
                <div class="">
                  <button class="ih-gdpr-button gdpr__submit-all"><?php _e('Zatwierdź wszystkie',
                                                                           IH_GDPR_PLUGIN_DOMAIN) ?></button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
