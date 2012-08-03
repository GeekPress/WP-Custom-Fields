<tr>
	 <th scope="row">
	 	<label for="<?php echo $name; ?>"><?php echo $label; ?></label>
	 </th>
	 <td>
	 	<?php if( $tinyMCE ) echo '<div class="meta-box-tinymce">'; ?>
    	
    		<textarea 
    			name="<?php echo esc_attr( $name ); ?>" 
    			id="<?php echo esc_attr( $name ); ?>" 
    			class="<?php echo ( $required ) ? 'required' : ''; ?> <?php echo ( $tinyMCE ) ? 'tinyMCE' : '' ; ?> <?php echo $class; ?>" 
    			<?php echo !empty( $cols ) ? ' cols="' . intval( $cols ) . '"' : ''; ?> 
    			<?php echo !empty( $cols ) ? ' rows="' . intval( $rows ) . '"' : ''; ?>
    			<?php echo !empty( $accesskey ) ? ' accesskey="' . esc_attr( $accesskey ) . '"' : ''; ?>
    		><?php echo esc_textarea( $value ); ?></textarea>

    	<?php if( $tinyMCE ) echo '</div>'; ?>
    	
    	<?php
	 	if( $description )
		 	echo '<p class="description">' . esc_html( $description ) . '</p>';
	 	?>
	 </td>
</tr>