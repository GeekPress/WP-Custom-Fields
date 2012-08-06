<tr>
	 <th scope="row">
	 	<label for="<?php echo esc_attr( $name ); ?>"><?php echo esc_html( $label ); ?></label>
	 </th>
	 <td>
	 	<input 
	 		type="<?php echo ( $html5 ) ? 'date' : 'text'; ?>" 
	 		name="<?php echo esc_attr( $name ); ?>" 
	 		id="<?php echo esc_attr( $name ); ?>"
	 		class="date <?php echo esc_attr( $validate_js ); ?> <?php echo esc_attr( $class ); ?>"
	 		value="<?php echo esc_attr( $value ); ?>"
	 		<?php echo trim( $min ) !='' ? ' min="' . esc_attr( $min ) . '"' : ''; ?>
	 		<?php echo trim( $max ) !='' ? ' max="' . esc_attr( $max ) . '"' : ''; ?>
	 		<?php echo !empty( $placeholder ) ? ' placeholder="' . esc_attr( $placeholder ) . '"' : ''; ?>
	 		<?php echo !empty( $size ) ? ' size="' . intval( $size ) . '"' : ''; ?> 
	 		<?php echo !empty( $accesskey ) ? ' accesskey="' . esc_attr( $accesskey ) . '"' : ''; ?>
	 		<?php echo !empty( $date_format ) ? ' data-date-format="' . esc_attr( $date_format ) . '"' : ''; ?>
	 		<?php echo !empty( $change_month ) ? ' data-change-month="true"' : ''; ?>
	 		<?php echo !empty( $change_year ) ? ' data-change-year="true"' : ''; ?>
	 		<?php echo intval( $number_of_months ) >= 1 ? ' data-number-of-months="' . intval( $number_of_months ) . '"' : ''; ?>
	 	/>
	 	
	 	<?php
	 	// Add description of the field
	 	echo $description ? '<p class="description">' . esc_html( $description ) . '</p>' : '';
	 	?>
	 </td>
</tr>