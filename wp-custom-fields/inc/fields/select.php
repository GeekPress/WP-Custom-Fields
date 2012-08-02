<tr>
    <th scope="row">
   		<label for="<?php echo esc_attr( $name ); ?>"><?php echo $label; ?></label>
    </th>
    <td>
    	<select name="<?php echo esc_attr( $name ); ?>" id="<?php echo $name; ?>" class="<?php if( $multiple ) echo 'multiple '; if( $filter ) echo 'filter '; echo $validate_js; ?>" <?php if( $multiple ) echo 'multiple style="min-width: 250px;"';  ?> <?php echo $multiselect_js; ?>>
			<?php
			if( $none_selected_text && !$multiple )
				echo '<option value="">' . $none_selected_text . '</option>';
			?>

			<?php foreach( $options as $slug => $label_select ) { ?>
				<option value="<?php echo esc_attr( $slug ); ?>" <?php selected( in_array($slug, (array)$value), true); ?>>
					<?php echo $label_select; ?>
				</option>
			<?php
			}
			?>
		</select>
		<?php
	 	if( $description )
		 	echo '<p class="description">' . esc_html( $description ) . '</p>';
	 	?>
    </td>
</tr>