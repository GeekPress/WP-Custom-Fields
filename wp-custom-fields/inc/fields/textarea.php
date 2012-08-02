<tr>
	 <th scope="row">
	 	<label for="<?php echo $name; ?>"><?php echo $label; ?></label>
	 </th>
	 <td>
	 	<?php if( $tinyMCE ) echo '<div class="meta-box-tinymce">'; ?>
    	
    		<textarea name="<?php echo esc_attr( $name ); ?>" id="<?php echo esc_attr( $name ); ?>" class="<?php if( $required ) echo 'required'; ?> <?php if( $tinyMCE ) echo 'tinyMCE'; ?> <?php echo esc_attr( $validator . ' ' . $validate_js ); ?>" cols="80" rows="5"><?php echo esc_textarea( $value ); ?></textarea>

    	<?php if( $tinyMCE ) echo '</div>'; ?>
    	
    	<?php
	 	if( $description )
		 	echo '<p class="description">' . esc_html( $description ) . '</p>';
	 	?>
	 </td>
</tr>