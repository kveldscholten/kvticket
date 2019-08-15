<?php $userMapper = $this->get('userMapper'); ?>
<?php $catMapper = $this->get('catMapper'); ?>
<h1><?=$this->getTrans('menuTickets') ?></h1>
<?php if ($this->get('tickets')): ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="searchfield">
                <input class="form-control"
                       id="system-search"
                       name="q"
                       placeholder="<?=$this->getTrans('search') ?>" />
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-striped table-list-search">
                    <colgroup>
                        <col />
                        <col class="col-lg-2" />
                        <col class="col-lg-2" />
                        <col class="col-lg-2" />
                        <col class="col-lg-2" />
                    </colgroup>
                    <thead>
                        <tr>
                            <th><a href="<?=$this->getUrl(['column' => 'title', 'order' => $this->get('sort_order') == 'ASC'  ? 'desc' : 'asc']) ?>" title="<?=$this->getTrans('title') ?>"><?=$this->getTrans('title') ?><i class="fa fa-sort<?php echo $this->get('sort_column') == 'title' ? '-' . str_replace(array('ASC','DESC'), array('up','down'), $this->get('sort_order')) : ''; ?>"></i></a></th>
                            <th><a href="<?=$this->getUrl(['column' => 'cat', 'order' => $this->get('sort_order') == 'ASC'  ? 'desc' : 'asc']) ?>" title="<?=$this->getTrans('cat') ?>"><?=$this->getTrans('cat') ?><i class="fa fa-sort<?php echo $this->get('sort_column') == 'cat' ? '-' . str_replace(array('ASC','DESC'), array('up','down'), $this->get('sort_order')) : ''; ?>"></i></a></th>
                            <th><a href="<?=$this->getUrl(['column' => 'datetime', 'order' => $this->get('sort_order') == 'ASC'  ? 'desc' : 'asc']) ?>" title="<?=$this->getTrans('datetime') ?>"><?=$this->getTrans('datetime') ?><i class="fa fa-sort<?php echo $this->get('sort_column') == 'datetime' ? '-' . str_replace(array('ASC','DESC'), array('up','down'), $this->get('sort_order')) : ''; ?>"></i></a></th>
                            <th><a href="<?=$this->getUrl(['column' => 'editor', 'order' => $this->get('sort_order') == 'ASC'  ? 'desc' : 'asc']) ?>" title="<?=$this->getTrans('editor') ?>"><?=$this->getTrans('editor') ?><i class="fa fa-sort<?php echo $this->get('sort_column') == 'editor' ? '-' . str_replace(array('ASC','DESC'), array('up','down'), $this->get('sort_order')) : ''; ?>"></i></a></th>
                            <th><a href="<?=$this->getUrl(['column' => 'status', 'order' => $this->get('sort_order') == 'ASC'  ? 'desc' : 'asc']) ?>" title="<?=$this->getTrans('status') ?>"><?=$this->getTrans('status') ?><i class="fa fa-sort<?php echo $this->get('sort_column') == 'status' ? '-' . str_replace(array('ASC','DESC'), array('up','down'), $this->get('sort_order')) : ''; ?>"></i></a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($this->get('tickets') as $ticket): ?>
                            <?php 
                            $user = $userMapper->getUserById($ticket->getEditor());
                            $datetime = new \Ilch\Date($ticket->getDatetime());
                            $cat = $catMapper->getCategoryById($ticket->getCat());

                            if ($ticket->getStatus() == 1) {
                                $ticketCSS = 'info';
                                $ticketStatus = $this->getTrans('editTickets');
                            } elseif ($ticket->getStatus() == 2) {
                                $ticketCSS = 'success';
                                $ticketStatus = $this->getTrans('compTickets');
                            } elseif ($ticket->getStatus() == 3) {
                                $ticketCSS = 'danger';
                                $ticketStatus = $this->getTrans('closeTickets');
                            } else {
                                $ticketCSS = '';
                                $ticketStatus = $this->getTrans('openTickets');
                            } ?>

                            <tr <?=($ticketCSS) ? 'class="'.$ticketCSS.'"' : '' ?>>
                                <td <?=($this->get('sort_column') == 'title'?'class="table-active"':'') ?>>
                                    <a href="<?=$this->getUrl(['action' => 'show', 'id' => $ticket->getId()]) ?>" title="<?=$this->escape($ticket->getTitle()) ?>">
                                        <?=$this->escape($ticket->getTitle()) ?>
                                    </a>
                                </td>
                                <td <?=($this->get('sort_column') == 'datetime'?'class="table-active"':'') ?>><?=($cat ? $cat->getTitle() : '') ?></td>
                                <td <?=($this->get('sort_column') == 'datetime'?'class="table-active"':'') ?>><?=$datetime->format('d.m.Y H:i') ?></td>
                                <td <?=($this->get('sort_column') == 'editor'?'class="table-active"':'') ?>><?=($user) ? $user->getName() : '' ?></td>
                                <td <?=($this->get('sort_column') == 'status'?'class="table-active"':'') ?>><?=$ticketStatus ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php else: ?>
    <?=$this->getTrans('noTickets') ?>
<?php endif; ?>

<div class="btn btn-default pull-right">
    <a href="<?=$this->getUrl(['action' => 'new']) ?>">
        <?=$this->getTrans('entry') ?>
    </a>
</div>
