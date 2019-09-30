<?php


class metaclass {

	public function __construct() {

		add_action( 'add_meta_boxes', array( $this, 'cbx_add_custom_box' ) );
		add_action( 'save_post', array( $this, 'cbx_save_data' ) );

	}//end constructor

	/*adding meta box*/
	public function cbx_add_custom_box() {

		$screens = [ 'post', 'page' ];

		foreach ( $screens as $screen ) {

			add_meta_box(
				'cbx_box_id',
				'CBX custom meta box',
				array( $this, 'cbx_custom_meta_box_cb' ),
				$screen
			);
		}

	}//end meta box

	/*save data*/
	public function cbx_save_data( $post_id ) {

		/*save text field */
		if ( array_key_exists( 'cbx_text', $_POST ) ) {

			update_post_meta(
				$post_id,
				'_cbx_meta_text',
				$_POST['cbx_text']
			);

		}//end text save text field

		/*save email field*/
		if ( array_key_exists( 'cbx_email', $_POST ) ) {

			update_post_meta(
				$post_id,
				'_cbx_email_meta',
				$_POST['cbx_email']
			);

		}//end save email

		/*save password field*/
		if ( array_key_exists( 'cbx_pass', $_POST ) ) {

			update_post_meta(
				$post_id,
				'_cbx_pass_meta',
				$_POST['cbx_pass']
			);

		}//end save password

		/*save textarea data*/
		if ( array_key_exists( 'cbx_text_area', $_POST ) ) {

			update_post_meta(
				$post_id,
				'_cbx_textarea',
				$_POST['cbx_text_area']
			);

		}//end save text area data

		/*save number*/
		if ( array_key_exists( 'cbx_number', $_POST ) ) {

			update_post_meta(
				$post_id,
				'_cbx_number_meta',
				$_POST['cbx_number']
			);

		}//end save number

		/*save select field*/
		if ( array_key_exists( 'cbx_select', $_POST ) ) {

			update_post_meta(
				$post_id,
				'_cbx_meta_select',
				$_POST['cbx_select']
			);

		}//end save select field

		/*save url*/
		if ( array_key_exists( 'cbx_url', $_POST ) ) {

			update_post_meta(
				$post_id,
				'_cbx_url_meta',
				$_POST['cbx_url']
			);

		}//end save url

		/*save multi select*/
		if ( array_key_exists( 'cbx_multi_select', $_POST ) ) {

			update_post_meta(
				$post_id,
				'_cbx_multi_select',
				$_POST['cbx_multi_select']
			);

		}//end save multi select

		/*save radio check*/
		if ( array_key_exists( 'cbx_radio', $_POST ) ) {

			update_post_meta(
				$post_id,
				'_cbx_radio_check',
				$_POST['cbx_radio']
			);

		}//end save radio

		/*save check box data*/
		if ( array_key_exists( 'cbx_checkbox', $_POST ) ) {

			update_post_meta(
				$post_id,
				'_cbx_check_box',
				$_POST['cbx_checkbox']
			);

		}//end save checkbox data

		/*save multi radio data*/
		if ( array_key_exists( 'cbx_multi_check', $_POST ) ) {

			update_post_meta(
				$post_id,
				'_cbx_multi_check',
				$_POST['cbx_multi_check']
			);

		}//end save multi radio data

	}//end save data

