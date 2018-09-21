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
     * The Editor.
     *
     * @var int
     */
    protected $editor;

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
     * @return $this
     */
    public function setText($text)
    {
        $this->text = (string)$text;

        return $this;
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
     * @return $this
     */
    public function setDatetime($datetime)
    {
        $this->datetime = (string)$datetime;

        return $this;
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

    /**
     * Gets the Editor.
     *
     * @return int
     */
    public function getEditor()
    {
        return $this->editor;
    }

    /**
     * Sets the Editor.
     *
     * @param int $editor
     * @return $this
     */
    public function setEditor($editor)
    {
        $this->editor = (int)$editor;

        return $this;
    }
}
