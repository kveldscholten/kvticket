<?php
/**
 * @copyright Kevin Veldscholten
 * @package ilch
 */

namespace Modules\Kvticket\Controllers\Admin;

use Modules\Kvticket\Mappers\Ticket as TicketMapper;
use Modules\Kvticket\Models\Ticket as TicketModel;
use Modules\User\Mappers\User as UserMapper;
use Ilch\Validation;

class Index extends \Ilch\Controller\Admin
{
    public function init()
    {
        $items = [
            [
                'name' => 'manage',
                'active' => false,
                'icon' => 'fa fa-th-list',
                'url' => $this->getLayout()->getUrl(['controller' => 'index', 'action' => 'index']),
                [
                    'name' => 'add',
                    'active' => false,
                    'icon' => 'fa fa-plus-circle',
                    'url' => $this->getLayout()->getUrl(['controller' => 'index', 'action' => 'treat'])
                ]
            ]
        ];

        if ($this->getRequest()->getActionName() == 'treat') {
            $items[0][0]['active'] = true;
        } else {
            $items[0]['active'] = true;
        }

        $this->getLayout()->addMenu
        (
            'menuTickets',
            $items
        );
    }

    public function indexAction()
    {
        $ticketMapper = new TicketMapper();
        $userMapper = new UserMapper();

        $this->getLayout()->getAdminHmenu()
            ->add($this->getTranslator()->trans('menuTickets'), ['action' => 'index'])
            ->add($this->getTranslator()->trans('manage'), ['action' => 'index']);

        if ($this->getRequest()->getPost('check_tickets')) {
            if ($this->getRequest()->getPost('action') == 'delete') {
                foreach ($this->getRequest()->getPost('check_tickets') as $ticketId) {
                    $ticketMapper->delete($ticketId);
                }
            }
        }

        $this->getView()->set('userMapper', $userMapper)
            ->set('tickets', $ticketMapper->getTickets())
            ->set('openTickets', $ticketMapper->getTickets(['status' => '0']))
            ->set('editTickets', $ticketMapper->getTickets(['status' => '1']))
            ->set('compTickets', $ticketMapper->getTickets(['status' => '2']))
            ->set('closeTickets', $ticketMapper->getTickets(['status' => '3']));
    }

    public function treatAction() 
    {
        $ticketMapper = new TicketMapper();

        if ($this->getRequest()->getParam('id')) {
            $this->getLayout()->getAdminHmenu()
                ->add($this->getTranslator()->trans('menuTickets'), ['action' => 'index'])
                ->add($this->getTranslator()->trans('edit'), ['action' => 'treat']);

            $this->getView()->set('ticket', $ticketMapper->getTicketById($this->getRequest()->getParam('id')));
        } else {
            $this->getLayout()->getAdminHmenu()
                ->add($this->getTranslator()->trans('menuTickets'), ['action' => 'index'])
                ->add($this->getTranslator()->trans('add'), ['action' => 'treat']);
        }

        if ($this->getRequest()->isPost()) {
            $validation = Validation::create($this->getRequest()->getPost(), [
                'title' => 'required',
                'text' => 'required'
            ]);

            if ($validation->isValid()) {
                $ticketModel = new TicketModel();
                if ($this->getRequest()->getParam('id')) {
                    $ticketModel->setId($this->getRequest()->getParam('id'))
                        ->setStatus($this->getRequest()->getPost('status'))
                        ->setEditor($this->getUser()->getId());
                }
                $ticketModel->setTitle($this->getRequest()->getPost('title'))
                    ->setText($this->getRequest()->getPost('text'));
                $ticketMapper->save($ticketModel);

                $this->redirect()
                    ->withMessage('saveSuccess')
                    ->to(['action' => 'index']);
            }
            $this->addMessage($validation->getErrorBag()->getErrorMessages(), 'danger', true);
            $this->redirect()
                ->withInput()
                ->withErrors($validation->getErrorBag())
                ->to(['action' => 'treat']);
        }
    }

    public function delAction()
    {
        if ($this->getRequest()->isSecure()) {
            $ticketMapper = new TicketMapper();
            $ticketMapper->delete($this->getRequest()->getParam('id'));

            $this->addMessage('deleteSuccess');
        }

        $this->redirect(['action' => 'index']);
    }
}
