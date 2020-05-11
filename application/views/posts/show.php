<?php if( isset($_SESSION['name']) && $_SESSION['time'] + 3600 > time()): ?>
<div class="container mt-4">
  <div class="border p-4">
    <div class="mb-4 text-right">
    <?php if( $_SESSION['name'] ===  $post_item['name']): ?>
      <a class="btn btn-secondary" href="<?php echo site_url('posts/edit/'.$post_item['id']); ?>">
        編集する
      </a>
        <button class="btn btn-danger" data-toggle="modal" data-target="#deletePostModal">削除する</button>
    <?php endif; ?>
  </div>
        <!-- 削除時ポップアップ　Start -->
      <div class="modal fade" id="deletePostModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="modalLabel">投稿削除</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              投稿を削除してよろしいですか？
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <a class="btn btn-danger" href="<?php echo site_url('posts/delete/'.$post_item['id']); ?>">
                削除する
              </a>
            </div>
          </div>
        </div>
      </div>
      <!-- 削除時ポップアップ　End -->

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

  <!-- いいねボタン Start -->
  <?php if(!empty($is_liked)): ?>
    [ <a class="fas fa-heart text-danger"　style="color: red;" href="<?php echo site_url('likes/delete/view/'.$post_item['id']); ?>"></a>
    ×<?php echo $post_item['like_count']; ?> ]
  <?php else: ?>
    [ <a class="far fa-heart text-danger" href="<?php echo site_url('likes/store/view/'.$post_item['id']); ?>"></a>
    ×<?php echo $post_item['like_count']; ?> ]
  <?php endif; ?>
  <!-- いいねボタン End -->

  <form class="mb-4 border-top p-4" method="POST" action=<?php echo site_url('posts/comments/store/'.$post_item['id']); ?>>

    <input
    id="id"
    name="id"
    type="hidden"
    value="<?php echo $post_item['id']; ?>"
    >
    <h2 class="h5 mb-4">
      コメント
    </h2>
    <!-- <div class="form-group">
      <label for="name">
        名前
      </label>

      <textarea
      id="name"
      name="name"
      rows="1"
      class="form-control"
      ><?php echo set_value('name'); ?></textarea>
    </div> -->

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
      <?php if( $_SESSION['name'] ===  $comment['name']): ?>
      <div class="mb-4 text-right">
        <form
        style="display: inline-block;"
        method="POST"
        action=<?php echo site_url('posts/comments/delete/'.$comment['id']); ?>
        >
         <button class="btn btn-secondary">削除する</button>
        </form>
      </div>

      <!-- いいねボタン Start -->
      <?php if(in_array($comment['id'], $likes)): ?>
        <a class="fas fa-heart text-danger"　style="color: red;" href="<?php echo site_url('likes/delete/comment/'.$comment['id']); ?>"></a>
          ×<?php echo $comment['like_count']; ?>
      <?php else: ?>
        <a class="far fa-heart text-danger" href="<?php echo site_url('likes/store/comment/'.$comment['id']); ?>"></a>
          ×<?php echo $comment['like_count']; ?>
      <?php endif; ?>
      <!-- いいねボタン End -->

    <?php endif; ?>
  </div>
  <?php endforeach; ?>
  <?php elseif (empty($comment)): ?>
    <p>コメントはまだありません。</p>
  <?php endif; ?>
</section>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<?php else: ?>
  <?php redirect ("users/login"); ?>
<?php endif; ?>