<?php
class Elementor_Billing_Address extends \Elementor\Widget_Base {

	public function get_name() {
		return 'customer_billing_city';
	}

	public function get_title() {
		return esc_html__( 'Customer Billing City', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'customer', 'billing', 'address', 'city' ];
	}

	protected function register_controls() {

		// Content Tab Start

		$this->start_controls_section(
			'section_title',
			[
				'label' => esc_html__( 'Title', 'elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'city_select',
			[
				'label' => esc_html__( 'Select City', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::SELECT,
        'options' => [
          'dhaka' => esc_html__('Dhaka', 'elementor-addon'),
          'chittagong' => esc_html__('Chittagong', 'elementor-addon'),
          'rajshahi' => esc_html__('Rajshahi', 'elementor-addon'),
          'khulna' => esc_html__('Khulna', 'elementor-addon'),
          'barishal' => esc_html__('Barishal', 'elementor-addon'),
          'sylhet' => esc_html__('Sylhet', 'elementor-addon'),
          'rangpur' => esc_html__('Rangpur', 'elementor-addon'),
          'mymensingh' => esc_html__('Mymensingh', 'elementor-addon'),
        ],
				'default' => 'dhaka'
			]
		);

		$this->end_controls_section();

		// Content Tab End


		// Style Tab Start

		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Title', 'elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Text Color', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .billing-city' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		// Style Tab End

	}

	protected function render() {
    $settings = $this->get_settings_for_display();
    $selected_city = $settings['city_select']; // The city selected in the widget

    $current_user = wp_get_current_user();
    if( $current_user->ID ) {
      $customer = new WC_Customer($current_user->ID);
      $billing_city = $customer->get_billing_city();

      if( $selected_city == strtolower($billing_city) ) {
        // Cities match
        echo "Hey {$customer->first_name}, are you living in {$billing_city}?";
        echo "<p>The selected city matches your billing city!</p>";
      } else return;
    }
	}
}