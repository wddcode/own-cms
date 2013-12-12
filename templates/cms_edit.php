<h1>CMS Editor</h1>

<form role="form" method="post">

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text"
               value="<?= isset($page->title) ? $page->title : '' ?>"
               class="form-control"
               name="title"
               placeholder="Page Title">
    </div>

    <div class="form-group">
        <label for="content">Content</label>
        <textarea type="text"
                  class="form-control"
                  style="height: 300px;"
                  name="content"><?= isset($page->content) ? $page->content : '' ?></textarea>
    </div>

    <a href="#" class="btn btn-default">Preview</a>
    <button type="submit" class="btn btn-primary pull-right">Save</button>

</form>