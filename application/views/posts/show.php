<div class="container mt-4">
  <div class="border p-4">
    <div class="mb-4 text-right">
      <a class="btn btn-default" href="<?php echo site_url('posts/edit/'.$post_item['id']); ?>">
        編集する
      </a>
      <form
      style="display: inline-block;"
      method="POST"
      action=<?php echo site_url('posts/delete/'.$post_item['id']); ?>
      >
      <button class="btn btn-danger">削除する</button>
    </form>
  </div>
  <div class="mb-4 bg-light">
    <span class="h3">
      <?php echo $post_item['title']; ?>
    </span>
    <span class="label label-default">
      <time class="h5">
        <?php echo $post_item['created_at']; ?>
        (<?php echo $post_item['name']; ?>)
      </time>
    </span>
  </div>

  <p class="mb-5">
    <?php echo htmlspecialchars($post_item['content']); ?>
  </p>

  <form class="mb-4" method="POST" action=<?php echo site_url('posts/comments/store/'.$post_item['id']); ?>>

    <input
    id="id"
    name="id"
    type="hidden"
    value="<?php echo $post_item['id']; ?>"
    >
    <h2 class="h5 mb-4">
      コメント
    </h2>
    <div class="form-group">
      <label for="name">
        名前
      </label>

      <textarea
      id="name"
      name="name"
      rows="1"
      class="form-control"
      ><?php echo set_value('name'); ?></textarea>
    </div>
    <div class="form-group">
      <label for="content">
        本文
      </label>

      <textarea
      id="content"
      name="content"
      class="form-control"
      rows="4"
      ></textarea>
      <?php echo form_error('content', '<div class="text-danger">', '</div>'); ?>
    </div>

    <div class="mt-4">
      <button type="submit" class="btn btn-primary">
        コメントする
      </button>
    </div>
  </form>

  <section>
    <?php if( !empty( $comments ) ) :
      foreach ($comments as $comment): ?>
    <div class="border-top p-4">
      <time class="text-secondary">
        <?php echo $comment['created_at']; ?>
        (<?php echo $comment['name']; ?>)
      </time>
      <p class="mt-2">
        <?php echo htmlspecialchars($comment['content']); ?>
      </p>
      <div class="mb-4 text-right">
        <form
        style="display: inline-block;"
        method="POST"
        action=<?php echo site_url('posts/comments/delete/'.$comment['id']); ?>
        >

        <button class="btn btn-default">削除する</button>
      </form>
    </div>
  </div>
  <?php endforeach; ?>
  <?php elseif (empty($comment)): ?>
    <p>コメントはまだありません。</p>
  <?php endif; ?>
</section>
</div>
</div>
