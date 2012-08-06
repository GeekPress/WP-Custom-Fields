<tr>
	 <th scope="row">
	 	<label for="<?php echo esc_attr( $name ); ?>"><?php echo esc_html( $label ); ?></label>
	 </th>
	 <td>
	 	<input
	 		type="<?php echo $html5 ? 'color' : 'text'; ?>"
	 		name="<?php echo esc_attr( $name ); ?>"
	 		id="<?php echo esc_attr( $name ); ?>"
	 		class="hexacolor <?php echo esc_attr( $validate_js ); ?> <?php echo esc_attr( $class ); ?>"
	 		value="<?php echo esc_attr( $value ); ?>"
	 		maxlength="7"
	 		<?php echo !empty( $placeholder ) ? ' placeholder="' . esc_attr( $placeholder ) . '"' : ''; ?>
	 		<?php echo !empty( $size ) ? ' size="' . intval( $size ) . '"' : ''; ?> 
	 		<?php echo !empty( $accesskey ) ? ' accesskey="' . esc_attr( $accesskey ) . '"' : ''; ?>
	 	/>

	 	<?php
	 	// Add description of the field
	 	echo $description ? '<p class="description">' . esc_html( $description ) . '</p>' : '';
	 	?>
	 </td>
</tr>