<!-- This file is used to markup the administration form of the widget. -->
<!-- Note that the use of the 'Title' field is purely for example purposes only. -->
<p>
	<label for="<?php echo $this->get_field_id( 'spikey' ); ?>"><?php _e( 'Apikey:', 'widget-apikey-locale' ) ?></label>
	<br/>
	<input type="text" class="widefat" value="<?php echo esc_attr( $instance['apikey'] ); ?>" id="<?php echo $this->get_field_id( 'apikey' ); ?>" name="<?php echo $this->get_field_name( 'apikey' ); ?>" />
</p>
