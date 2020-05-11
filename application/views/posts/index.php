<?php if( isset($_SESSION['name']) && $_SESSION['time'] + 3600 > time()): ?>
<div class="container mt-4">
    <div class="border border-success rounded mb-4 text-success">
      ・<?php echo $_SESSION['name']; ?>でログインしています。
    </div>
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
          投稿日時:<?php echo $post_item['created_at']; ?>
        </span>

        <span class="badge badge-primary">
          コメント <?php echo $post_item['comment_count']; ?>件
        </span>

       <!-- いいねボタン Start -->
        <?php if(in_array($post_item['id'], $likes)): ?>
          <a class="fas fa-heart text-danger"　style="color: red;" href="<?php echo site_url('likes/delete/index/'.$post_item['id']); ?>"></a>
          ×<?php echo $post_item['like_count']; ?>
        <?php else: ?>
          <a class="far fa-heart text-danger" href="<?php echo site_url('likes/store/index/'.$post_item['id']); ?>"></a>
          ×<?php echo $post_item['like_count']; ?>
        <?php endif; ?>
        <!-- いいねボタン End -->

      </div>
    </div>
    <?php endforeach; ?>
</div>
<?php else: ?>
  <?php redirect ("users/login"); ?>
<?php endif; ?>
