<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$store_user    = get_userdata( get_query_var( 'author' ) );
$store_tabs    = dokan_get_store_tabs( $store_user->ID );
?>

<?php if ( $store_tabs ) { ?>
    <div class="dokan-store-tabs<?php echo $no_banner_class_tabs; ?>">
        <ul class="dokan-list-inline">
            <?php foreach( $store_tabs as $key => $tab ) { ?>
                <li><a href="<?php echo esc_url( $tab['url'] ); ?>"><?php echo $tab['title']; ?></a></li>
            <?php } ?>
            <?php do_action( 'dokan_after_store_tabs', $store_user->ID ); ?>
        </ul>
    </div>
<?php } ?>
