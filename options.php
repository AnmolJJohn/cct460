<?php

//Applying, or registering settings

function theme_settings_init(){
	register_setting('theme_settings', 'theme_settings');
}

//The following code adds actions

add_action('admin_init', 'theme_settings_init');
add_action('admin_menu', 'add_settings_page');

//The following code defines the variables

$color_change = array('default', 'yellow', 'pink',);

//The following code starts or begins the settings page

if ( ! isset( $_REQUEST['updated'] ) )
$_REQUEST['updated'] = false;

//The following code gets variables outside scope or control

global $color_scheme;
?>

<div>

<div id="icon-options-general"></div>
<h2><?php _e( 'Theme Settings' ) 

<?php

//the following code displays already existing options message

if ( false !== $_REQUEST['updated'] ) : ?>
<div><p><strong><?php _e( 'Options saved' ); ?></strong></p></div>
<?php endif; ?>

<form method="post" action"options.php">

<?php settings_fields( 'theme_settings' ); ?>
<?phph $options = get_option ( 'theme_settings' ); ?>

<table>

<!-- First Option: Allowing users to choose a different color scheme: default, yellow, or pink -->
/* <tr valign="top"
<th scope="row"><?php _e( 'Color Scheme' ); ?></th>
<td><select name="theme_settings [color_change]">
<?php foreach ($color_change as $option) { ?>
<option <?php if ($options['color_change'] == $option ){ echo
'selected="selected"'; } ?>><?php echo  htmentities($option); ?></options>
<?php } ?>
</select>
<label for="theme_settings[color_scheme]"><?php _e( 'Choose Your Colour Scheme' ); ?
></label></td>
</tr> */

<!-- Second Option: Allowing users to disable th footer -->
<tr valign="top">
<th scope="row"><?php _e( 'Disable Widgetized Footer' ); ?></th>
<td><input id="theme_settings[extended_footer]" name="theme_settings[extended_footer]" type="checkbox" value="1" <?php checked( '1', $options['extended_footer'] ); ?> />
<label for="theme_settings[disable_related_posts]"><?php _e( 'Check this box if you would like to disable the widgetized footer section' ); ?></label></td>
</tr>



//sanitize and validate
function options_validate( $input ) {
    global $select_options, $radio_options;
    if ( ! isset( $input['option1'] ) )
        $input['option1'] = null;
    $input['option1'] = ( $input['option1'] == 1 ? 1 : 0 );
    $input['sometext'] = wp_filter_nohtml_kses( $input['sometext'] );
    if ( ! isset( $input['radioinput'] ) )
        $input['radioinput'] = null;
    if ( ! array_key_exists( $input['radioinput'], $radio_options ) )
        $input['radioinput'] = null;
    $input['sometextarea'] = wp_filter_post_kses( $input['sometextarea'] );
    return $input;
}
?>
