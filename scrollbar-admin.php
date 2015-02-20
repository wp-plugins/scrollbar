<?php

	if(empty($_POST['scrollbar_wp_hidden']))
		{
			$themepoints_scrollbar_colors = get_option( 'themepoints_scrollbar_colors' );
			$themepoints_scrollbar_width = get_option( 'themepoints_scrollbar_width' );	
			$themepoints_scrollbar_radius = get_option( 'themepoints_scrollbar_radius' );
			$themepoints_scrollbar_border = get_option( 'themepoints_scrollbar_border' );	
			$themepoints_scrollbar_speed = get_option( 'themepoints_scrollbar_speed' );
			
		}

	else
		{
		
		if($_POST['scrollbar_wp_hidden'] == 'Y')
			{
								
			$themepoints_scrollbar_colors = stripslashes_deep($_POST['themepoints_scrollbar_colors']);
			update_option('themepoints_scrollbar_colors', $themepoints_scrollbar_colors);

			$themepoints_scrollbar_width = stripslashes_deep($_POST['themepoints_scrollbar_width']);
			update_option('themepoints_scrollbar_width', $themepoints_scrollbar_width);

			$themepoints_scrollbar_radius = stripslashes_deep($_POST['themepoints_scrollbar_radius']);
			update_option('themepoints_scrollbar_radius', $themepoints_scrollbar_radius);
			
			$themepoints_scrollbar_border = stripslashes_deep($_POST['themepoints_scrollbar_border']);
			update_option('themepoints_scrollbar_border', $themepoints_scrollbar_border);
			
			$themepoints_scrollbar_speed = stripslashes_deep($_POST['themepoints_scrollbar_speed']);
			update_option('themepoints_scrollbar_speed', $themepoints_scrollbar_speed);									
			?>
			<div class="updated"><p><strong><?php _e('Changes Saved.' ); ?></strong></p>
            </div>
            
			<?php
		} 
	}
?>


<div class="wrap skill-bars">
	<div id="icon-tools" class="icon32"><br></div><?php echo "<h2>".__('Scrollbar Option Settings')."</h2>";?>
		<form  method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
		<input type="hidden" name="scrollbar_wp_hidden" value="Y">
        <?php settings_fields( 'scrollbar_wp_plugin_options' );
				do_settings_sections( 'scrollbar_wp_plugin_options' );
			
		?>

		<table class="form-table">

			<tr valign="top">
				<th scope="row"><label for="themepoints_scrollbar_colors">Scrollbar Color</label></th>
				<td style="vertical-align:middle;">
			<input  size='10' name='themepoints_scrollbar_colors' class='scrollbar-color' type='text' id="scrollbar_color" value='<?php echo esc_attr($themepoints_scrollbar_colors); ?>' /><br />
			<span style="font-size:12px;color:#22aa5d">select scrollbar color;</span>
				</td>
			</tr>
			
			<tr valign="top">
				<th scope="row"><label for="themepoints_scrollbar_width">Scrollbar width</label></th>
				<td style="vertical-align:middle;">
			<input  size='10' name='themepoints_scrollbar_width' class='scrollbar-width' type='text' id="scrollbar_width" value='<?php if ( !empty( $themepoints_scrollbar_width ) ) echo esc_attr($themepoints_scrollbar_width); else echo ''; ?>' />px<br />
			<span style="font-size:12px;color:#22aa5d">select scrollbar width .default width:5px</span>
				</td>
			</tr>                
			
			<tr valign="top">
				<th scope="row"><label for="themepoints_scrollbar_radius">Scrollbar border radius</label></th>
				<td style="vertical-align:middle;">
			<input  size='10' name='themepoints_scrollbar_radius' class='scrollbar-radius' type='text' id="scrollbar_radius" value='<?php if ( !empty( $themepoints_scrollbar_radius ) ) echo esc_attr($themepoints_scrollbar_radius); else echo ''; ?>' />px<br />
			<span style="font-size:12px;color:#22aa5d">select scrollbar border radius .default border-radius:0px</span>
				</td>
			</tr>
			
			<tr valign="top">
				<th scope="row"><label for="themepoints_scrollbar_speed">Scrollbar scroll speed</label></th>
				<td style="vertical-align:middle;">
			<input  size='10' name='themepoints_scrollbar_speed' class='scrollbar-speed' type='text' id="scrollbar_speed" value='<?php if ( !empty( $themepoints_scrollbar_speed ) ) echo esc_attr($themepoints_scrollbar_speed); else echo ''; ?>' /><br />
			<span style="font-size:12px;color:#22aa5d">select scrollbar scroll speed .default speed:60</span>
				</td>
			</tr>                  
			
			<tr valign="top">
				<th scope="row"><label for="themepoints_scrollbar_border">Scrollbar border</label></th>
				<td style="vertical-align:middle;">
			<input  size='10' name='themepoints_scrollbar_border' class='scrollbar-border' type='text' id="scrollbar_border" value='<?php if ( !empty( $themepoints_scrollbar_border ) ) echo esc_attr($themepoints_scrollbar_border); else echo ''; ?>' />px<br />
			<span style="font-size:12px;color:#22aa5d">select scrollbar border .default border:0px</span>
				</td>
			</tr>
			
		</table>
                <p class="submit">
                    <input class="button button-primary" type="submit" name="Submit" value="<?php _e('Save Changes' ) ?>" />
                </p>
		</form>


			<script>
            jQuery(document).ready(function(jQuery)
                {	
                jQuery('#scrollbar_color').wpColorPicker();
                });
            </script> 
        
        
        
</div>
