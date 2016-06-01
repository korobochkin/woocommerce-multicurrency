<?php
namespace Korobochkin\WCMultiCurrencies\Admin\Settings\Prototypes\Pages\HelpTabs;

abstract class HelpTab {

	private $id = null;

	private $title = '';

	private $content = '';

	public function __construct( $id, $title, $content ) {
		$this->set_id( $id );
		$this->set_title( $title );
		$this->set_content( $content );
	}

	final public function register() {

		if( $this->is_valid() ) {
			$screen = get_current_screen();
			$screen->add_help_tab( array(
				'id'	  => $this->get_id(),
				'title'	  => $this->get_title(),
				'content' => $this->get_content()
			));
		}
	}

	final public function is_valid() {
		if( !$this->is_id_valid( $this->get_id() ) )
			return false;

		if( !$this->is_title_valid( $this->get_title() ) )
			return false;

		if( !$this->is_content_valid( $this->get_content() ) )
			return false;

		return true;
	}

	final public function set_id( $id ) {
		if( $this->is_id_valid( $id ) ) {
			$this->id = $id;
			return true;
		}
		return false;
	}

	final public function get_id() {
		return $this->id;
	}

	final public function is_id_valid( $id ) {
		if( is_string( $id ) && !empty( $id ) ) {
			return true;
		}
		return false;
	}

	final public function set_title( $title ) {
		if( $this->is_title_valid( $title ) ) {
			$this->title = $title;
			return true;
		}
		return false;
	}

	final public function get_title() {
		return $this->title;
	}

	final public function is_title_valid( $title ) {
		if( is_string( $title ) && !empty( $title ) ) {
			return true;
		}
		return false;
	}

	final public function set_content( $content ) {
		if( $this->is_content_valid( $content ) ) {
			$this->content = $content;
			return true;
		}
		return false;
	}

	final public function get_content() {
		return $this->content;
	}

	final public function is_content_valid( $content ) {
		if( is_string( $content ) ) {
			return true;
		}
		return false;
	}
}
