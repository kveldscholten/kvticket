<?php
/**
 * @copyright Kevin Veldscholten
 * @package ilch
 */

namespace Modules\Kvticket\Controllers;

use Modules\Kvticket\Mappers\Ticket as TicketMapper;
use Modules\Kvticket\Models\Ticket as TicketModel;
use Ilch\Validation;

class Index extends \Ilch\Controller\Frontend
{
    public function indexAction()
    {
        $ticketMapper = new TicketMapper();

        $this->getLayout()->header()
            ->css('static/css/ticket.css')
            ->js('static/js/ticket.js');
        $this->getLayout()->getTitle()
            ->add($this->getTranslator()->trans('menuTickets'));
        $this->getLayout()->getHmenu()
            ->add($this->getTranslator()->trans('menuTickets'), ['action' => 'index']);

        $this->getView()->set('tickets', $ticketMapper->getTickets())
            ->set('openTickets', $ticketMapper->getTickets(['status' => '0']))
            ->set('editTickets', $ticketMapper->getTickets(['status' => '1']))
            ->set('closeTickets', $ticketMapper->getTickets(['status' => '2']));
    }

    public function showAction()
    {
        $ticketMapper = new TicketMapper();

        $this->getLayout()->getTitle()
            ->add($this->getTranslator()->trans('menuTickets'));
        $this->getLayout()->getHmenu()
            ->add($this->getTranslator()->trans('menuTickets'), ['action' => 'index'])
            ->add($this->getTranslator()->trans('show'), ['action' => 'show']);

        $ticketId = $this->getRequest()->getParam('id');
        $checkTicket = $ticketMapper->getTicketById($ticketId);
        if ($checkTicket) {
            $this->getView()->set('ticket', $ticketMapper->getTicketById($ticketId));
        } else {
            $this->redirect()
                ->withMessage('errorTicket', 'danger')
                ->to(['action' => 'index']);
        }
    }

    public function newAction()
    {
        $ticketMapper = new TicketMapper();

        $this->getLayout()->getTitle()
            ->add($this->getTranslator()->trans('menuTickets'));
        $this->getLayout()->getHmenu()
            ->add($this->getTranslator()->trans('menuTickets'), ['action' => 'index'])
            ->add($this->getTranslator()->trans('entry'), ['action' => 'new']);

        if ($this->getRequest()->getPost('saveTicket')) {
            $validation = Validation::create($this->getRequest()->getPost(), [
                'title' => 'required',
                'text' => 'required',
                'captcha' => 'captcha'
            ]);

            if ($validation->isValid()) {
                $ticketModel = new TicketModel();
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
                ->to(['action' => 'new']);
        }
    }
}
