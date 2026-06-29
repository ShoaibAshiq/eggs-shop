<?php
function wpb_load_widget() {
	register_widget( 'story_widget' );
	register_widget( 'game_widget' );
}

add_action( 'widgets_init', 'wpb_load_widget' );

class story_widget extends WP_Widget {

	function __construct() {
		parent::__construct( 'story_widget', 'Story widget', [ 'description' => 'Sample widget to add story on page learn' ] );
	}

	public function form( $instance ) {
		// PART 1: Extract the data from the instance variable
		$instance   = wp_parse_args( (array) $instance, [ 'count' => '' ] );
		$count      = $instance['count'];
		$story_type = $instance['story_type'];

		// PART 2-3: Display the fields
		?>
      <!-- PART 2: Widget count field START -->
      <p>
        <label for="<?php echo $this->get_field_id( 'count' ); ?>">Count:
          <input class="widefat"
                 id="<?php echo $this->get_field_id( 'count' ); ?>"
                 name="<?php echo $this->get_field_name( 'count' ); ?>"
                 type="number"
                 value="<?php echo esc_attr( $count ); ?>"/>
        </label>
      </p>

      <p>
        <label for="<?php echo $this->get_field_id( 'text' ); ?>">Sory type:
          <select class='widefat'
                  id="<?php echo $this->get_field_id( 'story_type' ); ?>"
                  name="<?php echo $this->get_field_name( 'story_type' ); ?>"
                  type="text">
            <option
              value='stories-king-eggs'<?php echo ( $story_type == 'stories-king-eggs' ) ? 'selected' : ''; ?>>
              Stories King Eggs
            </option>
            <option
              value='stories-happy-eggs'<?php echo ( $story_type == 'stories-happy-eggs' ) ? 'selected' : ''; ?>>
              Stories Happy Eggs
            </option>
            <option
              value='stories-lucky-eggs'<?php echo ( $story_type == 'stories-lucky-eggs' ) ? 'selected' : ''; ?>>
              Stories Lucky Eggs
            </option>
            <option
              value='stories-magik-eggs'<?php echo ( $story_type == 'stories-magik-eggs' ) ? 'selected' : ''; ?>>
              Stories Magik Eggs
            </option>
          </select>
        </label>
      </p>
		<?php
	}

	public function update( $newInstance, $oldInstance ) {

		$values               = [];
		$values["count"]      = htmlentities( $newInstance["count"] );
		$values["story_type"] = htmlentities( $newInstance["story_type"] );

		return $values;
	}

	public function widget( $args, $instance ) {
		$count    = $instance["count"];
		$category = $instance['story_type'];
		echo do_shortcode( '[category-post category="' . $category . '" post_type="post" limit="' . $count . '"]' );
	}
}

class game_widget extends WP_Widget {

	function __construct() {
		parent::__construct( 'gane_widget', 'Game widget', [ 'description' => 'Sample widget to add game on page learn' ] );
	}

	public function form( $instance ) {
		$count = $instance['count'];
		?>
      <label for="<?php echo $this->get_field_id( 'count' ); ?>">Count:
        <input class="widefat"
               id="<?php echo $this->get_field_id( 'count' ); ?>"
               name="<?php echo $this->get_field_name( 'count' ); ?>"
               type="number"
               value="<?php echo esc_attr( $count ); ?>"/>
      </label>


		<?php
	}

	public function update( $newInstance, $oldInstance ) {

		$values          = [];
		$values["count"] = htmlentities( $newInstance["count"] );

		return $values;
	}

	public function widget( $args, $instance ) {
		$count = $instance["count"];
		echo do_shortcode( '[category-post category="learn-games" post_type="post" limit="' . $count . '"]' );
	}
}
?>
