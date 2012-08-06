<tr>
	 <th scope="row">
	 	<label for="<?php echo esc_attr( $name ); ?>"><?php echo esc_html( $label ); ?></label>
	 </th>
	 <td>
	 	<input 
	 		type="<?php echo ( $html5 ) ? 'datetime' : 'text'; ?>" 
	 		name="<?php echo esc_attr( $name ); ?>" 
	 		id="<?php echo esc_attr( $name ); ?>" 
	 		class="datetime <?php echo esc_attr( $validate_js ); ?> <?php echo esc_attr( $class ); ?>" 
	 		value="<?php echo esc_attr( $value ); ?>" 
	 		<?php echo trim( $min ) !='' ? ' min="' . esc_attr( $min ) . '"' : ''; ?>
	 		<?php echo trim( $max ) != '' ? ' max="' . esc_attr( $max ) . '"' : ''; ?>
	 		<?php echo !empty( $placeholder ) ? ' placeholder="' . esc_attr( $placeholder ) . '"' : ''; ?>
	 		<?php echo !empty( $size ) ? ' size="' . intval( $size ) . '"' : ''; ?> 
	 		<?php echo !empty( $accesskey ) ? ' accesskey="' . esc_attr( $accesskey ) . '"' : ''; ?>
	 		<?php echo !empty( $date_format ) ? ' data-date-format="' . esc_attr( $date_format ) . '"' : ''; ?>
	 		<?php echo !empty( $change_month ) ? ' data-change-month="true"' : ''; ?>
	 		<?php echo !empty( $change_year ) ? ' data-change-year="true"' : ''; ?>
	 		<?php echo intval( $number_of_months ) >= 1 ? ' data-number-of-months="' . intval( $number_of_months ) . '"' : ''; ?>
	 		<?php echo !empty( $time_format ) ? ' data-time-format="' . esc_attr( $time_format ) . '"' : ''; ?>
	 		<?php echo !empty( $show_second ) ? ' data-show-second="true"' : ''; ?>
	 		<?php echo intval( $hour_grid ) >= 1 ? ' data-hour-grid="' . intval( $hour_grid ) . '"' : ''; ?>
	 		<?php echo intval( $minute_grid ) >= 1 ? ' data-minute-grid="' . intval( $minute_grid ) . '"' : ''; ?>
	 		<?php echo intval( $second_grid ) >= 1 ? ' data-second-grid="' . intval( $second_grid ) . '"' : ''; ?>
	 	/>
	 	
	 	<?php
	 	// Add description of the field
	 	echo $description ? '<p class="description">' . esc_html( $description ) . '</p>' : '';
	 	?>
	 </td>
</tr>