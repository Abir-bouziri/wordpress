<?php

add_action( 'init' , 'bizberg_shop_clients_logo' );
function bizberg_shop_clients_logo(){

	Kirki::add_field( 'bizberg', [
		'type'        => 'repeater',
		'label'       => esc_html__( 'Clients Logo', 'bizberg-shop' ),
		'section'     => 'bizberg_shop_frontpage_woocommerce_clients_logo',
		'row_label' => [
			'type'  => 'text',
			'value' => esc_html__( 'Logo', 'bizberg-shop' ),
		],
		'button_label' => esc_html__('Add New', 'bizberg-shop' ),
		'settings'     => 'clients_logo',
		'fields' => [
			'image_id' => [
				'type'        => 'image',
				'label'       => esc_html__( 'Image', 'bizberg-shop' )
			],
			'link' => [
				'type'        => 'link',
				'label'       => esc_html__( 'URL', 'bizberg-shop' )
			],
		],
		'default'      => [],
		'partial_refresh'    => [
			'clients_logo' => [
				'selector'        => '.bs_brands .container',
				'render_callback' => 'bizberg_shop_get_clients_logo_content'
			]
		],
	] );


}