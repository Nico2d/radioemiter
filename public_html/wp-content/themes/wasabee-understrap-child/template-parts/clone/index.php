<?php

while (have_rows($this->get('key'), $this->postId)):
    $rowKeys = array_keys(the_row());
    foreach ($rowKeys as $fieldKey) {
        $template = get_sub_field_object($fieldKey);
        $template['wrapper']['class'] = $this->get('wrapper.class');
        new RenderEngine($template, $this->postId);
    }
endwhile;
