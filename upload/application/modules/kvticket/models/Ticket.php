<?php
/**
 * @copyright Kevin Veldscholten
 * @package ilch
 */

namespace Modules\Kvticket\Models;

class Ticket extends \Ilch\Model
{
    /**
     * The Id.
     *
     * @var int
     */
    protected $id;

    /**
     * The Title.
     *
     * @var string
     */
    protected $title;

    /**
     * The Text.
     *
     * @var string
     */
    protected $text;

    /**
     * The Datetime.
     *
     * @var string
     */
    protected $datetime;

    /**
     * The Status.
     *
     * @var int
     */
    protected $status;

    /**
     * Sets the Id.
     *
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = (int)$id;

        return $this;
    }

    /**
     * Gets the Title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the Title.
     *
     * @param string $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = (string)$title;

        return $this;
    }

    /**
     * Gets the Text.
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Sets the Text.
     *
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = (string)$text;
    }

    /**
     * Gets the Datetime.
     *
     * @return string
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * Sets the Datetime.
     *
     * @param string $datetime
     */
    public function setDatetime($datetime)
    {
        $this->datetime = (string)$datetime;
    }

    /**
     * Gets the Status.
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets the Status.
     *
     * @param int $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = (int)$status;

        return $this;
    }
}
