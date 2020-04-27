<div class="container mt-4">
  <div class="border p-4">
    <h1 class="h5 mb-4">
      投稿の編集
    </h1>

    <form method="POST" action=<?php echo site_url('posts/update/'.$post_item['id']); ?>>

      <fieldset class="mb-4">
        <div class="form-group">
          <label for="title">
            タイトル
          </label>
          <input
          id="title"
          name="title"
          class="form-control"
          value="<?php echo $post_item['title']; ?>"
          type="text"
          >
          <?php echo form_error('title', '<div class="text-danger">', '</div>'); ?>
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
          ><?php echo $post_item['content']; ?></textarea>
          <?php echo form_error('content', '<div class="text-danger">', '</div>'); ?>
        </div>

        <div class="mt-5">
          <a class="btn btn-secondary" href="<?php echo site_url('posts/view/'.$post_item['id']); ?>">
            キャンセル
          </a>

          <button type="submit" class="btn btn-primary">
            更新する
          </button>
        </div>
      </fieldset>
    </form>
  </div>
</div>
