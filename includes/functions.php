<?php

/**
 * Here is a Sample Function with Action Hook
 * If you want to add anyone, Please copy and paste and change function name
 * And Use
 */
if( !function_exists( 'wpt_code_snippet_addons_sample_function' ) ){
   function wpt_code_snippet_addons_sample_function() {
 
   }
}
add_filter( 'filter_hook_name', 'wpt_code_snippet_addons_sample_function' );

/**
 * Start Writing your script for action or Filter.
 * Normally write Filter here, for action, an another file name action-hook.php file is available to this same directory
 * 
 */
function wpt_code_snippet_table_wrapper_top_callback( $table_ID ){

   $templates_default = array(
     'none'          =>  __( 'Select None', 'wpt_pro' ),
     'default'       =>  __( 'Default Style', 'wpt_pro' ),
     'beautiful_blacky' =>  __( 'Beautiful Blacky', 'wpt_pro' ),
 );
 $pro_templates = array(
     'smart'         =>  __( 'Smart Thin', 'wpt_pro' ),
     'green'         =>  __( 'Green Style', 'wpt_pro' ),
     'blue'          =>  __( 'Blue Style', 'wpt_pro' ),
     'dark'          =>  __( 'Dark Style', 'wpt_pro' ),
     'smart_light'   =>  __( 'Smart Light', 'wpt_pro' ),
     'classic'           =>  __( 'Classic', 'wpt_pro' ),    
    'blue_border'       =>  __( 'Blue Border', 'wpt_pro' ),
    'smart_border'      =>  __( 'Smart Border', 'wpt_pro' ), 
    'pink'              =>  __( 'Pink Style', 'wpt_pro' ),  
    'modern'            =>  __( 'Modern Style', 'wpt_pro' ),  
    'orange'            =>  __( 'Orange Style', 'wpt_pro' ),   
 );
 $additional_templates = array();
 $additional_templates = apply_filters( 'wpto_table_template_arr', $additional_templates );

 $table_templates = array();
 foreach( $templates_default as $temp_key => $tempplate_name ){
     $table_templates[$temp_key] = array(
         'type' => 'free',
         'value' => $tempplate_name
     );
 }
 foreach( $pro_templates as $temp_key => $tempplate_name ){
     $table_templates[$temp_key] = array(
         'type' => 'limited',
         'value' => $tempplate_name
     );
 }
 if( is_array( $additional_templates ) ){
     foreach( $additional_templates as $temp_key => $tempplate_name ){
         $table_templates[$temp_key] = array(
             'type' => 'approved',
             'value' => $tempplate_name
         );
     }
 }

 $meta_table_style_inPost = get_post_meta($table_ID, 'table_style', true);
 
 
 $current_template = $meta_table_style_inPost['template'] ?? '';
 $current_template = $_GET['table_template'] ?? $current_template;
  ?>
  <form method="get">
   <label class="wpt_label" for="wpt_style_file_selection"><?php esc_html_e( 'Select Template', 'wpt_pro' ); ?></label>
   <select name="table_template" data-name="template" class="wpt-table-template-changer-live">
     <?php
       foreach ( $table_templates as $key => $template ) {
         $type = $template['type'];
         $value = $template['value'];
         $read_only = '';
         
         if($type !== 'free'){
            $value .= " (Premium)";
         }

         
         $selected = $current_template == $key ? 'selected' : '';
     ?>
     <option
     value="<?php echo esc_attr( $key ); ?>"
     <?php echo esc_attr( $selected ); ?>
     <?php echo esc_attr( $read_only ); ?>
     >
         <?php echo esc_html( $value ); ?>
     </option>
     <?php 
     }
     ?>
   </select>
   <input name="table_id" type="hidden" value="<?php echo esc_attr( $table_ID ); ?>">
  </form>
  <?php

$meta = get_post_meta( $table_ID, 'table_style', true );
// var_dump($meta);
}
add_action('wpto_action_table_wrapper_top', 'wpt_code_snippet_table_wrapper_top_callback');


// add_filter('wpto_table_template',function($template, $tbl_id){
//    if(isset($_GET['table_template']) && $_GET['table_template'] != 'default' && isset($_GET['table_id'])){
//       $template = $_GET['table_template'] ?? '';
//    }
//    return $template;
// },10, 2);

add_filter('get_post_metadata', 'wpt_change_meta_value',11, 5 );
function wpt_change_meta_value($value, $object_id, $meta_key, $single, $meta_type){
    $templ_change = isset($_GET['table_template']) && $_GET['table_template'] != 'default' ? true : false;
    if( $meta_key !== 'table_style' ) return $value;
    if( ! $templ_change ) return $value;
    $template_name = $_GET['table_template'] ?? 'default';
    // var_dump($value, $object_id, $meta_key, $single, $meta_type);
    // $meta = get_post_meta( $object_id, 'table_style', true );
    // if(isset($_GET['table_template']) && $_GET['table_template'] != 'default' && isset($_GET['table_id'])){
    //     $template = $_GET['table_template'] ?? '';
    //  }
    $my_value = array(
        0 => array('template'=>$template_name),
    );
    return $my_value;
}
