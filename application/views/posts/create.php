<div class="container mt-4">
  <div class="border p-4">
    <h1 class="h3 mb-4">
      投稿の新規作成
    </h1>

    <form method="POST" action=<?php echo site_url('posts/store'); ?>>

      <fieldset class="mb-4">
        <div class="form-group">
          <label for="name">
            名前
          </label>
          <input
          id="name"
          name="name"
          class="form-control"
          value="<?php echo set_value('name'); ?>"
          type="text"
          >
        </div>
        <div class="form-group">
          <label for="title">
            タイトル
          </label>
          <input
          id="title"
          name="title"
          class="form-control"
          value="<?php echo set_value('title'); ?>"
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
          ><?php echo set_value('content'); ?></textarea>
          <?php echo form_error('content', '<div class="text-danger">', '</div>'); ?>
        </div>

        <div class="mt-5">
          <a class="btn btn-secondary" href="<?php echo site_url('posts'); ?>">
            キャンセル
          </a>

          <button type="submit" class="btn btn-primary">
            投稿する
          </button>
        </div>
      </fieldset>
    </form>
  </div>
</div>