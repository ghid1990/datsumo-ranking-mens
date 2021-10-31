<?php include locate_template('code.php'); ?>

<?php get_header() ?>

<body>

  <div class="cushion">
    <div class="bg">
      <div class="load-img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/load.png" alt=""></div>
      <p class="load-txt">しばらくお待ちください。</p>
      <dl class="cl-box">
        <dt><?php the_title(); ?>期間限定キャンペーン</dt>
        <dd>
          <?php the_title(); ?>
          <span>【WEB予約限定価格】</span>
        </dd>
      </dl>
      <p class="des-txt">
        <?php the_title(); ?>の公式サイトへ移動中です。<br>
        ページが移動しない場合は、<br>
        <a href="<?php echo get_field("redirect_url"); ?><?php echo $ad_code; ?>">こちらをクリック</a>してください。
      </p>
    </div>
  </div>

  <script>
    setTimeout("redirect()", 3000);

    function redirect() {
      location.href = '<?php echo get_field("redirect_url"); ?><?php echo $ad_code; ?>';
    }
  </script>

  <?php get_footer() ?>