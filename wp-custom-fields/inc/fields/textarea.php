<tr>
	 <th scope="row">
	 	<label for="<?php echo esc_attr( $name ); ?>"><?php echo esc_html( $label ); ?></label>
	 </th>
	 <td>
    		<?php
    		if( !$tinyMCE ) { ?>
	    		
	    		<textarea 
	    			name="<?php echo esc_attr( $name ); ?>" 
	    			id="<?php echo esc_attr( $name ); ?>" 
	    			class="<?php echo $required ? 'required' : ''; ?> <?php echo esc_attr( $class ); ?>" 
	    			<?php echo !empty( $cols ) ? ' cols="' . intval( $cols ) . '"' : ''; ?> 
	    			<?php echo !empty( $rows ) ? ' rows="' . intval( $rows ) . '"' : ''; ?>
	    			<?php echo !empty( $accesskey ) ? ' accesskey="' . esc_attr( $accesskey ) . '"' : ''; ?>
	    		><?php echo esc_textarea( $value ); ?></textarea>
					    	
	    	<?php	
    		}
    		else {
	    		
	    		$settings = array(
	    						'wpautop'		=> $wpautop,
	    						'media_buttons' => $media_buttons,
	    						'textarea_rows' => $rows,
	    						'tabindex'		=> $tabindex,
	    						'editor_css'	=> $editor_css,
	    						'editor_class'	=> $editor_class,
	    						'teeny'			=> $teeny,
	    						'dfw'			=> $dfw,
	    						'quicktags'		=> $quicktags
	    		);
	    		
	    		wp_editor( $value, $name, $settings );
    		}
    		?>

    	<?php
	 	// Add description of the field
	 	echo $description ? '<p class="description">' . esc_html( $description ) . '</p>' : '';
	 	?>
	 </td>
</tr>