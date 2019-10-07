<ul class="dk_admin_settings_menu">
    <li><a href="#products_layouts" class="active"><?php esc_html_e( 'Products', 'wc-builder-divi' ); ?></a></li>
    <li><a href="#archive_layouts"><?php esc_html_e( 'Shop & Archive', 'wc-builder-divi' ); ?></a></li>
</ul>

<form action="options.php" method="post" class="wcbd_settings_form" id="wcbd_settings_form">
    <?php
        $layouts            = WCBD_INIT::get_divi_library_layouts();
        $archive_layouts    = WCBD_INIT::get_archive_layouts();
        $saved_settings     = WCBD_INIT::plugin_settings();

        settings_fields( 'divi_woo_settings' );
        settings_errors();
    ?>
    <div class="admin_settings_group" id="products_layouts">
        <div class="admin_settings_header">
            <h2 class="title"><?php esc_html_e( 'Product Layout', 'wc-builder-divi' ); ?></h2>
        </div><!-- admin_settings_header -->

        <div class="admin_settings_content">
            <table class="form-table wcbd_admin_table">
                <tbody>

                    <tr>
                        <th scope="row">
                            <label for="default_product_layout"><?php esc_html_e( 'General Default Layout', 'wc-builder-divi' ); ?></label>
                        </th>
                        <td>
                            <select name="divi_woo_settings[default_product_layout]" id="default_product_layout">
                                <option value="0"><?php esc_html_e( '-- Default WooCommerce Layout --', 'wc-builder-divi' ); ?></option>
                                <?php
                                    if( count( $layouts ) ){
                                        foreach( $layouts as $layout ){
                                            $selected = $layout['id'] == $saved_settings['default_product_layout'] ? 'selected' : '';
                                            echo "<option value='{$layout['id']}' {$selected}>{$layout['name']}</option>";
                                        }
                                    }
                                ?>
                            </select>
                            <p class="description">
                                <?php esc_html_e( 'This layout can be overridden for individual products in product editing page', 'wc-builder-divi' ); ?>
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">    
                            <label for="products_under_cat_layout"><?php esc_html_e( 'Based On The Product Category', 'wc-builder-divi' ); ?></label>
                            <p class="description">
                                <?php esc_html_e( 'The Default layout for products under these categories.', 'wc-builder-divi' ); ?>
                            </p>
                        </th>
                        <td>
                            <?php 
                                wcbd_get_product_archives_and_divi_layouts('product_cat');
                            ?>
                            
                        </td>
                    </tr>

                    <tr>
                        <th colspan="2">
                            <hr>
                            <h2 class="title"><?php esc_html_e( 'Display', 'wc-builder-divi' ); ?></h2>
                        </th>
                    </tr>

                    <tr>
                        <th scope="row">
                            <label for="fullwidth_row_fix">
                                <?php esc_html_e( 'Make Fullwidth Rows 100% width', 'wc-builder-divi' ); ?>
                            </label>
                        </th>
                        <td>
                            <label>
                                <input type="checkbox" name="divi_woo_settings[fullwidth_row_fix]" id="fullwidth_row_fix" value="1" <?php checked( 1, $saved_settings['fullwidth_row_fix'], true ) ?> /><?php esc_html_e('Enable', 'wc-builder-divi'); ?>
                            </label>
                            <p class="description">
                                <?php esc_html_e( 'By default, when you make a row full-width in Divi Builder, it\'ll be 80% width only. This option affects product pages only.', 'wc-builder-divi' ); ?>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table><!-- /#products_layouts -->         
        </div><!-- admin_settings_content -->
    </div><!-- /.admin_settings_group -->


    <div class="admin_settings_group" id="archive_layouts">
        <div class="admin_settings_header">
            <h2 class="title"><?php esc_html_e( 'Shop & Archive Layouts', 'wc-builder-divi' ); ?></h2>
        </div><!-- admin_settings_header -->
        
        <div class="admin_settings_content">
            <table class="form-table wcbd_admin_table">
                <tbody>
                    <!-- Default Categories Layout Start -->
                    <tr>
                        <th scope="row">
                            <label for="default_categories_layout"><?php esc_html_e( 'Default Categories Layout', 'wc-builder-divi' ); ?></label>
                        </th>
                        <td>
                            <?php 
                                echo wcbd_select_saved_divi_and_archive_layouts('divi_woo_settings[default_categories_layout]', $saved_settings['default_categories_layout']); 
                            ?>
                            
                            <p class="description">
                                <?php esc_html_e( 'You can override this by building layouts for specific categories in the archive builder.', 'wc-builder-divi' ); ?>
                            </p>
                        </td>
                    </tr>
                    <!-- Default Categories Layout End -->
                    
                    <!-- Default Tags Layout Start -->
                    <tr>
                        <th scope="row">
                            <label for="default_tags_layout"><?php esc_html_e( 'Default Tags Layout', 'wc-builder-divi' ); ?></label>
                        </th>
                        <td>
                            <?php 
                                echo wcbd_select_saved_divi_and_archive_layouts('divi_woo_settings[default_tags_layout]', $saved_settings['default_tags_layout']); 
                            ?>
                            <p class="description">
                                <?php esc_html_e( 'You can override this by building layouts for specific tags in the archive builder.', 'wc-builder-divi' ); ?>
                            </p>
                        </td>
                    </tr>
                    <!-- Default Tags Layout End -->

                    <!-- Shop Layout Start -->
                    <tr>
                        <th scope="row">
                            <label for="shop_layout"><?php esc_html_e( 'Shop Page Layout', 'wc-builder-divi' ); ?></label>
                        </th>
                        <td>
                            <?php 
                                echo wcbd_select_saved_divi_and_archive_layouts('divi_woo_settings[shop_layout]', $saved_settings['shop_layout']); 
                            ?>
                        </td>
                    </tr>
                    <!-- Shop Layout End -->

                    <!-- Search Layout Start -->
                    <tr>
                        <th scope="row">
                            <label for="products_search_layout"><?php esc_html_e( 'Search Page Layout', 'wc-builder-divi' ); ?></label>
                        </th>
                        <td>
                            <?php 
                                echo wcbd_select_saved_divi_and_archive_layouts('divi_woo_settings[products_search_layout]', $saved_settings['products_search_layout']); 
                            ?>
                            <p class="description">
                                <?php esc_html_e( 'This layout works only on Products search page, not WordPress search page.', 'wc-builder-divi' ); ?>
                            </p>
                        </td>
                    </tr>
                    <!-- Search Layout End -->

                    <tr>
                        <th colspan="2">
                            <hr>
                            <h2 class="title"><?php esc_html_e( 'Display', 'wc-builder-divi' ); ?></h2>
                        </th>
                    </tr>

                    <tr>
                        <th scope="row">
                            <label for="fullwidth_row_fix_archive">
                                <?php esc_html_e( 'Make Fullwidth Rows 100% width', 'wc-builder-divi' ); ?>
                            </label>
                        </th>
                        <td>
                            <label>
                                <input type="checkbox" name="divi_woo_settings[fullwidth_row_fix_archive]" id="fullwidth_row_fix_archive" value="1" <?php checked( 1, $saved_settings['fullwidth_row_fix_archive'], true ) ?> /><?php esc_html_e('Enable', 'wc-builder-divi'); ?>
                            </label>
                            <p class="description">
                                <?php esc_html_e( 'By default, when you make a row full-width in Divi Builder, it\'ll be 80% width only. This option affects product archive pages only.', 'wc-builder-divi' ); ?>
                            </p>
                        </td>
                    </tr>  
                </tbody>
            </table><!-- /#archive_layouts -->
        </div><!-- admin_settings_content -->
    </div><!-- /.admin_settings_group -->
    <?php submit_button(); ?>
</form>