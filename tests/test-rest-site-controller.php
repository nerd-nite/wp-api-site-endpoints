<?php
/**
 * Unit tests covering WP_Test_REST_Site_Controller functionality.
 *
 * @package WordPress
 * @subpackage JSON API
 */

class WP_Test_REST_Site_Controller extends WP_Test_REST_Controller_Testcase {

	public function setUp() {
		parent::setUp();

		$this->endpoint = new WP_REST_Site_Controller();
	}

	public function test_register_routes() {
		$routes = $this->server->get_routes();
		$this->assertArrayHasKey( '/wp/v2/site', $routes );
	}

	public function test_context_param() {
		$request  = new WP_REST_Request( 'OPTIONS', '/wp/v2/site' );
		$response = $this->server->dispatch( $request );
		$data     = $response->get_data();

		$this->assertEquals( 'view', $data['endpoints'][0]['args']['context']['default'] );
	}

	public function test_get_items() {
		$request = new WP_REST_Request( 'GET', '/wp/v2/users' );
		$request->set_param( 'context', 'view' );
		$response = $this->server->dispatch( $request );

		$this->assertEquals( 200, $response->get_status() );
	}

	public function test_get_item() {

	}

	public function test_create_item() {

	}

	public function test_update_item() {

	}

	public function test_delete_item() {

	}

	public function test_prepare_item() {

	}

	public function test_get_item_schema() {

	}

}
