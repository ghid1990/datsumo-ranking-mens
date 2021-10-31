<?php include locate_template('code.php'); ?>

<?php get_header() ?>

<body>
  <div class="datsumo-mans-wrap">

    <div class="mv-area"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/mv.png" alt="ツルスベ男子が選んだ メンズ脱毛おすすめランキング"></div>

    <div class="search-area">
      <p class="search-ttl">あなたにぴったりなサロンを検索</p>
      <div class="search-cont">

        <form action="<?php echo home_url(); ?>/" id="search-form" method="get">
          <input name="s" type="hidden" />
          <input type="hidden" name="post_type" value="post">

          <select name="prefecture">
            <span class="arrow"></span>
            <option value="" selected>お住まいの都道府県は？</option>
            <?php
            $taxonomy_name = 'prefecture';
            $args = array('hide_empty' => 0, 'orderby' => 'term_order', 'order' => 'ASC');
            $taxonomys = get_terms($taxonomy_name, $args);
            if (!empty($taxonomys) && !is_wp_error($taxonomys)) :
              foreach ($taxonomys as $taxonomy) : ?>
                <!-- loop here -->
                <option value="<?php echo $taxonomy->slug; ?>"><?php echo $taxonomy->name; ?></option>
              <?php endforeach; ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
          </select>

          <select name="part">
            <span class="arrow"></span>
            <option value="" selected>部位を選択してください</option>
            <?php
            $taxonomy_name = 'part';
            $args = array('hide_empty' => 0);
            $taxonomys = get_terms($taxonomy_name, $args);
            if (!empty($taxonomys) && !is_wp_error($taxonomys)) :
              foreach ($taxonomys as $taxonomy) : ?>
                <!-- loop here -->
                <option value="<?php echo $taxonomy->slug; ?>"><?php echo $taxonomy->name; ?></option>
              <?php endforeach; ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
          </select>

          <input type="submit" value="検索" class="search-btn">
        </form>

      </div>
    </div>

    <div class="ttl bg">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/ttl02.png" alt="メンズ脱毛おすすめBEST5">
      <p class="ttl-note">更新日：2021年7月1日（木）</p>
    </div>

    <div class="rank-cont">
      <div class="rank-cont-bg">

        <?php
        $the_query1 = new WP_Query(array(
          'post_type'      => 'post',
          'posts_per_page'  => 1,
          'meta_key'      => 'ranking_recommend',
          'orderby'      => 'meta_value_num',
          'order'        => 'ASC'
        ));
        ?>

        <?php if ($the_query1->have_posts()) : while ($the_query1->have_posts()) : $the_query1->the_post(); ?>

            <div class="rank-wrap">
              <div class="rank-ttl-block">
                <div class="rank-ttl-block-l"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_rank01.png" alt=""></div>
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

              <div class="rank-mouth-block">
                <p class="rank-mouth-ttl">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_comment.png" alt="">
                  <?php the_title(); ?>の口コミ
                </p>

                <div class="rank-mouth-box">
                  <div class="rank-mouth-sttl">
                    <div class="icon-human"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_human.png" alt=""></div>
                    <p>
                      <span><?php the_field('comment_name1'); ?></span><br>
                      <?php the_field('comment_title1'); ?>
                    </p>
                  </div>
                  <p class="rank-mouth-txt">
                    <?php the_field('comment_text1'); ?>
                  </p>
                </div>

                <div class="rank-mouth-box">
                  <div class="rank-mouth-sttl">
                    <div class="icon-human"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_human.png" alt=""></div>
                    <p>
                      <span><?php the_field('comment_name2'); ?></span><br>
                      <?php the_field('comment_title2'); ?>
                    </p>
                  </div>
                  <p class="rank-mouth-txt">
                    <?php the_field('comment_text2'); ?>
                  </p>
                </div>
              </div>

              <div class="point-block">
                <p class="point-ttl">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_i.png" alt="">
                  おすすめポイント
                </p>
                <div class="point-box-outblock">
                  <div class="point-box n01">
                    <p class="point-sttl"><?php the_field('point_title1'); ?></p>
                    <p class="point-stxt">
                      <?php the_field('point_text1'); ?>
                    </p>
                  </div>
                  <div class="point-box n02">
                    <p class="point-sttl"><?php the_field('point_title2'); ?></p>
                    <p class="point-stxt">
                      <?php the_field('point_text2'); ?>
                    </p>
                  </div>
                  <div class="point-box n03">
                    <p class="point-sttl"><?php the_field('point_title3'); ?></p>
                    <p class="point-stxt">
                      <?php the_field('point_text3'); ?>
                    </p>
                  </div>
                </div>
              </div>

              <div class="border-blue">
                <p class="border-ttl">メンズクリアの選べるトライアル脱毛</p>
                <div class="icon-txt">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-txt01.png" alt="初回限定" class="i01">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-txt02.png" alt="部位が選べる" class="i02">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-txt03.png" alt="たったの90分" class="i03">
                </div>
                <div class="trial-box">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/trial01.png" alt="ヒゲ脱毛">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/trial02.png" alt="VIO脱毛">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/trial03.png" alt="全身脱毛">
                </div>
                <div class="trial-btn"><a href="<?php the_permalink(); ?>?code=<?php echo $ad_code; ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/trial_btn.png" alt="980円で試してみる"></a></div>
              </div>

              <p class="store-ttl">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_map.png" alt="">
                メンズクリアの店舗情報
              </p>
              <table class="store-table">
                <tbody>
                  <tr>
                    <td class="ttl">北海道・東北</td>
                    <td>
                      <a href="<?php the_permalink(); ?>?code=<?php echo $ad_code; ?>">札幌</a>
                      <a href="<?php the_permalink(); ?>?code=<?php echo $ad_code; ?>">秋田</a>
                      <a href="<?php the_permalink(); ?>?code=<?php echo $ad_code; ?>">宮城</a>
                    </td>
                  </tr>
                  <tr>
                    <td class="ttl">関東</td>
                    <td>
                      <a href="<?php the_permalink(); ?>?code=<?php echo $ad_code; ?>">東京</a>
                      <a href="<?php the_permalink(); ?>?code=<?php echo $ad_code; ?>">神奈川</a>
                      <a href="<?php the_permalink(); ?>?code=<?php echo $ad_code; ?>">埼玉</a>
                      <a href="<?php the_permalink(); ?>?code=<?php echo $ad_code; ?>">千葉</a>
                      <a href="<?php the_permalink(); ?>?code=<?php echo $ad_code; ?>">栃木</a>
                      <a href="<?php the_permalink(); ?>?code=<?php echo $ad_code; ?>">群馬</a>
                      <a href="<?php the_permalink(); ?>?code=<?php echo $ad_code; ?>">茨城</a>
                    </td>
                  </tr>
                  <tr>
                    <td class="ttl">中部</td>
                    <td>
                      <a href="<?php the_permalink(); ?>?code=<?php echo $ad_code; ?>">愛知</a>
                      <a href="<?php the_permalink(); ?>?code=<?php echo $ad_code; ?>">静岡</a>
                      <a href="<?php the_permalink(); ?>?code=<?php echo $ad_code; ?>">石川</a>
                      <a href="<?php the_permalink(); ?>?code=<?php echo $ad_code; ?>">岐阜</a>
                      <a href="<?php the_permalink(); ?>?code=<?php echo $ad_code; ?>">三重</a>
                      <a href="<?php the_permalink(); ?>?code=<?php echo $ad_code; ?>">新潟</a>
                    </td>
                  </tr>
                  <tr>
                    <td class="ttl">近畿</td>
                    <td>
                      <a href="<?php the_permalink(); ?>?code=<?php echo $ad_code; ?>">大阪</a>
                      <a href="<?php the_permalink(); ?>?code=<?php echo $ad_code; ?>">京都</a>
                      <a href="<?php the_permalink(); ?>?code=<?php echo $ad_code; ?>">兵庫</a>
                      <a href="<?php the_permalink(); ?>?code=<?php echo $ad_code; ?>">奈良</a>
                      <a href="<?php the_permalink(); ?>?code=<?php echo $ad_code; ?>">滋賀</a>
                      <a href="<?php the_permalink(); ?>?code=<?php echo $ad_code; ?>">和歌山</a>
                    </td>
                  </tr>
                  <tr>
                    <td class="ttl">中国・四国</td>
                    <td>
                      <a href="<?php the_permalink(); ?>?code=<?php echo $ad_code; ?>">岡山</a>
                      <a href="<?php the_permalink(); ?>?code=<?php echo $ad_code; ?>">広島</a>
                      <a href="<?php the_permalink(); ?>?code=<?php echo $ad_code; ?>">愛媛</a>
                      <a href="<?php the_permalink(); ?>?code=<?php echo $ad_code; ?>">香川</a>
                    </td>
                  </tr>
                  <tr>
                    <td class="ttl">九州・沖縄</td>
                    <td>
                      <a href="<?php the_permalink(); ?>?code=<?php echo $ad_code; ?>">福岡</a>
                      <a href="<?php the_permalink(); ?>?code=<?php echo $ad_code; ?>">熊本</a>
                      <a href="<?php the_permalink(); ?>?code=<?php echo $ad_code; ?>">大分</a>
                      <a href="<?php the_permalink(); ?>?code=<?php echo $ad_code; ?>">長崎</a>
                      <a href="<?php the_permalink(); ?>?code=<?php echo $ad_code; ?>">宮崎</a>
                      <a href="<?php the_permalink(); ?>?code=<?php echo $ad_code; ?>">鹿児島</a>
                      <a href="<?php the_permalink(); ?>?code=<?php echo $ad_code; ?>">沖縄</a>
                    </td>
                  </tr>
                </tbody>
              </table>

              <div class="arrow-img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow.png" alt=""></div>

              <a href="<?php the_permalink(); ?>?code=<?php echo $ad_code; ?>" class="rank-btn">
                <span>
                  【<?php the_title(); ?>】<br>
                  無料カウンセリングはこちら
                </span>
              </a>
            </div>

          <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>

        <?php
        $count = 1;
        $the_query2 = new WP_Query(array(
          'post_type'      => 'post',
          'posts_per_page'  => 5,
          'meta_key'      => 'ranking_recommend',
          'orderby'      => 'meta_value_num',
          'order'        => 'ASC'
        ));
        ?>

        <?php if ($the_query2->have_posts()) : while ($the_query2->have_posts()) : $the_query2->the_post(); ?>
            <?php if ($count > 1) : ?>

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

                <div class="rank-mouth-block">
                  <p class="rank-mouth-ttl">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_comment.png" alt="">
                    <?php the_title(); ?>の口コミ
                  </p>

                  <div class="rank-mouth-box">
                    <div class="rank-mouth-sttl">
                      <div class="icon-human"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_human.png" alt=""></div>
                      <p>
                        <span><?php the_field('comment_name1'); ?></span><br>
                        <?php the_field('comment_title1'); ?>
                      </p>
                    </div>
                    <p class="rank-mouth-txt">
                      <?php the_field('comment_text1'); ?>
                    </p>
                  </div>

                  <div class="rank-mouth-box">
                    <div class="rank-mouth-sttl">
                      <div class="icon-human"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_human.png" alt=""></div>
                      <p>
                        <span><?php the_field('comment_name2'); ?></span><br>
                        <?php the_field('comment_title2'); ?>
                      </p>
                    </div>
                    <p class="rank-mouth-txt">
                      <?php the_field('comment_text2'); ?>
                    </p>
                  </div>
                </div>

                <div class="point-block">
                  <p class="point-ttl">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_i.png" alt="">
                    おすすめポイント
                  </p>
                  <div class="point-box-outblock">
                    <div class="point-box n01">
                      <p class="point-sttl"><?php the_field('point_title1'); ?></p>
                      <p class="point-stxt">
                        <?php the_field('point_text1'); ?>
                      </p>
                    </div>
                    <div class="point-box n02">
                      <p class="point-sttl"><?php the_field('point_title2'); ?></p>
                      <p class="point-stxt">
                        <?php the_field('point_text2'); ?>
                      </p>
                    </div>
                    <div class="point-box n03">
                      <p class="point-sttl"><?php the_field('point_title3'); ?></p>
                      <p class="point-stxt">
                        <?php the_field('point_text3'); ?>
                      </p>
                    </div>
                  </div>
                </div>

                <div class="arrow-img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow.png" alt=""></div>

                <a href="<?php the_permalink(); ?>?code=<?php echo $ad_code; ?>" class="rank-btn">
                  <span>
                    【<?php the_title(); ?>】<br>
                    無料カウンセリングはこちら
                  </span>
                </a>
              </div>

            <?php endif; ?>
            <?php $count++; ?>
          <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>

      </div>
    </div>

    <div class="three-point-block">
      <p class="three-point-ttl">
        メンズ脱毛選びでチェックすべき<br>
        ３つのポイント
      </p>
      <div class="three-point-bg">
        <div class="three-point-box">
          <p class="box-ttl p01">かかる料金の総額</p>
          <p class="box-txt">
            医療脱毛は脱毛料金以外のお金（診察料や再照射料）がかかります。脱毛料金は安かったけど、それ以外の金額が高くてトータルでは思っていたよりだいぶ高額に・・・なんてことも。なので脱毛料金以外のサービスを無料で受けられるサロン・クリニックを選ぶようにしましょう。
          </p>
        </div>
        <div class="three-point-box">
          <p class="box-ttl p02">痛みの少なさ</p>
          <p class="box-txt">
            男性は女性に比べて毛が濃いため、痛みを感じやすいと言われています。痛い施術を毎回受けるとなると誰でも億劫になるはず…。そんな方でもSHR式、IPL式と呼ばれる「ほぼ無痛」の脱毛方式を採用しているサロンを選べば安心です。
          </p>
        </div>
        <div class="three-point-box">
          <p class="box-ttl p03">予約の取りやすさ</p>
          <p class="box-txt">
            値段も安くて通いやすいけれど、なかなか予約が取れないというのはよく聞く話です。予約が取れなければせっかく契約したのに意味がなくなってしまいます。<br>
            だからこそ店舗数が多くて土日祝日も営業している、予約枠がたくさんあるサロン・クリニックで確実に施術できるようにしましょう。
          </p>
        </div>
      </div>
    </div>

    <div class="check-area">
      <p class="check-ttl">
        <span><span class="fc-y">３つのポイント</span>を満たす</span><br>
        おすすめのクリニックは…
      </p>
      <div class="check-cont-bg">

        <?php
        $the_query1 = new WP_Query(array(
          'post_type'      => 'post',
          'posts_per_page'  => 1,
          'meta_key'      => 'ranking_recommend',
          'orderby'      => 'meta_value_num',
          'order'        => 'ASC'
        ));
        ?>

        <?php if ($the_query1->have_posts()) : while ($the_query1->have_posts()) : $the_query1->the_post(); ?>

            <div class="rank-wrap">
              <div class="rank-ttl-block">
                <div class="rank-ttl-block-l"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_rank01.png" alt=""></div>
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

              <a href="<?php the_permalink(); ?>?code=<?php echo $ad_code; ?>" class="rank-btn">
                <span>
                  【<?php the_title(); ?>】<br>
                  無料カウンセリングはこちら
                </span>
              </a>
            </div>

          <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>

      </div>
    </div>

    <div class="salon-list">
      <p class="salon-ttl">人気の脱毛サロン一覧</p>
      <ul class="list-block">

        <?php
        $the_query3 = new WP_Query(array(
          'post_type'      => 'post',
          'posts_per_page'  => 5,
          'meta_key'      => 'ranking_recommend',
          'orderby'      => 'meta_value_num',
          'order'        => 'ASC'
        ));
        ?>

        <?php if ($the_query3->have_posts()) : while ($the_query3->have_posts()) : $the_query3->the_post(); ?>
            <li>
              <div class="list-l">
                <a href="<?php the_permalink(); ?>?code=<?php echo $ad_code; ?>">
                  <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
                </a>
              </div>
              <div class="list-r">
                <a href="<?php the_permalink(); ?>?code=<?php echo $ad_code; ?>" class="list-ttl"><?php the_title(); ?></a>
                <p>
                  <?php the_field('product_copy'); ?>
                </p>
              </div>
            </li>
          <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
      </ul>
    </div>

    <?php get_footer() ?>