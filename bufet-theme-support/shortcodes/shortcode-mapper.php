<?php

// File Security Check
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


add_action('init', 'buffet_kc_mapper', 99 );

function buffet_kc_mapper(){

	global $kc, $appaiShortcodes;

	// Check if the function exists
	if(method_exists($kc,'add_map_param') ) {


		$kc->add_map_param('kc_row',array(
				'name' => 'row_pseudo_switch',
		   		'label' => esc_html__('Use advanced row style?', 'buffet'),
		   		'type' => 'toggle',
		  		'admin_label' => true,
		   		'description' => esc_html__('Toggle this to add row:before and row:after styles. Go to Styles tab to give some style to elements.', 'buffet')
			), 4, 'general' );

		$kc->add_map_param(
			'kc_row',
			array(
				'name' => 'row_s_parallax',
		   		'label' => esc_html__('Use simple parallax?', 'buffet'),
		   		'type' => 'toggle',
		  		'admin_label' => true,
		   		'description' => esc_html__('Toggle this to use simple parallax. It will use Background image as parallax image.', 'buffet')
			), 5, 'general' );

		$kc->add_map_param(
			'kc_row',
			array(
				'name' => 'primary_moving_bg',
				'label' => 'Use Primary Moving Object Background Animation?',
				'type' => 'toggle',
				'value' => 'no',
				'description' => __(' Toggle this to use moving objects background in section .', 'buffet'),
			), 6, 'general' );

		$kc->add_map_param(
			'kc_row',
			array(
				'name' => 'secondary_moving_bg',
				'label' => 'Use Secondary Moving Object Background Animation?',
				'type' => 'toggle',
				'value' => 'no',
				'description' => __(' Toggle this to use moving objects background in section .', 'buffet'),
			), 7, 'general' );

		$kc->add_map_param(
			'kc_row',
			array(
				'name' => 'use_pattern_bg',
				'label' => 'Use Background Pattern Animation?',
				'type' => 'toggle',
				'value' => 'no',
				'description' => __(' Toggle this to use pattern in background. If you use this, you can not use Row ID.', 'bufet'),
			), 8, 'general' );

		$kc->add_map_param(
			'kc_row',
			array(
				'name' => 'pattern_styles',
				'label' => 'Select pattern styles',
				'type' => 'select',
				'description' => __(' Toggle this to use pattern in background. If you use this, you can not Row ID.', 'bufet'),
				'options' => array(
					'style_1' => __('Style 1', 'bufet'),
					'style_2' => __('Style 2', 'bufet'),
					'style_3' => __('Style 3', 'bufet'),
					'style_4' => __('Style 4', 'bufet'),
					'style_5' => __('Style 5', 'bufet'),
				),
				'value' => 'style_1',
				'relation'      => array(
					'parent'    => 'use_pattern_bg',
					'show_when' => 'yes'
				)
			), 9, 'general' );

		$kc->add_map_param(
			'kc_single_image',
			array(
				'type' => 'select',
				'label' => 'Animation name',
				'name' => 'animation_name',
				'description' => __('Select animation style name.', 'buffet'),
				'options' => $appaiShortcodes->animation_style_list(),
				'admin_label' => true,
				'value' => 'fadeInUp',
			), 15, 'general' );

		$kc->add_map_param(
			'kc_single_image',
			array(
				'type' => 'text',
				'label' => 'Animation delay',
				'name' => 'animation_delay',
				'description' => __('Enter animation delay time.', 'buffet'),
				'value' => '0.2s',
			), 15, 'general' );


		$kc->update_map(
			'kc_title',
			'params',
				array(
						'general' => array(
							array(
									'name'	      => 'text',
									'label'       => __(' Text'),
									'type'	      => 'textarea',
									'value'		  => base64_encode('The Title'),
									'admin_label' => true,
								),
								array(
									'name'	      => 'post_title',
									'label'       => __(' Use Post Title?'),
									'type'	      => 'toggle',
									'description' => __(' Use the title of current post/page as content element instead of text input value.', 'kingcomposer')
								),
								array(
									'name'	  => 'type',
									'label'   => __(' Type'),
									'type'	  => 'select',
									'admin_label' => true,
									'options' => array(
										'h1'  => 'H1',
										'h2'  => 'H2',
										'h3'  => 'H3',
										'h4'  => 'H4',
										'h5'  => 'H5',
										'h6'  => 'H6',
										'div'  => 'div',
										'span'  => 'Span',
										'p'  => 'P'
									)
								),
								array(
									'type' => 'select',
									'label' => 'Animation name',
									'name' => 'animation_name',
									'description' => __('Select animation style name.', 'buffet'),
									'options' => $appaiShortcodes->animation_style_list(),
									'admin_label' => true,
								),
								array(
									'type' => 'text',
									'label' => 'Animation delay',
									'name' => 'animation_delay',
									'description' => __('Enter animation delay time.', 'buffet'),
									'value' => '0s',
								),
								array(
									'type' => 'text',
									'label' => 'Animation duration',
									'name' => 'animation_duration',
									'description' => __('Enter animation duration time.', 'buffet'),
									'value' => '1s',
								),
								array(
									'name'	=> 'class',
									'label' => __(' Extra Class', 'kingcomposer'),
									'type'	=> 'text'
								),

								array(
									'name'	      => 'title_wrap',
									'label'       => __(' Advanced', 'kingcomposer'),
									'type'	      => 'toggle',
									'description' => __(' Add a &lt;div&gt; tag around the head tag, more code before or after the head tag.', 'kingcomposer')
								),
								array(
									'name'	      => 'before',
									'label'       => __(' Before Head Tag', 'kingcomposer'),
									'type'	      => 'textarea',
									'description' => __(' Add HTML text before the head tag.', 'kingcomposer'),
									'relation'      => array(
										'parent'    => 'title_wrap',
										'show_when' => 'yes'
									)
								),
								array(
									'name'	      => 'after',
									'label'       => 'After Head Tag',
									'type'	      => 'textarea',
									'description' => __(' Add HTML text after the head tag.', 'kingcomposer'),
									'relation'      => array(
										'parent'    => 'title_wrap',
										'show_when' => 'yes'
									)
								),
								array(
									'name'     => 'title_link',
									'label'    => __(' Link Title', 'kingcomposer'),
									'type'     => 'link',
									'description' => __(' Insert link for title', 'kingcomposer')
								),
								array(
									'name'	        => 'title_wrap_class',
									'label'         => __(' Wrapper class name', 'kingcomposer'),
									'type'	        => 'text',
									'description'   => __(' Enter class name for wrapper', 'kingcomposer'),
									'relation'      => array(
										'parent'    => 'title_wrap',
										'show_when' => 'yes'
									)
								)
						),

						'styling' => array(
							array(
								'name'    => 'css_custom',
								'type'    => 'css',
								'options'		=> array(
									array(
										"screens" => "any,1024,999,767,479",
										'Title Style' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+.kc_title,.kc_title,.kc_title a.kc_title_link'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+.kc_title,.kc_title,.kc_title a.kc_title_link'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+.kc_title,.kc_title,.kc_title a.kc_title_link'),
											array('property' => 'font-style', 'label' => 'Font Style', 'selector' => '+.kc_title,.kc_title,.kc_title a.kc_title_link'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+.kc_title,.kc_title,.kc_title a.kc_title_link'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+.kc_title,.kc_title,.kc_title a.kc_title_link'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+.kc_title,.kc_title,.kc_title a.kc_title_link'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+.kc_title,.kc_title,.kc_title a.kc_title_link'),
											array('property' => 'text-align', 'label' => 'Alignment', 'selector' => '+.kc_title,.kc_title,.kc_title a.kc_title_link'),
											array('property' => 'display', 'label' => 'Display'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+.kc_title,.kc_title,.kc_title a.kc_title_link'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+.kc_title,.kc_title,.kc_title a.kc_title_link')
										),
										'Span Style' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .kc_title span'),
										),
										'Divider Style' => array(
											array('property' => 'width', 'label' => 'Divider Width', 'selector' => '+ .kc_title span.divider'),
											array('property' => 'height', 'label' => 'Divider Height', 'selector' => '+ .kc_title span.divider'),
											array('property' => 'margin', 'label' => 'Divider Margin', 'selector' => '+ .kc_title span.divider'),
											array('property' => 'background', 'label' => 'Divider Color', 'selector' => '+ .kc_title span.divider'),
										)
									)
								)
							)
						),
				)
		);

		$kc->update_map(
			'kc_column_text',
			'params',
			array(
				'general' => array(
					array(
						'name' => 'content',
						'label' => __('Content', 'kingcomposer'),
						'type' => 'textarea_html',
						'value' => __('Sample Text', 'kingcomposer'),
					),
					array(
						'type' => 'select',
						'label' => 'Animation name',
						'name' => 'animation_name',
						'description' => __('Select animation style name.', 'buffet'),
						'options' => $appaiShortcodes->animation_style_list(),
						'admin_label' => true,
					),
					array(
						'type' => 'text',
						'label' => 'Animation delay',
						'name' => 'animation_delay',
						'description' => __('Enter animation delay time.', 'buffet'),
						'value' => '0.2s',
					),
					array(
						'type' => 'text',
						'label' => 'Animation duration',
						'name' => 'animation_duration',
						'description' => __('Enter animation duration time.', 'buffet'),
						'value' => '1s',
					),
					array(
						'name' => 'class',
						'label' => 'Extra Class',
						'type' => 'text',
					)
				),
				'styling' => array(
					array(
						'name'		=> 'css_custom',
						'type'		=> 'css',
						'options'	=> array(
							array(
								"screens" => "any,1024,999,767,479",
								'Typography' => array(
									array('property' => 'color', 'label' => 'Color', 'selector' => ',p'),
									array('property' => 'font-family', 'label' => 'Font Family', 'selector' => ',p'),
									array('property' => 'font-size', 'label' => 'Font Size', 'selector' => ',p'),
									array('property' => 'line-height', 'label' => 'Line Height', 'selector' => ',p'),
									array('property' => 'font-style', 'label' => 'Font Style', 'selector' => ',p'),
									array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => ',p'),
									array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => ',p'),
									array('property' => 'text-align', 'label' => 'Text Align', 'selector' => ',p'),
									array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => ',p'),
								),
								'Anchor' => array(
									array('property' => 'color', 'label' => 'Color', 'selector' => ',a'),
									array('property' => 'font-family', 'label' => 'Font Family', 'selector' => ',a'),
									array('property' => 'font-size', 'label' => 'Font Size', 'selector' => ',a'),
									array('property' => 'line-height', 'label' => 'Line Height', 'selector' => ',a'),
									array('property' => 'font-style', 'label' => 'Font Style', 'selector' => ',a'),
									array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => ',a'),
									array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => ',a'),
									array('property' => 'text-align', 'label' => 'Text Align', 'selector' => ',a'),
									array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => ',a'),
								),
								'Box'    => array(
									array('property' => 'background', 'label' => 'Background'),
									array('property' => 'border', 'label' => 'Border'),
									array('property' => 'border-radius', 'label' => 'Border Radius'),
									array('property' => 'display', 'label' => 'Display'),
									array('property' => 'padding', 'label' => 'Padding'),
									array('property' => 'margin', 'label' => 'Margin', 'selector' => 'p'),

								)
							)
						)
					)
				),
			)
		);


		$kc->update_map(
			'kc_button',
			'params',
			array(
				'general' => array(
					array(
						'type'			=> 'text',
						'label'			=> __( 'Title', 'kingcomposer' ),
						'name'			=> 'text_title',
						'description'	=> __( 'Add the text that appears on the button.', 'kingcomposer' ),
						'value' 			=> 'Text Button',
						'admin_label'	=> true
					),
					array(
						'type'			=> 'link',
						'label'			=> __( 'Link', 'kingcomposer' ),
						'name'			=> 'link',
						'description'	=> __( 'Add your relative URL. Each URL contains link, anchor text and target attributes.', 'kingcomposer' ),
					),
					array(
						'type' => 'select',
						'label' => 'Animation name',
						'name' => 'animation_name',
						'description' => __('Select animation style name.', 'buffet'),
						'options' => $appaiShortcodes->animation_style_list(),
						'admin_label' => true,
						'value' => 'fadeInUp',
					),

					array(
						'type' 			=> 'toggle',
						'name' 			=> 'show_icon',
						'label' 		=> __( 'Show Icon?', 'kingcomposer' ),
						'description' 	=> '',
					),
					array(
						'type' 			=> 'icon_picker',
						'name'		 	=> 'icon',
						'label' 		=> __( 'Icon', 'kingcomposer' ),
						'value'         => 'fa-leaf',
						'admin_label' 	=> true,
						'description' 	=> __( 'Select icon for button', 'kingcomposer' ),
						'relation'		=> array(
							'parent'	=> 'show_icon',
							'show_when'	=> 'yes'
						)
					),
					array(
						'type'			=> 'dropdown',
						'name'			=> 'icon_position',
						'label'			=> __( 'Icon position', 'kingcomposer' ),
						'description'	=> '',
						'value'     	=> 'left',
						'options'		=> array(
							'left'	=> __(' Left', 'kingcomposer'),
							'right'	=> __(' Right', 'kingcomposer'),
						),
						'relation'		=> array(
							'parent'	=> 'show_icon',
							'show_when'	=> 'yes'
						)
					),
					array(
						'type'			=> 'text',
						'label'			=> __( 'On Click', 'kingcomposer' ),
						'name'			=> 'onclick',
						'description'	=> __( 'Content of on click attribute for element.', 'kingcomposer' ),
						'value' 			=> '',
					),
					array(
						'name'        => 'ex_class',
						'label'       => __(' Button extra class', 'kingcomposer'),
						'type'        => 'text',
						'description' => __(' Add class name for a tag.', 'kingcomposer')
					),
					array(
						'type'			=> 'text',
						'label'			=> __( 'Wrapper class name', 'kingcomposer' ),
						'name'			=> 'wrap_class',
						'description'	=> __( 'Custom class for wrapper of the shortcode widget.', 'kingcomposer' ),
					),
					array(
						'type' => 'text',
						'label' => 'Animation delay',
						'name' => 'animation_delay',
						'description' => __('Enter animation delay time.', 'buffet'),
						'value' => '0.2s',
					),

				),
			)
		);


		$kc->update_map(
			'kc_row',
			'params',
				array(
					'styling' => array(
						array(
							'name'    => 'css_custom',
							'type'    => 'css',
							'options'		=> array(
								array(
									"screens" => "any,1024,999,767,479",
						            'Typography' => array(
						                array('property' => 'color', 'label' => 'Color'),
						                array('property' => 'font-size', 'label' => 'Font Size'),
						                array('property' => 'font-weight', 'label' => 'Font Weight'),
						                array('property' => 'font-style', 'label' => 'Font Style'),
						                array('property' => 'font-family', 'label' => 'Font Family'),
						                array('property' => 'text-align', 'label' => 'Text Align'),
						                array('property' => 'text-shadow', 'label' => 'Text Shadow'),
						                array('property' => 'text-transform', 'label' => 'Text Transform'),
						                array('property' => 'text-decoration', 'label' => 'Text Decoration'),
						                array('property' => 'line-height', 'label' => 'Line Height'),
						                array('property' => 'letter-spacing', 'label' => 'Letter Spacing'),
						                array('property' => 'overflow', 'label' => 'Overflow'),
						                array('property' => 'word-break', 'label' => 'Word Break'),
						            ),

						            //Background group
						            'Background' => array(
						                array('property' => 'background'),
						            ),
						            //Box group
						            'Box' => array(
						                array('property' => 'margin', 'label' => 'Margin'),
						                array('property' => 'padding', 'label' => 'Padding'),
						                array('property' => 'border', 'label' => 'Border'),
						                array('property' => 'width', 'label' => 'Width'),
						                array('property' => 'height', 'label' => 'Height'),
						                array('property' => 'border-radius', 'label' => 'Border Radius'),
						                array('property' => 'float', 'label' => 'Float'),
						                array('property' => 'display', 'label' => 'Display'),
						                array('property' => 'box-shadow', 'label' => 'Box Shadow'),
						                array('property' => 'opacity', 'label' => 'Opacity'),
						            ),
						            //Wrapper group
						            'Wrapper' => array(
						                array('property' => 'overflow', 'label' => 'Overflow'),
						                array('property' => 'position', 'label' => 'Position'),
						                array('property' => 'top', 'label' => 'Top'),
						                array('property' => 'bottom', 'label' => 'Bottom'),
						                array('property' => 'left', 'label' => 'Left'),
						                array('property' => 'right', 'label' => 'Right'),
						                array('property' => 'z-index', 'label' => 'Z Index'),
						            ),


						            // Separator before
						            'Row:before' => array(
										array('property' => 'display', 'label' => 'Display', 'selector' => '+.kc_row_psedue:before'),
						                array('property' => 'transform', 'label' => 'Transform', 'selector' => '+.kc_row_psedue:before'),
						                array('property' => 'background', 'label' => 'Background', 'selector' => '+.kc_row_psedue:before'),
						                array('property' => 'height', 'label' => 'Height', 'selector' => '+.kc_row_psedue:before'),
						                array('property' => 'opacity', 'label' => 'Opacity', 'selector' => '+.kc_row_psedue:before'),
										array('property' => 'z-index', 'label' => 'Z-Index', 'selector' => '+.kc_row_psedue:before'),
										array('property' => 'position', 'label' => 'Position', 'selector' => '+.kc_row_psedue:before'),
										array('property' => 'top', 'label' => 'Position Top', 'selector' => '+.kc_row_psedue:before'),
										array('property' => 'bottom', 'label' => 'Position Bottom', 'selector' => '+.kc_row_psedue:before'),
										array('property' => 'left', 'label' => 'Position Left', 'selector' => '+.kc_row_psedue:before'),
										array('property' => 'right', 'label' => 'Position Right', 'selector' => '+.kc_row_psedue:before'),
						            ),

						            // Separator after
						            'Row:after' => array(
						                array('property' => 'display', 'label' => 'Display', 'selector' => '+.kc_row_psedue:after'),
						                array('property' => 'transform', 'label' => 'Transform', 'selector' => '+.kc_row_psedue:after'),
						                array('property' => 'background', 'label' => 'Background', 'selector' => '+.kc_row_psedue:after'),
						                array('property' => 'opacity', 'label' => 'Opacity', 'selector' => '+.kc_row_psedue:after'),
										array('property' => 'z-index', 'label' => 'Z-Index', 'selector' => '+.kc_row_psedue:after'),
										array('property' => 'position', 'label' => 'Position', 'selector' => '+.kc_row_psedue:after'),
										array('property' => 'top', 'label' => 'Position Top', 'selector' => '+.kc_row_psedue:after'),
										array('property' => 'bottom', 'label' => 'Position Bottom', 'selector' => '+.kc_row_psedue:after'),
										array('property' => 'left', 'label' => 'Position Left', 'selector' => '+.kc_row_psedue:after'),
										array('property' => 'right', 'label' => 'Position Right', 'selector' => '+.kc_row_psedue:after'),
						            ),

									//Background group
									'Particle' => array(
										array('property' => 'display',  'selector' => '+ .particle-canvas-style'),
   										array('property' => 'height', 'selector' => '+ .particle-canvas-style'),
   										array('property' => 'width', 'selector' => '+ .particle-canvas-style'),
   										array('property' => 'z-index', 'label' => 'Z-Index', 'selector' => '+ .particle-canvas-style'),
   										array('property' => 'top', 'label' => 'Position Top', 'selector' => '+ .particle-canvas-style'),
   										array('property' => 'bottom', 'label' => 'Position Bottom', 'selector' => '+ .particle-canvas-style'),
   										array('property' => 'left', 'label' => 'Position Left', 'selector' => '+ .particle-canvas-style'),
   										array('property' => 'right', 'label' => 'Position Right', 'selector' => '+ .particle-canvas-style'),
									),

						            //Custom code css
						            'Custom' => array(
						                array('property' => 'custom', 'label' => 'Custom CSS')
						            )
								)
							)
						)
					),
				)
		);


		$kc->update_map(
			'kc_column',
			'params',
				array(
					'styling' => array(
						array(
							'name'    => 'css_custom',
							'type'    => 'css',
							'options'		=> array(
								array(
									"screens" => "any,1024,999,767,479",
									'Typography' => array(
						                array('property' => 'color', 'label' => 'Color'),
						                array('property' => 'font-size', 'label' => 'Font Size'),
						                array('property' => 'font-weight', 'label' => 'Font Weight'),
						                array('property' => 'font-style', 'label' => 'Font Style'),
						                array('property' => 'font-family', 'label' => 'Font Family'),
						                array('property' => 'text-align', 'label' => 'Text Align'),
						                array('property' => 'text-shadow', 'label' => 'Text Shadow'),
						                array('property' => 'text-transform', 'label' => 'Text Transform'),
						                array('property' => 'text-decoration', 'label' => 'Text Decoration'),
						                array('property' => 'line-height', 'label' => 'Line Height'),
						                array('property' => 'letter-spacing', 'label' => 'Letter Spacing'),
						                array('property' => 'overflow', 'label' => 'Overflow'),
						                array('property' => 'word-break', 'label' => 'Word Break'),
						            ),
						            //Background group
						            'Background' => array(
						                array('property' => 'background'),
						            ),
						            //Box group
						            'Box' => array(
						                array('property' => 'margin', 'label' => 'Margin'),
						                array('property' => 'padding', 'label' => 'Padding'),
						                array('property' => 'border', 'label' => 'Border'),
						                array('property' => 'width', 'label' => 'Width'),
						                array('property' => 'height', 'label' => 'Height'),
						                array('property' => 'border-radius', 'label' => 'Border Radius'),
						                array('property' => 'float', 'label' => 'Float'),
						                array('property' => 'display', 'label' => 'Display'),
						                array('property' => 'box-shadow', 'label' => 'Box Shadow'),
						                array('property' => 'z-index', 'label' => 'Z index'),
						                array('property' => 'opacity', 'label' => 'Opacity'),
										array('property' => 'position', 'label' => 'Position'),
										array('property' => 'top', 'label' => 'Top'),
										array('property' => 'bottom', 'label' => 'Bottom'),
										array('property' => 'left', 'label' => 'Left'),
										array('property' => 'right', 'label' => 'Right'),
						            ),

						            //Box group
						            'Inside' => array(
						                array('property' => 'margin', 'label' => 'Margin'),
						                array('property' => 'padding', 'label' => 'Padding'),
						                array('property' => 'border', 'label' => 'Border'),
						                array('property' => 'width', 'label' => 'Width'),
						                array('property' => 'height', 'label' => 'Height'),
						                array('property' => 'border-radius', 'label' => 'Border Radius'),
						                array('property' => 'float', 'label' => 'Float'),
						                array('property' => 'display', 'label' => 'Display'),
						                array('property' => 'box-shadow', 'label' => 'Box Shadow'),
						                array('property' => 'opacity', 'label' => 'Opacity'),
						            ),

						            //Custom code css
						            'Custom' => array(
						                array('property' => 'custom', 'label' => 'Custom CSS')
						            )
								)
							)
						)
					),
				)
		);



		$kc->update_map(
			'kc_row_inner',
			'params',
				array(
					'styling' => array(
						array(
							'name'    => 'css_custom',
							'type'    => 'css',
							'options'		=> array(
								array(
									"screens" => "any,1024,999,767,479",
						            'Typography' => array(
						                array('property' => 'color', 'label' => 'Color'),
						                array('property' => 'font-size', 'label' => 'Font Size'),
						                array('property' => 'font-weight', 'label' => 'Font Weight'),
						                array('property' => 'font-style', 'label' => 'Font Style'),
						                array('property' => 'font-family', 'label' => 'Font Family'),
						                array('property' => 'text-align', 'label' => 'Text Align'),
						                array('property' => 'text-shadow', 'label' => 'Text Shadow'),
						                array('property' => 'text-transform', 'label' => 'Text Transform'),
						                array('property' => 'text-decoration', 'label' => 'Text Decoration'),
						                array('property' => 'line-height', 'label' => 'Line Height'),
						                array('property' => 'letter-spacing', 'label' => 'Letter Spacing'),
						                array('property' => 'overflow', 'label' => 'Overflow'),
						                array('property' => 'word-break', 'label' => 'Word Break'),
						            ),

						            //Background group
						            'Background' => array(
						                array('property' => 'background'),
						            ),
						            //Box group
						            'Box' => array(
						                array('property' => 'margin', 'label' => 'Margin'),
						                array('property' => 'padding', 'label' => 'Padding'),
						                array('property' => 'border', 'label' => 'Border'),
						                array('property' => 'width', 'label' => 'Width'),
						                array('property' => 'height', 'label' => 'Height'),
						                array('property' => 'border-radius', 'label' => 'Border Radius'),
						                array('property' => 'float', 'label' => 'Float'),
						                array('property' => 'display', 'label' => 'Display'),
						                array('property' => 'box-shadow', 'label' => 'Box Shadow'),
						                array('property' => 'opacity', 'label' => 'Opacity'),
						            ),

						            //Box group
						            'Inside' => array(
						                array('property' => 'margin', 'label' => 'Margin'),
						                array('property' => 'padding', 'label' => 'Padding'),
						                array('property' => 'border', 'label' => 'Border'),
						                array('property' => 'width', 'label' => 'Width'),
						                array('property' => 'height', 'label' => 'Height'),
						                array('property' => 'border-radius', 'label' => 'Border Radius'),
						                array('property' => 'float', 'label' => 'Float'),
						                array('property' => 'display', 'label' => 'Display'),
						                array('property' => 'box-shadow', 'label' => 'Box Shadow'),
						                array('property' => 'border-radius', 'label' => 'Border Radius'),
						                array('property' => 'opacity', 'label' => 'Opacity'),
						            ),
						            //Wrapper group
						            'Wrapper' => array(
						                array('property' => 'z-index', 'label' => 'Z index'),
						                array('property' => 'position', 'label' => 'Position'),
						                array('property' => 'top', 'label' => 'Top'),
						                array('property' => 'bottom', 'label' => 'Bottom'),
						                array('property' => 'left', 'label' => 'Left'),
						                array('property' => 'right', 'label' => 'Right'),
						            ),

						            //Custom code css
						            'Custom' => array(
						                array('property' => 'custom', 'label' => 'Custom CSS')
						            )
								)
							)
						)
					),
				)
		);


		$kc->update_map(
			'kc_progress_bars',
			'params',
			array(

					'styling' => array(
						array(
							'type'			=> 'css',
							'label'			=> __( 'css', 'buffet' ),
							'name'			=> 'custom_css',
							'options'		=> array(
								array(
									'screens' => 'any,1024,999,767,479',
									'Title' => array(
										array('property' => 'color', 'label' => 'Color', 'selector' => '+ .progress-item span.label'),
										array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .progress-item span.label'),
										array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .progress-item span.label'),
										array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .progress-item span.label'),
										array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .progress-item span.label'),
										array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .progress-item span.label'),
										array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .progress-item span.label'),
										array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .progress-item span.label'),
										array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .progress-item span.label'),
									),
									'Value' => array(
										array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .progress-item .value'),
										array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .progress-item .value'),
										array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .progress-item .value'),
										array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .progress-item .value'),
										array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .progress-item .value'),
										array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .progress-item .ui-label'),
									),
									'Item Style' => array(
										array('property' => 'height', 'label' => 'Progressbar Weight', 'selector' => '+ .kc-ui-progress-bar, .kc-ui-progress'),
										array('property' => 'background-color', 'label' => 'Progressbar Background Color', 'selector' => '+ .kc-ui-progress-bar'),
										array('property' => 'border-radius', 'label' => 'Trackbar Radius', 'selector' => '+ .kc-ui-progress-bar .kc-ui-progress, + .kc-ui-progress-bar'),
										array('property' => 'padding', 'label' => 'Progressbar Spacing', 'selector' => '+ .progress-item'),
									),
									'Wrapper' => array(
										array('property' => 'width', 'label' => 'Width'),
										array('property' => 'display', 'label' => 'Display'),
										array('property' => 'margin', 'label' => 'Margin'),
										array('property' => 'padding', 'label' => 'Padding'),
										array('property' => 'background', 'label' => 'Background'),
									)

								)
							)
						),
					)
			)
		);


		$kc->update_map(
			'kc_single_image',
			'params',
			array(

					'styling' => array(
						array(
							'name'    => 'css_custom',
							'type'    => 'css',
							'options'		=> array(
								array(
									"screens" => "any,1024,999,767,479",
									'Image Style' => array(
										array('property' => 'text-align', 'label' => 'Image Alignment'),
										array('property' => 'display', 'label' => 'Image Display'),
										array('property' => 'background-color', 'label' => 'Background Color', 'selector' => 'img'),
										array('property' => 'box-shadow', 'label' => 'Box Shadow', 'selector' => 'img'),
										array('property' => 'border', 'label' => 'Border', 'selector' => 'img'),
										array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => 'img'),
										array('property' => 'width', 'label' => 'Width', 'selector' => 'img'),
										array('property' => 'height', 'label' => 'Height', 'selector' => 'img'),
										array('property' => 'max-width', 'label' => 'Max Width', 'selector' => 'img'),
										array('property' => 'margin', 'label' => 'Margin', 'selector' => 'img'),
										array('property' => 'padding', 'label' => 'Padding', 'selector' => 'img')
									),
									'Caption' => array(
										array('property' => 'color', 'label' => 'Color', 'selector' => '.scapt'),
										array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '.scapt'),
										array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.scapt'),
										array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.scapt'),
										array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.scapt'),
										array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.scapt'),
										array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.scapt'),
										array('property' => 'text-align', 'label' => 'Text Alignment', 'selector' => '.scapt'),
										array('property' => 'border', 'label' => 'Border', 'selector' => '.scapt'),
										array('property' => 'margin', 'label' => 'Margin', 'selector' => '.scapt'),
										array('property' => 'padding', 'label' => 'Padding', 'selector' => '.scapt')
									),
									'Overlay Effect' => array(
										array('property' => 'background-color', 'label' => 'Overlay Background Color', 'selector' => '.kc-image-overlay'),
										array('property' => 'background-color', 'label' => 'Icon BG Color', 'selector' => '.kc-image-overlay i'),
										array('property' => 'color', 'label' => 'Icon Color', 'selector' => '.kc-image-overlay i'),
										array('property' => 'font-size', 'label' => 'Icon Size', 'selector' => '.kc-image-overlay i'),
										array('property' => 'line-height', 'label' => 'Icon Line Height', 'selector' => '.kc-image-overlay i'),
										array('property' => 'width', 'label' => 'Icon Width', 'selector' => '.kc-image-overlay i'),
										array('property' => 'height', 'label' => 'Icon Height', 'selector' => '.kc-image-overlay i'),
										array('property' => 'border', 'label' => 'Icon Border', 'selector' => '.kc-image-overlay i'),
										array('property' => 'border-radius', 'label' => 'Icon Border Radius', 'selector' => '.kc-image-overlay i')
									),
									'Wrapper' => array(
										array('property' => 'width', 'label' => 'Wrapper Width', 'selector' => '+.kc_single_image'),
										array('property' => 'display', 'label' => 'Display'),
										array('property' => 'z-index', 'label' => 'Z-Index'),
										array('property' => 'transform', 'label' => 'Transform'),
										array('property' => 'position', 'label' => 'Position'),
										array('property' => 'top', 'label' => 'Position Top'),
										array('property' => 'bottom', 'label' => 'Position Bottom'),
										array('property' => 'left', 'label' => 'Position Left'),
										array('property' => 'right', 'label' => 'Position Right'),
										array('property' => 'margin', 'label' => 'Margin'),
										array('property' => 'padding', 'label' => 'Padding'),
									),
								)
							)
						)
					)
			)
		);



		$kc->update_map(
			'kc_contact_form7',
			'params',
			array(
				'styling' => array(
					array(
						'name'    => 'css_custom',
						'type'    => 'css',
						'options' => array(

							array(
								"screens" => "any",
								'Label' => array(
									array('property' => 'color', 'label' => 'Color', 'selector' => 'label'),
									array('property' => 'background', 'label' => 'Background Color', 'selector' => 'label'),
									array('property' => 'font-family', 'label' => 'Font Family', 'selector' => 'label'),
									array('property' => 'font-size', 'label' => 'Font Size', 'selector' => 'label'),
									array('property' => 'line-height', 'label' => 'Line Height', 'selector' => 'label'),
									array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => 'label'),
									array('property' => 'text-align', 'selector' => 'label'),
									array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => 'label'),
									array('property' => 'margin', 'label' => 'Margin', 'selector' => 'label'),
									array('property' => 'padding', 'label' => 'Padding', 'selector' => 'label'),
								),
								'Input' => array(
									array('property' => 'color', 'label' => 'Color', 'selector' => '.wpcf7-text'),
									array('property' => 'background', 'label' => 'Background Color', 'selector' => '.wpcf7-text'),
									array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.wpcf7-text'),
									array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.wpcf7-text'),
									array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.wpcf7-text'),
									array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.wpcf7-text'),
									array('property' => 'text-align', 'selector' => '.wpcf7-text'),
									array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.wpcf7-text'),
									array('property' => 'width', 'selector' => '.wpcf7-text'),
									array('property' => 'height', 'selector' => '.wpcf7-text'),
									array('property' => 'border', 'selector' => '.wpcf7-text'),
									array('property' => 'border-radius', 'selector' => '.wpcf7-text'),
									array('property' => 'margin', 'label' => 'Margin', 'selector' => '.wpcf7-text'),
									array('property' => 'padding', 'selector' => '.wpcf7-text'),
								),
								'Text Area' => array(
									array('property' => 'color', 'label' => 'Color', 'selector' => '.wpcf7-textarea'),
									array('property' => 'background', 'label' => 'Background Color', 'selector' => '.wpcf7-textarea'),
									array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.wpcf7-textarea'),
									array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.wpcf7-textarea'),
									array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.wpcf7-textarea'),
									array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.wpcf7-textarea'),
									array('property' => 'text-align', 'selector' => '.wpcf7-textarea'),
									array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.wpcf7-textarea'),
									array('property' => 'width', 'selector' => '.wpcf7-textarea'),
									array('property' => 'height', 'selector' => '.wpcf7-textarea'),
									array('property' => 'border', 'selector' => '.wpcf7-textarea'),
									array('property' => 'border-radius', 'selector' => '.wpcf7-textarea'),
									array('property' => 'margin', 'label' => 'Margin', 'selector' => '.wpcf7-textarea'),
									array('property' => 'padding', 'selector' => '.wpcf7-textarea'),
								),

								'Select' => array(
									array('property' => 'color', 'label' => 'Color', 'selector' => '.wpcf7-select'),
									array('property' => 'background', 'label' => 'Background Color', 'selector' => '.wpcf7-select'),
									array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.wpcf7-select'),
									array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.wpcf7-select'),
									array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.wpcf7-select'),
									array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.wpcf7-select'),
									array('property' => 'text-align', 'selector' => '.wpcf7-select'),
									array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.wpcf7-select'),
									array('property' => 'width', 'selector' => '.wpcf7-select'),
									array('property' => 'height', 'selector' => '.wpcf7-select'),
									array('property' => 'border', 'selector' => '.wpcf7-select'),
									array('property' => 'border-radius', 'selector' => '.wpcf7-select'),
									array('property' => 'margin', 'label' => 'Margin', 'selector' => '.wpcf7-select'),
									array('property' => 'padding', 'selector' => '.wpcf7-select'),
								),
								'Radio - Checkbox' => array(
									array('property' => 'color', 'selector' => '.wpcf7-radio .wpcf7-list-item-label, .wpcf7-checkbox .wpcf7-list-item-label'),
									array('property' => 'background-color', 'selector' => '.wpcf7-radio .wpcf7-list-item-label, .wpcf7-checkbox .wpcf7-list-item-label'),
									array('property' => 'display', 'selector' => '.wpcf7-radio .wpcf7-list-item-label, .wpcf7-checkbox .wpcf7-list-item-label'),
									array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.wpcf7-radio .wpcf7-list-item-label, .wpcf7-checkbox .wpcf7-list-item-label'),
									array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.wpcf7-radio .wpcf7-list-item-label, .wpcf7-checkbox .wpcf7-list-item-label'),
									array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.wpcf7-radio .wpcf7-list-item-label, .wpcf7-checkbox .wpcf7-list-item-label'),
									array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.wpcf7-radio .wpcf7-list-item-label, .wpcf7-checkbox .wpcf7-list-item-label'),
									array('property' => 'text-align', 'selector' => '.wpcf7-radio .wpcf7-list-item-label, .wpcf7-checkbox .wpcf7-list-item-label'),
									array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.wpcf7-radio .wpcf7-list-item-label, .wpcf7-checkbox .wpcf7-list-item-label'),
									array('property' => 'margin', 'label' => 'Margin', 'selector' => '.wpcf7-radio .wpcf7-list-item-label, .wpcf7-checkbox .wpcf7-list-item-label'),
									array('property' => 'padding', 'label' => 'Padding', 'selector' => '.wpcf7-radio .wpcf7-list-item-label, .wpcf7-checkbox .wpcf7-list-item-label'),
								),

								'Submit' => array(
									array('property' => 'color', 'selector' => '.wpcf7-submit'),
									array('property' => 'background', 'selector' => '.wpcf7-submit'),
									array('property' => 'display', 'selector' => '.wpcf7-submit'),
									array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.wpcf7-submit'),
									array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.wpcf7-submit'),
									array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.wpcf7-submit'),
									array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.wpcf7-submit'),
									array('property' => 'text-align', 'selector' => '.wpcf7-submit'),
									array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.wpcf7-submit'),
									array('property' => 'border', 'label' => 'Border', 'selector' => '.wpcf7-submit'),
									array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.wpcf7-submit'),
									array('property' => 'margin', 'label' => 'Margin', 'selector' => '.wpcf7-submit'),
									array('property' => 'padding', 'label' => 'Padding', 'selector' => '.wpcf7-submit'),
								)
							),

						)
					)
				),
				'focus' => array(
					array(
						'name'    => 'css_hover_custom',
						'type'    => 'css',
						'options' => array(

							array(
								"screens" => "any",
								'Input' => array(
									array('property' => 'color', 'label' => 'Color', 'selector' => '.wpcf7-text:focus, + .form-control:focus'),
									array('property' => 'background', 'label' => 'Background Color', 'selector' => '.wpcf7-text:focus, + .form-control:focus'),
									array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.wpcf7-text:focus, + .form-control:focus'),
									array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.wpcf7-text:focus, + .form-control:focus'),
									array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.wpcf7-text:focus, + .form-control:focus'),
									array('property' => 'width', 'selector' => '.wpcf7-text:focus, + .form-control:focus'),
									array('property' => 'height', 'selector' => '.wpcf7-text:focus, + .form-control:focus'),
									array('property' => 'border-color', 'selector' => '.wpcf7-text:focus, + .form-control:focus'),
									array('property' => 'border-radius', 'selector' => '.wpcf7-text:focus, + .form-control:focus'),
								),
								'Text Area' => array(
									array('property' => 'color', 'label' => 'Color', 'selector' => '.wpcf7-textarea:focus, + .form-control:focus'),
									array('property' => 'background', 'label' => 'Background Color', 'selector' => '.wpcf7-textarea:focus, + .form-control:focus'),
									array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.wpcf7-textarea:focus, + .form-control:focus'),
									array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.wpcf7-textarea:focus, + .form-control:focus'),
									array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.wpcf7-textarea:focus, + .form-control:focus'),
									array('property' => 'width', 'selector' => '.wpcf7-textarea:focus, + .form-control:focus'),
									array('property' => 'height', 'selector' => '.wpcf7-textarea:focus, + .form-control:focus'),
									array('property' => 'border', 'selector' => '.wpcf7-textarea:focus, + .form-control:focus'),
									array('property' => 'border-radius', 'selector' => '.wpcf7-textarea:focus, + .form-control:focus'),
								),
								'Select' => array(
									array('property' => 'color', 'label' => 'Color', 'selector' => '.wpcf7-select:focus, + .form-control:focus'),
									array('property' => 'background', 'label' => 'Background Color', 'selector' => '.wpcf7-select:focus, + .form-control:focus'),
									array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.wpcf7-select:focus, + .form-control:focus'),
									array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.wpcf7-select:focus, + .form-control:focus'),
									array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.wpcf7-select:focus, + .form-control:focus'),
									array('property' => 'width', 'selector' => '.wpcf7-select:focus, + .form-control:focus'),
									array('property' => 'height', 'selector' => '.wpcf7-select:focus, + .form-control:focus'),
									array('property' => 'border', 'selector' => '.wpcf7-select:focus, + .form-control:focus'),
									array('property' => 'border-radius', 'selector' => '.wpcf7-select:focus, + .form-control:focus'),
								),
								'Radio - Checkbox' => array(
									array('property' => 'color', 'selector' => '.wpcf7-radio .wpcf7-list-item-label:focus, .wpcf7-checkbox .wpcf7-list-item-label:focus'),
									array('property' => 'background-color', 'selector' => '.wpcf7-radio .wpcf7-list-item-label:focus, .wpcf7-checkbox .wpcf7-list-item-label:focus'),
									array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.wpcf7-radio .wpcf7-list-item-label:focus, .wpcf7-checkbox .wpcf7-list-item-label:focus'),
									array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.wpcf7-radio .wpcf7-list-item-label:focus, .wpcf7-checkbox .wpcf7-list-item-label:focus'),
									array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.wpcf7-radio .wpcf7-list-item-label:focus, .wpcf7-checkbox .wpcf7-list-item-label:focus'),
									array('property' => 'text-align', 'selector' => '.wpcf7-radio .wpcf7-list-item-label:focus, .wpcf7-checkbox .wpcf7-list-item-label:focus'),
								),

								'Submit' => array(
									array('property' => 'color', 'selector' => '.wpcf7-submit:focus'),
									array('property' => 'background', 'selector' => '.wpcf7-submit:focus'),
									array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.wpcf7-submit:focus'),
									array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.wpcf7-submit:focus'),
									array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.wpcf7-submit:focus'),
									array('property' => 'border', 'label' => 'Border', 'selector' => '.wpcf7-submit:focus'),
									array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.wpcf7-submit:focus'),
									array('property' => 'margin', 'label' => 'Margin', 'selector' => '.wpcf7-submit:focus'),
									array('property' => 'padding', 'label' => 'Padding', 'selector' => '.wpcf7-submit:focus'),
								)
							),

						)
					)
				),
			)
		);

		$kc->update_map(
			'kc_button',
			'params',
			array(
				'styling' => array(
					array(
						'type'			=> 'css',
						'label'			=> __( 'css', 'buffet' ),
						'name'			=> 'custom_css',
						'options'		=> array(
							array(
								'screens' => 'any,1024,999,767,479',
								'Button Style' => array(
									array('property' => 'color', 'label' => 'Text Color', 'selector' => '.kc_button'),
									array('property' => 'background', 'label' => 'Background', 'selector' => '.kc_button'),
									array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.kc_button'),
									array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '.kc_button'),
									array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '.kc_button'),
									array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '.kc_button'),
									array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.kc_button'),
									array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '.kc_button'),
									array('property' => 'text-align', 'label' => 'Align'),
									array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '.kc_button'),
									array('property' => 'text-shadow', 'label' => 'Text Shadow', 'selector' => '.kc_button'),
									array('property' => 'box-shadow', 'label' => 'Box Shadow', 'selector' => '.kc_button'),
									array('property' => 'width', 'selector' => '.kc_button'),
									array('property' => 'height', 'selector' => '.kc_button'),
									array('property' => 'display', 'label' => 'Display'),
									array('property' => 'border', 'label' => 'Border', 'selector' => '.kc_button'),
									array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '.kc_button'),
									array('property' => 'padding', 'label' => 'Padding', 'selector' => '.kc_button'),
									array('property' => 'margin', 'label' => 'Margin', 'selector' => '.kc_button'),
									array('property' => 'padding', 'label' => 'Icon Spacing', 'selector' => '.kc_button i')
								),
								'Mouse Hover' => array(
									array('property' => 'font-size', 'label' => 'Text Size', 'selector' => '.kc_button:hover'),
									array('property' => 'color', 'label' => 'Text Color', 'selector'=>'.kc_button:hover'),
									array('property' => 'background', 'label' => 'Background Color', 'selector'=>'.kc_button:hover'),
									array('property' => 'border', 'label' => 'Border', 'selector'=>'.kc_button:hover'),
									array('property' => 'border-radius', 'label' => 'Border Radius Hover', 'selector'=>'.kc_button:hover'),
									array('property' => 'box-shadow', 'label' => 'Box shadow', 'selector'=>'.kc_button:hover'),
									array('property' => 'transform', 'label' => 'Transform', 'selector'=>'.kc_button:hover')
								)
							)
						)
					),
				),
			)
		);

	}




	if (function_exists('kc_add_map'))
	{

		kc_add_icon( get_template_directory_uri().'/assets/css/icofont.css' );

		$contact_forms = kc_tools::get_cf7_names();

		// Scorn Spacing Add on
		kc_add_map(
		    array(

		        'buffet_spacer' => array(
		        	'name' => esc_html__('Spacer - Buffet', 'buffet'),
		        	'description' => esc_html__('Add a responsive white space area', 'buffet'),
		        	'category' => 'Buffet',
		            'icon' => 'cpicon kc-icon-spacing',
		        	'title' => esc_html__('Spacer - Buffet', 'buffet'),

		        	'params' => array(
						'general' => array(
							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'buffet' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'buffet' ),
							),
						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Divider' => array(
	                    					array(
	                    						'property' => 'height',
	                    						'label' => 'Height',
	                    						'selector' => '+ .bufet-spacer'
	                    					),
			                    		)
		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),

		        'buffet_section_title' => array(
		        	'name' => esc_html__('Section Title - Buffet', 'buffet'),
		        	'description' => esc_html__('Add a responsive section title area', 'buffet'),
		        	'category' => 'Buffet',
		            'icon' => 'et-pencil',
		        	'params' => array(
						'general' => array(
							array(
								'type'			=> 'text',
								'label'			=> __( 'Title', 'buffet' ),
								'name'			=> 'title',
								'description'	=> __( 'Give a title for section title.', 'buffet' ),
								'value'			=> 'Section title',
							),
							array(
								'type'			=> 'textarea',
								'label'			=> __( 'Description', 'buffet' ),
								'name'			=> 'desc',
								'description'	=> __( 'Give description for section description.', 'buffet' ),
								'value'			=> 'Affronting discretion as do is announcing. Now months esteem oppose nearer enable too six.',
							),
							array(
								'type'			=> 'attach_image',
								'label'			=> __( 'Divider image', 'buffet' ),
								'name'			=> 'divider_img',
								'description'	=> __( 'Choose divider image for the section (if needed).', 'buffet' ),
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'buffet' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'buffet' ),
							),
						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Title' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .section-heading h2'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .section-heading h2'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .section-heading h2'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .section-heading h2'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .section-heading h2'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .section-heading h2'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .section-heading h2'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .section-heading h2'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .section-heading h2'),
			                    		),
			                    		'Description' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .section-heading p'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .section-heading p'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .section-heading p'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .section-heading p'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .section-heading p'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .section-heading p'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .section-heading p'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .section-heading p'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .section-heading p'),
			                    		),
			                    		'Wrapper' => array(
											array('property' => 'padding', 'label' => 'Wrapper Padding', 'selector' => '+ .section-heading'),
											array('property' => 'margin', 'label' => 'Wrapper margin', 'selector' => '+ .section-heading'),
											array('property' => 'text-align', 'label' => 'Text Align', 'selector' => '+ .section-heading'),
			                    		)
		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),


		        'buffet_feature_block' => array(
		        	'name' => esc_html__('Feature Block - Buffet', 'buffet'),
		        	'description' => esc_html__('Add a responsive section title area', 'buffet'),
		        	'category' => 'Buffet',
		            'icon' => 'et-browser',
		        	'params' => array(
						'general' => array(
							array(
								'type'			=> 'text',
								'label'			=> __( 'Title', 'buffet' ),
								'name'			=> 'title',
								'description'	=> __( 'Give a title for feature block.', 'buffet' ),
								'value'			=> 'Forcast Sales',
							),
							array(
								'type'			=> 'textarea',
								'label'			=> __( 'Description', 'buffet' ),
								'name'			=> 'desc',
								'description'	=> __( 'Give description for feature block.', 'buffet' ),
								'value'			=> 'Adipisicing elit, sed do eiusmod teporara Lorem ipsum dolor sit amt, consectet adop incididunt ipsum  lorem',
							),
							array(
								'type'			=> 'icon_picker',
								'label'			=> __( 'Feature icon', 'buffet' ),
								'name'			=> 'image',
								'description'	=> __( 'Choose image for feature block.', 'buffet' ),
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Counter Number', 'buffet' ),
								'name'			=> 'counter_number',
								'description'	=> __( 'Enter counter number, leave blank for empty.', 'buffet' ),
								'value'			=> '01',
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Button label', 'buffet' ),
								'name'			=> 'btn_text',
								'description'	=> __( 'Add button value.', 'buffet' ),
								'value'			=> 'Read more',
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Button URL', 'buffet' ),
								'name'			=> 'btn_url',
								'description'	=> __( 'Add button url.', 'buffet' ),
								'value'			=> '#',
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Button target', 'buffet' ),
								'name'			=> 'btn_target',
								'description'	=> __( 'Add button value.', 'buffet' ),
								'value'			=> '_self',
							),
							array(
								'type' => 'select',
								'label' => 'Animation name',
								'name' => 'animation_name',
								'description' => __('Select animation style name.', 'buffet'),
								'options' => $appaiShortcodes->animation_style_list(),
								'admin_label' => true,
								'value' => 'fadeInUp',
							),
							array(
								'type' => 'text',
								'label' => 'Animation delay',
								'name' => 'animation_delay',
								'description' => __('Enter animation delay time.', 'buffet'),
								'value' => '0.2s',
							),
							array(
								'type' => 'text',
								'label' => 'Animation duration',
								'name' => 'animation_duration',
								'description' => __('Enter animation duration time.', 'buffet'),
								'value' => '1s',
							),

							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'buffet' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'buffet' ),
							),
						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Title' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .single-feature h2'),
											array('property' => 'color', 'label' => 'Hover Color', 'selector' => '+ .single-feature:hover h2, .feature-img i'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .single-feature h2'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .single-feature h2'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .single-feature h2'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .single-feature h2'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .single-feature h2'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .single-feature h2'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .single-feature h2'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .single-feature h2'),
			                    		),

			                    		'Description' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .single-feature p'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .single-feature p'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .single-feature p'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .single-feature p'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .single-feature p'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .single-feature p'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .single-feature p'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .single-feature p'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .single-feature p'),
			                    		),
			                    		'Button' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .single-feature a.read-more-btn'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .single-feature a.read-more-btn'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .single-feature a.read-more-btn'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .single-feature a.read-more-btn'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .single-feature a.read-more-btn'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .single-feature a.read-more-btn'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .single-feature a.read-more-btn'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .single-feature a.read-more-btn'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .single-feature a.read-more-btn'),
			                    		),

			                    		'Wrapper' => array(
											array('property' => 'background', 'label' => 'Background', 'selector' => '+ .single-feature .feature-img:after'),
											array('property' => 'padding', 'label' => 'Wrapper Padding', 'selector' => '+ .single-feature'),
											array('property' => 'margin', 'label' => 'Wrapper margin', 'selector' => '+ .single-feature'),
			                    		)
		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),

		        'buffet_list' => array(
		        	'name' => esc_html__('Buffet List Info - Buffet', 'buffet'),
		        	'category' => 'Buffet',
		            'icon' => 'sl-list',
		        	'params' => array(
						'general' => array(
							array(
								'type'			=> 'group',
									'label'			=> __('Lists', 'buffet'),
									'name'			=> 'lists',
									'description'	=> '',
									'options'		=> array('add_text' => __('Add new list', 'buffet')),
									// you can use all param type to register child params
									'params' => array(
										array(
											'type' => 'text',
											'label' => 'List text',
											'name' => 'text',
											'admin_label' => true,
										),
										array(
											'type' => 'select',
											'label' => __('Animation name', 'buffet'),
											'name' => 'animation_name',
											'description' => __('Select animation style name.', 'buffet'),
											'options' => $appaiShortcodes->animation_style_list(),
											'admin_label' => true,
											'value' => 'fadeInUp',
										),
										array(
											'type' => 'text',
											'label' => 'Animation delay',
											'name' => 'animation_delay',
											'description' => __('Enter animation delay time.', 'buffet'),
											'value' => '0.2s',
										),
										array(
											'type' => 'text',
											'label' => 'Animation duration',
											'name' => 'animation_duration',
											'description' => __('Enter animation duration time.', 'buffet'),
											'value' => '1s',
										)
									)
							),

						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'List' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .about-list ul li'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .about-list ul li'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .about-list ul li'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .about-list ul li'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .about-list ul li'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .about-list ul li'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .about-list ul li'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .about-list ul li'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .about-list ul li'),
			                    		),
			                    		'List Icon' => array(
											array('property' => 'background', 'label' => 'Background', 'selector' => '+ .about-list ul li:before'),
			                    		),
			                    		'Wrapper' => array(
											array('property' => 'padding', 'label' => 'Wrapper Padding'),
											array('property' => 'margin', 'label' => 'Wrapper margin'),
			                    		)
		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),

		        'buffet_testimonial' => array(
		        	'name' => esc_html__('Testimonials - Buffet', 'buffet'),
		        	'category' => 'Buffet',
		            'icon' => 'sl-user-following',
		        	'params' => array(
						'general' => array(
							array(
								'type'			=> 'group',
									'label'			=> __('Testimonials', 'buffet'),
									'name'			=> 'testimonials',
									'description'	=> '',
									'options'		=> array('add_text' => __('Add new testimonial', 'buffet')),
									// you can use all param type to register child params
									'params' => array(
										array(
											'type' => 'text',
											'label' => __('Name', 'buffet'),
											'name' => 'name',
											'value' => 'John Doe',
										),
										array(
											'type' => 'text',
											'label' => __('Designatoin', 'buffet'),
											'name' => 'designatoin',
											'value' => 'Researcher',
										),
										array(
											'type' => 'textarea',
											'label' => __('Testimonial', 'buffet'),
											'name' => 'testimonial',
											'value' => 'Lorem ipsum madolor sit amet, consectetur adipisicing elit',
										),
										array(
											'type' => 'select',
											'label' => __('Add rating star', 'buffet'),
											'name' => 'rating_star',
											'options' => array(
												'1' => '1 Star',
												'2' => '2 Star',
												'3' => '3 Star',
												'4' => '4 Star',
												'5' => '5 Star'
											),
											'value' => '5',
										),
										array(
											'type' => 'attach_image',
											'label' => __('Photo', 'buffet'),
											'name' => 'image',
										)
									)
							),

						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'List' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .about-list ul li'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .about-list ul li'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .about-list ul li'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .about-list ul li'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .about-list ul li'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .about-list ul li'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .about-list ul li'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .about-list ul li'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .about-list ul li'),
			                    		),
			                    		'Arrow' => array(
											array('property' => 'background', 'label' => 'Background', 'selector' => '+ button.slick-arrow')
			                    		),
			                    		'Arrow Hover' => array(
											array('property' => 'background', 'label' => 'Background', 'selector' => '+ button.slick-arrow:hover')
			                    		),

			                    		'Wrapper' => array(
											array('property' => 'padding', 'label' => 'Wrapper Padding'),
											array('property' => 'margin', 'label' => 'Wrapper margin'),
			                    		)
		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),

		        'buffet_team_members' => array(
		        	'name' => esc_html__('Team Members - Buffet', 'buffet'),
		        	'category' => 'Buffet',
		            'icon' => 'sl-user-following',
		        	'params' => array(
						'general' => array(
							array(
								'type' => 'textfield',
								'label' => __('Name', 'buffet'),
								'name' => 'name',
							),
							array(
								'type' => 'textfield',
								'label' => __('Job title', 'buffet'),
								'name' => 'job_title',
							),
							array(
								'type' => 'attach_image',
								'label' => __('Image', 'buffet'),
								'name' => 'image',
							),
							array(
								'type'			=> 'group',
									'label'			=> __('Socials', 'buffet'),
									'name'			=> 'socials',
									'description'	=> '',
									'options'		=> array('add_text' => __('Add new social profile', 'buffet')),
									// you can use all param type to register child params
									'params' => array(
										array(
											'type' => 'text',
											'label' => __('Social Profile Link', 'buffet'),
											'name' => 'link',
										),
										array(
											'type' => 'icon_picker',
											'label' => esc_html__('Choose icon', 'buffet'),
											'name' => 'icon',
										),
									)
							),
						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Name' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .team-meta h4, + .team-overlay h5'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .team-meta h4, + .team-overlay h5'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .team-meta h4, + .team-overlay h5'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .team-meta h4, + .team-overlay h5'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .team-meta h4, + .team-overlay h5'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .team-meta h4, + .team-overlay h5'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .team-meta h4, + .team-overlay h5'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .team-meta h4, + .team-overlay h5'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .team-meta h4, + .team-overlay h5'),
			                    		),
			                    		'Job Title' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .team-meta p, + .team-overlay p.meta-p'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .team-meta p, + .team-overlay p.meta-p'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .team-meta p, + .team-overlay p.meta-p'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .team-meta p, + .team-overlay p.meta-p'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .team-meta p, + .team-overlay p.meta-p'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .team-meta p, + .team-overlay p.meta-p'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .team-meta p, + .team-overlay p.meta-p'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .team-meta p, + .team-overlay p.meta-p'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .team-meta p, + .team-overlay p.meta-p'),
			                    		),
			                    		'Social Icon' => array(
											array('property' => 'border-color', 'label' => 'Border Color', 'selector' => '+ .team-social-links .social-links span'),
										),
			                    		'Social Icon:hover' => array(
											array('property' => 'background', 'label' => 'Background', 'selector' => '+ .team-social-links .social-links span:hover'),
										),
			                    		'Wrapper' => array(
											array('property' => 'padding', 'label' => 'Wrapper Padding'),
											array('property' => 'margin', 'label' => 'Wrapper margin'),
			                    		)
		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),

		        'buffet_video_popup' => array(
		        	'name' => esc_html__('Video Popup - Buffet', 'buffet'),
		        	'category' => 'Buffet',
		            'icon' => 'et-video',
		        	'params' => array(
						'general' => array(
							array(
								'type' => 'text',
								'label' => esc_html__('Watch video title', 'buffet'),
								'name' => 'title',
								'description' => esc_html__('Enter title text for watch promo video', 'buffet'),
								'value' => 'watch video',
							),
							array(
								'type' => 'text',
								'label' => esc_html__('Video URL', 'buffet'),
								'name' => 'video_url',
								'description' => esc_html__('Enter youtube video url', 'buffet'),
								'value' => 'http://www.youtube.com/watch?v=k-R6AFn9-ek',
							),
							array(
								'type' => 'attach_image',
								'label' => esc_html__('Popup background image', 'buffet'),
								'name' => 'bg_image',
								'description' => esc_html__('Select popup background image', 'buffet')
							),


						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Overlay' => array(
											array('property' => 'border-left-color', 'label' => 'Icon Color', 'selector' => '+ .video-play-icon span:after'),
											array('property' => 'background', 'label' => 'Overlay background', 'selector' => '+ .video-demo-image .overlay-grad-one:after'),
			                    		),
										//Wrapper group
										'Wrapper' => array(
											array('property' => 'width', 'label' => 'Width'),
											array('property' => 'position', 'label' => 'Position'),
											array('property' => 'top', 'label' => 'Top'),
											array('property' => 'bottom', 'label' => 'Bottom'),
											array('property' => 'left', 'label' => 'Left'),
											array('property' => 'right', 'label' => 'Right'),
											array('property' => 'z-index', 'label' => 'Z Index'),
											array('property' => 'padding', 'label' => 'Wrapper Padding'),
											array('property' => 'margin', 'label' => 'Wrapper margin'),
										),
		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),

		        'buffet_pricing' => array(
		        	'name' => esc_html__('Pricing - Buffet', 'buffet'),
		        	'category' => 'Buffet',
		            'icon' => 'fa-dollar-sign',
		        	'params' => array(
						'general' => array(
							array(
								'type' => 'text',
								'label' => esc_html__('Title', 'buffet'),
								'name' => 'title',
								'description' => esc_html__('Enter title text for pricing header', 'buffet'),
								'value' => 'Basic',
							),
							array(
								'type' => 'text',
								'label' => esc_html__('Currency', 'buffet'),
								'name' => 'currency',
								'description' => esc_html__('Enter currency symbol', 'buffet'),
								'value' => '$',
							),
							array(
								'type' => 'text',
								'label' => esc_html__('Price', 'buffet'),
								'name' => 'price',
								'description' => esc_html__('Enter pricing value', 'buffet'),
								'value' => '25',
							),
							array(
								'type' => 'text',
								'label' => esc_html__('Subscription Duration', 'buffet'),
								'name' => 'duration',
								'description' => esc_html__('Enter subscription duration', 'buffet'),
								'value' => '/Annualy',
							),
							array(
								'type' => 'link',
								'label' => esc_html__('Purchase button', 'buffet'),
								'name' => 'button',
								'description' => esc_html__('Enter button value, add link and set button target', 'buffet'),
							),
							array(
								'type' => 'textarea',
								'label' => esc_html__('Pricing Info List', 'buffet'),
								'name' => 'content_table',
								'description' => esc_html__('Use raw html ul/ol list tags', 'buffet')
							),
							array(
								'type' => 'select',
								'label' => 'Animation name',
								'name' => 'animation_name',
								'description' => __('Select animation style name.', 'buffet'),
								'options' => $appaiShortcodes->animation_style_list(),
								'admin_label' => true,
								'value' => 'fadeInUp',
							),
							array(
								'type' => 'text',
								'label' => 'Animation delay',
								'name' => 'animation_delay',
								'description' => __('Enter animation delay time.', 'buffet'),
								'value' => '0.2s',
							),
							array(
								'type' => 'text',
								'label' => 'Animation duration',
								'name' => 'animation_duration',
								'description' => __('Enter animation duration time.', 'buffet'),
								'value' => '1s',
							),

						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Title' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .pricing-heading h2'),
											array('property' => 'color', 'label' => 'Hover Color', 'selector' => '+ .single-pricing-table:hover .pricing-heading h2'),
			                    		),
			                    		'Price' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .pricing-amount .currency, + .pricing-amount .price'),
			                    		),
			                    		'Button' => array(
											array('property' => 'background', 'label' => 'Background', 'selector' => '+ .pricing-btn.blue-btn:before'),
			                    		),
			                    		'Header Hover' => array(
											array('property' => 'background', 'label' => 'Background', 'selector' => '+ .single-pricing-table:hover:after'),
			                    		),
										//Wrapper group
										'Wrapper' => array(
											array('property' => 'padding', 'label' => 'Wrapper Padding'),
											array('property' => 'margin', 'label' => 'Wrapper margin'),
										),
		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),



						        'buffet_advanced_pricing' => array(
						        	'name' => esc_html__('Advanced Pricing - Buffet', 'buffet'),
						        	'category' => 'Buffet',
						            'icon' => 'fa-dollar-sign',
						        	'params' => array(
										'general' => array(
											array(
												'type' => 'text',
												'label' => esc_html__('Monthly tab title', 'buffet'),
												'name' => 'monthly_tab_title',
												'description' => esc_html__('Enter text for the button of monthly tab', 'buffet'),
												'value' => 'Monthly',
											),
											array(
												'type' => 'text',
												'label' => esc_html__('Yearly tab title', 'buffet'),
												'name' => 'annual_tab_title',
												'description' => esc_html__('Enter text for the button of yearly tab', 'buffet'),
												'value' => 'Annualy',
											),
											array(
												'type' => 'select',
												'label' => esc_html__('Select layout', 'buffet'),
												'name' => 'pricing_layout',
												'options' => array(
													'col-md-12' => esc_html__('One Column', 'buffet'),
													'col-md-6' => esc_html__('Two Column', 'buffet'),
													'col-md-4' => esc_html__('Three Column', 'buffet'),
													'col-md-3' => esc_html__('Four Column', 'buffet'),
												),
												'value' => 'col-md-4',
											),
											array(
												'type'			=> 'group',
													'label'			=> __('Pricing Tables', 'buffet'),
													'name'			=> 'pricing_tables',
													'description'	=> '',
													'options'		=> array('add_text' => __('Add new table', 'buffet')),
													// you can use all param type to register child params
													'params' => array(
														array(
															'type' => 'text',
															'label' => esc_html__('Title', 'buffet'),
															'name' => 'title',
															'description' => esc_html__('Enter title text for pricing header', 'buffet'),
															'value' => 'Basic',
														),
														array(
															'type' => 'text',
															'label' => esc_html__('Currency', 'buffet'),
															'name' => 'currency',
															'description' => esc_html__('Enter currency symbol', 'buffet'),
															'value' => '$',
														),
														array(
															'type' => 'text',
															'label' => esc_html__('Annual Price', 'buffet'),
															'name' => 'annual_price',
															'description' => esc_html__('Enter annual pricing value', 'buffet'),
															'value' => '29',
														),
														array(
															'type' => 'text',
															'label' => esc_html__('Annual Duration Text', 'buffet'),
															'name' => 'annual_duration_text',
															'description' => esc_html__('Enter annual subscription duration', 'buffet'),
															'value' => '/Annualy',
														),
														array(
															'type' => 'text',
															'label' => esc_html__('Monthly Price', 'buffet'),
															'name' => 'monthly_price',
															'description' => esc_html__('Enter monthly pricing value', 'buffet'),
															'value' => '4.99',
														),
														array(
															'type' => 'text',
															'label' => esc_html__('Monthly Duration Text', 'buffet'),
															'name' => 'monthly_duration_text',
															'description' => esc_html__('Enter monthly subscription duration', 'buffet'),
															'value' => '/Monthly',
														),
														array(
															'type' => 'link',
															'label' => esc_html__('Purchase button', 'buffet'),
															'name' => 'button',
															'description' => esc_html__('Enter button value, add link and set button target', 'buffet'),
														),
														array(
															'type' => 'textarea',
															'label' => esc_html__('Pricing Info List', 'buffet'),
															'name' => 'content_table',
															'description' => esc_html__('Use raw html ul/ol list tags', 'buffet')
														),
														array(
															'type' => 'select',
															'label' => 'Animation name',
															'name' => 'animation_name',
															'description' => __('Select animation style name.', 'buffet'),
															'options' => $appaiShortcodes->animation_style_list(),
															'admin_label' => true,
															'value' => 'fadeInUp',
														),
														array(
															'type' => 'text',
															'label' => 'Animation delay',
															'name' => 'animation_delay',
															'description' => __('Enter animation delay time.', 'buffet'),
															'value' => '0.2s',
														),
														array(
															'type' => 'text',
															'label' => 'Animation duration',
															'name' => 'animation_duration',
															'description' => __('Enter animation duration time.', 'buffet'),
															'value' => '1s',
														),
													)
											),

										),
						        		'styling' => array(
						        			array(
						        				'name' => 'custom_css',
						        				'type' => 'css',
						        				'options' => array(
						        					array(
								                    	'screens' => 'any,1024,999,767,479',
							                    		'Title' => array(
															array('property' => 'color', 'label' => 'Color', 'selector' => '+ .pricing-heading h2'),
															array('property' => 'color', 'label' => 'Hover Color', 'selector' => '+ .single-pricing-table:hover .pricing-heading h2'),
							                    		),
							                    		'Price' => array(
															array('property' => 'color', 'label' => 'Color', 'selector' => '+ .pricing-amount .currency, + .pricing-amount .price'),
							                    		),
							                    		'Button' => array(
															array('property' => 'background', 'label' => 'Background', 'selector' => '+ .pricing-btn.blue-btn:before'),
							                    		),
							                    		'Header Hover' => array(
															array('property' => 'background', 'label' => 'Background', 'selector' => '+ .single-pricing-table:hover:after'),
							                    		),
														'Switcher' => array(
															array('property' => 'background', 'label' => 'Background', 'selector' => '+ .pricing-tab .pricing-tab-switcher'),
							                    		),
														//Wrapper group
														'Wrapper' => array(
															array('property' => 'padding', 'label' => 'Wrapper Padding'),
															array('property' => 'margin', 'label' => 'Wrapper margin'),
														),
						        					)
						        				)
						        			)
						        		),
										'animate' => array(
											array(
												'name'    => 'animate',
												'type'    => 'animate'
											)
										)
						        	)
						        ),


		        'buffet_counter' => array(
		        	'name' => esc_html__('Counter up - Buffet', 'buffet'),
		        	'category' => 'Buffet',
		            'icon' => 'sl-plus',
		        	'params' => array(
						'general' => array(
							array(
								'type' => 'text',
								'label' => esc_html__('Title', 'buffet'),
								'name' => 'title',
								'description' => esc_html__('Enter title text for counter up', 'buffet'),
								'value' => 'Happy Clients',
							),
							array(
								'type' => 'text',
								'label' => esc_html__('Number', 'buffet'),
								'name' => 'number',
								'description' => esc_html__('Enter counter number text', 'buffet'),
								'value' => '950',
							),
							array(
								'type' => 'text',
								'label' => esc_html__('After number text', 'buffet'),
								'name' => 'after_number_text',
								'description' => esc_html__('Enter text that will show up after counter number ', 'buffet')
							),
							array(
								'type' => 'icon_picker',
								'label' => esc_html__('Choose icon', 'buffet'),
								'name' => 'icon',
							),

						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
										'Title' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .single-items h4'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .single-items h4'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .single-items h4'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .single-items h4'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .single-items h4'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .single-items h4'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .single-items h4'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .single-items h4'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .single-items h4'),
										),
										'Number' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .single-items h2'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .single-items h2'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .single-items h2'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .single-items h2'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .single-items h2'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .single-items h2'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .single-items h2'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .single-items h2'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .single-items h2'),
										),
										'Icon Wrapper' => array(
											array('property' => 'display', 'label' => 'Display', 'selector' => '+ .icon-bg'),
											array('property' => 'background', 'label' => 'Color', 'selector' => '+ .icon-bg'),
										),
										'Icon' => array(
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .icon-bg span'),
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .icon-bg span'),
										),

			                    		'Wrapper' => array(
											array('property' => 'padding', 'label' => 'Wrapper Padding'),
											array('property' => 'margin', 'label' => 'Wrapper margin'),
			                    		)
		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),

		        'buffet_screenshot_slider' => array(
		        	'name' => esc_html__('Screenshot Slider - Buffet', 'buffet'),
		        	'category' => 'Buffet',
		            'icon' => 'sl-film',
		        	'params' => array(
						'general' => array(
							array(
								'type'			=> 'group',
									'label'			=> __('Screenshots', 'buffet'),
									'name'			=> 'screenshots',
									'description'	=> '',
									'options'		=> array('add_text' => __('Add new screenshot', 'buffet')),
									// you can use all param type to register child params
									'params' => array(
										array(
											'type' => 'attach_image',
											'label' => esc_html__('Slider image', 'buffet'),
											'name' => 'slider_image',
											'description' => __('Upload slider image.', 'buffet'),
											'admin_label' => true,
										),
										array(
											'type' => 'toggle',
											'label' => esc_html__('Turn On/Off Slider Popup', 'buffet'),
											'name' => 'use_popup',
										),
										array(
											'type' => 'select',
											'label' => esc_html__('Select popup image', 'buffet'),
											'name' => 'select_popup_image',
											'options' => array(
												'use_same_image' => esc_html__('Use same image', 'buffet'),
												'use_custom_image' => esc_html__('Use custom image', 'buffet')
											),
											'value' => 'use_same_image',
											'relation'      => array(
												'parent'    => 'use_popup',
												'show_when' => 'yes'
											)
										),
										array(
											'type' => 'attach_image',
											'label' => 'Custom popup image',
											'name' => 'popup_image',
											'description' => __('Upload custom popup image.', 'buffet'),
										)
									)
							),

						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Dots' => array(
											array('property' => 'border', 'label' => 'Border', 'selector' => '+ .slick-dots li'),
			                    		),
			                    		'Active Dot' => array(
											array('property' => 'border', 'label' => 'Border', 'selector' => '+ .slick-dots li'),
											array('property' => 'background', 'label' => 'Active Border Background', 'selector' => '+ .slick-dots li.slick-active'),
			                    		),
			                    		'Wrapper' => array(
											array('property' => 'padding', 'label' => 'Wrapper Padding'),
											array('property' => 'margin', 'label' => 'Wrapper margin'),
			                    		)
		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),

		        'buffet_header_slider' => array(
		        	'name' => esc_html__('Header Slider - Buffet', 'buffet'),
		        	'description' => esc_html__('Add a responsive header slider', 'buffet'),
		        	'category' => 'Buffet',
		            'icon' => 'et-document',

		        	'params' => array(
						'general' => array(

							array(
								'type'			=> 'group',
									'label'			=> __('Sliders', 'buffet'),
									'name'			=> 'sliders',
									'description'	=> '',
									'options'		=> array('add_text' => __('Add new slide', 'buffet')),
									// you can use all param type to register child params
									'params' => array(
										array(
											'type'			=> 'text',
											'label'			=> __( 'Title', 'buffet' ),
											'name'			=> 'title',
											'description'	=> __( 'Add title for slider.', 'buffet' ),
											'value'			=> 'Best Mobile App Landing Page for you !',
										),
										array(
											'type'			=> 'textarea',
											'label'			=> __( 'Subtitle', 'buffet' ),
											'name'			=> 'subtitle',
											'description'	=> __( 'Add subtitle for slider.', 'buffet' ),
											'value'			=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor anagi icdunt ut labore et dolore magna aliqua.',
										),
										array(
											'type'			=> 'attach_image',
											'label'			=> __( 'Image', 'buffet' ),
											'name'			=> 'image',
											'description'	=> __( 'Add slider image.', 'buffet' ),
										),
										array(
											'type'			=> 'text',
											'label'			=> __( 'Button label', 'buffet' ),
											'name'			=> 'btn_text',
											'description'	=> __( 'Add button value.', 'buffet' ),
											'value'			=> 'Download',
										),
										array(
											'type'			=> 'text',
											'label'			=> __( 'Button URL', 'buffet' ),
											'name'			=> 'btn_url',
											'description'	=> __( 'Add button url.', 'buffet' ),
											'value'			=> '#',
										),
										array(
											'type'			=> 'toggle',
											'label'			=> __( 'Button target', 'buffet' ),
											'name'			=> 'btn_target',
											'description'	=> __( 'Open in new window.', 'buffet' ),
											'value'			=> 'no',
										),
										array(
											'type' => 'select',
											'label' => 'Slider Button Animation',
											'name' => 'btn_animation_name',
											'description' => __('Select animation style name.', 'buffet'),
											'options' => $appaiShortcodes->animation_style_list(),
											'admin_label' => true,
											'value' => 'fadeInUp',
										),
										array(
											'type'			=> 'text',
											'label'			=> __( 'Watch video button label', 'buffet' ),
											'name'			=> 'watch_vid_btn_label',
											'description'	=> __( 'Add label text for watch video button.', 'buffet' ),
											'value'			=> 'Watch video',
										),
										array(
											'type'			=> 'text',
											'label'			=> __( 'iFrame video URL', 'buffet' ),
											'name'			=> 'vid_url',
											'description'	=> __( 'Add video URL for watch video button.', 'buffet' ),
											'value'			=> 'https://www.youtube.com/watch?v=5SVR7x1ENm4',
										),

										array(
											'type' => 'select',
											'label' => 'Slider Title Animation',
											'name' => 'title_animation_name',
											'description' => __('Select animation style name.', 'buffet'),
											'options' => $appaiShortcodes->animation_style_list(),
											'admin_label' => true,
											'value' => 'fadeInUp',
										),
										array(
											'type' => 'select',
											'label' => 'Slider Subtitle Animation',
											'name' => 'subtitle_animation_name',
											'description' => __('Select animation style name.', 'buffet'),
											'options' => $appaiShortcodes->animation_style_list(),
											'admin_label' => true,
											'value' => 'fadeInLeft',
										),

										array(
											'type' => 'select',
											'label' => 'Slider Image Animation',
											'name' => 'img_animation_name',
											'description' => __('Select animation style name.', 'buffet'),
											'options' => $appaiShortcodes->animation_style_list(),
											'admin_label' => true,
											'value' => 'fadeInRight',
										),
										array(
											'type'			=> 'text',
											'label'			=> __( 'Extra Class', 'buffet' ),
											'name'			=> 'extra_class',
											'description'	=> __( 'Give extra css class.', 'buffet' ),
										),
									)
							),


						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
										'Title' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .slider-content h1'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .slider-content h1'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .slider-content h1'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .slider-content h1'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .slider-content h1'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .slider-content h1'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .slider-content h1'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .slider-content h1'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .slider-content h1'),
			                    		),
										'Subtitle' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .slider-content p'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .slider-content p'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .slider-content p'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .slider-content p'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .slider-content p'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .slider-content p'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .slider-content p'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .slider-content p'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .slider-content p'),
			                    		),
										'Button' => array(
											array('property' => 'color', 'label' => 'Hover Color', 'selector' => '+ a.slider-button.all-btn'),
											array('property' => 'background', 'label' => 'Color', 'selector' => '+ a.slider-button.all-btn'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ a.slider-button.all-btn'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ a.slider-button.all-btn'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ a.slider-button.all-btn'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ a.slider-button.all-btn'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ a.slider-button.all-btn'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ a.slider-button.all-btn'),
			                    		),
										'Watch video' => array(
											array('property' => 'color', 'label' => 'Text Color', 'selector' => '+ .video-area-bg h4'),
											array('property' => 'border-left-color', 'label' => 'Icon Color', 'selector' => '+ a.video-play-btn:after'),
			                    		),
										'Image' => array(
											array('property' => 'width', 'label' => 'Width', 'selector' => '+ .slider-single-item .slider-screen-8 img'),
											array('property' => 'background', 'label' => 'Background', 'selector' => '+ .slider-single-item .slider-screen-8 img'),
											array('property' => 'display', 'label' => 'Display', 'selector' => '+ .slider-single-item .slider-screen-8 img'),
											array('property' => 'z-index', 'label' => 'Z-Index', 'selector' => '+ .slider-single-item .slider-screen-8 img'),
											array('property' => 'transform', 'label' => 'Transform', 'selector' => '+ .slider-single-item .slider-screen-8 img'),
											array('property' => 'position', 'label' => 'Position', 'selector' => '+ .slider-single-item .slider-screen-8 img'),
											array('property' => 'top', 'label' => 'Position Top', 'selector' => '+ .slider-single-item .slider-screen-8 img'),
											array('property' => 'bottom', 'label' => 'Position Bottom', 'selector' => '+ .slider-single-item .slider-screen-8 img'),
											array('property' => 'left', 'label' => 'Position Left', 'selector' => '+ .slider-single-item .slider-screen-8 img'),
											array('property' => 'right', 'label' => 'Position Right', 'selector' => '+ .slider-single-item .slider-screen-8 img'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .slider-single-item .slider-screen-8 img'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .slider-single-item .slider-screen-8 img'),
			                    		),
										'Wrapper' => array(
											array('property' => 'background', 'label' => 'Background', 'selector' => '+ .homepage-slider-area'),
											array('property' => 'padding', 'label' => 'Wrapper Padding', 'selector' => '+ .slider-content-table'),
											array('property' => 'margin', 'label' => 'Wrapper margin', 'selector' => '+ .slider-content-table'),
			                    		),

		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),


		        'buffet_swiper_slider' => array(
		        	'name' => esc_html__('Swiper Slider - Buffet', 'buffet'),
		        	'description' => esc_html__('Add a responsive swiper images slider.', 'buffet'),
		        	'category' => 'Buffet',
		            'icon' => 'sl-diamond',
		        	'params' => array(
						'general' => array(
							array(
								'type'			=> 'group',
									'label'			=> __('Slides', 'buffet'),
									'name'			=> 'slides',
									'description'	=> '',
									'options'		=> array('add_text' => __('Add new slide', 'buffet')),
									// you can use all param type to register child params
									'params' => array(
										array(
											'type'			=> 'attach_image',
											'label'			=> __( 'Slider Image', 'buffet' ),
											'name'			=> 'image',
											'description'	=> __( 'Upload slider image.', 'buffet' ),
										)
									)
							),

							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'buffet' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'buffet' ),
							),
						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
										'Wrapper' => array(
											array('property' => 'padding', 'label' => 'Wrapper Padding'),
											array('property' => 'margin', 'label' => 'Wrapper margin'),
			                    		),
		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),


		        'buffet_btn' => array(
		        	'name' => esc_html__('Button - Buffet', 'buffet'),
		        	'category' => 'Buffet',
		            'icon' => 'sl-screen-tablet',
		        	'params' => array(
						'general' => array(
							array(
								'type'			=> 'text',
								'label'			=> __( 'Button label', 'buffet' ),
								'name'			=> 'btn_text',
								'description'	=> __( 'Add button value.', 'buffet' ),
								'value'			=> 'Read more',
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Button URL', 'buffet' ),
								'name'			=> 'btn_url',
								'description'	=> __( 'Add button url.', 'buffet' ),
								'value'			=> '#',
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Button target', 'buffet' ),
								'name'			=> 'btn_target',
								'description'	=> __( 'Add button value.', 'buffet' ),
								'value'			=> '_self',
							),

							array(
								'type' => 'select',
								'label' => 'Animation name',
								'name' => 'animation_name',
								'description' => __('Select animation style name.', 'buffet'),
								'options' => $appaiShortcodes->animation_style_list(),
								'admin_label' => true,
								'value' => 'fadeInUp',
							),
							array(
								'type' => 'text',
								'label' => 'Animation delay',
								'name' => 'animation_delay',
								'description' => __('Enter animation delay time.', 'buffet'),
								'value' => '0.2s',
							),
							array(
								'type' => 'text',
								'label' => 'Animation duration',
								'name' => 'animation_duration',
								'description' => __('Enter animation duration time.', 'buffet'),
								'value' => '1s',
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'buffet' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'buffet' ),
							),
						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Button' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ a.bufet-btn'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ a.bufet-btn'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ a.bufet-btn'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ a.bufet-btn'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ a.bufet-btn'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ a.bufet-btn'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ a.bufet-btn'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ a.bufet-btn'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ a.bufet-btn'),
											array('property' => 'border-radius', 'label' => 'Border Radius', 'selector' => '+ a.bufet-btn, a.bufet-btn:before, a.bufet-btn:after'),
			                    		),
			                    		'Button:hover' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ a.bufet-btn;hover'),
											array('property' => 'transform', 'label' => 'Transform', 'selector' => '+ a.bufet-btn:hover'),
											array('property' => 'box-shadow', 'label' => 'Box shadow', 'selector' => '+ a.bufet-btn:hover'),
											array('property' => 'background', 'label' => 'Background', 'selector' => '+ a.bufet-btn:after'),
											array('property' => 'background', 'label' => 'Background', 'selector' => '+ a.bufet-btn:before'),
			                    		),
			                    		'Wrapper' => array(
											array('property' => 'text-align', 'label' => 'Text align'),
											array('property' => 'padding', 'label' => 'Wrapper Padding'),
											array('property' => 'margin', 'label' => 'Wrapper margin'),
			                    		)
		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),



		        'buffet_info_block' => array(
		        	'name' => esc_html__('Info Block - Buffet', 'buffet'),
		        	'description' => esc_html__('Add a responsive info block with image', 'buffet'),
		        	'category' => 'Buffet',
		            'icon' => 'sl-notebook',
		        	'params' => array(
						'general' => array(
							array(
								'type'			=> 'text',
								'label'			=> __( 'Title', 'buffet' ),
								'name'			=> 'title',
								'description'	=> __( 'Give a title for info block.', 'buffet' ),
								'value'			=> 'Login First',
							),
							array(
								'type'			=> 'textarea',
								'label'			=> __( 'Description', 'buffet' ),
								'name'			=> 'desc',
								'description'	=> __( 'Give description for info block.', 'buffet' ),
								'value'			=> 'Adipisicing elit, sed do eiusmod teporara Lorem ipsum dolor sit amt, consectet adop incididunt ipsum  lorem',
							),
							array(
								'type'			=> 'attach_image',
								'label'			=> __( 'Info image/icon', 'buffet' ),
								'name'			=> 'image',
								'description'	=> __( 'Choose image for info block.', 'buffet' ),
							),

							array(
								'type' => 'select',
								'label' => 'Animation name',
								'name' => 'animation_name',
								'description' => __('Select animation style name.', 'buffet'),
								'options' => $appaiShortcodes->animation_style_list(),
								'admin_label' => true,
								'value' => 'fadeInUp',
							),
							array(
								'type' => 'text',
								'label' => 'Animation delay',
								'name' => 'animation_delay',
								'description' => __('Enter animation delay time.', 'buffet'),
								'value' => '0.2s',
							),
							array(
								'type' => 'text',
								'label' => 'Animation duration',
								'name' => 'animation_duration',
								'description' => __('Enter animation duration time.', 'buffet'),
								'value' => '1s',
							),

							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'buffet' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'buffet' ),
							),
						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Title' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .single-work h2'),
											array('property' => 'color', 'label' => 'Hover Color', 'selector' => '+ .single-feature:hover h2'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .single-work h2'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .single-work h2'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .single-work h2'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .single-work h2'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .single-work h2'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .single-work h2'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .single-work h2'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .single-work h2'),
			                    		),
			                    		'Description' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .single-work p'),
											array('property' => 'color', 'label' => 'Hover Color', 'selector' => '+ .single-work:hover p'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .single-work p'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .single-work p'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .single-work p'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .single-work p'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .single-work p'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .single-work p'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .single-work p'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .single-work p'),
			                    		),
			                    		'Box' => array(
											array('property' => 'box-shadow', 'label' => 'Box shadow on Hover', 'selector' => '+ .single-work:hover'),
			                    		),
			                    		'Wrapper' => array(
											array('property' => 'padding', 'label' => 'Wrapper Padding', 'selector' => '+ .single-work'),
											array('property' => 'margin', 'label' => 'Wrapper margin', 'selector' => '+ .single-work'),
			                    		)
		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),


		        'buffet_creative_block' => array(
		        	'name' => esc_html__('Creative Info Block - Buffet', 'buffet'),
		        	'description' => esc_html__('Add a responsive creative info block', 'buffet'),
		        	'category' => 'Buffet',
		            'icon' => 'sl-puzzle',
		        	'params' => array(
						'general' => array(
							array(
								'type'			=> 'text',
								'label'			=> __( 'Title', 'buffet' ),
								'name'			=> 'title',
								'description'	=> __( 'Give a title for info block.', 'buffet' ),
								'value'			=> 'Login First',
							),
							array(
								'type'			=> 'textarea',
								'label'			=> __( 'Description', 'buffet' ),
								'name'			=> 'desc',
								'description'	=> __( 'Give description for info block.', 'buffet' ),
								'value'			=> 'Adipisicing elit, sed do eiusmod teporara Lorem ipsum dolor sit amt, consectet adop incididunt ipsum  lorem',
							),
							array(
								'type'			=> 'icon_picker',
								'label'			=> __( 'Info icon', 'buffet' ),
								'name'			=> 'icon',
								'description'	=> __( 'Choose icon from the icon library.', 'buffet' ),
							),
							array(
								'type'			=> 'toggle',
								'label'			=> __( 'Use Hover style?', 'buffet' ),
								'name'			=> 'hove_style',
								'description'	=> __( 'Toggle to use hover style or not.', 'buffet' ),
								'value'			=> 'yes',
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'buffet' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'buffet' ),
							),
						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Title' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .single-advance  h2'),
											array('property' => 'color', 'label' => 'Hover Color', 'selector' => '+ .single-advance:hover h2'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .single-advance  h2'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .single-advance  h2'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .single-advance  h2'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .single-advance  h2'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .single-advance  h2'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .single-advance  h2'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .single-advance  h2'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .single-advance  h2'),
			                    		),
			                    		'Description' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .single-advance p'),
											array('property' => 'color', 'label' => 'Hover Color', 'selector' => '+ .single-advance:hover p'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .single-advance p'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .single-advance p'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .single-advance p'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .single-advance p'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .single-advance p'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .single-advance p'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .single-advance p'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .single-advance p'),
			                    		),
			                    		'Icon' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .single-advance span'),
											array('property' => 'color', 'label' => 'Hover Color', 'selector' => '+ .single-advance:hover span'),
			                    		),
			                    		'Box' => array(
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .single-advance'),
											array('property' => 'border', 'label' => 'Border', 'selector' => '+ .single-advance'),
											array('property' => 'border-radius', 'label' => 'Border radius', 'selector' => '+ .single-advance'),
											array('property' => 'background', 'label' => 'Background', 'selector' => '+ .single-advance:hover'),
											array('property' => 'box-shadow', 'label' => 'Box shadow on Hover', 'selector' => '+ .single-advance:hover'),
			                    		),
			                    		'Wrapper' => array(
											array('property' => 'padding', 'label' => 'Wrapper Padding', 'selector' => '+ .single-advance'),
											array('property' => 'margin', 'label' => 'Wrapper margin', 'selector' => '+ .single-advance'),
			                    		)
		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),


		        'buffet_faq' => array(
		        	'name' => esc_html__('FAQ - Buffet', 'buffet'),
		        	'description' => esc_html__('Add a responsive faq block', 'buffet'),
		        	'category' => 'Buffet',
		            'icon' => 'sl-question',
		        	'params' => array(
						'general' => array(
							array(
								'type'			=> 'group',
									'label'			=> __('FAQ\'s', 'buffet'),
									'name'			=> 'faqs',
									'description'	=> '',
									'options'		=> array('add_text' => __('Add new FAQ', 'buffet')),
									// you can use all param type to register child params
									'params' => array(
										array(
											'type' => 'text',
											'label' => 'FAQ Question',
											'name' => 'question',
											'description' => __('Enter FAQ Question.', 'buffet'),
											'value' => '1. Sedeiusmod tempor inccsetetur aliquatraiy?',
										),
										array(
											'type' => 'textarea',
											'label' => 'FAQ Answer',
											'name' => 'answer',
											'description' => __('Enter FAQ Answer.', 'buffet'),
											'value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do ei temporo incididunt ut labore et dolore magna aliqua. Ut enim ad minim exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute dolor in dolore',
										),
										array(
											'type' => 'toggle',
											'label' => 'Make it open?',
											'name' => 'open_toggle',
											'description' => __('Toggle this to make it open by default on page load.', 'buffet'),
											'value' => 'no',
										),

									)
							),


							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'buffet' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'buffet' ),
							),
						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Question' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .beefup__head'),
											array('property' => 'color', 'label' => 'Hover Color', 'selector' => '+ .single-feature:hover h2'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .beefup__head'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .beefup__head'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .beefup__head'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .beefup__head'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .beefup__head'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .beefup__head'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .beefup__head'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .beefup__head'),
			                    		),
			                    		'Answer' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .beefup__body'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .beefup__body'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .beefup__body'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .beefup__body'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .beefup__body'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .beefup__body'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .beefup__body'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .beefup__body'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .beefup__body'),
			                    		),
			                    		'Box' => array(
											array('property' => 'background', 'label' => 'Background', 'selector' => '+ .beefup.is-open'),
											array('property' => 'border', 'label' => 'Border', 'selector' => '+ .beefup.is-open')
			                    		),
			                    		'Wrapper' => array(
											array('property' => 'padding', 'label' => 'Wrapper Padding'),
											array('property' => 'margin', 'label' => 'Wrapper margin'),
			                    		)
		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),


		        'buffet_faq_advanced' => array(
		        	'name' => esc_html__('FAQ Advanced - Buffet', 'buffet'),
		        	'description' => esc_html__('Add a responsive faq advanced block', 'buffet'),
		        	'category' => 'Buffet',
		            'icon' => 'sl-question',
		        	'params' => array(
						'general' => array(
							array(
								'type'			=> 'group',
									'label'			=> __('Tabs', 'buffet'),
									'name'			=> 'tabs',
									'description'	=> '',
									'options'		=> array('add_text' => __('Add new Tab', 'buffet')),
									// you can use all param type to register child params
									'params' => array(
										array(
											'type' => 'text',
											'label' => 'Tab Title',
											'name' => 'tab_title',
											'description' => __('Enter tab title.', 'buffet'),
											'value' => 'General',
										),
										array(
											'type' => 'textarea',
											'label' => 'Tab Content',
											'name' => 'tab_content',
											'description' => __('Enter tab content of FAQ shortcodes.', 'buffet'),
											'value' => '[bufet_faq question="" answer="" is_open="true"]',
										),
									)
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'buffet' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'buffet' ),
							),
						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Question' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .beefup__head'),
											array('property' => 'color', 'label' => 'Hover Color', 'selector' => '+ .single-feature:hover h2'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .beefup__head'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .beefup__head'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .beefup__head'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .beefup__head'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .beefup__head'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .beefup__head'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .beefup__head'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .beefup__head'),
			                    		),
			                    		'Answer' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .beefup__body'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .beefup__body'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .beefup__body'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .beefup__body'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .beefup__body'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .beefup__body'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .beefup__body'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .beefup__body'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .beefup__body'),
			                    		),
			                    		'Box' => array(
											array('property' => 'background', 'label' => 'Background', 'selector' => '+ .beefup.is-open'),
											array('property' => 'border', 'label' => 'Border', 'selector' => '+ .beefup.is-open')
			                    		),
			                    		'Wrapper' => array(
											array('property' => 'padding', 'label' => 'Wrapper Padding'),
											array('property' => 'margin', 'label' => 'Wrapper margin'),
			                    		)
		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),


		        'buffet_blog_posts' => array(
		        	'name' => esc_html__('Blog posts - Buffet', 'buffet'),
		        	'description' => esc_html__('Add latest blog posts to your site', 'buffet'),
		        	'category' => 'Buffet',
		            'icon' => 'sl-speech',
		        	'params' => array(
						'general' => array(
							array(
								'type'			=> 'text',
								'label'			=> __( 'Limit', 'buffet' ),
								'name'			=> 'limit',
								'description'	=> __( 'Set the number of the posts to show or enter -1 to show all the posts.', 'buffet' ),
								'value'			=> -1,
							),
							array(
		        				'name' => 'grid',
		        				'type' => 'select',
		        				'label' => esc_html__('Grid', 'buffet'),
								'description'	=> esc_html__( 'Select column grid layout', 'buffet' ),
		        				'options' => array(
									'col-md-12' => esc_html__('1 Cols', 'buffet'),
									'col-md-6' => esc_html__('2 Cols', 'buffet'),
									'col-md-4' => esc_html__('3 Cols', 'buffet'),
		        					'col-md-3' => esc_html__('4 Cols', 'buffet'),
		        				),
		        				'value' => 'col-md-4'
		        			),
							array(
		        				'name' => 'orderby',
		        				'type' => 'select',
		        				'label' => esc_html__('Order By', 'buffet'),
								'description'	=> esc_html__( 'Select post order by', 'buffet' ),
		        				'options' => array(
		        					'id' => esc_html__('ID', 'buffet'),
		        					'author' => esc_html__('author', 'buffet'),
		        					'title' => esc_html__('title', 'buffet'),
		        					'name' => esc_html__('name', 'buffet'),
		        					'type' => esc_html__('type', 'buffet'),
		        					'date' => esc_html__('date', 'buffet'),
		        					'modified' => esc_html__('modified', 'buffet'),
		        					'menu_order' => esc_html__('menu_order', 'buffet'),
		        					'rand' => esc_html__('modified', 'buffet'),
		        				),
		        				'value' => 'date'
		        			),
		        			array(
		        				'name' => 'order',
		        				'type' => 'select',
		        				'label' => esc_html__('Order', 'buffet'),
								'description'	=> esc_html__( 'Select post order', 'buffet' ),
		        				'options' => array(
		        					'DESC' => esc_html__('DESC', 'buffet'),
		        					'ASC' => esc_html__('ASC', 'buffet'),
		        				),
		        				'value' => 'DESC'
		        			),

							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'buffet' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'buffet' ),
							),
						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Title' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .blog-heading h2'),
											array('property' => 'color', 'label' => 'Hover Color', 'selector' => '+ .single-blog-box:hover .blog-heading h2'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .blog-heading h2'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .blog-heading h2'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .blog-heading h2'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .blog-heading h2'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .blog-heading h2'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .blog-heading h2'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .blog-heading h2'),
			                    		),
			                    		'Meta' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .single-blog-box .post-meta a'),
			                    		),
			                    		'Comments' => array(
											array('property' => 'display', 'label' => 'Display', 'selector' => '+ .post-date.pull-right'),
			                    		),
			                    		'Icon' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .single-blog-box .read-more-icon'),
			                    		),
			                    		'Icon hover' => array(
											array('property' => 'color', 'label' => 'Hover Color', 'selector' => '+ .single-blog-box:hover .read-more-icon'),
											array('property' => 'background', 'label' => 'Background', 'selector' => '+ .single-blog-box:hover .read-more-icon'),
			                    		),
			                    		'Media Embed' => array(
											array('property' => 'height', 'label' => 'Height', 'selector' => '+ .single-blog-box .embed-content iframe'),
											array('property' => 'min-height', 'label' => 'Min Height', 'selector' => '+ .single-blog-box .embed-content iframe'),
											array('property' => 'max-height', 'label' => 'Max Height', 'selector' => '+ .single-blog-box .embed-content iframe')
			                    		),
			                    		'Wrapper' => array(
											array('property' => 'padding', 'label' => 'Wrapper Padding', 'selector' => '+ .blog-shortcode.single-blog-box'),
											array('property' => 'margin', 'label' => 'Wrapper margin', 'selector' => '+ .blog-shortcode.single-blog-box'),
			                    		)
		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),

		        'buffet_subscribe_form' => array(
		        	'name' => esc_html__('Subscribe form - Buffet', 'buffet'),
		        	'description' => esc_html__('Add a mailchimp subscribe form.', 'buffet'),
		        	'category' => 'Buffet',
		            'icon' => 'et-envelope',
		        	'params' => array(
						'general' => array(
							array(
								'type'			=> 'text',
								'label'			=> __( 'Form Action URL', 'buffet' ),
								'name'			=> 'form_url',
								'description'	=> sprintf(__( 'Enter your mailchimp subscribe form action url. Learn how to get Mailchimp Subscribe form action URL from <a href="%s" target="_blank">Here</a>', 'buffet' ), 'https://www.youtube.com/watch?v=sybmI8HgxFo'),
							),
							array(
								'name' => 'form_style',
								'label' => 'Form Style',
								'type' => 'radio_image',  // USAGE TEXT TYPE
								'options' => array(
									'style-1'	=> get_template_directory_uri() . '/assets/img/forms/form-style-1.png',
									'style-2'	=> get_template_directory_uri() . '/assets/img/forms/form-style-2.png',
								),
								'value' => 'style-1', // remove this if you do not need a default content
								'description' => 'Select your form style',
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Input field text', 'buffet' ),
								'name'			=> 'input_field_text',
								'description'	=> __( 'Enter text for input field .', 'buffet' ),
								'value'			=> 'Enter your email address',
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Submit button text', 'buffet' ),
								'name'			=> 'submit_btn_value',
								'description'	=> __( 'Enter text for submit button.', 'buffet' ),
								'value'			=> 'Go',
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'buffet' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'buffet' ),
							),
						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Button' => array(
											array('property' => 'background', 'label' => 'Background', 'selector' => '+ .subscribe-box #mcs-embedded-subscribe'),
			                    		),
			                    		'Wrapper' => array(
											array('property' => 'padding', 'label' => 'Wrapper Padding'),
											array('property' => 'margin', 'label' => 'Wrapper margin'),
			                    		)
		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),

		        'buffet_google_map' => array(
		        	'name' => esc_html__('Google map - Buffet', 'buffet'),
		        	'description' => esc_html__('Add a styled google map.', 'buffet'),
		        	'category' => 'Buffet',
		            'icon' => 'sl-map',
		        	'params' => array(
						'general' => array(
							array(
								'type'			=> 'text',
								'label'			=> __( 'Latitude', 'appai' ),
								'name'			=> 'latitude',
								'description'	=> __( 'Enter map latitude of the area.', 'appai' ),
								'value'			=> '40.714735',
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Longitude', 'appai' ),
								'name'			=> 'longitude',
								'description'	=> __( 'Enter map longitude of the area.', 'appai' ),
								'value'			=> '-74.016220',
							),
							array(
								'type'			=> 'attach_image',
								'label'			=> __( 'Map icon mark image', 'appai' ),
								'name'			=> 'map_icon_mark',
								'description'	=> __( 'Choose map icon mark image.', 'appai' ),
							),
							array(
								'type'			=> 'number_slider',
								'label'			=> __( 'Map zoom level', 'appai' ),
								'name'			=> 'zoom_level',
								'options' => array(    // REQUIRED
									'min' => 1,
									'max' => 16,
									'show_input' => true
								),
								'value'			=> '11',
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'buffet' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'buffet' ),
							),
						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Wrapper' => array(
											array('property' => 'position', 'label' => 'Position', 'selector' => '+ .google-map'),
											array('property' => 'top', 'label' => 'Top', 'selector' => '+ .google-map'),
											array('property' => 'bottom', 'label' => 'Bottom', 'selector' => '+ .google-map'),
											array('property' => 'left', 'label' => 'Left', 'selector' => '+ .google-map'),
											array('property' => 'right', 'label' => 'Right', 'selector' => '+ .google-map'),
											array('property' => 'z-index', 'label' => 'Z Index', 'selector' => '+ .google-map'),
											array('property' => 'height', 'label' => 'Map Height', 'selector' => '+ .google-map'),
											array('property' => 'width', 'label' => 'Map Width', 'selector' => '+ .google-map'),
											array('property' => 'padding', 'label' => 'Wrapper Padding', 'selector' => '+ .single-work'),
											array('property' => 'margin', 'label' => 'Wrapper margin', 'selector' => '+ .single-work'),
			                    		)
		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),

		        'buffet_address_info' => array(
		        	'name' => esc_html__('Address Info - Buffet', 'buffet'),
		        	'description' => esc_html__('Add a styled google map.', 'buffet'),
		        	'category' => 'Buffet',
		            'icon' => 'fa-address-book',
		        	'params' => array(
						'general' => array(
							array(
								'type'			=> 'textarea',
								'label'			=> __( 'Address', 'appai' ),
								'name'			=> 'address',
								'description'	=> __( 'Enter address.', 'appai' ),
								'value'			=> '28 Green Tower, Street Name, New York City, USA',
							),
							array(
								'type'			=> 'icon_picker',
								'label'			=> __( 'Icon', 'appai' ),
								'name'			=> 'icon',
								'description'	=> __( 'Choose your icon.', 'appai' ),
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'buffet' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'buffet' ),
							),
						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Icon' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .single-address span'),
											array('property' => 'background-color', 'label' => 'Background Color', 'selector' => '+ .single-address .address-icon-bg'),
			                    		),
			                    		'Text' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .single-address'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .single-address a'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .single-address a'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .single-address a'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .single-address a'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .single-address a'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .single-address a'),
			                    		),
			                    		'Wrapper' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .single-address span'),
											array('property' => 'margin'),
											array('property' => 'padding')
			                    		)
		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),



		        'buffet_open_popup_btn' => array(
		        	'name' => esc_html__('Open popup button - Buffet', 'buffet'),
		        	'description' => esc_html__('Add a button for popup opening.', 'buffet'),
		        	'category' => 'Buffet',
		            'icon' => 'sl-printer',
		        	'params' => array(
						'general' => array(
							array(
								'type'			=> 'text',
								'label'			=> __( 'Watch video button label', 'buffet' ),
								'name'			=> 'watch_vid_btn_label',
								'description'	=> __( 'Add label text for watch video button.', 'buffet' ),
								'value'			=> 'Watch video',
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'iFrame video URL', 'buffet' ),
								'name'			=> 'vid_url',
								'description'	=> __( 'Add video URL for watch video button.', 'buffet' ),
								'value'			=> 'https://www.youtube.com/watch?v=5SVR7x1ENm4',
							),
							array(
								'type' => 'select',
								'label' => 'Animation name',
								'name' => 'animation_name',
								'description' => __('Select animation style name.', 'buffet'),
								'options' => $appaiShortcodes->animation_style_list(),
								'admin_label' => true,
								'value' => 'fadeInUp',
							),
							array(
								'type' => 'text',
								'label' => 'Animation delay',
								'name' => 'animation_delay',
								'description' => __('Enter animation delay time.', 'buffet'),
								'value' => '0.2s',
							),
							array(
								'type' => 'text',
								'label' => 'Animation duration',
								'name' => 'animation_duration',
								'description' => __('Enter animation duration time.', 'buffet'),
								'value' => '1s',
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'buffet' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'buffet' ),
							),
						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Text' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .video-area-bg h4'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .video-area-bg h4'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .video-area-bg h4'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .video-area-bg h4'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .video-area-bg h4'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .video-area-bg h4'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .video-area-bg h4'),
			                    		),
			                    		'Icon' => array(
											array('property' => 'border-left-color', 'label' => 'Color', 'selector' => '+ .video-area-bg a.video-play-btn:after'),
			                    		),
			                    		'Wrapper' => array(
											array('property' => 'height', 'label' => 'Map Height', 'selector' => '+ .google-map'),
											array('property' => 'padding', 'label' => 'Wrapper Padding', 'selector' => '+ .single-work'),
											array('property' => 'margin', 'label' => 'Wrapper margin', 'selector' => '+ .single-work'),
			                    		)
		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),


		        'buffet_icon_list' => array(
		        	'name' => esc_html__('Creative Icon List - Buffet', 'buffet'),
		        	'category' => 'Buffet',
		            'icon' => 'sl-pictures',
		        	'params' => array(
						'general' => array(
							array(
								'type'			=> 'group',
									'label'			=> __('Icons', 'buffet'),
									'name'			=> 'icons',
									'description'	=> '',
									'options'		=> array('add_text' => __('Add new icon', 'buffet')),
									// you can use all param type to register child params
									'params' => array(
										array(
											'type' => 'icon_picker',
											'label' => __('Icon', 'buffet'),
											'name' => 'icon'
										),
										array(
											'type' => 'link',
											'label' => __('Link', 'buffet'),
											'name' => 'link'
										)
									)
							),

						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Icon' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .social-links span'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .social-links span'),
											array('property' => 'border', 'label' => 'Border', 'selector' => '+ .social-links span'),
											array('property' => 'width', 'label' => 'Font Weight', 'selector' => '+ .social-links span'),
											array('property' => 'height', 'label' => 'Font Weight', 'selector' => '+ .social-links span'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .social-links span'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .social-links span'),
			                    		),
			                    		'Icon:hover' => array(
											array('property' => 'background', 'label' => 'Background', 'selector' => '+ .social-links span:hover'),
											array('property' => 'box-shadow', 'label' => 'Box Shadow', 'selector' => '+ .social-links span:hover')
			                    		),
			                    		'Wrapper' => array(
											array('property' => 'text-align'),
											array('property' => 'padding', 'label' => 'Wrapper Padding'),
											array('property' => 'margin', 'label' => 'Wrapper margin'),
			                    		)
		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),


		        'buffet_date_countdown' => array(
		        	'name' => esc_html__('Date Countdown - Coming Soon', 'buffet'),
		        	'category' => 'Buffet',
		            'icon' => 'fa-calender-times',
		        	'params' => array(
						'general' => array(

							array(
								'type' => 'text',
								'label' => __('date', 'buffet'),
								'name' => 'date',
								'value' => '8 July 2018',
							),

						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Date' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ #clockdiv div > span'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ #clockdiv div > span'),
											array('property' => 'border', 'label' => 'Border', 'selector' => '+ #clockdiv div > span'),
											array('property' => 'width', 'label' => 'Width', 'selector' => '+ #clockdiv div > span'),
											array('property' => 'height', 'label' => 'Height', 'selector' => '+ #clockdiv div > span'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ #clockdiv div > span'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ #clockdiv div > span'),
			                    		),

			                    		'Text' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ #clockdiv .smalltext'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ #clockdiv .smalltext'),
											array('property' => 'border', 'label' => 'Border', 'selector' => '+ #clockdiv .smalltext'),
											array('property' => 'width', 'label' => 'Font Weight', 'selector' => '+ #clockdiv .smalltext'),
											array('property' => 'height', 'label' => 'Font Weight', 'selector' => '+ #clockdiv .smalltext'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ #clockdiv .smalltext'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ #clockdiv .smalltext'),
			                    		),

			                    		'Each Item' => array(
											array('property' => 'text-align', 'label' => 'Text Align', 'selector'=> '#clockdiv > div'),
											array('property' => 'padding', 'label' => 'Wrapper Padding', 'selector'=> '#clockdiv > div'),
											array('property' => 'margin', 'label' => 'Wrapper margin', 'selector'=> '#clockdiv > div'),
			                    		),
			                    		'Wrapper' => array(
											array('property' => 'text-align', 'label' => 'Text Align'),
											array('property' => 'padding', 'label' => 'Wrapper Padding'),
											array('property' => 'margin', 'label' => 'Wrapper margin'),
			                    		)
		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),

		        'buffet_button_group' => array(
		        	'name' => esc_html__('Creative Button Group - Buffet', 'buffet'),
		        	'category' => 'Buffet',
		            'icon' => 'sl-book-open',
		        	'params' => array(
						'general' => array(
							array(
								'type'			=> 'group',
									'label'			=> __('Buttons', 'buffet'),
									'name'			=> 'buttons',
									'description'	=> '',
									'options'		=> array('add_text' => __('Add new button', 'buffet')),
									// you can use all param type to register child params
									'params' => array(
										array(
											'type' => 'textarea',
											'label' => __('Text', 'buffet'),
												'name' => 'text'
										),

										array(
											'type' => 'icon_picker',
											'label' => __('Icon', 'buffet'),
											'name' => 'icon'
										),

										array(
											'type' => 'link',
											'label' => __('Link', 'buffet'),
											'name' => 'link'
										),
									)
							),

						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Button' => array(
											array('property' => 'background', 'label' => 'Background', 'selector' => '+ .btn-style-2:before')
			                    		),

			                    		'Wrapper' => array(
											array('property' => 'text-align'),
											array('property' => 'padding', 'label' => 'Wrapper Padding'),
											array('property' => 'margin', 'label' => 'Wrapper margin'),
			                    		)
		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),


		        'buffet_breadcrumb' => array(
		        	'name' => esc_html__('Breadcrumb - Buffet', 'buffet'),
		        	'description' => esc_html__('Add a responsive breadcrumb section.', 'buffet'),
		        	'category' => 'Buffet',
		            'icon' => 'sl-grid',
		        	'params' => array(
						'general' => array(
							array(
								'type'			=> 'select',
								'label'			=> __( 'Select title', 'appai' ),
								'name'			=> 'select_title_type',
								'description'	=> __( 'Select the title type.', 'appai' ),
								'options'		=> array(
									'post_page_title' => 'Post/Page title',
									'custom_title' => 'Custom title',
								),
								'value'			=> 'post_page_title'
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Title', 'appai' ),
								'name'			=> 'title',
								'description'	=> __( 'Give a title for breadcrumb section.', 'appai' ),
								'value'			=> 'Title',
								'relation' => array(
									'parent' => 'select_title_type',
									'show_when' => 'custom_title'
								),
							),
							array(
								'type'			=> 'toggle',
								'label'			=> __( 'Show page link breadcrumbs', 'appai' ),
								'name'			=> 'show_pg_link_breadcrumbs',
								'description'	=> __( 'Toggle to show/hide page link breadcrumb.', 'appai' ),
								'value'			=> 'yes',
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'appai' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'appai' ),
							),
						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
			                    		'Title' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .blog-table-cell h2'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .blog-table-cell h2'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .blog-table-cell h2'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .blog-table-cell h2'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .blog-table-cell h2'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .blog-table-cell h2'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .blog-table-cell h2'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .blog-table-cell h2'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .blog-table-cell h2'),
			                    		),
			                    		'Links' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '+ .breadcrumbs span a'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '+ .breadcrumbs span a'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '+ .breadcrumbs span a'),
											array('property' => 'line-height', 'label' => 'Line Height', 'selector' => '+ .breadcrumbs span a'),
											array('property' => 'letter-spacing', 'label' => 'Letter Spacing', 'selector' => '+ .breadcrumbs span a'),
											array('property' => 'font-weight', 'label' => 'Font Weight', 'selector' => '+ .breadcrumbs span a'),
											array('property' => 'text-transform', 'label' => 'Text Transform', 'selector' => '+ .breadcrumbs span a'),
											array('property' => 'padding', 'label' => 'Padding', 'selector' => '+ .breadcrumbs span a'),
											array('property' => 'margin', 'label' => 'Margin', 'selector' => '+ .breadcrumbs span a'),
			                    		),
										'Background' => array(
											array('property' => 'background', 'label' => 'Background', 'selector' => '+ .blog-full-page-area'),
			                    		),
			                    		'Wrapper' => array(
											array('property' => 'padding', 'label' => 'Wrapper Padding', 'selector' => '+ .blog-table-cell'),
											array('property' => 'margin', 'label' => 'Wrapper margin', 'selector' => '+ .blog-table-cell'),
			                    		)
		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),

		        'buffet_breadcrumb_links' => array(
		        	'name' => esc_html__('Breadcrumb Links - Buffet', 'buffet'),
		        	'description' => esc_html__('Add a responsive breadcrumb section.', 'buffet'),
		        	'category' => 'Buffet',
		            'icon' => 'sl-grid',
		        	'params' => array(
						'general' => array(
							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'appai' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'appai' ),
							),
						),
		        		'styling' => array(
		        			array(
		        				'name' => 'custom_css',
		        				'type' => 'css',
		        				'options' => array(
		        					array(
				                    	'screens' => 'any,1024,999,767,479',
										'Wrapper' => array(
											array('property' => 'width', 'label' => 'Width', 'selector' => '.buffet-breadcrumb-links.breadcrumb-two'),
											array('property' => 'position', 'label' => 'Position', 'selector' => '.buffet-breadcrumb-links.breadcrumb-two'),
											array('property' => 'top', 'label' => 'Top', 'selector' => '.buffet-breadcrumb-links.breadcrumb-two'),
											array('property' => 'bottom', 'label' => 'Bottom', 'selector' => '.buffet-breadcrumb-links.breadcrumb-two'),
											array('property' => 'left', 'label' => 'Left', 'selector' => '.buffet-breadcrumb-links.breadcrumb-two'),
											array('property' => 'right', 'label' => 'Right', 'selector' => '.buffet-breadcrumb-links.breadcrumb-two'),
											array('property' => 'z-index', 'label' => 'Z Index', 'selector' => '.buffet-breadcrumb-links.breadcrumb-two'),
											array('property' => 'padding', 'label' => 'Wrapper Padding', 'selector' => '.buffet-breadcrumb-links.breadcrumb-two'),
											array('property' => 'margin', 'label' => 'Wrapper margin', 'selector' => '.buffet-breadcrumb-links.breadcrumb-two'),
			                    		)
		        					)
		        				)
		        			)
		        		),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),

				'buffet_login_module' => array(
		        	'name' => esc_html__('Login Module - Blue', 'buffet'),
		        	'description' => esc_html__('Add your products', 'buffet'),
		        	'category' => 'buffet',
		            'icon' => 'cpicon kc-icon-spacing',
		        	'title' => esc_html__('Login Module - Blue', 'buffet'),

		        	'params' => array(
						'general' => array(
							array(
								'type' => 'text',
								'label' => __( 'Enter Email Label', 'buffet' ),
								'name' => 'email_label',
								'description' => __( 'Enter label text for email field', 'buffet' ),
								'value' => __( 'Enter email', 'buffet' ),
							),
							array(
								'type' => 'text',
								'label' => __( 'Email field placeholder', 'buffet' ),
								'name' => 'email_placeholder',
								'description' => __( 'Enter placeholder text for username or email address', 'buffet' ),
								'value' => __( 'Username or Email address', 'buffet' ),
							),
							array(
								'type' => 'text',
								'label' => __( 'Enter Password Label', 'buffet' ),
								'name' => 'pass_label',
								'description' => __( 'Enter label text for pass field', 'buffet' ),
								'value' => __( 'Password', 'buffet' ),
							),
							array(
								'type' => 'text',
								'label' => __( 'Enter Password Placeholder', 'buffet' ),
								'name' => 'pass_placeholder',
								'description' => __( 'Enter label text for pass field', 'buffet' ),
								'value' => __( 'Type your password here', 'buffet' ),
							),
							array(
								'type' => 'text',
								'label' => __( 'Submit button value', 'buffet' ),
								'name' => 'submit_btn_value',
								'description' => __( 'Enter button value submit button', 'buffet' ),
								'value' => __( 'Login', 'buffet' ),
							),
							array(
								'type' => 'toggle',
								'label' => __( 'Enable forget password link?', 'buffet' ),
								'name' => 'forget_password',
								'description' => __( 'Enable/Disable forget password link', 'buffet' ),
								'default' => 'yes',
								'value' => 'yes',
							),
							array(
								'type' => 'link',
								'label' => __( 'Link for the forget password page.', 'buffet' ),
								'name' => 'forget_password_page',
								'description' => __( 'Choose the page for forget password page.', 'buffet' ),
								'relation'      => array(
									'parent'    => 'forget_password',
									'show_when' => 'yes'
								)
							),

							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'buffet' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'buffet' ),
							),
						),

						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),


		        'buffet_register_module' => array(
		        	'name' => esc_html__('Registration Module - Blue', 'buffet'),
		        	'description' => esc_html__('Add your products', 'buffet'),
		        	'category' => 'buffet',
		            'icon' => 'cpicon kc-icon-spacing',
		        	'title' => esc_html__('Registration Module - Blue', 'buffet'),

		        	'params' => array(
						'general' => array(
							array(
								'type' => 'text',
								'label' => __( 'Enter Username Label', 'buffet' ),
								'name' => 'username_label',
								'description' => __( 'Enter label text for  username field', 'buffet' ),
								'value' => __( 'Enter Username', 'buffet' ),
							),
							array(
								'type' => 'text',
								'label' => __( 'Username field placeholder', 'buffet' ),
								'name' => 'username_placeholder',
								'description' => __( 'Enter placeholder text for username', 'buffet' ),
								'value' => __( 'Type your username here', 'buffet' ),
							),
							array(
								'type' => 'text',
								'label' => __( 'Enter Email Label', 'buffet' ),
								'name' => 'email_label',
								'description' => __( 'Enter label text for  email field', 'buffet' ),
								'value' => __( 'Enter Email Address', 'buffet' ),
							),
							array(
								'type' => 'text',
								'label' => __( 'Email field placeholder', 'buffet' ),
								'name' => 'email_placeholder',
								'description' => __( 'Enter placeholder text for  email address', 'buffet' ),
								'value' => __( 'Type your email address here', 'buffet' ),
							),
							array(
								'type' => 'text',
								'label' => __( 'Submit button text', 'buffet' ),
								'name' => 'submit_btn_value',
								'description' => __( 'Enter button value submit button', 'buffet' ),
								'value' => __( 'Creat a new account', 'buffet' ),
							),

							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'buffet' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'buffet' ),
							),
						),

						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),



		        'buffet_forget_pass_module' => array(
		        	'name' => esc_html__('Forget Password Module - Blue', 'buffet'),
		        	'description' => esc_html__('Add your products', 'buffet'),
		        	'category' => 'buffet',
		            'icon' => 'cpicon kc-icon-spacing',
		        	'title' => esc_html__('Forget Password Module - Blue', 'buffet'),
		        	'params' => array(
						'general' => array(
							array(
								'type' => 'text',
								'label' => __( 'Enter Email Label', 'buffet' ),
								'name' => 'email_label',
								'description' => __( 'Enter label text for email field', 'buffet' ),
								'value' => __( 'Enter email', 'buffet' ),
							),
							array(
								'type' => 'text',
								'label' => __( 'Email field placeholder', 'buffet' ),
								'name' => 'email_placeholder',
								'description' => __( 'Enter placeholder text for username or email address', 'buffet' ),
								'value' => __( 'Username or Email address', 'buffet' ),
							),
							array(
								'type' => 'text',
								'label' => __( 'Submit button text', 'buffet' ),
								'name' => 'submit_btn_value',
								'description' => __( 'Enter button value submit button', 'buffet' ),
								'value' => __( 'RESET MY PASSWORD', 'buffet' ),
							),
							array(
								'type'			=> 'text',
								'label'			=> __( 'Extra Class', 'buffet' ),
								'name'			=> 'extra_class',
								'description'	=> __( 'Give extra css class.', 'buffet' ),
							),
						),

						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						)
		        	)
		        ),
		    )
		);

	}


}
