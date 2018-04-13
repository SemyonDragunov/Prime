<div class="switch">
    <input
      id="<?php print render($element['#id']); ?>"
      name="<?php print render($element['#name']); ?>"
      value="<?php print render($element['#default_value']); ?>"
      class="form-checkbox"
      type="checkbox"
      <?php $element['#checked'] ? print " checked='checked'" : ''; ?>
      <?php isset($element['#disabled']) && $element['#disabled'] ? print " disabled" : ''; ?>>
    <label for="<?php print render($element['#id']); ?>"></label>
</div>