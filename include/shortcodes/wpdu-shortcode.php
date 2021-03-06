<?php
/**
 * @version 1.0.2
 * @package WP Display Users
 */

global $wpdb;
$query = 'SELECT * FROM '.TBL_DU.' WHERE wpdu_id='.$atts['id'];
$fields = array_map('strtolower', array_map('trim', explode(',', $atts['fields'])));
$user_list_record = $wpdb->get_row( $query );

if (!isset($atts['fields'])):
  $user_container_start = '<div class="wpdu-user-container">';
  $container_end = '</div>';
  $user_main_container_start = '<div class="wpdu-user-main">';
else:
  $user_main_container_start = $container_end = $user_container_start = '';
endif;

if( empty($user_list_record) ) return;

$options = get_option( '_wpdu_settings' );
$options = unserialize($options);

$wpdu_content_word_limit = ( $options['wpdu_content_word_limit'] != "" ) ? sanitize_text_field( $options['wpdu_content_word_limit'] ) : '25';

$unserialize_user_roles = unserialize(stripslashes($user_list_record->wpdu_user_roles));

if( !empty($unserialize_user_roles) ) {

	if( is_array($unserialize_user_roles) ) {

		echo $user_container_start;

		foreach ($unserialize_user_roles as $unserialize_user_role) {

			$user_args['role'] = $unserialize_user_role;
			$user_args['orderby'] = $user_list_record->wpdu_order_by;
			$user_args['order']   = $user_list_record->wpdu_order;

			if( $user_list_record->wpdu_user_incexe == 'include' ) {

				if( !empty($user_list_record->wpdu_author_id) )
				$user_args['include'] = $user_list_record->wpdu_author_id;
				else
				$user_args['include'] = '';
			}

			if( $user_list_record->wpdu_user_incexe == 'exclude' ) {

				if( !empty($user_list_record->wpdu_author_id) )
				$user_args['exclude'] = $user_list_record->wpdu_author_id;
				else
				$user_args['exclude'] = '';
			}

			if( !empty($user_list_record->wpdu_user_limit) ) {

				$number = $user_list_record->wpdu_user_limit;
			}
			else
			{
				$number = 10;
			}

			if ( get_query_var('paged') ) {

				$paged = get_query_var('paged');
			}
			else if( get_query_var('page') ) {

				$paged = get_query_var('page');
			}
			else
			{
				$paged = 1;
			}

			$offset = ($paged - 1) * $number;

			$user_args['number'] = $number;
			$user_args['offset'] = $offset;

			$user_query = new WP_User_Query( $user_args );

			if ( ! empty( $user_query->results ) ) {

				foreach ( $user_query->results as $user ) {

					$match_src = "/src=[\"' ]?([^\"' >]+)[\"' ]?[^>]*>/i" ;
					$avatar = get_avatar($user->ID); // for example
					preg_match($match_src, $avatar, $matches);
					$avatar_src = $matches[1];

					echo $user_main_container_start;

					if (isset($atts['fields'])):
            foreach ($fields as $field) {
              ${$field} = get_the_author_meta($field, $user->ID);
              switch ($field) {
                case 'image': $this->wpdu_display_user_image($avatar_src);
                break;
                case 'name':
                case 'display_name':
                  $this->wpdu_display_user_name($user_list_record, get_the_author_meta('display_name', $user->ID));
                break;
                case 'description':
                  $this->wpdu_display_user_description($user_list_record, $description, $wpdu_content_word_limit);
                break;
                default: $this->wpdu_display_user_defined_field(${$field}, $field);
              }
            }
          else:
            $display_name = get_the_author_meta('display_name', $user->ID);
            $description = get_the_author_meta('description', $user->ID);
            $website = get_the_author_meta('url', $user->ID);
            $email = get_the_author_meta('email', $user->ID);
            $this->wpdu_display_user_image($avatar_src);
            $this->wpdu_display_user_name($user_list_record, $display_name);
            $this->wpdu_display_user_description($user_list_record, $description, $wpdu_content_word_limit);
            $this->wpdu_display_user_contact($user_list_record, $website, $email);
          endif;

          echo $container_end;
				}
			}

			$total_user = $user_query->total_users;
            $total_pages = ceil($total_user / $number);

			echo '<div class="wpdu-pagination">';
			$current_page = max(1, get_query_var('paged'));
			echo paginate_links(array(
					'base' => get_pagenum_link(1) . '%_%',
					'format' => 'page/%#%/',
					'current' => $current_page,
					'total' => $total_pages,
					'prev_next'    => true,
					'type'         => 'list'
				));
			echo '</div>';

		}
		echo $container_end;
	}
}
