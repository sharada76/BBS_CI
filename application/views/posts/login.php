<div class="container mt-4">
  <div class="border p-4">
    <h1 class="h3 mb-4">
      ログイン
    </h1>

    <form method="POST" action=<?php echo site_url('users/login'); ?>>

      <fieldset class="mb-4">
        <input type="hidden" id="result" name="result">
        <?php echo form_error('result', '<div class="text-danger mb-4">', '</div>'); ?>
        <div class="form-group">
          <label for="name">
            ユーザー名
          </label>
          <div class="row">
            <div class="col-md-4">
              <input id="name" name="name" class="form-control" value="<?php echo set_value('name'); ?>" type="text" size="20">
            </div>
          </div>
          <?php echo form_error('name', '<div class="text-danger">', '</div>'); ?>
        </div>
        <div class="form-group">
          <label for="title">
            パスワード
          </label>
          <div class="row">
            <div class="col-md-4">
              <input id="password" name="password" class="form-control" value="<?php echo set_value('password'); ?>" type="password" size="20">
            </div>
          </div>
          <?php echo form_error('password', '<div class="text-danger">', '</div>'); ?>
        </div>

        <div class="mt-5">
          <button type="submit" class="btn btn-primary">
            ログイン
          </button>
        </div>
        <?php echo form_error('login_failed', '<div class="text-danger">', '</div>'); ?>
        <div class="mt-4">
          <a href="<?php echo site_url('users/create'); ?>">
            <u>新規ユーザー登録はこちら</u>
          </a>
        </div>
      </fieldset>
    </form>
  </div>
</div>