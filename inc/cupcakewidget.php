<?php
/**
 * @package Cupcake
 * @version 1.0
 */
/*
Plugin Name: ArtistaryCupcakes

Description: For visitor's information
Author: Anmol Joy John
Version: 1.0

*/


/**
 * Adds PHPAssignment widget.
 */

class PHPAssignment extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'PHPAssignment', // Base ID
			__( 'PHP Assignment', 'text_domain' ), // Name
			array( 'description' => __( 'The widget on the site', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		if (count ($_POST) > 0) { 
			/*   
				PLACE YOUR calculation code here.
			*/
			
			$inputTitle = $_POST['Title'];
			$inputfname = $_POST['firstname'];
			$inputlname = $_POST['lastname'];
            $inputage = $_POST['age'];
			
			if (is_numeric ($inputage)) {
          			$message = "Hello " . $inputTitle . " " . $inputfname . " " .
					$inputlname . ", Its nice to meet you!";
			if ($inputage > 100) { 
          			$message .= "wow you're old"; 
					} 
			} else { 
            			$message = "You didn't enter a numeric age"; 
				}
			
            
          			
		}

		 
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . " -- MY TITLE --". $args['after_title'];
		}


		?>
		<!--  
			Step 1: Place your user interaction here.  This should be HTML
		-->
<?php 
	if ($message == "") { 
?>

<form method=post>
<fieldset>
	Title: <select name="title">
		<option value="Mr">Mr</option>
		<option value="Mrs">Mrs</option>
		<option value="Miss">Miss</option>
		<option value="Ms">Ms</option>
	    

	</select><br>
	First name:<br>
	<input type="text" name="firstname">
	<br>
	Last name:<br>
	<input type="text" name="lastname"><br>
    Age:<br>
	<input type="number" name="age"><br>
	
	<input type="submit" value="submit">
</fieldset>
</form>


<?php 
	} else { 
		print $message;
	}
?>

		<?php 
		echo $args['after_widget'];
	}


} // class Foo_Widge

add_action( 'widgets_init', function(){
     register_widget( 'PHPAssignment' );
});

?>