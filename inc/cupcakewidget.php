<?php 
class CDYearlyArchivesWidget extendsWP_Widget 

public function__construct() 
{
$widget_ops=array('classname'=>'widget_archive', 
'description'=>__( 'A yearly archive of your site&#8217;s Posts.') 
);
parent::__construct('yearly_archives', __('Yearly Archives', 'artistarycupcakes'), $widget_ops);
}
public function widget( $args, $instance ) {
$c=!empty( $instance['count'] ) ? '1' : '0'; 
$d=!empty( $instance['dropdown'] ) ? '1' : '0';
$title=apply_filters('widget_title', empty($instance['title']) ? __('Yearly Archives', 'codediva') : 
$instance['title'], $instance, $this->id_base);
 echo$args['before_widget']; if ( $title ) {
 echo$args['before_title'] .$title.$args['after_title'];
 }
 
 if ( $d ) {
 $dropdown_id="{$this->id_base}-dropdown-{$this->number}";
 ?>
 <label class="screen-reader-text"for="<?phpechoesc_attr( $dropdown_id ); ?>"><?phpecho$title; ?></label>
 <select id="<?phpechoesc_attr( $dropdown_id ); ?>"name="archive-dropdown"onchange='document.location.href=this.options[this.selectedIndex].value;'>
 <?php
 $dropdown_args=apply_filters( 'widget_archives_dropdown_args', 
 array('type'=>'yearly','format'=>'option','show_post_count'=>$c) ); 
 ?>
 <option value="<?phpecho__( 'Select Year', 'codediva' ); ?>"><?phpecho__( 'Select Year', 'codediva' ); ?></option>
 <?php 
 wp_get_archives( $dropdown_args ); ?>
 </select>
 <?php } else { ?>
 
 <ul>
     <?php 
	      wp_get_archives( apply_filters( 'widget_archives_args', array(
		  'type'=>'yearly',
		  'show_post_count'=>$c
		  ) ) ); 
	 ?>
 </ul>
		  <?php
		  }
		  echo$args['after_widget']; 
		  }
public function form( $instance ) {
$instance=wp_parse_args( (array) $instance, array(
 'title'=>'', 'count'=>0, 'dropdown'=>'') );
 $title=strip_tags($instance['title']);
 $count=$instance['count'] ? 'checked="checked"' : '';
 $dropdown=$instance['dropdown'] ? 'checked="checked"' : '';
 ?>	
 
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
		<p>
			<input class="checkbox" type="checkbox" <?php echo $dropdown; ?> id="<?php echo $this->get_field_id('dropdown'); ?>" name="<?php echo $this->get_field_name('dropdown'); ?>" /> <label for="<?php echo $this->get_field_id('dropdown'); ?>"><?php _e('Display as dropdown'); ?></label>
			<br/>
			<input class="checkbox" type="checkbox" <?php echo $count; ?> id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" /> <label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('Show post counts'); ?></label>
		</p>
<?php }	
public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$new_instance = wp_parse_args( (array) $new_instance, array( 'title' => '', 'count' => 0, 'dropdown' => '') );
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['count'] = $new_instance['count'] ? 1 : 0;
		$instance['dropdown'] = $new_instance['dropdown'] ? 1 : 0;

		return $instance;
	}


add_action( 'widgets_init', function(){
     register_widget( 'CDYearlyArchivesWidget' );
});	
?>