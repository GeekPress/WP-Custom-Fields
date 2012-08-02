<?php
global $post;
$update_ajax_nonce = wp_create_nonce( 'upload-' . $post->ID . $name );
?>
<tr>
	<th>
		<label for="<?php echo esc_attr( $name ); ?>"><?php echo esc_attr( $label ); ?></label>
	</th>
	<td>
		<span data-nonce="<?php echo $update_ajax_nonce; ?>" class="update-ajax-nonce"></span>
		<input type="text" name="<?php echo esc_attr( $name ); ?>" id="<?php echo esc_attr( $name ); ?>" class="regular-text <?php echo esc_attr( $validator . ' ' . $validate_js ); ?>" value="<?php echo esc_attr( $value ); ?>" />
		<br/>
		<button id="upload_ajax_<?php echo $name; ?>" class="button-secondary wpcf-upload-ajax-button">Upload</button>
		<button class="button-secondary wpcf-remove-media-button">Supprimer</button>
		<div class="wpcf-preview">
			<?php
			if( !empty( $value ) && preg_match('/(http|https):\/\/[a-z0-9\-\.\/]+\.(?:jpe?g|png|gif)/i' , $value ) == 1 )
				echo '<img src="' . esc_url( $value ) . '" alt="" />';
			?>
		</div>
		<?php
	 	if( $description )
		 	echo '<p class="description">' . esc_html( $description ) . '</p>';
	 	?>
	</td>
</tr>