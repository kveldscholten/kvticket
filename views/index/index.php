<h1><?=$this->getTrans('menuTickets') ?></h1>
<?php if ($this->get('tickets')): ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="searchfield">
                <input class="form-control"
                       id="system-search"
                       name="q"
                       placeholder="Suchen..." />
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-striped table-list-search">
                    <colgroup>
                        <col />
                        <col class="col-lg-2" />
                        <col class="col-lg-2" />
                    </colgroup>
                    <thead>
                        <tr>
                            <th><?=$this->getTrans('title') ?></th>
                            <th><?=$this->getTrans('datetime') ?></th>
                            <th><?=$this->getTrans('status') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($this->get('tickets') as $ticket): ?>
                            <?php $datetime = new \Ilch\Date($ticket->getDatetime());
                            if ($ticket->getStatus() == 1) {
                                $ticketCSS = 'info';
                                $ticketStatzs = $this->getTrans('editTickets');
                            } elseif ($ticket->getStatus() == 2) {
                                $ticketCSS = 'success';
                                $ticketStatzs = $this->getTrans('compTickets');
                            } elseif ($ticket->getStatus() == 3) {
                                $ticketCSS = 'danger';
                                $ticketStatzs = $this->getTrans('closeTickets');
                            } else {
                                $ticketCSS = '';
                                $ticketStatzs = $this->getTrans('openTickets');
                            } ?>
                            <tr <?=($ticketCSS) ? 'class="'.$ticketCSS.'"' : '' ?>>
                                <td>
                                    <a href="<?=$this->getUrl(['action' => 'show', 'id' => $ticket->getId()]) ?>" title="<?=$this->escape($ticket->getTitle()) ?>">
                                        <?=$this->escape($ticket->getTitle()) ?>
                                    </a>
                                </td>
                                <td>
                                    <?=$datetime->format('d.m.Y H:i') ?>
                                </td>
                                <td>
                                    <?=$ticketStatzs ?>
                                </td>
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
