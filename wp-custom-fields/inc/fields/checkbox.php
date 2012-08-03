<tr>
	 <th scope="row">
	 	<label for="<?php echo esc_attr( $name ); ?>"><?php echo esc_html( $label ); ?></label>
	 </th>
	 <td>
	<?php
	if( !$options ) { ?>
	    <input type="hidden" name="<?php echo esc_attr( $name ); ?>" value="0" />
	    <input 
	    	type="checkbox" 
	    	name="<?php echo esc_attr( $name ); ?>" 
	    	id="<?php echo esc_attr( $name ); ?>" 
	    	class="<?php if( $iphonecheck ) echo 'iphonecheck'; ?> <?php echo $class; ?>" 
	    	value="1"
	    	<?php echo !empty( $accesskey ) ? ' accesskey="' . esc_attr( $accesskey ) . '"' : ''; ?>
	    	<?php checked( $value, 1 ); ?> 
	    />
	<?php
	}
	else { ?>
		<fieldset>
			<legend class="screen-reader-text"><span><?php echo esc_html( $label ); ?></span></legend>
			<p>
			    <?php foreach( $options as $slug => $label_checkbox ) { ?>
					<label>
						<input 
							type="checkbox" 
							name="<?php echo esc_attr( $name ); ?>" 
							id="<?php echo esc_attr( $name ); ?>" 
							class="<?php echo esc_attr( $validate_js ); if( $iphonecheck ) echo ' iphonecheck'; ?> <?php echo $class; ?>" 
							value="<?php echo esc_attr( $slug ); ?>" <?php checked( in_array( $slug, (array)$value ), true); ?> 
						/>
						<?php echo $label_checkbox; ?>
					</label>
					<br/>
				<?php
				}
	}
	// Add description of the field
 	if( $description )
	 	echo '<p class="description">' . esc_html( $description ) . '</p>';
	?>
	 </td>
</tr>