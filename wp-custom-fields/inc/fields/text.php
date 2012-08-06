<tr>
	 <th scope="row">
	 	<label for="<?php echo esc_attr( $name ); ?>"><?php echo esc_html( $label ); ?></label>
	 </th>
	 <td>
	 	<input 
	 		type="text" 
	 		name="<?php echo esc_attr( $name ); ?>" 
	 		id="<?php echo esc_attr( $name ); ?>" 
	 		class="<?php echo esc_attr( $validator . ' ' . $validate_js ); ?> regular-text <?php echo esc_attr( $class ); ?>" 
	 		value="<?php echo esc_attr( $value ); ?>" 
	 		<?php echo !empty( $placeholder ) ? ' placeholder="' . esc_attr( $placeholder ) . '"' : ''; ?> 
	 		<?php echo !empty( $size ) ? ' size="' . intval( $size ) . '"' : ''; ?> 
	 		<?php echo !empty( $maxlength ) ? ' maxlength="' . intval( $maxlength ) . '"' : ''; ?>
	 		<?php echo !empty( $accesskey ) ? ' accesskey="' . esc_attr( $accesskey ) . '"' : ''; ?>
	 	/>
	 	
	 	<?php
	 	// Add description of the field
	 	echo $description ? '<p class="description">' . esc_html( $description ) . '</p>' : '';
	 	?>
	 </td>
</tr>