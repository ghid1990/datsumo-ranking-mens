<?php include locate_template('code.php'); ?>

<?php get_header() ?>

<body>
  <div class="datsumo-mans-wrap">

    <div class="rank-cont">
      <div class="rank-cont-bg">

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <div class="rank-other">
              <div class="rank-ttl-block">
                <?php if ($count == 2) : ?>
                  <div class="rank-ttl-block-l"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_rank02.png" alt=""></div>
                <?php elseif ($count == 3) : ?>
                  <div class="rank-ttl-block-l"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_rank03.png" alt=""></div>
                <?php elseif ($count == 4) : ?>
                  <div class="rank-ttl-block-l"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_rank04.png" alt=""></div>
                <?php elseif ($count == 5) : ?>
                  <div class="rank-ttl-block-l"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_rank05.png" alt=""></div>
                <?php endif; ?>
                <div class="rank-ttl-block-r">
                  <a href="<?php the_permalink(); ?>?code=<?php echo $ad_code; ?>" class="rank-ttl"><?php the_title(); ?></a>
                  <p class="rank-ttl-btm">
                    <?php the_field('product_copy'); ?>
                  </p>
                </div>
              </div>

              <div class="rank-img">
                <a href="<?php the_permalink(); ?>?code=<?php echo $ad_code; ?>">
                  <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
                </a>
              </div>

              <div class="rank-star">
                <p>総合評価</p>
                <?php
                $rate = get_field('product_rating');
                if ($rate == 0.0) { ?>
                <?php } elseif ($rate == 0.5) { ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/star05.png" alt="" class="star05">
                <?php } elseif ($rate == 1.0) { ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/star10.png" alt="" class="star10">
                <?php } elseif ($rate == 1.5) { ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/star15.png" alt="" class="star15">
                <?php } elseif ($rate == 2.0) { ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/star20.png" alt="" class="star20">
                <?php } elseif ($rate == 2.5) { ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/star25.png" alt="" class="star25">
                <?php } elseif ($rate == 3.0) { ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/star30.png" alt="" class="star30">
                <?php } elseif ($rate == 3.5) { ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/star35.png" alt="" class="star35">
                <?php } elseif ($rate == 4.0) { ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/star40.png" alt="" class="star40">
                <?php } elseif ($rate == 4.5) { ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/star45.png" alt="" class="star45">
                <?php } elseif ($rate == 5.0) { ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/star50.png" alt="" class="star50">
                <?php } ?>
              </div>

              <table class="eva-table">
                <tbody>
                  <tr>
                    <td class="ttl"><?php the_field('product_price_label'); ?></td>
                    <td class="ttl"><?php the_field('product_effect_label'); ?></td>
                    <td class="ttl"><?php the_field('product_pain_label'); ?></td>
                  </tr>
                  <tr>
                    <td>
                      <?php
                      $price_bg = get_field('product_price_bg');
                      if ($price_bg == 1) { ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_val01.png" alt="">
                      <?php } elseif ($price_bg == 2) { ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_val02.png" alt="">
                      <?php } elseif ($price_bg == 3) { ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_val03.png" alt="">
                      <?php } elseif ($price_bg == 4) { ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_val04.png" alt="">
                      <?php } ?>
                      <?php the_field('product_price'); ?>
                    </td>
                    <td>
                      <?php
                      $effect_bg = get_field('product_effect_bg');
                      if ($effect_bg == 1) { ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_val01.png" alt="">
                      <?php } elseif ($effect_bg == 2) { ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_val02.png" alt="">
                      <?php } elseif ($effect_bg == 3) { ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_val03.png" alt="">
                      <?php } elseif ($effect_bg == 4) { ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_val04.png" alt="">
                      <?php } ?>
                      <?php the_field('product_effect'); ?>
                    </td>
                    <td>
                      <?php
                      $pain_bg = get_field('product_pain_bg');
                      if ($pain_bg == 1) { ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_val01.png" alt="">
                      <?php } elseif ($pain_bg == 2) { ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_val02.png" alt="">
                      <?php } elseif ($pain_bg == 3) { ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_val03.png" alt="">
                      <?php } elseif ($pain_bg == 4) { ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_val04.png" alt="">
                      <?php } ?>
                      <?php the_field('product_pain'); ?>
                    </td>
                  </tr>
                  <tr>
                    <td class="ttl"><?php the_field('product_trial_label'); ?></td>
                    <td class="ttl"><?php the_field('product_counsel_label'); ?></td>
                    <td class="ttl"><?php the_field('product_store_label'); ?></td>
                  </tr>
                  <tr>
                    <td>
                      <?php
                      $trial_bg = get_field('product_trial_bg');
                      if ($trial_bg == 1) { ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_val01.png" alt="">
                      <?php } elseif ($trial_bg == 2) { ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_val02.png" alt="">
                      <?php } elseif ($trial_bg == 3) { ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_val03.png" alt="">
                      <?php } elseif ($trial_bg == 4) { ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_val04.png" alt="">
                      <?php } ?>
                      <?php the_field('product_trial'); ?>
                    </td>
                    <td>
                      <?php
                      $counsel_bg = get_field('product_counsel_bg');
                      if ($counsel_bg == 1) { ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_val01.png" alt="">
                      <?php } elseif ($counsel_bg == 2) { ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_val02.png" alt="">
                      <?php } elseif ($counsel_bg == 3) { ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_val03.png" alt="">
                      <?php } elseif ($counsel_bg == 4) { ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_val04.png" alt="">
                      <?php } ?>
                      <?php the_field('product_counsel'); ?>
                    </td>
                    <td>
                      <?php
                      $store_bg = get_field('product_store_bg');
                      if ($store_bg == 1) { ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_val01.png" alt="">
                      <?php } elseif ($store_bg == 2) { ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_val02.png" alt="">
                      <?php } elseif ($store_bg == 3) { ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_val03.png" alt="">
                      <?php } elseif ($store_bg == 4) { ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_val04.png" alt="">
                      <?php } ?>
                      <?php the_field('product_store'); ?>
                    </td>
                  </tr>
                </tbody>
              </table>

              <div class="rank-dis">
                <?php the_field('product_text'); ?>
              </div>

              <a href="<?php the_permalink(); ?>?code=<?php echo $ad_code; ?>" class="rank-btn">
                <span><?php the_title(); ?>公式で<br>詳細をチェック</span>
              </a>
            </div>

          <?php endwhile;
        else : ?>
          該当の情報はありません
        <?php endif; ?>

      </div>
    </div>

    <?php get_footer() ?>