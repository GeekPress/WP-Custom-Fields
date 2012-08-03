<tr>
	 <th scope="row">
	 	<label for="<?php echo esc_attr( $name ); ?>"><?php echo $label; ?></label>
	 </th>
	 <td>
	 	<input 
	 		type="text" 
	 		name="<?php echo esc_attr( $name ); ?>" 
	 		id="<?php echo esc_attr( $name ); ?>" 
	 		class="regular-text <?php echo esc_attr( $validator . ' ' . $validate_js ); ?> <?php echo $class; ?>" 
	 		value="<?php echo esc_attr( $value ); ?>" 
	 		<?php echo !empty( $placeholder ) ? ' placeholder="' . esc_attr( $placeholder ) . '"' : ''; ?> 
	 		<?php echo !empty( $size ) ? ' size="' . intval( $size ) . '"' : ''; ?> 
	 		<?php echo !empty( $maxlength ) ? ' maxlength="' . intval( $maxlength ) . '"' : ''; ?>
	 		<?php echo !empty( $accesskey ) ? ' accesskey="' . esc_attr( $accesskey ) . '"' : ''; ?>
	 	/>
	 	
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