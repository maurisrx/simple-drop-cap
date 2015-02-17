						<tr valign="top">
							<th scope="row">Font Size</th>
							<td>
								<select name="wpsdc_options[option_font_size]" id="wpsdc_options[option_font_size]">
									<?php for ( $i=3; $i <= 7; $i += 0.1 ) { ?>
										<option value="<?php echo $i; ?>" <?php selected( $wpsdc_options['option_font_size'], $i ); ?>><?php echo $i; ?></option>
									<?php } ?>
								</select>
								<label for="wpsdc_options[option_font_size]">em</label>
							</td>
						</tr>