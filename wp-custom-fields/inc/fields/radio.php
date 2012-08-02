<tr>
	 <th scope="row">
	 	<label><?php echo esc_attr( $label ); ?></label>
	 </th>
	 <td>
		<fieldset>
			<legend class="screen-reader-text"><span><?php echo esc_attr( $label ); ?></span></legend>
			<p>
			<?php
			foreach( $options as $slug => $label_radio ) { ?>
				<label>
					<input type="radio" class="<?php if( $iphonecheck ) echo 'iphonecheck '; echo esc_attr( $validate_js ); ?>" name="<?php echo esc_attr( $name ); ?>" value="<?php echo esc_attr( $slug ); ?>" <?php checked( in_array($slug, (array)$value), true ); ?> />
					<?php echo $label_radio; ?>
				</label>
				<br/>
			<?php
			}
			?>
			</p>
			<?php
		 	// Add description of the field
		 	if( $description )
			 	echo '<p class="description">' . esc_html( $description ) . '</p>';
		 	?>
		</fieldset>
	</td>
</tr>