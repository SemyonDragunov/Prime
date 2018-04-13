<div class="switch">    
    <input
      id="<?php print render($element['#id']); ?>"
      name="<?php print render($element['#name']); ?>"
      value="<?php print render($element['#return_value']); ?>"
      class="form-radio"
      type="radio"
      <?php $element['#return_value'] == $element['#default_value']? print " checked='checked'" : ''; ?>
      <?php isset($element['#disabled']) && $element['#disabled'] ? print " disabled" : ''; ?>>
    <label class="" for="<?php print render($element['#id']); ?>"></label>
</div>