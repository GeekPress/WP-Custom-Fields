<tr>
    <th scope="row">
   		<label for="<?php echo esc_attr( $name ); ?>"><?php echo esc_html( $label ); ?></label>
    </th>
    <td>
    	<select 
    		name="<?php echo esc_attr( $name ); ?>" 
    		id="<?php echo esc_attr( $name ); ?>" 
    		class="<?php if( $multiple ) echo 'multiple '; ?> <?php if( $filter ) echo 'filter '; ?> <?php echo $validate_js; ?> <?php echo esc_attr( $class ); ?>" 
    		<?php if( $multiple ) echo 'multiple style="min-width: 250px;"';  ?> 
    		<?php echo $multiselect_js; ?>
    		<?php echo !empty( $accesskey ) ? ' accesskey="' . esc_attr( $accesskey ) . '"' : ''; ?>
    	>
			<?php
			if( $none_selected_text && !$multiple )
				echo '<option value="">' . esc_html( $none_selected_text ) . '</option>';
			?>

			<?php foreach( $options as $slug => $label_select ) { ?>
				<option value="<?php echo esc_attr( $slug ); ?>" <?php selected( in_array($slug, (array)$value), true); ?>>
					<?php echo esc_html( $label_select ); ?>
				</option>
			<?php
			}
			?>
		</select>
		<?php
	 	// Add description of the field
	 	echo $description ? '<p class="description">' . esc_html( $description ) . '</p>' : '';
	 	?>
    </td>
</tr>