<?php $userMapper = $this->get('userMapper'); ?>

<form class="form-horizontal" method="POST" action="">
    <?=$this->getTokenField() ?>

    <?php if ($this->get('tickets')): ?>
        <?php if ($this->get('openTickets')): ?>
            <h1><?=$this->getTrans('openTickets') ?></h1>
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <colgroup>
                        <col class="icon_width" />
                        <col class="icon_width" />
                        <col class="icon_width" />
                        <col />
                        <col class="col-lg-1" />
                        <col class="col-lg-1" />
                    </colgroup>
                    <thead>
                    <tr>
                        <th><?=$this->getCheckAllCheckbox('check_tickets') ?></th>
                        <th></th>
                        <th></th>
                        <th><?=$this->getTrans('menuTickets') ?></th>
                        <th><?=$this->getTrans('editor') ?></th>
                        <th><?=$this->getTrans('datetime') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($this->get('openTickets') as $ticket): ?>
                            <?php $user = $userMapper->getUserById($ticket->getEditor()); ?>
                            <?php $datetime = new \Ilch\Date($ticket->getDatetime()); ?>
                            <tr>
                                <td><?=$this->getDeleteCheckbox('check_tickets', $ticket->getId()) ?></td>
                                <td><?=$this->getEditIcon(['action' => 'treat', 'id' => $ticket->getId()]) ?></td>
                                <td><?=$this->getDeleteIcon(['action' => 'del', 'id' => $ticket->getId()]) ?></td>
                                <td><?=$this->escape($ticket->getTitle()) ?></td>
                                <td><?=($user) ? $user->getName() : '' ?></td>
                                <td><?=$datetime->format('d.m.Y H:i') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>

        <?php if ($this->get('editTickets')): ?>
            <h1><?=$this->getTrans('editTickets') ?></h1>
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <colgroup>
                        <col class="icon_width" />
                        <col class="icon_width" />
                        <col class="icon_width" />
                        <col />
                        <col class="col-lg-1" />
                        <col class="col-lg-1" />
                    </colgroup>
                    <thead>
                    <tr>
                        <th><?=$this->getCheckAllCheckbox('check_tickets') ?></th>
                        <th></th>
                        <th></th>
                        <th><?=$this->getTrans('menuTickets') ?></th>
                        <th><?=$this->getTrans('editor') ?></th>
                        <th><?=$this->getTrans('datetime') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($this->get('editTickets') as $ticket): ?>
                        <?php $user = $userMapper->getUserById($ticket->getEditor()); ?>
                        <?php $datetime = new \Ilch\Date($ticket->getDatetime()); ?>
                        <tr>
                            <td><?=$this->getDeleteCheckbox('check_tickets', $ticket->getId()) ?></td>
                            <td><?=$this->getEditIcon(['action' => 'treat', 'id' => $ticket->getId()]) ?></td>
                            <td><?=$this->getDeleteIcon(['action' => 'del', 'id' => $ticket->getId()]) ?></td>
                            <td><?=$this->escape($ticket->getTitle()) ?></td>
                            <td><?=($user) ? $user->getName() : '' ?></td>
                            <td><?=$datetime->format('d.m.Y H:i') ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>

        <?php if ($this->get('compTickets')): ?>
            <h1><?=$this->getTrans('compTickets') ?></h1>
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <colgroup>
                        <col class="icon_width" />
                        <col class="icon_width" />
                        <col class="icon_width" />
                        <col />
                        <col class="col-lg-1" />
                        <col class="col-lg-1" />
                    </colgroup>
                    <thead>
                    <tr>
                        <th><?=$this->getCheckAllCheckbox('check_tickets') ?></th>
                        <th></th>
                        <th></th>
                        <th><?=$this->getTrans('menuTickets') ?></th>
                        <th><?=$this->getTrans('editor') ?></th>
                        <th><?=$this->getTrans('datetime') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($this->get('compTickets') as $ticket): ?>
                        <?php $user = $userMapper->getUserById($ticket->getEditor()); ?>
                        <?php $datetime = new \Ilch\Date($ticket->getDatetime()); ?>
                        <tr>
                            <td><?=$this->getDeleteCheckbox('check_tickets', $ticket->getId()) ?></td>
                            <td><?=$this->getEditIcon(['action' => 'treat', 'id' => $ticket->getId()]) ?></td>
                            <td><?=$this->getDeleteIcon(['action' => 'del', 'id' => $ticket->getId()]) ?></td>
                            <td><?=$this->escape($ticket->getTitle()) ?></td>
                            <td><?=($user) ? $user->getName() : '' ?></td>
                            <td><?=$datetime->format('d.m.Y H:i') ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>

        <?php if ($this->get('closeTickets')): ?>
            <h1><?=$this->getTrans('closeTickets') ?></h1>
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <colgroup>
                        <col class="icon_width" />
                        <col class="icon_width" />
                        <col />
                        <col class="col-lg-1" />
                        <col class="col-lg-1" />
                    </colgroup>
                    <thead>
                    <tr>
                        <th><?=$this->getCheckAllCheckbox('check_tickets') ?></th>
                        <th></th>
                        <th><?=$this->getTrans('menuTickets') ?></th>
                        <th><?=$this->getTrans('editor') ?></th>
                        <th><?=$this->getTrans('datetime') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($this->get('closeTickets') as $ticket): ?>
                        <?php $user = $userMapper->getUserById($ticket->getEditor()); ?>
                        <?php $datetime = new \Ilch\Date($ticket->getDatetime()); ?>
                        <tr>
                            <td><?=$this->getDeleteCheckbox('check_tickets', $ticket->getId()) ?></td>
                            <td><?=$this->getDeleteIcon(['action' => 'del', 'id' => $ticket->getId()]) ?></td>
                            <td><?=$this->escape($ticket->getTitle()) ?></td>
                            <td><?=($user) ? $user->getName() : '' ?></td>
                            <td><?=$datetime->format('d.m.Y H:i') ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    <?php else: ?>
        <tr>
            <td colspan="4"><?=$this->getTrans('noTickets') ?></td>
        </tr>
    <?php endif; ?>

    <?php if ($this->get('tickets')): ?>
        <div class="content_savebox">
            <input type="hidden" class="content_savebox_hidden" name="action" value="" />
            <div class="btn-group dropup">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <?=$this->getTrans('selected') ?> <span class="caret"></span>
                </button>
                <ul class="dropdown-menu listChooser" role="menu">
                    <li><a href="#" data-hiddenkey="delete"><?=$this->getTrans('delete') ?></a></li>
                </ul>
            </div>
        </div>
    <?php endif; ?>
</form>
