<?php
/**
 * Created by PhpStorm.
 * User: Fredrik
 * Date: 31.05.2015
 * Time: 15:37
 */

get_header();

?>

    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-xs-12">
                <div class="panel panel-default panel-main">
                    <div class="panel-body">

                        <?php if (have_posts()) : ?>
                            <?php while (have_posts()) : the_post(); ?>

                                <article>
                                    <h2><?php the_title(); ?></h2>
                                    <?php the_content(); ?>
                                </article>

                            <?php endwhile; ?>
                        <?php endif; ?>

                    </div>
                </div>
            </div>

            <?php if(dynamic_sidebar('forside_widgetarea')) : else : endif ?>
            <?php if(dynamic_sidebar('sosiale_medier_widgetarea')) : else : endif ?>

        </div>
    </div>

<?php get_footer(); ?>