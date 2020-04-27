<div class="container mt-4">
  <div class="mb-4">
    <a href="<?php echo site_url('posts/create'); ?>" class="btn btn-primary">
      投稿を新規作成する
    </a>
  </div>
  <?php foreach ($posts as $post_item) : ?>
  <div class="card mb-4">
    <div class="card-header">
      <?php echo $post_item['title']; ?>
    </div>
    <div class="card-body">
      <p class="card-text">
        <?php echo htmlspecialchars(mb_strimwidth($post_item['content'], 0, 200, "…", "UTF-8")); ?>
      </p>

      <a href="<?php echo site_url('posts/view/'.$post_item['id']); ?>">
        続きを読む
      </a>
    </div>
    <div class="card-footer">
      <span class="mr-2">
        <?php echo $post_item['created_at']; ?>
        投稿日時
      </span>

      <span class="badge badge-primary">
        コメント <?php echo $post_item['count']; ?>件
      </span>
    </div>
  </div>
  <?php endforeach; ?>
  <div class="d-flex justify-content-center mb-5">
   <?php //echo $this->pagination->create_links(); ?>
  </div>
</div>
