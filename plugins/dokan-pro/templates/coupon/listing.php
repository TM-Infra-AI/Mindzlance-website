<?php
/**
 *  Dashboard Coupon listing template
 *
 *  @since 2.4
 *
 *  @package dokan
 */
// _e('Product IDs', 'dokan');

?>

<table class="dokan-table">
    <thead>
        <tr>
            <th><?php _e('Code', 'dokan'); ?></th>
            <th><?php _e('Coupon type', 'dokan'); ?></th>
            <th><?php _e('Coupon amount', 'dokan'); ?></th>
            <th><?php _e('Product', 'dokan'); ?></th>
            <th><?php _e('Usage / Limit', 'dokan'); ?></th>
            <th><?php _e('Expiry date', 'dokan'); ?></th>
        </tr>
    </thead>

    <?php
        foreach( $coupons as $key => $post ) {
            ?>
            <tr>
                <td class="coupon-code" data-title="<?php _e('Code', 'dokan'); ?>">
                    <?php $edit_url =  wp_nonce_url( add_query_arg( array('post' => $post->ID, 'action' => 'edit', 'view' => 'add_coupons'), dokan_get_navigation_url( 'coupons' ) ), '_coupon_nonce', 'coupon_nonce_url' ); ?>
                    <div class="code">
                        <?php if ( current_user_can( 'dokan_edit_coupon' ) ): ?>
                            <a href="<?php echo $edit_url; ?>"><span><?php echo esc_attr( $post->post_title ); ?></span></a>
                        <?php else: ?>
                            <a href=""><span><?php echo esc_attr( $post->post_title ); ?></span></a>
                        <?php endif ?>
                    </div>

                    <div class="row-actions">
                        <?php $del_url = wp_nonce_url( add_query_arg( array('post' => $post->ID, 'action' => 'delete'), dokan_get_navigation_url( 'coupons' ) ) ,'_coupon_del_nonce', 'coupon_del_nonce'); ?>

                        <?php if ( current_user_can( 'dokan_edit_coupon' ) ): ?>
                            <span class="edit"><a href="<?php echo $edit_url; ?>"><?php _e( 'Edit', 'dokan' ); ?></a> | </span>
                        <?php endif; ?>

                        <?php if ( current_user_can( 'dokan_delete_coupon' ) ): ?>
                            <span class="delete"><a  href="<?php echo $del_url; ?>"  onclick="return confirm('<?php esc_attr_e( 'Are you sure want to delete', 'dokan' ); ?>');"><?php _e('delete', 'dokan'); ?></a></span>
                        <?php endif ?>
                    </div>
                </td>

                <td data-title="<?php _e('Coupon type', 'dokan'); ?>">
                    <?php
                    $discount_type = get_post_meta( $post->ID, 'discount_type', true );
                    $type = '';

                    if ( $discount_type == 'fixed_product' ) {
                        $type = __( 'Fixed Amount', 'dokan' );
                    } elseif ( $discount_type == 'percent_product' ) {
                        $type = __( 'Percent', 'dokan' );
                    }

                    echo $type;
                    ?>
                </td>

                <td data-title="<?php _e('Coupon amount', 'dokan'); ?>">
                    <?php echo esc_attr( get_post_meta( $post->ID, 'coupon_amount', true ) ); ?>
                </td>

                <!--td data-title="<?php  ?>"-->
                    <td data-title="<?php _e('Product', 'dokan'); ?>">
                    <?php
                        $product_ids = get_post_meta( $post->ID, 'product_ids', true );

//                         $product = wc_get_product( id );

// echo $product->get_title();
                        $product_ids = $product_ids ? array_map( 'absint', explode( ',', $product_ids ) ) : array();
                        // hello($product_ids);
                        $product_names = [];
                        $product = [];
                        foreach ($product_ids as $key2 => $value) {
                            // hello($value);
                          // $product = wc_get_product( $value,'post_title' );
                            $product1 = wc_get_product( $value ,'post_title');

                            $product[] = $product1->id;
                            // print_r($product->id);
                        }
                        foreach ($product as $keyys => $val) {
                            $prod = wc_get_product( $val ,'post_title');
                            // $id = $val->get_id();
                            // print_r(get_the_title( $val ));
                            // $product_names[] = $prod->get_title();
                            $k = get_the_title( $val );
                            if($k != 'Dashboard/content')
                            $product_names[] = $k;
                        }
//                         $product = wc_get_product( $product_ids[0],'post_title' );

// echo $product->get_title();

                        // print_r(  $product);
// die();

                        if ( sizeof( $product_names ) > 0 ) {
                            if ( count( $product_names ) > 12 ) {
                                $product_names = array_slice( $product_names, 0, 12 );
                                echo sprintf( '%s... <a href="%s">%s</a>', esc_html( implode( ', ', $product_names ) ), esc_url( $edit_url ), __( 'See all', 'dokan' ) );
                            } else {
                                echo esc_html( implode( ', ', $product_names ) );
                            }
                        } else {
                            echo '&ndash;';
                        }
                    ?>
                </td>

                <td data-title="<?php _e('Usage / Limit', 'dokan'); ?>">
                    <?php

                        $usage_count = absint( get_post_meta( $post->ID, 'usage_count', true ) );
                        $usage_limit = esc_html( get_post_meta($post->ID, 'usage_limit', true) );

                        if ( $usage_limit )
                            printf( __( '%s / %s', 'dokan' ), $usage_count, $usage_limit );
                        else
                            printf( __( '%s / &infin;', 'dokan' ), $usage_count );
                     ?>
                </td>

                <td data-title="<?php _e('Expiry date', 'dokan'); ?>">
                    <?php
                        $expiry_date = get_post_meta( $post->ID, 'date_expires', true );

                        if ( $expiry_date && ( (string) (int) $expiry_date === $expiry_date )
                            && ( $expiry_date <= PHP_INT_MAX )
                            && ( $expiry_date >= ~PHP_INT_MAX ) ) {

                            echo esc_html( date_i18n( 'F j, Y', $expiry_date ) );
                        } else {
                            echo $expiry_date ? esc_html( date_i18n( 'F j, Y', strtotime( $expiry_date ) ) ) : '&ndash;';
                        }
                    ?>
                </td>
                <td class="diviader"></td>
            </tr>
            <?php
        }
    ?>
</table>
