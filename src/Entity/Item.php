<?php

namespace App\Entity;

class Item
{
    /**
     * @var string
     */
    private string $title;

    /**
     * @param string $title
     */
    public function __construct(string $title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $newTitle
     * 
     * @return void
     */
    public function setTitle(string $newTitle): void
    {
        $this->title = $newTitle;
    }
}