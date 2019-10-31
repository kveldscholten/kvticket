<h1><?=($this->get('ticket') != '') ? $this->getTrans('edit') : $this->getTrans('add') ?></h1>
<form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
    <?=$this->getTokenField() ?>
    <div class="form-group">
        <label for="status" class="col-lg-2 control-label">
            <?=$this->getTrans('status') ?>
        </label>
        <div class="col-lg-4">
            <select class="form-control" id="status" name="status">
                <option value="0" <?=($this->get('ticket') && $this->get('ticket')->getStatus() == 0) ? 'selected' : '' ?>><?=$this->getTrans('openTickets') ?></option>
                <option value="1" <?=($this->get('ticket') && $this->get('ticket')->getStatus() == 1) ? 'selected' : '' ?>><?=$this->getTrans('editTickets') ?></option>
                <option value="2" <?=($this->get('ticket') && $this->get('ticket')->getStatus() == 2) ? 'selected' : '' ?>><?=$this->getTrans('compTickets') ?></option>
                <option value="3" <?=($this->get('ticket') && $this->get('ticket')->getStatus() == 3) ? 'selected' : '' ?>><?=$this->getTrans('closeTickets') ?></option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="cat" class="col-lg-2 control-label">
            <?=$this->getTrans('cat') ?>
        </label>
        <div class="col-lg-4">
            <select class="form-control" id="cat" name="cat">
                <option value="0" <?=(!$this->get('ticket')) ? 'selected' : '' ?>><?=$this->getTrans('noSelection') ?></option>
            <?php foreach ($this->get('cats') as $cat): ?>
                <option value="<?=$cat->getId() ?>" <?=($this->get('ticket') && $this->get('ticket')->getCat() == $cat->getId()) ? 'selected' : '' ?>><?=$cat->getTitle() ?></option>
            <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="form-group <?=$this->validation()->hasError('title') ? 'has-error' : '' ?>">
        <label for="title" class="col-lg-2 control-label">
            <?=$this->getTrans('title') ?>
        </label>
        <div class="col-lg-4">
            <input type="text"
                   class="form-control"
                   id="title"
                   name="title"
                   value="<?=($this->get('ticket') != '') ? $this->escape($this->get('ticket')->getTitle()) : $this->originalInput('title') ?>" />
        </div>
    </div>
    <div class="form-group <?=$this->validation()->hasError('text') ? 'has-error' : '' ?>">
        <label for="text" class="col-lg-2 control-label">
            <?=$this->getTrans('desc') ?>
        </label>
        <div class="col-lg-8">
                <textarea class="form-control ckeditor"
                          id="text"
                          name="text"
                          toolbar="ilch_html"
                          cols="60"
                          rows="5"><?=($this->get('ticket') != '') ? $this->escape($this->get('ticket')->getText()) : $this->originalInput('text') ?></textarea>
        </div>
    </div>
    <div class="form-group <?=$this->validation()->hasError('editor') ? 'has-error' : '' ?>">
        <label for="editor" class="col-lg-2 control-label">
            <?=$this->getTrans('editor') ?>
        </label>
        <div class="col-lg-4">
            <select class="chosen-select form-control" id="editor" name="editor" data-placeholder="<?=$this->getTrans('selectuser') ?>">
            <option value="0" <?=(!$this->get('ticket')) ? 'selected' : '' ?>><?=$this->getTrans('noSelection') ?></option>
                <?php foreach ($this->get('users') as $user): ?>
                <?php if ($user->hasAccess('module_kvticket',true) != ''): ?>
                    <option value="<?=$user->getId() ?>" <?=(($this->get('ticket') && $this->get('ticket')->getEditor() == $user->getId()) || ((!$this->get('ticket') || $this->get('ticket')->getEditor() == 0) && $user->getId() == $this->getUser()->getId())) ? 'selected' : '' ?>><?=$this->escape($user->getName()) ?></option>
                <?php endif; ?>
                <?php endforeach; ?>            
            </select>
        </div>
    </div>
    <?=($this->get('ticket') != '') ? $this->getSaveBar('edit') : $this->getSaveBar('add') ?>
</form>
