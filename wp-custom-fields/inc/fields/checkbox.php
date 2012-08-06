<tr>
	 <th scope="row">
	 	<?php echo esc_html( $label ); ?>
	 </th>
	 <td>
		<fieldset>
			<legend class="screen-reader-text"><span><?php echo esc_html( $label ); ?></span></legend>
		    <?php
		    if( !$options ) { ?>
			    <label for="<?php echo esc_attr( $name ); ?>">
				    <input type="hidden" name="<?php echo esc_attr( $name ); ?>" value="0" />
				    <input
				    	type="checkbox"
				    	name="<?php echo esc_attr( $name ); ?>"
				    	id="<?php echo esc_attr( $name ); ?>"
				    	class="<?php echo $iphonecheck ? 'iphonecheck' : ''; ?> <?php echo esc_attr( $class ); ?>"
				    	value="1"
				    	<?php echo !empty( $accesskey ) ? ' accesskey="' . esc_attr( $accesskey ) . '"' : ''; ?>
				    	<?php checked( $value, 1 ); ?>
				    />
				    <?php echo esc_html( $label_checkbox ); ?>
			    </label>
			<?php
		    }
		    else {

				 foreach( $options as $slug => $label_checkbox ) {  ?>
					<label for="<?php echo esc_attr( $slug ); ?>">
						<input
							type="checkbox"
							name="<?php echo esc_attr( $name ); ?>"
							id="<?php echo esc_attr( $slug ); ?>"
							class="<?php echo $iphonecheck ? 'iphonecheck' : ''; ?> <?php echo esc_attr( $validate_js . ' ' . $class ); ?>"
							value="<?php echo esc_attr( $slug ); ?>"
							<?php checked( in_array( $slug, (array)$value ), true); ?>
						/>
						<?php echo esc_html( $label_checkbox ); ?>
					</label>
					<br/>
				<?php
				}
		    }
		    ?>
		</fieldset>
	<?php
	// Add description of the field
	echo $description ? '<p class="description">' . esc_html( $description ) . '</p>' : '';
	?>
	</td>
</tr>