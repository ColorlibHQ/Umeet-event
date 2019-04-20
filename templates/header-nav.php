
<header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container box_1620">
            <?php
            // Header Logo
                echo umeetevent_theme_logo( 'navbar-brand logo_h' );
            ?>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                <?php
                //
                if( has_nav_menu( 'primary-menu' ) ) {
                    $args = array(
                        'theme_location' => 'primary-menu',
                        'container'      => '',
                        'depth'          => 2,
                        'menu_class'     => 'nav navbar-nav menu_nav justify-content-end',
                        'fallback_cb'    => 'umeetevent_bootstrap_navwalker::fallback',
                        'walker'         => new umeetevent_bootstrap_navwalker(),
                    );  
                    wp_nav_menu( $args );
                }
                ?>
                <?php
                // Call To Action Button
                $cta = umeetevent_opt( 'umeetevent_cta_toggle_settings' );
                if( $cta ){ ?>
                    <ul class="nav-right text-center text-lg-right py-4 py-lg-0">
                        <li><a href="<?php echo esc_url( umeetevent_opt( 'umeetevent_cta_url' ) ); ?>"><?php echo esc_html( umeetevent_opt( 'umeetevent_cta_label' ) ); ?></a></li>
                    </ul>
                    <?php
                }
                ?>
            </div> 
        </div>
      </nav>
    </div>
</header>

<!-- #header -->
