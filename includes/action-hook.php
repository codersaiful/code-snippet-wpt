<?php
/**
 * If you want to any new plugin as parent, which plugins action
 * u want to add here, add as array value
 * like previous
 */
$plugins_for_actions = array(
    'woo-product-table/woo-product-table.php',
    'UltraTable/ultratable.php',
);
foreach( $plugins_for_actions as $plugin_loc ){
    $UTA_Module =  WP_PLUGIN_DIR . '/' . $plugin_loc;
    if( is_plugin_active( $plugin_loc ) && file_exists( $UTA_Module ) ){
       //include_once $UTA_Module;
        //WPT_Product_Table::getInstance();
    }
}

//add_action( 'your_action_hook_name', 'test_saiful' );
add_action( 'wpto_table_wrapper_bottom', 'wpt_code_snippet_export_textarea_on_bottom_table' );
function wpt_code_snippet_export_textarea_on_bottom_table( $table_id ){
        $post_id = $table_id;
    if( ! $post_id || ! is_numeric( $post_id ) ) return false;
        
        $meta = get_post_meta($post_id);
        unset($meta['_edit_lock']);
        unset($meta['_edit_last']);

        $meta = array_map('array_filter', $meta);
        $meta = array_filter($meta);

        $serialize_meta = serialize($meta);
        $base64_meta = base64_encode($serialize_meta);
        
        ?>
        <div class="wpt-export-wrapper">
            <div class="wpt-export-area"> 
                <label for="wpt-export-textarea-<?php echo esc_attr( $post_id ); ?>">
                    <h2>Export Box - <i><?php echo esc_html( get_the_title( $post_id ) ); ?></i></h2>
                    <p>
                        Copy the Export Code and paste to import box in Dashboard.<br>
                        <span>Import this <i><?php echo esc_html( get_the_title( $post_id ) ); ?></i> table by one click. </span>
                        <br>
                        <b>Just a step: Copy Paste</b>
                    </p>
                </label>
                
                <textarea 
                    id="wpt-export-textarea-<?php echo esc_attr( $post_id ); ?>" 
                    class="wpt-export-textarea ua-input" 
                    onclick="this.focus();this.select()" 
                    rows="14"
                    readonly="readonly"
                    ><?php echo esc_html( $base64_meta ); ?></textarea>
                
            </div>
            
        </div>
    
        <?php
}