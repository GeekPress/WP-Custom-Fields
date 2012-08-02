<tr>
	 <th scope="row">
	 	<label for="<?php echo esc_attr( $name ); ?>"><?php echo $label; ?></label>
	 </th>
	 <td>
	 	<input type="text" name="<?php echo esc_attr( $name ); ?>" id="<?php echo esc_attr( $name ); ?>" class="regular-text <?php echo esc_attr( $validator . ' ' . $validate_js ); ?>"  value="<?php echo esc_attr( $value ); ?>" placeholder="<?php echo esc_attr( $placeholder ); ?>" size="<?php echo esc_attr( $size ); ?>" />
	 	<?php
	 	// Add description of the field
	 	if( $description )
		 	echo '<p class="description">' . esc_html( $description ) . '</p>';

		// If validator is equal hexacolor, display farbtastic to add color
		if( $validator == 'hexacolor' )
			echo '<div id="farbtastic-' . esc_attr( $name ) . '" class="farbtastic"></div>';
	 	?>
	 </td>
</tr>