<tr>
	<th>
		<label for="<?php echo esc_attr( $name ); ?>"><?php echo esc_attr( $label ); ?></label>
	</th>
	<td>
		<input type="text" name="<?php echo esc_attr( $name ); ?>" id="<?php echo esc_attr( $name ); ?>" class="regular-text <?php echo esc_attr( $validate_js ); ?>" value="<?php echo esc_attr( $value ); ?>" />
		<br/>
		<button class="button-secondary wpcf-upload-media-<?php echo $media_type_mime; ?>-button">Upload</button>
		<button class="button-secondary wpcf-remove-media-button">Supprimer</button>
		<div class="wpcf-preview">
			<?php
			if( $media_type_mime == 'image' && !empty( $value ) )
				echo '<img src="' . esc_url( $value ) . '" alt="" />';
			?>
		</div>
		
		<?php
	 	if( $description )
		 	echo '<p class="description">' . esc_html( $description ) . '</p>';
	 	?>
	</td>
</tr>