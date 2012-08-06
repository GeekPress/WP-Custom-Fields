<tr>
	<th>
		<label for="<?php echo esc_attr( $name ); ?>"><?php echo esc_html( $label ); ?></label>
	</th>
	<td>
		<input 
			type="text" 
			name="<?php echo esc_attr( $name ); ?>" 
			id="<?php echo esc_attr( $name ); ?>" 
			class="<?php echo esc_attr( $validator . ' ' . $validate_js ); ?> regular-text  <?php echo esc_attr( $class ); ?>" 
			value="<?php echo esc_attr( $value ); ?>"
			<?php echo !empty( $accesskey ) ? ' accesskey="' . esc_attr( $accesskey ) . '"' : ''; ?>
		/>
		<br/>
		<button class="button-secondary wpcf-upload-media-button">Upload</button>
		<button class="button-secondary wpcf-remove-media-button">Supprimer</button>
		<div class="wpcf-preview">
			<?php
			if( !empty( $value ) && preg_match('/(http|https):\/\/[a-z0-9\-\.\/]+\.(?:jpe?g|png|gif)/i' , $value ) == 1 )
				echo '<img src="' . esc_url( $value ) . '" alt="" />';
			?>
		</div>
		
		<?php
	 	// Add description of the field
	 	echo $description ? '<p class="description">' . esc_html( $description ) . '</p>' : '';
	 	?>
	</td>
</tr>