	/*post input and retrive meta*/
	public function cbx_custom_meta_box_cb( $post ) {

		/*retrive data from wp_postmeta table*/
		$retrive_text_value   = get_post_meta( $post->ID, '_cbx_meta_text', true );
		$retrive_email_value  = get_post_meta( $post->ID, '_cbx_email_meta', true );
		$retrive_pass_value   = get_post_meta( $post->ID, '_cbx_pass_meta', true );
		$retribe_textarea     = get_post_meta( $post->ID, '_cbx_textarea', true );
		$retrive_number_value = get_post_meta( $post->ID, '_cbx_number_meta', true );
		$retrive_select_value = get_post_meta( $post->ID, '_cbx_meta_select', true );
		$retrive_url_value    = get_post_meta( $post->ID, '_cbx_url_meta', true );
		$retrive_multi_select = get_post_meta( $post->ID, '_cbx_multi_select', true );
		//write_log($retrive_multi_select); /*for testing purpose*/
		$retrive_radio_check = get_post_meta( $post->ID, '_cbx_radio_check', true );
		$retribe_check_box   = get_post_meta( $post->ID, '_cbx_check_box', true );
		$retribe_multi_check = get_post_meta( $post->ID, '_cbx_multi_check', true );
		/*end retrive data from wp_postmeta table*/


		?>

        <!--text field render-->
        <p><label for="cbx_text">Text Field</label>
            <input type="text" name="cbx_text" id="cbx_text"
                   value="<?php echo $retrive_text_value; ?>"></p>
        <hr> <!--end text field-->

        <!--email field render-->
        <p>
            <label for="cbx_email">Email Field</label>
            <input type="email" name="cbx_email" id="cbx_email" value="<?php echo $retrive_email_value; ?>">
        </p>
        <hr><!--end email field-->

        <!--password field render-->
        <p>
            <label for="cbx_pass">Password Field</label>
            <input type="password" name="cbx_pass" id="cbx_pass" value="<?php echo $retrive_pass_value; ?>">
        </p>
        <hr><!--password render-->

        <!--Text area field render-->
        <p>
            <label for="cbx_text_area">Text Area:</label>
            <textarea name="cbx_text_area" id="cbx_text_area" rows="5" value=""
                      cols="50"><?php echo $retribe_textarea; ?></textarea>
        </p>
        <hr><!--end text area field render-->

        <!--number render-->
        <p>
            <label for="cbx_number">Number Field</label>
            <input type="number" name="cbx_number" id="cbx_number" min="1" max="5"
                   value="<?php echo $retrive_number_value; ?>">
        </p>
        <hr><!--end number render-->

        <!--single select render-->
        <p>
            <label for="cbx_select">Select Field</label>

            <select name="cbx_select" id="cbx_select">
                <option value="">Select Something</option>
                <option value="Dhaka"
					<?php selected( $retrive_select_value, 'Dhaka' ) ?>
                >Dhaka
                </option>
                <option value="Khulna"
					<?php selected( $retrive_select_value, 'Khulna' ) ?>
                >Khulna
                </option>
            </select>
        </p>
        <hr><!--end single select field-->

        <!--url field render-->
        <p>
            <label for="cbx_url">Url Field</label>
            <input type="url" name="cbx_url" id="cbx_url" value="<?php echo $retrive_url_value; ?>">
        </p>
        <hr><!--end url render-->

        <!--Multi Select render-->
        <p>

			<?php
			/*multiple select option*/
			$countries = array(
				esc_html__( 'Dhaka', 'settingsoption' ),
				esc_html__( 'China', 'settingsoption' ),
				esc_html__( 'Korea', 'settingsoption' ),
				esc_html__( 'France', 'settingsoption' ),
				esc_html__( 'Bangladesh', 'settingsoption' )
			)//end multiple select option
			?>

            <label for="cbx_multi_select">Multi Select Field</label>

            <select name="cbx_multi_select[]" id="cbx_multi-select[]" multiple>
                <option value="0">Select Something</option>

				<?php
				/*loop for explode select value*/
				foreach ( $countries as $country ) {

					$selected = '';

					/*check is array for match value*/
					if ( is_array( $retrive_multi_select )
					     //check in array for get value
					     && in_array( $country, $retrive_multi_select ) ) {
						//is condition true retribed data will be selected
						$selected = 'selected';
					}//end condition check
					?>
                    <!--echo value-->
                    <option value="<?php echo $country; ?>"<?php echo $selected; ?>><?php echo $country; ?>
                    </option>
					<?php
					//write_log($retrive_multi_select);
				}//end loop
				?>
            </select>
        </p>
        <hr> <!--End multi select render-->

        <!--radio check render-->
        <p>
            <lablel for="cbx_radio">Radio Check :</lablel>

			<?php
			//radio options in array
			$conditions = array(
				esc_html__( 'Male', 'settingsoption' ),
				esc_html__( 'Female', 'settingsoption' )
			);

			//explode radio option from array
			foreach ( $conditions as $condition ) {

				$checked = '';

				//condition check for output as checked
				if ( $condition == $retrive_radio_check ) {

					//for checked item
					$checked = 'checked';
				}

				?>

                <!--for finding output from exploded array-->
                <label for="cbx_radio"><?php echo $condition; ?></label>
                <!-- html element for save and retribe data-->
                <input type="radio" name="cbx_radio" id="cbx_radio"
                       value="<?php echo $condition; ?>"<?php echo $checked; ?>>

				<?php

			}
			?>

        </p>
        <hr><!--end radio check-->

        <!--check box render-->
        <p>
            <label for="cbx_checkbox">Check Box:</label>

			<?php

			//checkbox options in array
			$checkboxs = array(
				esc_html__( 'Active', 'settingsoption' ),
				esc_html__( 'Block', 'settingsoption' )
			);

			//explode checkbox option from array
			foreach ( $checkboxs as $checkbox ) {

				//for checked item
				$checked = '';

				//condition check for output as checked
				if ( $checkbox == $retribe_check_box ) {
					$checked = 'checked';
				}
				?>

                <!--for finding output from exploded array-->
                <label for="cbx_checkbox"><?php echo $checkbox; ?></label>
                <!-- html element for save and retribe data-->
                <input type="checkbox" name="cbx_checkbox" id="cbx_checkbox"
                       value="<?php echo $checkbox; ?>"<?php echo $checked; ?>>

				<?php
			}

			?>

        </p>
        <hr><!--end check box render-->

        <!--multi select checkbox render-->
        <p>
            <label for="cbx_multi_check">Multi Select Radio: </label>

			<?php

			//checkbox options in array
			$multi_checks = array(
				esc_html__( 'Dhaka', 'settingsoption' ),
				esc_html__( 'Comilla', 'settingsoption' ),
				esc_html__( 'Ctg', 'settingsoption' ),
				esc_html__( 'Khulna', 'settingsoption' ),
				esc_html__( 'Rangpur', 'settingsoption' ),
				esc_html__( 'Sylet', 'settingsoption' )
			);

			//explode checkbox option from array
			foreach ( $multi_checks as $multi_check ) {

				//for checked item
				$checked = '';

				//condition check for output array as checked
				if ( is_array( $retribe_multi_check )

				     && in_array( $multi_check, $retribe_multi_check ) ) {
					$checked = 'checked';
				}

				?>
                <!--for finding output from exploded array-->
                <label for="cbx_multi_check"><?php echo $multi_check; ?></label>
                <!-- html element for save and retribe data-->
                <input type="checkbox" name="cbx_multi_check[]" id="cbx_multi_check[]"
                       value="<?php echo $multi_check; ?>"<?php echo $checked; ?>>
				<?php
			}

			?>
        </p>
        <hr><!--end multi select checkbox render-->

		<?php
	}//end post meta and retrive meta value

}//end of the class